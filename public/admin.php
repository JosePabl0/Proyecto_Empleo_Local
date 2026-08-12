<?php
// ARCHIVO PRINCIPAL ADMINISTRADOR
require_once __DIR__."/../app/config/constants.php";
require_once __DIR__."/../app/controllers/AdminController.php";

//CONTROLADOR
$controller = new AdminController();

$action = $_GET["action"] ?? "dashboard";


if(method_exists($controller,$action)){

    $controller->$action();

}else{


    header("Location: ".BASE_URL."/admin.php?action=dashboard");
    exit();

}
?>
