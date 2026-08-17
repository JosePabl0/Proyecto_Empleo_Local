<?php
// CONTROLADOR ADMINISTRADOR
require_once __DIR__ . "/../core/Controller.php";
require_once __DIR__ . "/../models/Usuario.php";
require_once __DIR__ . "/../models/Empresa.php";
require_once __DIR__ . "/../models/Candidato.php";
require_once __DIR__ . "/../models/Oferta.php";
require_once __DIR__ . "/../models/Postulacion.php";

class AdminController extends Controller{

    private $usuario;
    private $empresa;
    private $candidato;
    private $oferta;
    private $postulacion;

    // INICIALIZAR MODELOS
    public function __construct(){

        $this->usuario = new Usuario();
        $this->empresa = new Empresa();
        $this->candidato = new Candidato();
        $this->oferta = new Oferta();
        $this->postulacion = new Postulacion();
    }

    // VERIFICAR ADMINISTRADOR
    private function verificarAdministrador(){

        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }

        if(!isset($_SESSION["usuario"])){

            header("Location: ".BASE_URL."/login");
            exit();
        }

        if($_SESSION["usuario"]["id_rol"] != 1){

            header("Location: ".BASE_URL."/");
            exit();
        }
    }

    // DASHBOARD ADMINISTRADOR
    public function dashboard(){

        $this->verificarAdministrador();

        $usuarios = $this->usuario->obtenerTodos();
        $empresas = $this->empresa->obtenerTodas();
        $candidatos = $this->candidato->obtenerTodos();

        $usuario = $_SESSION["usuario"] ?? null;
        $logoDestino = BASE_URL."/admin/dashboard";

        require_once __DIR__."/../../views/layouts/header.php";
        require_once __DIR__."/../../views/layouts/navbar.php";
        require_once __DIR__."/../../views/admin/dashboard.php";
        require_once __DIR__."/../../views/layouts/footer.php";
    }

    // LISTAR USUARIOS
    public function usuarios(){

        $this->verificarAdministrador();

        $usuarios = $this->usuario->obtenerTodos();

        $usuario = $_SESSION["usuario"] ?? null;
        $logoDestino = BASE_URL."/admin/dashboard";

        require_once __DIR__."/../../views/layouts/header.php";
        require_once __DIR__."/../../views/layouts/navbar.php";
        require_once __DIR__."/../../views/admin/usuarios.php";
        require_once __DIR__."/../../views/layouts/footer.php";
    }

    // VER PERFIL DE USUARIO
    public function perfilUsuario(){

        $this->verificarAdministrador();

        $idUsuario = $_GET["id"] ?? null;

        if(!$idUsuario){

            header("Location: ".BASE_URL."/admin/usuarios");
            exit();
        }

        // BUSCAR USUARIO SELECCIONADO
        $usuarioSeleccionado = $this->usuario->buscarPorId($idUsuario);

        if(!$usuarioSeleccionado){

           header("Location: ".BASE_URL."/admin/usuarios");
            exit();
        }

        $perfil = null;
        $postulaciones = [];

        // SI ES CANDIDATO
        if($usuarioSeleccionado["id_rol"] == 3){

            $perfil = $this->candidato->obtenerPorUsuario($idUsuario);

            if($perfil){

                $postulaciones = $this->postulacion->obtenerPorCandidato(
                    $perfil["id_candidato"]
                );
            }
        }

        // SI ES EMPRESA
        if($usuarioSeleccionado["id_rol"] == 2){

            $perfil = $this->empresa->obtenerPorUsuario($idUsuario);
        }

        // USUARIO DE LA SESION PARA EL NAVBAR
        $usuario = $_SESSION["usuario"] ?? null;

        $logoDestino = BASE_URL."/admin/dashboard";

        // CARGAR INTERFAZ
        require_once __DIR__."/../../views/layouts/header.php";
        require_once __DIR__."/../../views/layouts/navbar.php";

        // ENTREGAR EL USUARIO SELECCIONADO A LA VISTA
        $usuario = $usuarioSeleccionado;

        require_once __DIR__."/../../views/admin/perfilUsuario.php";

        require_once __DIR__."/../../views/layouts/footer.php";
    }

    // BLOQUEAR USUARIO
    public function bloquear(){

        $this->verificarAdministrador();

        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $idUsuario = $_POST["id_usuario"] ?? null;

            if($idUsuario){

                $usuario = $this->usuario->buscarPorId($idUsuario);

                if($usuario && $usuario["id_rol"] != 1){

                    $bloqueado = $this->usuario->bloquear($idUsuario);

                    if($bloqueado){

                        $mensaje = "ATENCION: Tu cuenta ha sido bloqueada por indicios de malas practicas. Te invitamos a ponerte en contacto con soporte en caso de que pueda tratarse de un error.";

                        $this->usuario->crearNotificacion(
                            $idUsuario,
                            $mensaje
                        );
                    }
                }
            }
        }

       header("Location: ".BASE_URL."/admin/usuarios");
        exit();
    }

    // DESBLOQUEAR USUARIO
    public function desbloquear(){

        $this->verificarAdministrador();

        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $idUsuario = $_POST["id_usuario"] ?? null;

            if($idUsuario){

                $usuario = $this->usuario->buscarPorId($idUsuario);

                if($usuario && $usuario["id_rol"] != 1){

                    $this->usuario->desbloquear($idUsuario);
                }
            }
        }

        header("Location: ".BASE_URL."/admin/usuarios");
        exit();
    }



    // LISTAR EMPRESAS
    public function empresas(){

        $this->verificarAdministrador();

        $empresas = $this->empresa->obtenerTodas();

        // Agregar cantidad de ofertas activas a cada empresa
        foreach ($empresas as &$emp) {
            $emp["total_ofertas"] = $this->empresa->contarOfertasActivas($emp["id_empresa"]);
        }

        $usuario = $_SESSION["usuario"] ?? null;
        $logoDestino = BASE_URL."/admin/dashboard";

        require_once __DIR__."/../../views/layouts/header.php";
        require_once __DIR__."/../../views/layouts/navbar.php";
        require_once __DIR__."/../../views/admin/empresas.php";
        require_once __DIR__."/../../views/layouts/footer.php";
    }

    // REPORTES DEL SISTEMA
    public function reportes(){

        $this->verificarAdministrador();

        // Estadísticas reales calculadas desde la base de datos
        $usuariosNuevosMes  = $this->usuario->contarNuevosEsteMes();
        $ofertasPublicadas  = $this->oferta->contarTotal();
        $ofertasEsteMes     = $this->oferta->contarEsteMes();
        $contrataciones     = $this->postulacion->contarAceptadas();
        $totalPostulaciones = $this->postulacion->contarTotal();
        $empresasActivas    = $this->empresa->contarActivas();
        $totalEmpresas      = $this->empresa->contarTotal();

        $usuario = $_SESSION["usuario"] ?? null;
        $logoDestino = BASE_URL."/admin/dashboard";

        require_once __DIR__."/../../views/layouts/header.php";
        require_once __DIR__."/../../views/layouts/navbar.php";
        require_once __DIR__."/../../views/admin/reportes.php";
        require_once __DIR__."/../../views/layouts/footer.php";
    }
}
?>
