<?php

namespace BruzDeporte\Controllers;

use BruzDeporte\Models\ProductModel;
use BruzDeporte\Models\CategoryModel;

// Controlador para gestionar productos
$model = new ProductModel();
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
    // Almacena un nuevo producto
    case 'store':
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
        $model->store($data);
        break;
    // Actualiza un producto existente
    case 'update':
        $id = $_POST['IdProducto'] ?? null;
        if ($id) {
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
            $model->update($id, $data);
        }
        break;
    // Elimina un producto
    case 'delete':
        $id = filter_input(INPUT_POST, 'delete', FILTER_VALIDATE_INT);
        if ($id !== false) {
            $model->delete($id);
        }
        break;
    // Muestra detalles de un producto específico
    case 'show':
        $id = $_POST['show'];
        $producto = $model->find($id);
        break;
    // Lista productos si no hay acción
    default:
        break;
}

// Obtiene todos los productos y categorías para la vista
$products = $model->findAll();
$categoryModel = new CategoryModel();
$categories = $categoryModel->findAll();
$data = [
    'products' => $products,
    'categories' => $categories
];
include __DIR__ . '/../views/product/product.php';
die();
