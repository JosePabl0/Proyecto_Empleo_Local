<?php
// ==========================
// CONFIGURACIÓN Y SESIÓN
// ==========================
require_once __DIR__ . "/../../app/config/constants.php";

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

$usuario = $_SESSION["usuario"] ?? null;

// ==========================
// DESTINO DEL LOGO
// ==========================
$logoDestino = BASE_URL."/index.php";

if($usuario){
    switch($usuario["id_rol"]){
        case 1:
            $logoDestino = BASE_URL."/admin.php?action=dashboard";
            break;

        case 2:
            $logoDestino = BASE_URL."/empresa.php?action=dashboard";
            break;

        case 3:
            $logoDestino = BASE_URL."/candidato.php?action=dashboard";
            break;
    }
}
?>

<!-- ==========================
     NAVBAR PRINCIPAL
========================== -->

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

```
<div class="container">

    <!-- LOGO -->

    <a class="navbar-brand d-flex align-items-center"
       href="<?= $logoDestino ?>">

        <img
            src="<?= BASE_URL ?>/img/logo.png"
            alt="IMPULSA"
            height="45"
            class="me-2">

        <span>IMPULSA</span>

    </a>

    <!-- ==========================
         OPCIONES DEL USUARIO
    ========================== -->

    <?php if($usuario): ?>

        <div class="ms-auto">

            <a
                href="<?= BASE_URL ?>/logout.php"
                class="btn btn-outline-light">

                Cerrar sesión

            </a>

        </div>

    <?php else: ?>

        <!-- USUARIO NO AUTENTICADO -->

        <div class="ms-auto">

            <a
                href="<?= BASE_URL ?>/login.php"
                class="btn btn-outline-light me-2">

                Ingresar

            </a>

            <a
                href="<?= BASE_URL ?>/registro.php"
                class="btn btn-light">

                Registrarse

            </a>

        </div>

    <?php endif; ?>

</div>
```

</nav>
