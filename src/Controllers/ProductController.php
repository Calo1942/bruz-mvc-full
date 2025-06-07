<?php

namespace BruzDeporte\Controllers;

use BruzDeporte\Models\ProductModel;

$model = new ProductModel();

if (isset($_POST['crear'])) {
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
    $model->create($data);
}

if (isset($_POST['modificar'])) {
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

if (isset($_POST['eliminar'])) {
    $id = filter_input(INPUT_POST, 'eliminar', FILTER_VALIDATE_INT);
    if ($id !== false) {
        $model->delete($id);
    }
}

if (isset($_POST['seleccion'])) {
    $id = $_POST['seleccion'];
    $producto = $model->find($id);
}

$productos = $model->findAll();

// Mostrar la vista de lista de productos
include __DIR__ . '/../views/product.php';
