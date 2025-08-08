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
} elseif (isset($_POST['update'])) { 
    $action = 'update'; 
} elseif (isset($_POST['delete'])) { 
    $action = 'delete'; 
} elseif (isset($_POST['show'])) { 
    $action = 'show'; 
}


switch ($action) {
    case 'store': 
        $data = [
            'Nombre' => $_POST['Nombre'] ?? ''  
        ];
        $model->store($data); 
        break;
    case 'update': 
        $idCategoria = $_POST['IdCategoria'] ?? null; 
        if ($idCategoria) { 
            $data = [
                'Nombre' => $_POST['Nombre'] ?? '' 
            ];
            $model->update($idCategoria, $data); 
        }
        break;
    case 'delete': 
        $idCategoria = $_POST['delete'] ?? null; 
        if ($idCategoria) { 
            $model->delete($idCategoria); 
        }
        break;
    case 'show': // Caso para mostrar una categoría específica.
        $idCategoria = $_POST['show']; // Obtiene el IdCategoria de la categoría a mostrar.
        $category = $model->find($idCategoria); // Llama al método find del modelo para buscar la categoría.
        break;
    default: 
        
        break;
}

// Recupera todas las categorías de la base de datos para mostrarlas en la vista.
$categories = $model->findAll(); 

// Incluye la vista de la lista de categorías.
// Se asume que la vista se encuentra en '../views/category/category.php'.
include __DIR__ . '/../views/category/category.php'; 
die(); // Termina la ejecución del script para asegurar que no se procese más código.