<?php
// CONTROLADOR PUBLICO CANDIDATO
require_once __DIR__."/../app/controllers/CandidatoController.php";

$controller = new CandidatoController();

// DEFINIR ACCION
$action = $_GET["action"] ?? "dashboard";

// RUTAS CANDIDATO
switch($action){

    // DASHBOARD CANDIDATO
    case "dashboard":
        $controller->dashboard();
        break;

    // PERFIL CANDIDATO
    case "perfil":
        $controller->perfil();
        break;

    // ACTUALIZAR PERFIL
    case "actualizarPerfil":
        $controller->actualizarPerfil();
        break;

    // EXPLORAR OFERTAS
    case "explorar":
        $controller->explorar();
        break;

    // DETALLE OFERTA
    case "detalleOferta":
        $controller->detalleOferta();
        break;

    // VER EMPRESA
    case "verEmpresa":
        $controller->verEmpresa();
        break;

    // POSTULAR A OFERTA
    case "postular":
        $controller->postular();
        break;

    // CANCELAR POSTULACION
    case "cancelarPostulacion":
        $controller->cancelarPostulacion();
        break;

    // MIS POSTULACIONES
    case "misPostulaciones":
        $controller->misPostulaciones();
        break;

    // ACCION POR DEFECTO
    default:
        $controller->dashboard();
        break;

}

?>