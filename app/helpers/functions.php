<?php
// FUNCIONES AUXILIARES

// LIMPIAR DATOS ENTRADA
function clean($data){

    return htmlspecialchars(
        trim($data)
    );

}

// REDIRECCIONAR URL
function redirect($url){

    header("Location: ".$url);

    exit();

}

?>