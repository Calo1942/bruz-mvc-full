<?php

namespace BruzDeporte\Controllers; // Define el espacio de nombres para la clase.

use BruzDeporte\Models\SaleModel; // Importa el modelo SaleModel para interactuar con la base de datos de ventas.

// Instancia el modelo SaleModel.
$model = new SaleModel(); 

// Inicializa la variable $action a null.
$action = null; 

// Determina la acción a realizar basándose en las solicitudes POST recibidas.
if (isset($_POST['store'])) { // Si se ha enviado el formulario para guardar una nueva venta.
    $action = 'store'; 
} elseif (isset($_POST['update'])) { // Si se ha enviado el formulario para actualizar una venta existente.
    $action = 'update'; 
} elseif (isset($_POST['delete'])) { // Si se ha enviado la solicitud para eliminar una venta.
    $action = 'delete'; 
} elseif (isset($_POST['show'])) { // Si se ha solicitado mostrar los detalles de una venta específica.
    $action = 'show'; 
}

// Estructura switch para manejar las diferentes acciones.
switch ($action) {
    case 'store': // Caso para almacenar una nueva venta.
        $data = [
            'IdPago' => $_POST['IdPago'] ?? null,       // Obtiene el IdPago del POST.
            'EstadoVenta' => $_POST['EstadoVenta'] ?? '', // Obtiene el EstadoVenta del POST, o una cadena vacía.
            'EstadoEnvio' => $_POST['EstadoEnvio'] ?? '', // Obtiene el EstadoEnvio del POST, o una cadena vacía.
            'TipoVenta' => $_POST['TipoVenta'] ?? ''     // Obtiene el TipoVenta del POST, o una cadena vacía.
        ];
        $model->store($data); // Llama al método store del modelo para guardar la venta.
        break;
    case 'update': // Caso para actualizar una venta existente.
        $idVenta = $_POST['IdVenta'] ?? null; // Obtiene el IdVenta de la venta a actualizar del POST.
        if ($idVenta) { // Si el IdVenta existe.
            $data = [
                'IdPago' => $_POST['IdPago'] ?? null,       // Obtiene el IdPago actualizado.
                'EstadoVenta' => $_POST['EstadoVenta'] ?? '', // Obtiene el EstadoVenta actualizado.
                'EstadoEnvio' => $_POST['EstadoEnvio'] ?? '', // Obtiene el EstadoEnvio actualizado.
                'TipoVenta' => $_POST['TipoVenta'] ?? ''     // Obtiene el TipoVenta actualizado.
            ];
            $model->update($idVenta, $data); // Llama al método update del modelo para actualizar la venta.
        }
        break;
    case 'delete': // Caso para eliminar una venta.
        $idVenta = $_POST['delete'] ?? null; // Obtiene el IdVenta de la venta a eliminar del POST.
        if ($idVenta) { // Si el IdVenta existe.
            $model->delete($idVenta); // Llama al método delete del modelo para eliminar la venta.
        }
        break;
    case 'show': // Caso para mostrar una venta específica.
        $idVenta = $_POST['show']; // Obtiene el IdVenta de la venta a mostrar.
        $venta = $model->find($idVenta); // Llama al método find del modelo para buscar la venta.
        break;
    default: // Acción por defecto si no se especifica ninguna.
        // No hay acción específica, el controlador simplemente recuperará todas las ventas.
        break;
}

// Recupera todas las ventas de la base de datos para mostrarlas en la vista.
$ventas = $model->findAll(); 

// Incluye la vista de la lista de ventas.
// Se asume que la vista se encuentra en '../views/sale/sale.php'.
include __DIR__ . '/../views/sale/sale.php'; 
die(); // Termina la ejecución del script para asegurar que no se procese más código.