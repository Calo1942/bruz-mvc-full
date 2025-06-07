<?php

    require_once __DIR__ . '/vendor/autoload.php';

    use BruzDeporte\Controllers\FrontController;

    //define('BASE_URL', 'http://localhost/uni/mvc-custom-design-un-carlos/');  // Definir la URL base de la aplicación

    // Inicializar la aplicación
    try {
        $app = new FrontController();
        $app->run();
    } catch (Exception $e) {
        die("Error en la aplicación: " . $e->getMessage());     // Manejo básico de errores
    }
