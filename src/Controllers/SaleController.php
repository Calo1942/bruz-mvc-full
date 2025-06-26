<?php

namespace BruzDeporte\Controllers;
use BruzDeporte\Models\SaleModel; 

// Controlador para gestionar ventas
$model = new SaleModel();
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
    // Almacena una nueva venta
    case 'store':
        $data = [
            'IdCliente' => $_POST['IdCliente'] ?? null,
            'Fecha' => $_POST['Fecha'] ?? null,
            'Total' => $_POST['Total'] ?? 0,
            'Estado' => $_POST['Estado'] ?? 'pendiente',
        ];
        $model->store($data);
        break;
    // Actualiza una venta existente
    case 'update':
        $id = $_POST['IdVenta'] ?? null;
        if ($id) {
            $data = [
                'IdCliente' => $_POST['IdCliente'] ?? null,
                'Fecha' => $_POST['Fecha'] ?? null,
                'Total' => $_POST['Total'] ?? 0,
                'Estado' => $_POST['Estado'] ?? 'pendiente',
            ];
            $model->update($id, $data);
        }
        break;
    // Elimina una venta
    case 'delete':
        $id = filter_input(INPUT_POST, 'delete', FILTER_VALIDATE_INT);
        if ($id !== false) {
            $model->delete($id);
        }
        break;
    // Muestra detalles de una venta específica
    case 'show':
        $id = $_POST['show'];
        $venta = $model->find($id);
        break;
    // Lista ventas si no hay acción
    default:
        break;
}

// Obtiene todas las ventas para la vista
$ventas = $model->findAll();
$data = [
    'ventas' => $ventas
];

// Incluye la vista de la lista de ventas.
include __DIR__ . '/../views/sale/sale.php';
die(); 