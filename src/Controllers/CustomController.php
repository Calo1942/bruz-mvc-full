<?php

namespace BruzDeporte\Controllers;

use BruzDeporte\Models\CustomModel; // Se incluye el modelo CustomModel para interactuar con la base de datos

// Se instancia el modelo CustomModel.
$model = new CustomModel(); 

// Inicialización de la variable $action.
$action = null; 

// Se determina la acción a realizar basándose en las solicitudes POST.
if (isset($_POST['store'])) { // Si se envió el formulario para guardar
    $action = 'store'; 
} elseif (isset($_POST['update'])) { // Si se envió el formulario para actualizar
    $action = 'update'; 
} elseif (isset($_POST['delete'])) { // Si se envió el formulario para eliminar
    $action = 'delete'; 
} elseif (isset($_POST['show'])) { // Si se solicitó mostrar un registro específico
    $action = 'show'; 
} elseif (isset($_POST['create'])) { // Si se solicitó la acción de creación (ej. para obtener categorías)
    $action = 'create'; 
}

// Estructura switch para manejar las diferentes acciones.
switch ($action) {
    case 'store': // Caso para almacenar un nuevo registro
        $data = [
            'Descripcion' => $_POST['Descripcion'] ?? '', // Se obtiene la descripción del POST, o cadena vacía si no existe.
            'Imagen' => $_POST['Imagen'] ?? null,         // Se obtiene la imagen del POST, o null si no existe.
            'IdCategoria' => $_POST['IdCategoria'] ?? null // Se obtiene el IdCategoria del POST, o null si no existe (asumiendo que es requerido).
        ];
        $model->store($data); // Se llama al método store del modelo para guardar los datos.
        break;
    case 'update': // Caso para actualizar un registro existente
        $idPersonalizacion = $_POST['IdPersonalizacion'] ?? null; // Se obtiene el IdPersonalizacion del POST.
        if ($idPersonalizacion) { // Si el IdPersonalizacion existe
            $data = [
                'Descripcion' => $_POST['Descripcion'] ?? '', // Se obtienen los nuevos datos de descripción.
                'Imagen' => $_POST['Imagen'] ?? null,         // Se obtienen los nuevos datos de imagen.
                'IdCategoria' => $_POST['IdCategoria'] ?? null // Se obtienen los nuevos datos de IdCategoria.
            ];
            $model->update($idPersonalizacion, $data); // Se llama al método update del modelo para actualizar el registro.
        }
        break;
    case 'delete': // Caso para eliminar un registro
        $idPersonalizacion = $_POST['delete'] ?? null; // Se obtiene el IdPersonalizacion a eliminar.
        if ($idPersonalizacion) { // Si el IdPersonalizacion existe
            $model->delete($idPersonalizacion); // Se llama al método delete del modelo para eliminar el registro.
        }
        break;
    case 'show': // Caso para mostrar un registro específico
        $idPersonalizacion = $_POST['show']; // Se obtiene el IdPersonalizacion del registro a mostrar.
        $customItem = $model->find($idPersonalizacion); // Se llama al método find del modelo para buscar el registro.
        break;
    case 'create': // Caso para la acción de creación (ej. obtener categorías)
        $categories = $model->create(); // Se llama al método create del modelo para obtener las categorías.
        break;
    default: // Acción por defecto si no se especifica ninguna
        // No hay acción específica.
        break;
}

// Se recuperan todos los registros de 'prodpersonalizacion' para mostrar en la vista.
$customItems = $model->findAll(); 

// Se incluye la vista correspondiente para mostrar la lista de personalizaciones.
// Se asume que existe una vista en '../views/custom/custom.php'.
include __DIR__ . '/../views/custom/custom.php'; 
die(); // Se termina la ejecución del script.