<?php

namespace BruzDeporte\Controllers;

use BruzDeporte\Models\ProductModel;

$model = new ProductModel();

if (isset($_POST['store'])) {
    $data = [
        'Nombre' => $_POST['Nombre'] ?? '',
        'Descripcion' => $_POST['Descripcion'] ?? '',
        'Talla' => $_POST['Talla'] ?? '',
        'Imagen' => $_POST['Imagen'] ?? 'Imagen.jpg',
        'Detal' => $_POST['Detal'] ?? 0,
        'Mayor' => $_POST['Mayor'] ?? null,
        'Stock' => $_POST['Stock'] ?? 0,
        'IdCategoria' => $_POST['IdCategoria'] ?? 0
    ];
    $model->store($data);
}

if (isset($_POST['update'])) {
    $id = $_POST['IdProducto'] ?? null;
    if ($id) {
        $data = [
            'Nombre' => $_POST['Nombre'] ?? '',
            'Descripcion' => $_POST['Descripcion'] ?? '',
            'Talla' => $_POST['Talla'] ?? '',
            'Imagen' => $_POST['Imagen'] ?? 'Imagen.jpg',
            'Detal' => $_POST['Detal'] ?? 0,
            'Mayor' => $_POST['Mayor'] ?? null,
            'Stock' => $_POST['Stock'] ?? 0,
            'IdCategoria' => $_POST['IdCategoria'] ?? 0
        ];
        $model->update($id, $data);
    }
}

if (isset($_POST['delete'])) {
    $id = filter_input(INPUT_POST, 'delete', FILTER_VALIDATE_INT);
    if ($id !== false) {
        $model->delete($id);
    }
}

if (isset($_POST['show'])) {
    // Mostrar un producto específico
    $id = $_POST['show'];
    $producto = $model->find($id);
}

$productos = $model->findAll();

// Pasar los productos a la vista
$data = ['productos' => $productos]; // Añadimos esta línea

// Mostrar la vista de lista de productos
include __DIR__ . '/../views/product/product.php';
die();
// Aquí termina el controlador de productos
