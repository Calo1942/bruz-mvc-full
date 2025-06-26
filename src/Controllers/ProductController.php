<?php

namespace BruzDeporte\Controllers;

use BruzDeporte\Models\ProductModel;
use BruzDeporte\Models\CategoryModel;

// Controlador para gestionar productos
$model = new ProductModel();
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
    // Almacena un nuevo producto
    case 'store':
        $imageFileName = 'Imagen.jpg';
        if (isset($_FILES['Imagen']) && $_FILES['Imagen']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = __DIR__ . '/../storage/img/products/';
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
            'Nombre' => $_POST['Nombre'] ?? '',
            'Descripcion' => $_POST['Descripcion'] ?? '',
            'Talla' => $_POST['Talla'] ?? '',
            'Imagen' => $imageFileName,
            'Detal' => $_POST['Detal'] ?? 0,
            'Mayor' => $_POST['Mayor'] ?? null,
            'Stock' => $_POST['Stock'] ?? 0,
            'IdCategoria' => $_POST['IdCategoria'] ?? 0
        ];
        $model->store($data);
        break;

    // Actualiza un producto existente
    case 'update':
        $id = $_POST['IdProducto'] ?? null;
        if ($id) {
            $existingProduct = $model->find($id);
            $imageFileName = $existingProduct['Imagen'] ?? 'Imagen.jpg';
            if (isset($_FILES['Imagen']) && $_FILES['Imagen']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = __DIR__ . '/../storage/img/products/';
                $fileExtension = pathinfo($_FILES['Imagen']['name'], PATHINFO_EXTENSION);
                $uniqueFileName = uniqid() . '.' . $fileExtension;
                $uploadFilePath = $uploadDir . $uniqueFileName;
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
                if (move_uploaded_file($_FILES['Imagen']['tmp_name'], $uploadFilePath)) {
                    $oldImageRelativePath = str_replace(APP_BASE_URL . '/src/storage/img/products/', '', $existingProduct['Imagen']);
                    if ($oldImageRelativePath && $oldImageRelativePath !== 'Imagen.jpg' && file_exists($uploadDir . $oldImageRelativePath)) {
                        unlink($uploadDir . $oldImageRelativePath);
                    }
                    $imageFileName = $uniqueFileName;
                } else {
                    error_log("Fallo al mover el archivo subido para actualización: " . $_FILES['Imagen']['name']);
                }
            } else {
                if (isset($existingProduct['Imagen'])) {
                    $imageFileName = basename($existingProduct['Imagen']);
                } else {
                    $imageFileName = 'Imagen.jpg';
                }
            }
            $data = [
                'Nombre' => $_POST['Nombre'] ?? '',
                'Descripcion' => $_POST['Descripcion'] ?? '',
                'Talla' => $_POST['Talla'] ?? '',
                'Imagen' => $imageFileName,
                'Detal' => $_POST['Detal'] ?? 0,
                'Mayor' => $_POST['Mayor'] ?? null,
                'Stock' => $_POST['Stock'] ?? 0,
                'IdCategoria' => $_POST['IdCategoria'] ?? 0
            ];
            $model->update($id, $data);
        }
        break;

    // Elimina un producto
    case 'delete':
        $id = filter_input(INPUT_POST, 'delete', FILTER_VALIDATE_INT);
        if ($id !== false) {
            $productToDelete = $model->find($id);
            $db_delete_success = $model->delete($id);
            if ($db_delete_success && $productToDelete && !empty($productToDelete['Imagen'])) {
                $uploadDir = __DIR__ . '/../storage/img/products/';
                $imageFileName = basename($productToDelete['Imagen']);
                $imagePath = $uploadDir . $imageFileName;
                if ($imageFileName !== 'Imagen.jpg' && file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
        }
        break;

    // Muestra detalles de un producto específico
    case 'show':
        $id = $_POST['show'];
        $producto = $model->find($id);
        break;

    // Lista productos si no hay acción
    default:
        break;
}

// Obtiene todos los productos y categorías para la vista
$products = $model->findAll();
$categoryModel = new CategoryModel();
$categories = $categoryModel->findAll();
$data = [
    'products' => $products,
    'categories' => $categories
];
include __DIR__ . '/../views/product/product.php';
die();
