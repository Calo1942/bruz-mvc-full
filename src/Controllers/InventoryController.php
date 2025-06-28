<?php

namespace BruzDeporte\Controllers;
use BruzDeporte\Models\InventoryModel; 

// Controlador para gestionar inventario
$model = new InventoryModel();
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
    // Almacena un nuevo registro de inventario
    case 'store':
        $data = [
            'Stock' => $_POST['Stock'] ?? 0,
            'IdProducto' => $_POST['IdProducto'] ?? null,
            'IdTalla' => $_POST['IdTalla'] ?? null,
            'Color' => $_POST['Color'] ?? '',
        ];
        $model->store($data);
        break;
    // Actualiza un registro de inventario existente
    case 'update':
        $id = $_POST['IdInventario'] ?? null;
        if ($id) {
            $data = [
                'Stock' => $_POST['Stock'] ?? 0,
                'IdProducto' => $_POST['IdProducto'] ?? null,
                'IdTalla' => $_POST['IdTalla'] ?? null,
                'Color' => $_POST['Color'] ?? '',
            ];
            $model->update($id, $data);
        }
        break;
    // Elimina un registro de inventario
    case 'delete':
        $id = filter_input(INPUT_POST, 'delete', FILTER_VALIDATE_INT);
        if ($id !== false) {
            $model->delete($id);
        }
        break;
    // Muestra detalles de un registro de inventario específico
    case 'show':
        $id = $_POST['show'];
        $inventario = $model->find($id);
        break;
    // Lista inventario si no hay acción
    default:
        break;
}

// Obtiene todas las registros de inventario para la vista
$inventario = $model->findAll();
$data = [
    'inventario' => $inventario
];

// Incluye la vista de la lista de inventario.
include __DIR__ . '/../views/inventory/inventory.php';
die();
