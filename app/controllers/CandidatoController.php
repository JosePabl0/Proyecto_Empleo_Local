<?php

// ==========================
// IMPORTACIÓN DE CLASES
// ==========================

require_once __DIR__."/../core/Controller.php";

require_once __DIR__."/../models/Candidato.php";
require_once __DIR__."/../models/Oferta.php";
require_once __DIR__."/../models/Postulacion.php";
require_once __DIR__."/../models/Empresa.php";


// ==========================
// CONTROLADOR CANDIDATO
// ==========================

class CandidatoController extends Controller{

    private $candidato;
    private $oferta;
    private $postulacion;
    private $empresa;


    // ==========================
    // CONSTRUCTOR
    // ==========================

    public function __construct(){

        $this->candidato=new Candidato();
        $this->oferta=new Oferta();
        $this->postulacion=new Postulacion();
        $this->empresa=new Empresa();

    }


    // ==========================
    // VERIFICAR SESIÓN Y ROL
    // ==========================

    private function verificarSesion(){

        if(session_status()==PHP_SESSION_NONE){

            session_start();

        }

        if(!isset($_SESSION["usuario"])){

            header("Location: /EmpleoLocal/public/login.php");
            exit();

        }


        // Validar que el usuario sea candidato

        if($_SESSION["usuario"]["id_rol"]!=3){

            header("Location: /EmpleoLocal/public/login.php");
            exit();

        }

    }


    // ==========================
    // DASHBOARD CANDIDATO
    // ==========================

    public function dashboard(){

        $this->verificarSesion();

        $usuario=$_SESSION["usuario"];

        $perfil=$this->candidato
        ->obtenerPorUsuario(
            $usuario["id_usuario"]
        );

        $ofertas=$this->oferta
        ->obtenerTodas();

        require_once __DIR__
        ."/../../views/candidato/dashboard.php";

    }


    // ==========================
    // PERFIL CANDIDATO
    // ==========================

    public function perfil(){

        $this->verificarSesion();

        $usuario=$_SESSION["usuario"];

        $perfil=$this->candidato
        ->obtenerPorUsuario(
            $usuario["id_usuario"]
        );

        require_once __DIR__
        ."/../../views/candidato/perfil.php";

    }


    // ==========================
    // ACTUALIZAR PERFIL
    // ==========================

    public function actualizarPerfil(){

        $this->verificarSesion();

        $usuario=$_SESSION["usuario"];

        $perfil=$this->candidato
        ->obtenerPorUsuario(
            $usuario["id_usuario"]
        );

        $datos=[

            "id_candidato"=>$perfil["id_candidato"],

            "descripcion"=>trim($_POST["descripcion"]),

            "ubicacion"=>trim($_POST["ubicacion"]),

            "experiencia"=>trim($_POST["experiencia"]),

            "disponibilidad"=>trim($_POST["disponibilidad"])

        ];

        $this->candidato->actualizar($datos);



        // ==========================
        // SUBIR CURRÍCULUM PDF
        // ==========================

        if(
            isset($_FILES["curriculum"]) &&
            $_FILES["curriculum"]["error"]==0
        ){

            $extension=strtolower(
                pathinfo(
                    $_FILES["curriculum"]["name"],
                    PATHINFO_EXTENSION
                )
            );


            if($extension!="pdf"){

                header(
                    "Location: candidato.php?action=perfil&error=pdf"
                );

                exit();

            }


            if($_FILES["curriculum"]["size"]>5*1024*1024){

                header(
                    "Location: candidato.php?action=perfil&error=size"
                );

                exit();

            }


            $nombreArchivo=
            "cv_".$perfil["id_candidato"]."_".time().".pdf";


            $rutaDestino=
            __DIR__.
            "/../../public/uploads/curriculums/".
            $nombreArchivo;


            if(
                move_uploaded_file(
                    $_FILES["curriculum"]["tmp_name"],
                    $rutaDestino
                )
            ){


                // Eliminar currículum anterior

                if(!empty($perfil["curriculum"])){

                    $archivoAnterior=
                    __DIR__.
                    "/../../public/uploads/curriculums/".
                    $perfil["curriculum"];


                    if(file_exists($archivoAnterior)){

                        unlink($archivoAnterior);

                    }

                }


                // Guardar nuevo currículum

                $this->candidato
                ->actualizarCurriculum(
                    $perfil["id_candidato"],
                    $nombreArchivo
                );

            }

        }


        header(
            "Location: candidato.php?action=perfil&ok=1"
        );

        exit();

    }


