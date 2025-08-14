<?php

namespace BruzDeporte\Controllers;

use BruzDeporte\Models\CustomModel;
use BruzDeporte\Models\CategoryModel;

// Controlador para gestionar personalizaciones
$model = new CustomModel();
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

switch ($action) {
    // Almacena una nueva personalización
    case 'store':
        $imageFileName = 'Imagen.jpg';
        $data = [
            'Descripcion' => $_POST['Descripcion'] ?? '',
            'Imagen' => $imageFileName,
            'IdCategoria' => $_POST['IdCategoria'] ?? null
        ];
        $model->store($data);
        break;
    // Actualiza una personalización existente
    case 'update':
        $id = $_POST['IdPersonalizacion'] ?? null;
        if ($id) {
            $existingCustomItem = $model->find($id);
            $data = [
                'Descripcion' => $_POST['Descripcion'] ?? '',
                'Imagen' => $imageFileName,
                'IdCategoria' => $_POST['IdCategoria'] ?? null
            ];
            $model->update($id, $data);
        }
        break;
    // Elimina una personalización
    case 'delete':
        $id = filter_input(INPUT_POST, 'delete', FILTER_VALIDATE_INT);
        if ($id !== false) {
            $model->delete($id);
        }
        break;
    // Muestra detalles de una personalización específica
    case 'show':
        $id = $_POST['show'];
        $customItem = $model->find($id);
        break;
    // Lista personalizaciones si no hay acción
    default:
        break;
}

// Obtiene todas las personalizaciones y categorías para la vista
$customItems = $model->findAll();
$categoryModel = new CategoryModel();
$categories = $categoryModel->findAll();
$data = [
    'customItems' => $customItems,
    'categories' => $categories
];

include __ROOT__ . '/views/custom/custom.php';

die();
