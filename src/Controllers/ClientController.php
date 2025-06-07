<?php

namespace BruzDeporte\Controllers;

use BruzDeporte\Models\ClientModel;

$model = new ClientModel();

if (isset($_POST['crear'])) {
    $data = [
        'Cedula' => $_POST['Cedula'] ?? '',
        'Nombre' => $_POST['Nombre'] ?? '',
        'Apellido' => $_POST['Apellido'] ?? '',
        'Correo' => $_POST['Correo'] ?? null,
        'Telefono' => $_POST['Telefono'] ?? null
    ];
    $model->create($data);
}

if (isset($_POST['modificar'])) {
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
}

if (isset($_POST['eliminar'])) {
    $cedula = $_POST['eliminar'] ?? null;
    if ($cedula) {
        $model->delete($cedula);
    }
}

if (isset($_POST['seleccion'])) {
    $cedula = $_POST['seleccion'];
    $cliente = $model->find($cedula);
}

$clientes = $model->findAll();

// Mostrar la vista de lista de clientes
include __DIR__ . '/../views/client.php';
