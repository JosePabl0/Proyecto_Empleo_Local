<?php

// ==========================
// IMPORTACIÓN DE CLASES
// ==========================

require_once __DIR__ . "/../core/Controller.php";

require_once __DIR__ . "/../models/Empresa.php";
require_once __DIR__ . "/../models/Oferta.php";
require_once __DIR__ . "/../models/Postulacion.php";


// ==========================
// CONTROLADOR EMPRESA
// ==========================

class EmpresaController extends Controller{


    private $empresa;
    private $oferta;
    private $postulacion;


    // ==========================
    // CONSTRUCTOR
    // ==========================

    public function __construct(){

        $this->empresa = new Empresa();

        $this->oferta = new Oferta();

        $this->postulacion = new Postulacion();

    }



    // ==========================
    // VERIFICAR SESIÓN Y ROL
    // ==========================

    private function verificarSesion(){

        if(session_status() == PHP_SESSION_NONE){

            session_start();

        }


        if(!isset($_SESSION["usuario"])){

            header(
                "Location: /EmpleoLocal/public/login.php"
            );

            exit();

        }


        // Validar usuario empresa

        if($_SESSION["usuario"]["id_rol"] != 2){

            header(
                "Location: /EmpleoLocal/public/login.php"
            );

            exit();

        }

    }



    // ==========================
    // DASHBOARD EMPRESA
    // ==========================

    public function dashboard(){

        $this->verificarSesion();

        $usuario=$_SESSION["usuario"];


        $empresa=$this->empresa
        ->obtenerPorUsuario(
            $usuario["id_usuario"]
        );


        // ==========================
        // ESTADÍSTICAS DEL PANEL
        // ==========================

        $totalOfertas=$this->empresa
        ->contarOfertasActivas(
            $empresa["id_empresa"]
        );


        $totalCandidatos=$this->empresa
        ->contarCandidatos(
            $empresa["id_empresa"]
        );


        $procesosPendientes=$this->empresa
        ->contarPendientes(
            $empresa["id_empresa"]
        );


        require_once __DIR__
        ."/../../views/empresa/dashboard.php";

    }



    // ==========================
    // PERFIL EMPRESA
    // ==========================

    public function perfil(){

        $this->verificarSesion();

        $usuario=$_SESSION["usuario"];


        $empresa=$this->empresa
        ->obtenerPorUsuario(
            $usuario["id_usuario"]
        );


        require_once __DIR__
        ."/../../views/empresa/perfil.php";

    }



    // ==========================
    // ACTUALIZAR PERFIL EMPRESA
    // ==========================

    public function actualizarPerfil(){

        $this->verificarSesion();

        $usuario=$_SESSION["usuario"];


        $empresa=$this->empresa
        ->obtenerPorUsuario(
            $usuario["id_usuario"]
        );


        $datos=[

            "id_empresa"=>$empresa["id_empresa"],

            "nombre_empresa"=>trim($_POST["nombre_empresa"]),

            "descripcion"=>trim($_POST["descripcion"]),

            "ubicacion"=>trim($_POST["ubicacion"]),

            "sector"=>trim($_POST["sector"]),

            "telefono"=>trim($_POST["telefono"]),

            "sitio_web"=>trim($_POST["sitio_web"])

        ];


        $this->empresa
        ->actualizar($datos);


        header(
            "Location: empresa.php?action=perfil&ok=1"
        );

        exit();

    }



    // ==========================
    // MOSTRAR OFERTAS
    // ==========================

    public function misOfertas(){

        $this->verificarSesion();

        $usuario=$_SESSION["usuario"];


        $empresa=$this->empresa
        ->obtenerPorUsuario(
            $usuario["id_usuario"]
        );


        $ofertas=$this->oferta
        ->obtenerPorEmpresa(
            $empresa["id_empresa"]
        );


        require_once __DIR__
        ."/../../views/empresa/ofertas.php";

    }



    // ==========================
    // FORMULARIO CREAR OFERTA
    // ==========================

