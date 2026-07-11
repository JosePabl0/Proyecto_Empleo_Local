<?php
// CONTROLADOR USUARIO
require_once __DIR__ . "/../core/Controller.php";
require_once __DIR__ . "/../models/Usuario.php";

class UsuarioController extends Controller{

    private $usuario;

    // INICIALIZAR MODELO USUARIO
    public function __construct(){

        $this->usuario = new Usuario();

    }

    // MOSTRAR PERFIL
    public function perfil(){

        session_start();

        // ID USUARIO ACTUAL
        $id = $_SESSION["usuario"]["id_usuario"];

        // BUSCAR DATOS USUARIO
        $usuario = $this->usuario->buscarPorId($id);

        // CARGAR VISTA PERFIL
        require_once __DIR__."/../../views/perfil.php";

    }

    // ACTUALIZAR DATOS
    public function actualizar(){

        if($_SERVER["REQUEST_METHOD"]=="POST"){

            // ACTUALIZACION DE DATOS PENDIENTE

        }

    }

}

?>