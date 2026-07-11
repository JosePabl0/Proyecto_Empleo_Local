<?php
// REGISTRO USUARIO
require_once __DIR__ . "/../app/controllers/AuthController.php";

$auth = new AuthController();

$auth->registro();

?>