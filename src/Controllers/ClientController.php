<?php

namespace BruzDeporte\Controllers; // Define el espacio de nombres para la clase.

use BruzDeporte\Models\ClientModel; // Importa el modelo ClientModel para interactuar con la base de datos de clientes.

// Instancia el modelo ClientModel.
$model = new ClientModel(); 

// Inicializa la variable $action a null.
$action = null; 

// Determina la acción a realizar basándose en las solicitudes POST recibidas.
if (isset($_POST['store'])) { // Si se ha enviado el formulario para guardar un nuevo cliente.
    $action = 'store'; 
} elseif (isset($_POST['update'])) { // Si se ha enviado el formulario para actualizar un cliente existente.
    $action = 'update'; 
} elseif (isset($_POST['delete'])) { // Si se ha enviado la solicitud para eliminar un cliente.
    $action = 'delete'; 
} elseif (isset($_POST['show'])) { // Si se ha solicitado mostrar los detalles de un cliente específico.
    $action = 'show'; 
}

// Estructura switch para manejar las diferentes acciones.
switch ($action) {
    case 'store': // Caso para almacenar un nuevo cliente.
        $data = [
            'Cedula' => $_POST['Cedula'] ?? '',     // Obtiene la cédula del cliente del POST, o una cadena vacía.
            'Nombre' => $_POST['Nombre'] ?? '',     // Obtiene el nombre del cliente del POST, o una cadena vacía.
            'Apellido' => $_POST['Apellido'] ?? '', // Obtiene el apellido del cliente del POST, o una cadena vacía.
            'Correo' => $_POST['Correo'] ?? null,   // Obtiene el correo del cliente del POST, o null.
            'Telefono' => $_POST['Telefono'] ?? null // Obtiene el teléfono del cliente del POST, o null.
        ];
        $model->store($data); // Llama al método store del modelo para guardar el cliente.
        break;
    case 'update': // Caso para actualizar un cliente existente.
        $cedula = $_POST['Cedula'] ?? null; // Obtiene la cédula del cliente a actualizar del POST.
        if ($cedula) { // Si la cédula existe.
            $data = [
                'Nombre' => $_POST['Nombre'] ?? '',     // Obtiene el nombre actualizado.
                'Apellido' => $_POST['Apellido'] ?? '', // Obtiene el apellido actualizado.
                'Correo' => $_POST['Correo'] ?? null,   // Obtiene el correo actualizado.
                'Telefono' => $_POST['Telefono'] ?? null // Obtiene el teléfono actualizado.
            ];
            $model->update($cedula, $data); // Llama al método update del modelo para actualizar el cliente.
        }
        break;
    case 'delete': // Caso para eliminar un cliente.
        $cedula = $_POST['delete'] ?? null; // Obtiene la cédula del cliente a eliminar del POST.
        if ($cedula) { // Si la cédula existe.
            $model->delete($cedula); // Llama al método delete del modelo para eliminar el cliente.
        }
        break;
    case 'show': // Caso para mostrar un cliente específico.
        $cedula = $_POST['show']; // Obtiene la cédula del cliente a mostrar.
        $cliente = $model->find($cedula); // Llama al método find del modelo para buscar el cliente.
        break;
    default: // Acción por defecto si no se especifica ninguna.
        // No hay acción específica.
        break;
}

// Recupera todos los clientes de la base de datos para mostrarlos en la vista.
$clientes = $model->findAll(); 

// Incluye la vista de la lista de clientes.
// Se asume que la vista se encuentra en '../views/client/client.php'.
include __DIR__ . '/../views/client/client.php'; 
die(); // Termina la ejecución del script para asegurar que no se procese más código.