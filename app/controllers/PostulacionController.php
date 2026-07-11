<?php
// CONTROLADOR POSTULACIONES
require_once __DIR__ . "/../core/Controller.php";
require_once __DIR__ . "/../models/Postulacion.php";

class PostulacionController extends Controller{

    private $postulacion;

    // INICIALIZAR MODELO POSTULACION
    public function __construct(){

        $this->postulacion = new Postulacion();

    }

    // CREAR POSTULACION
    public function aplicar(){

        session_start();

        if($_SERVER["REQUEST_METHOD"]=="POST"){

            // DATOS POSTULACION
            $datos=[

                "id_oferta"=>$_POST["id_oferta"],

                "id_candidato"=>$_POST["id_candidato"]

            ];

            // GUARDAR POSTULACION
            if($this->postulacion->crear($datos)){

                header(
                    "Location: /views/candidato/postulaciones.php"
                );

                exit();

            }

        }

    }

    // VER POSTULACIONES CANDIDATO
    public function misPostulaciones(){

        session_start();

        // USUARIO ACTUAL
        $usuario=$_SESSION["usuario"];

        // OBTENER POSTULACIONES
        $postulaciones = $this->postulacion->obtenerPorCandidato(
            $usuario["id_usuario"]
        );

        // CARGAR VISTA POSTULACIONES
        require_once __DIR__."/../../views/candidato/postulaciones.php";

    }

}

?>