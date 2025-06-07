<?php

    require_once __DIR__ . '/vendor/autoload.php';

    use BruzDeporte\Controllers\FrontController;

    // Inicializar la aplicación
    try {
        $app = new FrontController();
        $app->run();
    } catch (Exception $e) {
        die("Error en la aplicación: " . $e->getMessage());     // Manejo básico de errores
    }
