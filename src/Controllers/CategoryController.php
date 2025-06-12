<?php

namespace BruzDeporte\Controllers;

use BruzDeporte\Models\CategoryModel;

$model = new CategoryModel();

$action = null;
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
    case 'show':
        $idCategoria = $_POST['show'];
        $category = $model->find($idCategoria);
        break;
    default:
        break;
}

$categories = $model->findAll();

// Mostrar la vista de lista de categorías
include __DIR__ . '/../views/category/category.php';
die();