    // ==========================
    // EXPLORAR OFERTAS
    // ==========================

    public function explorar(){

        $this->verificarSesion();

        $ofertas=$this->oferta
        ->obtenerTodas();

        require_once __DIR__
        ."/../../views/candidato/explorar.php";

    }


    // ==========================
    // DETALLE DE OFERTA
    // ==========================

    public function detalleOferta(){

        $this->verificarSesion();

        $usuario=$_SESSION["usuario"];

        $perfil=$this->candidato
        ->obtenerPorUsuario(
            $usuario["id_usuario"]
        );


        $id=(int)$_GET["id"];


        $oferta=$this->oferta
        ->obtenerDetalle($id);


        if(!$oferta){

            die("La oferta no existe.");

        }


        $yaPostulado=$this->postulacion
        ->yaPostulado(
            $id,
            $perfil["id_candidato"]
        );


        require_once __DIR__
        ."/../../views/candidato/detalle_oferta.php";

    }


    // ==========================
    // POSTULAR A OFERTA
    // ==========================

    public function postular(){

        $this->verificarSesion();

        $usuario=$_SESSION["usuario"];


        $perfil=$this->candidato
        ->obtenerPorUsuario(
            $usuario["id_usuario"]
        );


        // Validar información profesional completa

        if(
            empty($perfil["descripcion"]) ||
            empty($perfil["ubicacion"]) ||
            empty($perfil["experiencia"]) ||
            empty($perfil["disponibilidad"]) ||
            empty($perfil["curriculum"])
        ){

            header(
                "Location: candidato.php?action=perfil&error=completar"
            );

            exit();

        }


        $idOferta=(int)$_GET["id"];


        $oferta=$this->oferta
        ->obtenerPorId($idOferta);


        if(!$oferta){

            die("La oferta no existe.");

        }


        // Evitar postulaciones duplicadas

        if(
            $this->postulacion
            ->yaPostulado(
                $idOferta,
                $perfil["id_candidato"]
            )
        ){

            header(
                "Location: candidato.php?action=detalleOferta&id=".$idOferta."&error=duplicado"
            );

            exit();

        }


        $this->postulacion
        ->crear([

            "id_oferta"=>$idOferta,

            "id_candidato"=>$perfil["id_candidato"]

        ]);


        header(
            "Location: candidato.php?action=misPostulaciones&ok=1"
        );

        exit();

    }


    // ==========================
    // INFORMACIÓN DE EMPRESA
    // ==========================

    public function verEmpresa(){

        $this->verificarSesion();

        $idEmpresa=(int)$_GET["id"];


        $empresa=$this->empresa
        ->obtenerPorId($idEmpresa);


        if(!$empresa){

            die("La empresa no existe.");

        }


        require_once __DIR__
        ."/../../views/candidato/empresa.php";

    }


    // ==========================
    // CANCELAR POSTULACIÓN
    // ==========================

    public function cancelarPostulacion(){

        $this->verificarSesion();

        $usuario=$_SESSION["usuario"];


        $perfil=$this->candidato
        ->obtenerPorUsuario(
            $usuario["id_usuario"]
        );


        $idPostulacion=(int)$_GET["id"];


        $this->postulacion
        ->cancelar(
            $idPostulacion,
            $perfil["id_candidato"]
        );


        header(
            "Location: candidato.php?action=misPostulaciones&cancelado=1"
        );

        exit();

    }


    // ==========================
    // MIS POSTULACIONES
    // ==========================

    public function misPostulaciones(){

        $this->verificarSesion();


        $usuario=$_SESSION["usuario"];


        $perfil=$this->candidato
        ->obtenerPorUsuario(
            $usuario["id_usuario"]
        );


        $postulaciones=$this->postulacion
        ->obtenerPorCandidato(
            $perfil["id_candidato"]
        );


        require_once __DIR__
        ."/../../views/candidato/mis_postulaciones.php";

    }

}
?>