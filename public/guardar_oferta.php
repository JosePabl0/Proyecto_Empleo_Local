<?php
// GUARDAR OFERTA
require_once __DIR__ . "/../app/controllers/OfertaController.php";

$controller = new OfertaController();

$controller->guardar();

?>