<?php

namespace BruzDeporte\Controllers;

/**
 * Clase FrontController
 */
class FrontController {
    private $url;
    private $controller;    
    private $method;    // Estos atributos no se usan ¿Eliminar?
    private $params;    // Estos atributos no se usan ¿Eliminar?

    public function __construct() {
        $this->url = $_GET['url'] ?? 'dashboard';
        $this->parseUrl();
    }

    private function parseUrl() {
        $url = explode('/', filter_var(rtrim($this->url, '/'), FILTER_SANITIZE_URL));
        $this->controller = $url[0] ?? 'dashboard';
        $this->method = $url[1] ?? '';
        $this->params = array_slice($url, 2);
    }

    public function run() {
        $controllerFile = __DIR__ . '/' . ucfirst($this->controller) . 'Controller.php';

        if (file_exists($controllerFile)) {
            require $controllerFile; // Carga el script del controlador
            //die();
        } else {
            throw new \Exception("Controlador {$this->controller} no encontrado");
        }
    }
}