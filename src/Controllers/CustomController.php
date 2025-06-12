<?php

namespace BruzDeporte\Controllers;

use BruzDeporte\Models\ClientModel;

$model = new ClientModel();

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
            'Cedula' => $_POST['Cedula'] ?? '',
            'Nombre' => $_POST['Nombre'] ?? '',
            'Apellido' => $_POST['Apellido'] ?? '',
            'Correo' => $_POST['Correo'] ?? null,
            'Telefono' => $_POST['Telefono'] ?? null
        ];
        $model->store($data);
        break;
    case 'update':
        $cedula = $_POST['Cedula'] ?? null;
        if ($cedula) {
            $data = [
                'Nombre' => $_POST['Nombre'] ?? '',
                'Apellido' => $_POST['Apellido'] ?? '',
                'Correo' => $_POST['Correo'] ?? null,
                'Telefono' => $_POST['Telefono'] ?? null
            ];
            $model->update($cedula, $data);
        }
        break;
    case 'delete':
        $cedula = $_POST['delete'] ?? null;
        if ($cedula) {
            $model->delete($cedula);
        }
        break;
    case 'show':
        $cedula = $_POST['show'];
        $cliente = $model->find($cedula);
        break;
    default:
        // No action
        break;
}

$clientes = $model->findAll();

// Mostrar la vista de lista de clientes
include __DIR__ . '/../views/custom/custom.php';
die();
