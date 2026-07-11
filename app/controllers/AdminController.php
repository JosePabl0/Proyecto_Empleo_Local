<?php
// CONTROLADOR ADMINISTRADOR
require_once __DIR__ . "/../core/Controller.php";
require_once __DIR__ . "/../models/Usuario.php";
require_once __DIR__ . "/../models/Empresa.php";

class AdminController extends Controller{

    private $usuario;
    private $empresa;

    // INICIALIZAR MODELOS
    public function __construct(){

        $this->usuario = new Usuario();
        $this->empresa = new Empresa();

    }

    // DASHBOARD ADMIN
    public function dashboard(){

        session_start();

        // OBTENER USUARIOS
        $usuarios = $this->usuario->obtenerTodos();

        // OBTENER EMPRESAS
        $empresas = $this->empresa->obtenerTodas();

        // CARGAR VISTA DASHBOARD
        require_once __DIR__."/../../views/admin/dashboard.php";

    }

    // LISTAR USUARIOS
    public function usuarios(){

        // OBTENER USUARIOS
        $usuarios = $this->usuario->obtenerTodos();

        // CARGAR VISTA USUARIOS
        require_once __DIR__."/../../views/admin/usuarios.php";

    }

}

?>