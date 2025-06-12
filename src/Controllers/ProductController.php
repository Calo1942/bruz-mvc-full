<?php

namespace BruzDeporte\Controllers; // Define el espacio de nombres para la clase.

use BruzDeporte\Models\ProductModel; // Importa el modelo ProductModel para interactuar con la base de datos.

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
        $data = [
            'Nombre' => $_POST['Nombre'] ?? '', // Obtiene el nombre del producto del POST, o una cadena vacía.
            'Descripcion' => $_POST['Descripcion'] ?? '', // Obtiene la descripción del POST, o una cadena vacía.
            'Talla' => $_POST['Talla'] ?? '',             // Obtiene la talla del POST, o una cadena vacía.
            'Imagen' => $_POST['Imagen'] ?? 'Imagen.jpg', // Obtiene la imagen del POST, o 'Imagen.jpg' por defecto.
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
            $data = [
                'Nombre' => $_POST['Nombre'] ?? '',         // Obtiene el nombre actualizado.
                'Descripcion' => $_POST['Descripcion'] ?? '', // Obtiene la descripción actualizada.
                'Talla' => $_POST['Talla'] ?? '',             // Obtiene la talla actualizada.
                'Imagen' => $_POST['Imagen'] ?? 'Imagen.jpg', // Obtiene la imagen actualizada.
                'Detal' => $_POST['Detal'] ?? 0,             // Obtiene el precio al detal actualizado.
                'Mayor' => $_POST['Mayor'] ?? null,           // Obtiene el precio al mayor actualizado.
                'Stock' => $_POST['Stock'] ?? 0,             // Obtiene el stock actualizado.
                'IdCategoria' => $_POST['IdCategoria'] ?? 0  // Obtiene el ID de la categoría actualizado.
            ];
            $model->update($id, $data); // Llama al método update del modelo para actualizar el producto.
        }
        break;
    case 'delete': // Caso para eliminar un producto.
        $id = filter_input(INPUT_POST, 'delete', FILTER_VALIDATE_INT); // Valida y obtiene el ID del producto a eliminar.
        if ($id !== false) { // Si el ID es un entero válido.
            $model->delete($id); // Llama al método delete del modelo para eliminar el producto.
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
$productos = $model->findAll(); 

// Prepara los datos para pasar a la vista.
$data = ['productos' => $productos]; 

// Incluye la vista de la lista de productos.
// Se asume que la vista se encuentra en '../views/product/product.php'.
include __DIR__ . '/../views/product/product.php'; 
die(); // Termina la ejecución del script para asegurar que no se procese más código.

// Aquí termina el controlador de productos.