    public function crearOferta(){

        $this->verificarSesion();


        require_once __DIR__
        ."/../../views/empresa/crear_oferta.php";

    }



    // ==========================
    // GUARDAR NUEVA OFERTA
    // ==========================

    public function guardarOferta(){

        $this->verificarSesion();

        $usuario=$_SESSION["usuario"];


        $empresa=$this->empresa
        ->obtenerPorUsuario(
            $usuario["id_usuario"]
        );


        $datos=[

            "id_empresa"=>$empresa["id_empresa"],

            "id_categoria"=>$_POST["categoria"],

            "titulo"=>trim($_POST["titulo"]),

            "descripcion"=>trim($_POST["descripcion"]),

            "requisitos"=>trim($_POST["requisitos"]),

            "salario"=>$_POST["salario"],

            "modalidad"=>$_POST["modalidad"],

            "ubicacion"=>trim($_POST["ubicacion"])

        ];


        $this->oferta
        ->crear($datos);


        header(
            "Location: empresa.php?action=misOfertas"
        );

        exit();

    }



    // ==========================
    // EDITAR OFERTA (BLOQUEADO)
    // ==========================

    public function editarOferta(){

        $this->verificarSesion();

        die(
            "Acceso denegado. Las ofertas publicadas no pueden modificarse."
        );

    }



    // ==========================
    // ACTUALIZAR OFERTA (BLOQUEADO)
    // ==========================

    public function actualizarOferta(){

        $this->verificarSesion();

        die(
            "Acceso denegado. Las ofertas publicadas no pueden modificarse."
        );

    }



    // ==========================
    // ELIMINAR OFERTA
    // ==========================

    public function eliminarOferta(){

        $this->verificarSesion();

        $usuario=$_SESSION["usuario"];


        $empresa=$this->empresa
        ->obtenerPorUsuario(
            $usuario["id_usuario"]
        );


        $id=(int)$_GET["id"];


        if(
            !$this->oferta
            ->perteneceAEmpresa(
                $id,
                $empresa["id_empresa"]
            )
        ){

            die("Acceso denegado.");

        }


        $this->oferta
        ->eliminar($id);


        header(
            "Location: empresa.php?action=misOfertas"
        );

        exit();

    }



    // ==========================
    // VER CANDIDATOS DE OFERTA
    // ==========================

    public function verCandidatos(){

        $this->verificarSesion();

        $usuario=$_SESSION["usuario"];


        $empresa=$this->empresa
        ->obtenerPorUsuario(
            $usuario["id_usuario"]
        );


        $idOferta=(int)$_GET["id"];


        if(
            !$this->oferta->perteneceAEmpresa(
                $idOferta,
                $empresa["id_empresa"]
            )
        ){

            die("Acceso denegado.");

        }


        $oferta=$this->oferta
        ->obtenerPorId($idOferta);


        $candidatos=$this->postulacion
        ->obtenerCandidatosPorOferta(
            $idOferta
        );


        $estados=$this->postulacion
        ->obtenerEstados();


        require_once __DIR__
        ."/../../views/empresa/candidatos.php";

    }



    // ==========================
    // ACTUALIZAR ESTADO POSTULACIÓN
    // ==========================

    public function actualizarEstado(){

        $this->verificarSesion();

        $usuario=$_SESSION["usuario"];


        $empresa=$this->empresa
        ->obtenerPorUsuario(
            $usuario["id_usuario"]
        );


        $idOferta=(int)$_POST["id_oferta"];


        if(
            !$this->oferta->perteneceAEmpresa(
                $idOferta,
                $empresa["id_empresa"]
            )
        ){

            die("Acceso denegado.");

        }


        $this->postulacion
        ->actualizarEstado(

            $_POST["id_postulacion"],

            $_POST["id_estado"]

        );


        header(
            "Location: empresa.php?action=verCandidatos&id=".$idOferta
        );


        exit();

    }

}

?>