<?php

namespace BruzDeporte\Controllers;

use BruzDeporte\Models\CategoryModel; 

// Controlador para gestionar categorías
$model = new CategoryModel();
$action = null;

// Determina la acción a realizar basándose en las solicitudes POST recibidas.
if (isset($_POST['store'])) {
    $action = 'store'; 
} elseif (isset($_POST['update'])) { 
    $action = 'update'; 
} elseif (isset($_POST['delete'])) { 
    $action = 'delete'; 
} elseif (isset($_POST['show'])) { 
    $action = 'show'; 
} elseif (isset($_POST['getAll'])) {
    $action = 'getAll'; 
}

switch ($action) {
    case 'store': 
        $data = [
            'nombre' => $_POST['nombre'] ?? ''
        ];
        $result = $model->store($data); 
        if ($result) {
            echo json_encode($result);
        }
        break;
    case 'update': 
        $idCategoria = $_POST['id_categoria'] ?? null;  // Eliminar redundancia
        if ($idCategoria) { 
            $data = [
                'nombre' => $_POST['nombre'] ?? '' 
            ];
            $result = $model->update($idCategoria, $data); 
            if ($result) {
                echo json_encode($result);
            }
        }
        break;
    case 'delete': 
        $idCategoria = $_POST['delete'] ?? null;   // Eliminar redundancia
        if ($idCategoria) { 
            $result = $model->delete($idCategoria); 
            if ($result) {
                echo json_encode($result);
            }
        }
        break;
    case 'show':
        $idCategoria = $_POST['show'];  // Eliminar redundancia
        $result = $model->find($idCategoria);
        if ($result) {
            echo json_encode($result);
        }
        break;
    case 'getAll':
        $result = $model->findAll();
        if ($result) {
            echo json_encode($result);
        }
        break;
    default: 
        break;
}

// Capturar respuesta para mostrar alertas
if (isset($result)) {
    //echo $response;
    echo "<script> console.log(" . json_encode($result) . ")</script>";
}

// Incluye la vista de la lista de categorías.
include __ROOT__ . '/views/category/category.php'; 

die();