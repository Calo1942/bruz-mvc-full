<?php

namespace BruzDeporte\Controllers;

use BruzDeporte\Models\CategoryModel; 

// Controlador para gestionar categorías
$model = new CategoryModel();
$action = null;

// Detecta la acción solicitada por POST
if (isset($_POST['store'])) {
    $action = 'store';
} elseif (isset($_POST['update'])) {
    $action = 'update';
} elseif (isset($_POST['delete'])) {
    $action = 'delete';
} elseif (isset($_POST['show'])) {
    $action = 'show';
}

// Estructura switch para manejar las diferentes acciones.
switch ($action) {
    // Almacena una nueva categoría
    case 'store':
        $data = [
            'Nombre' => $_POST['Nombre'] ?? '' 
        ];
        $model->store($data); 
        break;
    // Actualiza una categoría existente
    case 'update':
        $idCategoria = $_POST['IdCategoria'] ?? null; 
        if ($idCategoria) {
            $data = [
                'Nombre' => $_POST['Nombre'] ?? '' 
            ];
            $model->update($idCategoria, $data); 
        }
        break;
    // Elimina una categoría
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
    // Lista categorías si no hay acción
    default:
        break;
}

// Obtiene todas las categorías para la vista
$categories = $model->findAll(); 

// Incluye la vista de la lista de categorías.
include __DIR__ . '/../views/category/category.php'; 
die(); 