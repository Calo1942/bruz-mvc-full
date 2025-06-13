<?php

    require_once __DIR__ . '/vendor/autoload.php';
    
    // Rutas y configuración de la aplicación
    // define('APP_ROOT_DIR', realpath(__DIR__ . '/../..')); // Ajusta a la raíz física del proyecto
    define('APP_BASE_URL', '/uni/bruz-mvc-full/'); // Ajusta la URL base del proyecto
    
    use BruzDeporte\Controllers\FrontController;

    // Inicializar la aplicación
    try {
        $app = new FrontController();
        $app->run();
    } catch (Exception $e) {
        // Manejo básico de errores
        die("Error en la aplicación: " . $e->getMessage());
    }
