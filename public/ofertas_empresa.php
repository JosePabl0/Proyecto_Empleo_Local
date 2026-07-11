<?php
// MOSTRAR OFERTAS EMPRESA
require_once __DIR__ . "/../app/controllers/EmpresaController.php";

$controller = new EmpresaController();

$controller->misOfertas();

?>