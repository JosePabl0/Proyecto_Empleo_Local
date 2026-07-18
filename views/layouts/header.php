<?php
// Inicio de sesión
if (session_status() == PHP_SESSION_NONE) {
     session_start();
}

// Control de caché para evitar que el navegador guarde la página
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
?>

<!-- Estructura HTML -->
<!DOCTYPE html>
<html lang="es">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- Título de la página -->
     <title>IMPULSA</title>

     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

     <!-- CSS propio del proyecto -->
     <link rel="stylesheet" href="<?= ASSETS_URL ?>/css/style.css">

     <!-- Control de historial para evitar que el navegador use caché al retroceder -->
     <script>
          window.addEventListener("pageshow", function (event) {
               if (event.persisted) {
                    window.location.reload();
               }
          });
     </script>
</head>

<body>