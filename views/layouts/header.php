<?php

// ==========================
// INICIO DE SESIÓN
// ==========================

if(session_status() == PHP_SESSION_NONE){
    session_start();
}


// ==========================
// CONTROL DE CACHÉ EVITAR PAGINA GUARDE CACHE
// ==========================

header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

?>

<!-- ==========================
     ESTRUCTURA HTML
========================== -->

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">


<!-- ==========================
     TÍTULO
========================== -->

<title>IMPULSA</title>



<!-- ==========================
     BOOTSTRAP CSS
========================== -->

<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">



<!-- ==========================
     CSS PROPIO
========================== -->

<link
rel="stylesheet"
href="/EmpleoLocal/assets/css/style.css">



<!-- ==========================
     CONTROL DE HISTORIAL
========================== -->

<script>

window.addEventListener("pageshow",function(event){

    if(event.persisted){

        window.location.reload();

    }

});

</script>


</head>


<body>