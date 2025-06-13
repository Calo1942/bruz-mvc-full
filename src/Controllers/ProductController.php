<?php

namespace BruzDeporte\Controllers; // Define el espacio de nombres para la clase.

use BruzDeporte\Models\ProductModel; // Importa el modelo ProductModel para interactuar con la base de datos.
use BruzDeporte\Models\CategoryModel; // Importa el modelo CategoryModel para interactuar con las categorías.

// Instancia el modelo ProductModel.
$model = new ProductModel();

// Inicializa la variable $action a null.
$action = null;

// Determina la acción a realizar basándose en las solicitudes POST recibidas.
if (isset($_POST['store'])) { // Si se ha enviado el formulario para guardar un nuevo producto.
    $action = 'store';
} elseif (isset($_POST['update'])) { // Si se ha enviado el formulario para actualizar un producto existente.
    $action = 'update';
} elseif (isset($_POST['delete'])) { // Si se ha enviado la solicitud para eliminar un producto.
    $action = 'delete';
} elseif (isset($_POST['show'])) { // Si se ha solicitado mostrar los detalles de un producto específico.
    $action = 'show';
}

// Estructura switch para manejar las diferentes acciones.
switch ($action) {
    case 'store': // Caso para almacenar un nuevo producto.
        $imageFileName = 'Imagen.jpg'; // Imagen por defecto si no hay subida
        // Verificar si se subió una imagen
        if (isset($_FILES['Imagen']) && $_FILES['Imagen']['error'] === UPLOAD_ERR_OK) {
            // La ruta de tu controlador es: src\Controllers\ProductController.php
            // La ruta de destino es: src\storage\img\products
            // Entonces, desde el controlador, necesitas ir hacia atrás una vez y luego a la carpeta storage.
            $uploadDir = __DIR__ . '/../storage/img/products/'; // Directorio de subida ajustado
            $fileExtension = pathinfo($_FILES['Imagen']['name'], PATHINFO_EXTENSION);
            $uniqueFileName = uniqid() . '.' . $fileExtension;
            $uploadFilePath = $uploadDir . $uniqueFileName;

            // Asegurarse de que el directorio de subida exista
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            if (move_uploaded_file($_FILES['Imagen']['tmp_name'], $uploadFilePath)) {
                $imageFileName = $uniqueFileName; // Almacenar el nombre de archivo único
            } else {
                // Manejar error de subida (ej., registrar, establecer una imagen por defecto, mostrar error al usuario)
                error_log("Fallo al mover el archivo subido: " . $_FILES['Imagen']['name']);
            }
        }
        $data = [
            'Nombre' => $_POST['Nombre'] ?? '', // Obtiene el nombre del producto del POST, o una cadena vacía.
            'Descripcion' => $_POST['Descripcion'] ?? '', // Obtiene la descripción del POST, o una cadena vacía.
            'Talla' => $_POST['Talla'] ?? '',             // Obtiene la talla del POST, o una cadena vacía.
            'Imagen' => $imageFileName,                   // Usa el nombre de archivo de imagen procesado.
            'Detal' => $_POST['Detal'] ?? 0,             // Obtiene el precio al detal del POST, o 0 por defecto.
            'Mayor' => $_POST['Mayor'] ?? null,           // Obtiene el precio al mayor del POST, o null.
            'Stock' => $_POST['Stock'] ?? 0,             // Obtiene el stock del POST, o 0 por defecto.
            'IdCategoria' => $_POST['IdCategoria'] ?? 0  // Obtiene el ID de la categoría del POST, o 0 por defecto.
        ];
        $model->store($data); // Llama al método store del modelo para guardar el producto.
        break;

    case 'update': // Caso para actualizar un producto existente.
        $id = $_POST['IdProducto'] ?? null; // Obtiene el IdProducto del POST.
        if ($id) { // Si el IdProducto existe.
            $existingProduct = $model->find($id); // Fetch existing product to get current image name

            // Initialize $imageFileName with the existing image from the database
            // If no existing image, use 'Imagen.jpg' as a default
            $imageFileName = $existingProduct['Imagen'] ?? 'Imagen.jpg';

            // Check if a new image was uploaded
            if (isset($_FILES['Imagen']) && $_FILES['Imagen']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = __DIR__ . '/../storage/img/products/';
                $fileExtension = pathinfo($_FILES['Imagen']['name'], PATHINFO_EXTENSION);
                $uniqueFileName = uniqid() . '.' . $fileExtension;
                $uploadFilePath = $uploadDir . $uniqueFileName;

                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                if (move_uploaded_file($_FILES['Imagen']['tmp_name'], $uploadFilePath)) {
                    // Delete old image if it's not the default and exists
                    // Make sure to remove the APP_BASE_URL prefix before checking file_exists and unlinking
                    $oldImageRelativePath = str_replace(APP_BASE_URL . '/src/storage/img/products/', '', $existingProduct['Imagen']);
                    if ($oldImageRelativePath && $oldImageRelativePath !== 'Imagen.jpg' && file_exists($uploadDir . $oldImageRelativePath)) {
                        unlink($uploadDir . $oldImageRelativePath);
                    }
                    $imageFileName = $uniqueFileName; // Update to new image filename
                } else {
                    error_log("Fallo al mover el archivo subido para actualización: " . $_FILES['Imagen']['name']);
                    // If new upload fails, we keep the old image filename, which is already in $imageFileName
                }
            } else {
                // If no new image is uploaded, ensure the $imageFileName remains the existing one.
                if (isset($existingProduct['Imagen'])) {
                    // Extract just the filename if it includes the full URL
                    $imageFileName = basename($existingProduct['Imagen']);
                } else {
                    $imageFileName = 'Imagen.jpg'; // Fallback if no existing image
                }
            }

            $data = [
                'Nombre' => $_POST['Nombre'] ?? '',
                'Descripcion' => $_POST['Descripcion'] ?? '',
                'Talla' => $_POST['Talla'] ?? '',
                'Imagen' => $imageFileName, // Use the determined image filename
                'Detal' => $_POST['Detal'] ?? 0,
                'Mayor' => $_POST['Mayor'] ?? null,
                'Stock' => $_POST['Stock'] ?? 0,
                'IdCategoria' => $_POST['IdCategoria'] ?? 0
            ];
            $model->update($id, $data);
        }
        break;

    case 'delete': // Caso para eliminar un producto.
        $id = filter_input(INPUT_POST, 'delete', FILTER_VALIDATE_INT); // Valida y obtiene el ID del producto a eliminar.
        if ($id !== false) { // Si el ID es un entero válido.
            // 1. Obtener la información del producto antes de eliminarlo de la DB
            $productToDelete = $model->find($id);

            // 2. Intentar eliminar el registro de la base de datos
            $db_delete_success = $model->delete($id);

            // 3. Si la eliminación de la DB fue exitosa y hay una imagen asociada (y no es la imagen por defecto)
            if ($db_delete_success && $productToDelete && !empty($productToDelete['Imagen'])) {
                $uploadDir = __DIR__ . '/../storage/img/products/';
                // Extraer solo el nombre del archivo de la ruta completa (si el modelo lo devuelve con APP_BASE_URL)
                $imageFileName = basename($productToDelete['Imagen']);
                $imagePath = $uploadDir . $imageFileName;

                // Asegurarse de que no estamos intentando eliminar la imagen por defecto si existe
                if ($imageFileName !== 'Imagen.jpg' && file_exists($imagePath)) {
                    unlink($imagePath); // Elimina el archivo físico
                }
            }
        }
        break;

    case 'show': // Caso para mostrar un producto específico.
        $id = $_POST['show']; // Obtiene el ID del producto a mostrar.
        $producto = $model->find($id); // Llama al método find del modelo para buscar el producto.
        break;

    default: // Acción por defecto si no se especifica ninguna.
        // No hay acción específica, el controlador simplemente recuperará todos los productos.
        break;
}

// Recupera todos los productos de la base de datos para mostrarlos en la vista.
$products = $model->findAll();

// Ejemplo de uso en un controlador
$categoryModel = new CategoryModel();
$categories = $categoryModel->findAll();

// Prepara los datos para pasar a la vista.
$data = ['products' => $products,
        'categories' => $categories]; // Incluye las categorías para la vista.

// Incluye la vista de la lista de productos.
// Se asume que la vista se encuentra en '../views/product/product.php'.
include __DIR__ . '/../views/product/product.php';
die(); // Termina la ejecución del script para asegurar que no se procese más código.

// Aquí termina el controlador de productos.