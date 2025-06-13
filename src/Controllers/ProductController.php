<?php

namespace BruzDeporte\Controllers; // Define el espacio de nombres para la clase.

use BruzDeporte\Models\ProductModel; // Importa el modelo ProductModel para interactuar con la base de datos.
use BruzDeporte\Models\CategoryModel; // Importa el modelo CategoryModel para interactuar con las categorías.

// Instancia el modelo ProductModel.
$model = new ProductModel();

// Inicializa la variable $action para determinar la acción a ejecutar.
$action = null;

// Detecta la acción solicitada a través de los datos enviados por POST.
if (isset($_POST['store'])) { // Si se envió un formulario para crear un producto.
    $action = 'store';
} elseif (isset($_POST['update'])) { // Si se envió un formulario para actualizar un producto.
    $action = 'update';
} elseif (isset($_POST['delete'])) { // Si se solicitó eliminar un producto.
    $action = 'delete';
} elseif (isset($_POST['show'])) { // Si se solicitó mostrar un producto específico.
    $action = 'show';
}

// Ejecuta la acción correspondiente.
switch ($action) {
    case 'store': // Guardar un nuevo producto
        $imageFileName = 'Imagen.jpg'; // Imagen por defecto si no se sube ninguna imagen
        
        // Verifica si se ha subido una imagen correctamente.
        if (isset($_FILES['Imagen']) && $_FILES['Imagen']['error'] === UPLOAD_ERR_OK) {
            // Define la ruta del directorio de subida de imágenes.
            $uploadDir = __DIR__ . '/../storage/img/products/';
            $fileExtension = pathinfo($_FILES['Imagen']['name'], PATHINFO_EXTENSION);
            $uniqueFileName = uniqid() . '.' . $fileExtension;
            $uploadFilePath = $uploadDir . $uniqueFileName;

            // Crea el directorio si no existe.
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            // Mueve el archivo subido al directorio destino.
            if (move_uploaded_file($_FILES['Imagen']['tmp_name'], $uploadFilePath)) {
                $imageFileName = $uniqueFileName; // Guarda el nombre único del archivo.
            } else {
                // Registra un error en caso de fallo en la subida.
                error_log("Fallo al mover el archivo subido: " . $_FILES['Imagen']['name']);
            }
        }
        
        // Prepara los datos recibidos para almacenar el producto.
        $data = [
            'Nombre' => $_POST['Nombre'] ?? '',
            'Descripcion' => $_POST['Descripcion'] ?? '',
            'Talla' => $_POST['Talla'] ?? '',
            'Imagen' => $imageFileName,
            'Detal' => $_POST['Detal'] ?? 0,
            'Mayor' => $_POST['Mayor'] ?? null,
            'Stock' => $_POST['Stock'] ?? 0,
            'IdCategoria' => $_POST['IdCategoria'] ?? 0
        ];

        // Guarda el producto en la base de datos.
        $model->store($data);
        break;

    case 'update': // Actualizar un producto existente
        $id = $_POST['IdProducto'] ?? null;
        if ($id) {
            // Obtiene el producto actual para conocer la imagen existente.
            $existingProduct = $model->find($id);

            // Inicializa el nombre de la imagen con la existente o una imagen por defecto.
            $imageFileName = $existingProduct['Imagen'] ?? 'Imagen.jpg';

            // Verifica si se subió una nueva imagen.
            if (isset($_FILES['Imagen']) && $_FILES['Imagen']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = __DIR__ . '/../storage/img/products/';
                $fileExtension = pathinfo($_FILES['Imagen']['name'], PATHINFO_EXTENSION);
                $uniqueFileName = uniqid() . '.' . $fileExtension;
                $uploadFilePath = $uploadDir . $uniqueFileName;

                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                if (move_uploaded_file($_FILES['Imagen']['tmp_name'], $uploadFilePath)) {
                    // Elimina la imagen antigua si no es la por defecto y existe en el servidor.
                    $oldImageRelativePath = str_replace(APP_BASE_URL . '/src/storage/img/products/', '', $existingProduct['Imagen']);
                    if ($oldImageRelativePath && $oldImageRelativePath !== 'Imagen.jpg' && file_exists($uploadDir . $oldImageRelativePath)) {
                        unlink($uploadDir . $oldImageRelativePath);
                    }
                    // Actualiza el nombre de la imagen con el nuevo archivo.
                    $imageFileName = $uniqueFileName;
                } else {
                    // Registra error si no se pudo mover la imagen subida.
                    error_log("Fallo al mover el archivo subido para actualización: " . $_FILES['Imagen']['name']);
                    // Se mantiene la imagen anterior.
                }
            } else {
                // Si no hay nueva imagen, se conserva la imagen existente.
                if (isset($existingProduct['Imagen'])) {
                    $imageFileName = basename($existingProduct['Imagen']);
                } else {
                    $imageFileName = 'Imagen.jpg'; // Imagen por defecto.
                }
            }

            // Prepara los datos actualizados para guardar.
            $data = [
                'Nombre' => $_POST['Nombre'] ?? '',
                'Descripcion' => $_POST['Descripcion'] ?? '',
                'Talla' => $_POST['Talla'] ?? '',
                'Imagen' => $imageFileName,
                'Detal' => $_POST['Detal'] ?? 0,
                'Mayor' => $_POST['Mayor'] ?? null,
                'Stock' => $_POST['Stock'] ?? 0,
                'IdCategoria' => $_POST['IdCategoria'] ?? 0
            ];

            // Ejecuta la actualización en la base de datos.
            $model->update($id, $data);
        }
        break;

    case 'delete': // Eliminar un producto
        $id = filter_input(INPUT_POST, 'delete', FILTER_VALIDATE_INT);
        if ($id !== false) {
            // Obtiene la información del producto antes de eliminarlo.
            $productToDelete = $model->find($id);

            // Elimina el producto de la base de datos.
            $db_delete_success = $model->delete($id);

            // Si la eliminación fue exitosa y hay imagen asociada, elimina el archivo físico.
            if ($db_delete_success && $productToDelete && !empty($productToDelete['Imagen'])) {
                $uploadDir = __DIR__ . '/../storage/img/products/';
                $imageFileName = basename($productToDelete['Imagen']);
                $imagePath = $uploadDir . $imageFileName;

                // No eliminar la imagen por defecto.
                if ($imageFileName !== 'Imagen.jpg' && file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
        }
        break;

    case 'show': // Mostrar detalles de un producto específico
        $id = $_POST['show'];
        $producto = $model->find($id);
        break;

    default:
        // No se especificó acción, simplemente se listan los productos.
        break;
}

// Obtiene todos los productos para mostrarlos en la vista.
$products = $model->findAll();

// Instancia el modelo de categorías para obtenerlas.
$categoryModel = new CategoryModel();
$categories = $categoryModel->findAll();

// Prepara los datos para enviar a la vista.
$data = [
    'products' => $products,
    'categories' => $categories
];

// Incluye la vista principal de productos.
include __DIR__ . '/../views/product/product.php';

// Termina la ejecución para evitar procesar código adicional.
die();
