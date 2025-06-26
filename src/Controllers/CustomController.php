<?php

namespace BruzDeporte\Controllers;

use BruzDeporte\Models\CustomModel;
use BruzDeporte\Models\CategoryModel;

// Controlador para gestionar personalizaciones
$model = new CustomModel();
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
    // Almacena una nueva personalización
    case 'store':
        $imageFileName = 'Imagen.jpg';
        if (isset($_FILES['Imagen']) && $_FILES['Imagen']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = __DIR__ . '/../storage/img/customs/';
            $fileExtension = pathinfo($_FILES['Imagen']['name'], PATHINFO_EXTENSION);
            $uniqueFileName = uniqid() . '.' . $fileExtension;
            $uploadFilePath = $uploadDir . $uniqueFileName;
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            if (move_uploaded_file($_FILES['Imagen']['tmp_name'], $uploadFilePath)) {
                $imageFileName = $uniqueFileName;
            } else {
                error_log("Fallo al mover el archivo subido: " . $_FILES['Imagen']['name']);
            }
        }
        $data = [
            'Descripcion' => $_POST['Descripcion'] ?? '',
            'Imagen' => $imageFileName,
            'IdCategoria' => $_POST['IdCategoria'] ?? null
        ];
        $model->store($data);
        break;
    // Actualiza una personalización existente
    case 'update':
        $id = $_POST['IdPersonalizacion'] ?? null;
        if ($id) {
            $existingCustomItem = $model->find($id);
            $imageFileName = $existingCustomItem['Imagen'] ?? 'Imagen.jpg';
            if (isset($_FILES['Imagen']) && $_FILES['Imagen']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = __DIR__ . '/../storage/img/customs/';
                $fileExtension = pathinfo($_FILES['Imagen']['name'], PATHINFO_EXTENSION);
                $uniqueFileName = uniqid() . '.' . $fileExtension;
                $uploadFilePath = $uploadDir . $uniqueFileName;
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
                if (move_uploaded_file($_FILES['Imagen']['tmp_name'], $uploadFilePath)) {
                    $oldImageRelativePath = str_replace(APP_BASE_URL . '/src/storage/img/customs/', '', $existingCustomItem['Imagen']);
                    if ($oldImageRelativePath && $oldImageRelativePath !== 'Imagen.jpg' && file_exists($uploadDir . $oldImageRelativePath)) {
                        unlink($uploadDir . $oldImageRelativePath);
                    }
                    $imageFileName = $uniqueFileName;
                } else {
                    error_log("Fallo al mover el archivo subido para actualización: " . $_FILES['Imagen']['name']);
                }
            } else {
                if (isset($existingCustomItem['Imagen'])) {
                    $imageFileName = basename($existingCustomItem['Imagen']);
                } else {
                    $imageFileName = 'Imagen.jpg';
                }
            }
            $data = [
                'Descripcion' => $_POST['Descripcion'] ?? '',
                'Imagen' => $imageFileName,
                'IdCategoria' => $_POST['IdCategoria'] ?? null
            ];
            $model->update($id, $data);
        }
        break;
    // Elimina una personalización
    case 'delete':
        $id = filter_input(INPUT_POST, 'delete', FILTER_VALIDATE_INT);
        if ($id !== false) {
            $customItemToDelete = $model->find($id);
            $db_delete_success = $model->delete($id);
            if ($db_delete_success && $customItemToDelete && !empty($customItemToDelete['Imagen'])) {
                $uploadDir = __DIR__ . '/../storage/img/customs/';
                $imageFileName = basename($customItemToDelete['Imagen']);
                $imagePath = $uploadDir . $imageFileName;
                if ($imageFileName !== 'Imagen.jpg' && file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
        }
        break;
    // Muestra detalles de una personalización específica
    case 'show':
        $id = $_POST['show'];
        $customItem = $model->find($id);
        break;
    // Lista personalizaciones si no hay acción
    default:
        break;
}

// Obtiene todas las personalizaciones y categorías para la vista
$customItems = $model->findAll();
$categoryModel = new CategoryModel();
$categories = $categoryModel->findAll();
$data = [
    'customItems' => $customItems,
    'categories' => $categories
];
include __DIR__ . '/../views/custom/custom.php';
die();
