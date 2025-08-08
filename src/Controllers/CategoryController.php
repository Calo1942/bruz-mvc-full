<?php

namespace BruzDeporte\Controllers;

use BruzDeporte\Models\CategoryModel; 

// Controlador para gestionar categorías
$model = new CategoryModel();
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
    // Muestra detalles de una categoría específica
    case 'show':
        $idCategoria = $_POST['show']; 
        $category = $model->find($idCategoria); 
        break;
    default: 
        
        break;
}

// Obtiene todas las categorías para la vista
$categories = $model->findAll(); 

// Incluye la vista de la lista de categorías.
include __DIR__ . '/../views/category/category.php'; 
die(); 