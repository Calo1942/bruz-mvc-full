<?php

namespace BruzDeporte\Controllers;

use BruzDeporte\Models\CustomModel; // Se incluye el modelo CustomModel para interactuar con la base de datos
use BruzDeporte\Models\CategoryModel; // Importa el modelo CategoryModel para obtener las categorías

// Se instancia el modelo CustomModel para trabajar con los datos de personalización
$model = new CustomModel(); 

// Variable para almacenar la acción a realizar, inicialmente nula
$action = null; 

// Determinar la acción según los datos enviados por POST
if (isset($_POST['store'])) {          // Si se envió el formulario para crear un nuevo registro
    $action = 'store'; 
} elseif (isset($_POST['update'])) {   // Si se envió el formulario para actualizar un registro existente
    $action = 'update'; 
} elseif (isset($_POST['delete'])) {   // Si se envió una solicitud para eliminar un registro
    $action = 'delete'; 
} elseif (isset($_POST['show'])) {     // Si se solicitó mostrar un registro específico
    $action = 'show'; 
}

// Switch para manejar cada acción según lo determinado
switch ($action) {
    case 'store': // Guardar un nuevo registro
        $imageFileName = 'Imagen.jpg'; // Nombre de imagen por defecto si no se sube ninguna
        // Verificar si se subió una imagen correctamente
        if (isset($_FILES['Imagen']) && $_FILES['Imagen']['error'] === UPLOAD_ERR_OK) {
            // Definir el directorio donde se guardarán las imágenes
            $uploadDir = __DIR__ . '/../storage/img/customs/'; 
            // Obtener la extensión del archivo subido
            $fileExtension = pathinfo($_FILES['Imagen']['name'], PATHINFO_EXTENSION);
            // Crear un nombre único para evitar sobreescritura
            $uniqueFileName = uniqid() . '.' . $fileExtension;
            $uploadFilePath = $uploadDir . $uniqueFileName;

            // Crear el directorio si no existe
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            // Mover el archivo temporal a la carpeta destino
            if (move_uploaded_file($_FILES['Imagen']['tmp_name'], $uploadFilePath)) {
                $imageFileName = $uniqueFileName; // Guardar el nombre de la imagen subida
            } else {
                // Registrar error en el log si falla la subida
                error_log("Fallo al mover el archivo subido: " . $_FILES['Imagen']['name']);
            }
        }
        // Preparar los datos para insertar en la base de datos
        $data = [
            'Descripcion' => $_POST['Descripcion'] ?? '',  // Descripción enviada o vacía
            'Imagen' => $imageFileName,                      // Nombre de la imagen subida o por defecto
            'IdCategoria' => $_POST['IdCategoria'] ?? null // Id de la categoría o null
        ];
        $model->store($data); // Insertar el nuevo registro mediante el modelo
        break;

    case 'update': // Actualizar un registro existente
        $id = $_POST['IdPersonalizacion'] ?? null; // Obtener el ID del registro a actualizar
        if ($id) { // Si el ID es válido
            $existingCustomItem = $model->find($id); // Obtener datos actuales para saber la imagen actual

            // Inicializar el nombre de la imagen con la existente o con la imagen por defecto
            $imageFileName = $existingCustomItem['Imagen'] ?? 'Imagen.jpg';

            // Verificar si se subió una nueva imagen
            if (isset($_FILES['Imagen']) && $_FILES['Imagen']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = __DIR__ . '/../storage/img/customs/';
                $fileExtension = pathinfo($_FILES['Imagen']['name'], PATHINFO_EXTENSION);
                $uniqueFileName = uniqid() . '.' . $fileExtension;
                $uploadFilePath = $uploadDir . $uniqueFileName;

                // Crear directorio si no existe
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                // Mover la nueva imagen a la carpeta destino
                if (move_uploaded_file($_FILES['Imagen']['tmp_name'], $uploadFilePath)) {
                    // Eliminar imagen anterior si no es la por defecto y existe físicamente
                    $oldImageRelativePath = str_replace(APP_BASE_URL . '/src/storage/img/customs/', '', $existingCustomItem['Imagen']);
                    if ($oldImageRelativePath && $oldImageRelativePath !== 'Imagen.jpg' && file_exists($uploadDir . $oldImageRelativePath)) {
                        unlink($uploadDir . $oldImageRelativePath);
                    }
                    $imageFileName = $uniqueFileName; // Actualizar el nombre con la nueva imagen
                } else {
                    // Registrar error si no se pudo mover la nueva imagen
                    error_log("Fallo al mover el archivo subido para actualización: " . $_FILES['Imagen']['name']);
                    // Se mantiene la imagen antigua si falla la subida
                }
            } else {
                // Si no se subió imagen nueva, asegurarse que el nombre sea sólo el archivo
                if (isset($existingCustomItem['Imagen'])) {
                    $imageFileName = basename($existingCustomItem['Imagen']);
                } else {
                    $imageFileName = 'Imagen.jpg'; // Por defecto si no hay imagen
                }
            }

            // Preparar datos para actualizar en la base de datos
            $data = [
                'Descripcion' => $_POST['Descripcion'] ?? '',  // Nueva descripción o cadena vacía
                'Imagen' => $imageFileName,                      // Nombre de la imagen final
                'IdCategoria' => $_POST['IdCategoria'] ?? null // Nuevo IdCategoria o null
            ];
            $model->update($id, $data); // Ejecutar la actualización en el modelo
        }
        break;

    case 'delete': // Eliminar un registro
        $id = filter_input(INPUT_POST, 'delete', FILTER_VALIDATE_INT); // Validar y obtener ID a eliminar
        if ($id !== false) {
            // Obtener datos del registro antes de eliminar
            $customItemToDelete = $model->find($id);

            // Intentar eliminar el registro de la base de datos
            $db_delete_success = $model->delete($id);

            // Si se eliminó con éxito y existe una imagen asociada (no por defecto), eliminar archivo físico
            if ($db_delete_success && $customItemToDelete && !empty($customItemToDelete['Imagen'])) {
                $uploadDir = __DIR__ . '/../storage/img/customs/';
                $imageFileName = basename($customItemToDelete['Imagen']);
                $imagePath = $uploadDir . $imageFileName;

                if ($imageFileName !== 'Imagen.jpg' && file_exists($imagePath)) {
                    unlink($imagePath); // Eliminar archivo físico
                }
            }
        }
        break;

    case 'show': // Mostrar datos de un registro específico
        $id = $_POST['show']; // Obtener el ID a mostrar
        $customItem = $model->find($id); // Buscar registro mediante el modelo
        break;

    default: // Caso por defecto cuando no hay acción específica
        // No se realiza ninguna acción
        break;
}

// Obtener todos los registros para mostrarlos en la vista
$customItems = $model->findAll(); 

// Instanciar el modelo de categorías para obtener los datos necesarios en la vista
$categoryModel = new CategoryModel();
$categories = $categoryModel->findAll();

// Preparar los datos para pasar a la vista
$data = [
    'customItems' => $customItems,  // Lista de personalizaciones
    'categories' => $categories     // Lista de categorías
];

// Incluir la vista para mostrar los datos (asumiendo que existe la ruta)
include __DIR__ . '/../views/custom/custom.php'; 

// Terminar la ejecución para evitar código adicional innecesario
die();
