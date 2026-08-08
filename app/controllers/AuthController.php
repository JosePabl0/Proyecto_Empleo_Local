<?php
// CONTROLADOR AUTENTICACION
require_once __DIR__ . "/../core/Controller.php";
require_once __DIR__ . "/../models/Usuario.php";

class AuthController extends Controller{

    private $usuario;

    // INICIALIZAR MODELO USUARIO
    public function __construct(){
        $this->usuario = new Usuario();
    }

    // VALIDAR SESION ACTIVA
    private function redireccionarSiAutenticado(){

        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }

        if(isset($_SESSION["usuario"])){

            switch($_SESSION["usuario"]["id_rol"]){

                // REDIRECCION ADMIN
                case 1:
                    header("Location: /EmpleoLocal/public/admin.php?action=dashboard");
                    break;

                // REDIRECCION EMPRESA
                case 2:
                    header("Location: /EmpleoLocal/public/empresa.php?action=dashboard");
                    break;

                // REDIRECCION CANDIDATO
                case 3:
                    header("Location: /EmpleoLocal/public/candidato.php?action=dashboard");
                    break;

                default:
                    header("Location: /EmpleoLocal/public/index.php");
                    break;
            }

            exit();
        }
    }

    // LOGIN USUARIO
    public function login(){

        $this->redireccionarSiAutenticado();

        if($_SERVER["REQUEST_METHOD"]=="POST"){

            $correo=$_POST["correo"];
            $password=$_POST["password"];

            // BUSCAR USUARIO
            $usuario=$this->usuario->login($correo);

            // VALIDAR CREDENCIALES
            if($usuario && password_verify($password,$usuario["password"])){

                if(session_status()==PHP_SESSION_NONE){
                    session_start();
                }

                $_SESSION["usuario"]=$usuario;

                // REDIRECCION SEGUN ROL
                switch($usuario["id_rol"]){

                    case 1:
                        header("Location: /EmpleoLocal/public/admin.php?action=dashboard");
                        break;

                    case 2:
                        header("Location: /EmpleoLocal/public/empresa.php?action=dashboard");
                        break;

                    case 3:
                        header("Location: /EmpleoLocal/public/candidato.php?action=dashboard");
                        break;

                    default:
                        header("Location: /EmpleoLocal/public/index.php");
                        break;
                }

                exit();

            }else{

                $error="Correo o contraseña incorrectos";

            }

        }

        // CARGAR VISTA LOGIN
        require_once __DIR__."/../../views/auth/login.php";
    }

    // REGISTRO USUARIO
    public function registro(){

        $this->redireccionarSiAutenticado();

        if($_SERVER["REQUEST_METHOD"]=="POST"){

            // DATOS REGISTRO
            $datos=[
                "nombre"=>$_POST["nombre"],
                "correo"=>$_POST["correo"],
                "password"=>$_POST["password"],
                "id_rol"=>$_POST["id_rol"]
            ];

            // GUARDAR USUARIO
            if($this->usuario->registrar($datos)){

                header("Location: /EmpleoLocal/public/login.php");
                exit();

            }

        }

        // CARGAR VISTA REGISTRO
        require_once __DIR__."/../../views/auth/registro.php";
    }

    // CERRAR SESION
    public function logout(){

        if(session_status()==PHP_SESSION_NONE){
            session_start();
        }

        session_destroy();

        header("Location: /EmpleoLocal/public/login.php");
        exit();
    }

}
?>
