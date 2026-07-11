<?php
// CONTROLADOR BASE MVC
require_once __DIR__ . "/../config/constants.php";

class Controller{

    // CARGAR VISTA
    protected function view($ruta,$datos=[]){

        extract($datos);

        require_once __DIR__."/../../views/".$ruta.".php";

    }

    // REDIRECCIONAR PAGINA
    protected function redirect($ruta){

        header(
            "Location: ".BASE_URL.$ruta
        );

        exit();

    }

    // RESPUESTA JSON
    protected function json($datos){

        header(
            "Content-Type: application/json"
        );

        echo json_encode($datos);

        exit();

    }

}

?>