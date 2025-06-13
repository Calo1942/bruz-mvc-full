<?php

namespace BruzDeporte\Controllers; // Define el espacio de nombres para la clase.

use BruzDeporte\Models\CategoryModel; // Importa el modelo CategoryModel para interactuar con la base de datos.

// Instancia el modelo CategoryModel.
$model = new CategoryModel(); 

// Inicializa la variable $action a null.
$action = null; 

// Determina la acción a realizar basándose en las solicitudes POST recibidas.
if (isset($_POST['store'])) { // Si se ha enviado el formulario para guardar una nueva categoría.
    $action = 'store'; 
} elseif (isset($_POST['update'])) { // Si se ha enviado el formulario para actualizar una categoría existente.
    $action = 'update'; 
} elseif (isset($_POST['delete'])) { // Si se ha enviado la solicitud para eliminar una categoría.
    $action = 'delete'; 
} elseif (isset($_POST['show'])) { // Si se ha solicitado mostrar los detalles de una categoría específica.
    $action = 'show'; 
}

// Estructura switch para manejar las diferentes acciones.
switch ($action) {
    case 'store': // Caso para almacenar una nueva categoría.
        $data = [
            'Nombre' => $_POST['Nombre'] ?? '' // Obtiene el nombre de la categoría del POST, o una cadena vacía.
        ];
        $model->store($data); // Llama al método store del modelo para guardar la categoría.
        break;
    case 'update': // Caso para actualizar una categoría existente.
        $idCategoria = $_POST['IdCategoria'] ?? null; // Obtiene el IdCategoria de la categoría a actualizar del POST.
        if ($idCategoria) { // Si el IdCategoria existe.
            $data = [
                'Nombre' => $_POST['Nombre'] ?? '' // Obtiene el nombre actualizado.
            ];
            $model->update($idCategoria, $data); // Llama al método update del modelo para actualizar la categoría.
        }
        break;
    case 'delete': // Caso para eliminar una categoría.
        $idCategoria = $_POST['delete'] ?? null; // Obtiene el IdCategoria de la categoría a eliminar del POST.
        if ($idCategoria) { // Si el IdCategoria existe.
            $model->delete($idCategoria); // Llama al método delete del modelo para eliminar la categoría.
        }
        break;
    case 'show': // Caso para mostrar una categoría específica.
        $idCategoria = $_POST['show']; // Obtiene el IdCategoria de la categoría a mostrar.
        $category = $model->find($idCategoria); // Llama al método find del modelo para buscar la categoría.
        break;
    default: // Acción por defecto si no se especifica ninguna.
        // No hay acción específica, el controlador simplemente recuperará todas las categorías.
        break;
}

// Recupera todas las categorías de la base de datos para mostrarlas en la vista.
$categories = $model->findAll(); 

// Incluye la vista de la lista de categorías.
// Se asume que la vista se encuentra en '../views/category/category.php'.
include __DIR__ . '/../views/category/category.php'; 
die(); // Termina la ejecución del script para asegurar que no se procese más código.