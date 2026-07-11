<?php
// SISTEMA DE RUTAS MVC
class Router {

    private $routes = [];

    // REGISTRAR RUTA GET
    public function get($route,$controller){

        $this->routes["GET"][$route] = $controller;

    }

    // REGISTRAR RUTA POST
    public function post($route,$controller){

        $this->routes["POST"][$route] = $controller;

    }

    // EJECUTAR RUTA
    public function run(){

        $method = $_SERVER["REQUEST_METHOD"];

        $uri = $_SERVER["REQUEST_URI"];

        // VALIDAR RUTA EXISTENTE
        if(isset($this->routes[$method][$uri])){

            $action = $this->routes[$method][$uri];

            // EJECUTAR CONTROLADOR
            call_user_func($action);

        }else{

            echo "Página no encontrada";

        }

    }

}

?>