<?php
// MIDDLEWARE AUTENTICACION
class AuthMiddleware{

    // VALIDAR USUARIO LOGUEADO
    public static function check(){

        session_start();

        // VERIFICAR SESION ACTIVA
        if(!isset($_SESSION["usuario"])){

            header("Location: /login.php");

            exit();

        }

    }

}

?>