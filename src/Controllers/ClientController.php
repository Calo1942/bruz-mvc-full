<?php

namespace BruzDeporte\Controllers;

use BruzDeporte\Models\ClientModel;

$model = new ClientModel();

$action = null;
if (isset($_POST['crear'])) {
    $action = 'crear';
} elseif (isset($_POST['modificar'])) {
    $action = 'modificar';
} elseif (isset($_POST['eliminar'])) {
    $action = 'eliminar';
} elseif (isset($_POST['seleccion'])) {
    $action = 'seleccion';
}

switch ($action) {
    case 'crear':
        $data = [
            'Cedula' => $_POST['Cedula'] ?? '',
            'Nombre' => $_POST['Nombre'] ?? '',
            'Apellido' => $_POST['Apellido'] ?? '',
            'Correo' => $_POST['Correo'] ?? null,
            'Telefono' => $_POST['Telefono'] ?? null
        ];
        $model->store($data);
        break;
    case 'modificar':
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
    case 'eliminar':
        $cedula = $_POST['eliminar'] ?? null;
        if ($cedula) {
            $model->delete($cedula);
        }
        break;
    case 'seleccion':
        $cedula = $_POST['seleccion'];
        $cliente = $model->find($cedula);
        break;
    default:
        // No action
        break;
}

$clientes = $model->findAll();

// Mostrar la vista de lista de clientes
include __DIR__ . '/../views/client.php';
die();
