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

// Si es una petición AJAX, solo devolvemos JSON
if ($action) {
    switch ($action) {
        case 'store': 
            $data = [
                'nombre' => $_POST['nombre'] ?? ''
            ];
            $result = $model->store($data); 
            if ($result) {
                header('Content-Type: application/json');
                echo json_encode($result);
            }
            exit;
        case 'update': 
            $idCategoria = $_POST['id_categoria'] ?? null;
            if ($idCategoria) { 
                $data = [
                    'nombre' => $_POST['nombre'] ?? '' 
                ];
                $result = $model->update($idCategoria, $data); 
                if ($result) {
                    header('Content-Type: application/json');
                    echo json_encode($result);
                }
            }
            exit;
        case 'delete': 
            $idCategoria = $_POST['delete'] ?? null;
            if ($idCategoria) { 
                $result = $model->delete($idCategoria); 
                if ($result) {
                    header('Content-Type: application/json');
                    echo json_encode($result);
                }
            }
            exit;
        case 'show':
            $idCategoria = $_POST['show'];
            $result = $model->find($idCategoria);
            if ($result) {
                header('Content-Type: application/json');
                echo json_encode($result);
            }
            exit;
        case 'getAll':
            $result = $model->findAll();
            if ($result) {
                header('Content-Type: application/json');
                echo json_encode($result);
            }
            exit;
        default: 
            break;
    }
}

// Incluye la vista de la lista de categorías.
include __ROOT__ . '/views/category/category.php'; 

die();