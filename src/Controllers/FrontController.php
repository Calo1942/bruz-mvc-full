<?php

namespace BruzDeporte\Controllers;

class FrontController {
    private $url;
    private $controller;
    private $method;
    private $params;

    public function __construct() {
        $this->url = $_REQUEST['url'] ?? 'product';
        $this->parseUrl();
    }

    private function parseUrl() {
        $url = isset($_GET['url']) ? $_GET['url'] : 'product';
        $url = explode('/', filter_var(rtrim($url, '/'), FILTER_SANITIZE_URL));
        $this->controller = isset($url[0]) ? $url[0] : 'product';
        $this->method = isset($url[1]) ? $url[1] : 'index';
        $this->params = array_slice($url, 2);
    }

    public function run() {
        $controllerClass = 'BruzDeporte\\Controllers\\' . ucfirst($this->controller) . 'Controller';
        $controllerFile = __DIR__ . '/' . ucfirst($this->controller) . 'Controller.php';
        if (class_exists($controllerClass)) {
            $controllerInstance = new $controllerClass();
            $method = $this->method;
            if (method_exists($controllerInstance, $method)) {
                call_user_func_array([$controllerInstance, $method], $this->params);
            } else {
                throw new \Exception("Método {$method} no encontrado en {$controllerClass}");
            }
        } elseif (file_exists($controllerFile)) {
            // Fallback: incluir como script procedural
            require $controllerFile;
        } else {
            throw new \Exception("Controlador {$controllerClass} o archivo {$controllerFile} no encontrado");
        }
    }
}
