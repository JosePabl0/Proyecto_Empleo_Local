<?php
/*
====================================================
EmpleoLocal v1.0
Archivo:
public/empresa.php
VERSIÓN FINAL
====================================================
*/

// CONTROLADOR EMPRESA
require_once __DIR__ . "/../app/controllers/EmpresaController.php";

$controller = new EmpresaController();

// DEFINIR ACCION
$action = $_GET["action"] ?? "dashboard";

// RUTAS EMPRESA
switch($action){

    // DASHBOARD EMPRESA
    case "dashboard":
        $controller->dashboard();
    break;

    // PERFIL EMPRESA
    case "perfil":
        $controller->perfil();
    break;

    // ACTUALIZAR PERFIL EMPRESA
    case "actualizarPerfil":
        $controller->actualizarPerfil();
    break;

    // OFERTAS EMPRESA
    case "misOfertas":
        $controller->misOfertas();
    break;

    // CREAR OFERTA
    case "crearOferta":

        if($_SERVER["REQUEST_METHOD"]=="POST"){

            $controller->guardarOferta();

        }else{

            $controller->crearOferta();

        }

    break;

    // EDITAR OFERTA
    case "editarOferta":

        if($_SERVER["REQUEST_METHOD"]=="POST"){

            $controller->actualizarOferta();

        }else{

            $controller->editarOferta();

        }

    break;

    // ELIMINAR OFERTA
    case "eliminarOferta":
        $controller->eliminarOferta();
    break;

    // VER CANDIDATOS
    case "verCandidatos":
        $controller->verCandidatos();
    break;

    // ACTUALIZAR ESTADO POSTULACION
    case "actualizarEstado":
        $controller->actualizarEstado();
    break;

    // ACCION POR DEFECTO
    default:
        $controller->dashboard();
    break;

}

?>