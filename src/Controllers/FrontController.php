<?php

namespace BruzDeporte\Controllers;

class FrontController {
    private $url;
    private $controller;
    private $method;
    private $params;

    // Constructor de la clase: obtiene la URL desde GET y procesa la URL
    public function __construct() {
        $this->url = $_GET['url'] ?? 'dashboard'; // Obtiene la URL o asigna 'dashboard' por defecto
        $this->parseUrl(); // Llama a la función que divide y procesa la URL
    }

    // Método privado que analiza la URL para separar controlador, método y parámetros
    private function parseUrl() {
        $url = explode('/', filter_var(rtrim($this->url, '/'), FILTER_SANITIZE_URL)); // Limpia y divide la URL
        $this->controller = $url[0] ?? 'dashboard'; // Asigna controlador (primer segmento)
        $this->method = $url[1] ?? ''; // Asigna método (segundo segmento)
        $this->params = array_slice($url, 2); // Asigna parámetros (resto de segmentos)
    }

    // Método que ejecuta la lógica principal: incluye el archivo del controlador y lo carga
    public function run() {
        $controllerFile = __DIR__ . '/' . ucfirst($this->controller) . 'Controller.php'; // Ruta del controlador

        if (file_exists($controllerFile)) {
            require $controllerFile; // Incluye el controlador si existe
            // Aquí normalmente se instancia el controlador y se llama al método con los parámetros
        } else {
            throw new \Exception("Controlador {$this->controller} no encontrado"); // Error si no existe el controlador
        }
    }
}