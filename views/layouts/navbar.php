<?php

// ==========================
// CONFIGURACIÓN Y SESIÓN
// ==========================

require_once __DIR__ . "/../../app/config/constants.php";

if(session_status() == PHP_SESSION_NONE){
    session_start();
}


$usuario = $_SESSION["usuario"] ?? null;
$paginaActual = basename($_SERVER["PHP_SELF"]);


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

<div class="container">


<!-- ==========================
     LOGO
========================== -->

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
     BOTÓN MENÚ RESPONSIVE
========================== -->

<button
class="navbar-toggler"
type="button"
data-bs-toggle="collapse"
data-bs-target="#menu">

<span class="navbar-toggler-icon"></span>

</button>



<!-- ==========================
     MENÚ NAVEGACIÓN
========================== -->

<div class="collapse navbar-collapse" id="menu">

<ul class="navbar-nav ms-auto">



<!-- ==========================
     USUARIO NO AUTENTICADO
========================== -->

<?php if(!$usuario): ?>


<?php if($paginaActual != "index.php"): ?>


<?php if($paginaActual != "login.php"): ?>

<li class="nav-item">

<a class="nav-link"
href="<?= BASE_URL ?>/login.php">

Ingresar

</a>

</li>

<?php endif; ?>



<?php if($paginaActual != "registro.php"): ?>

<li class="nav-item">

<a class="nav-link"
href="<?= BASE_URL ?>/registro.php">

Registrarse

</a>

</li>

<?php endif; ?>


<?php endif; ?>



<!-- ==========================
     USUARIO AUTENTICADO
========================== -->

<?php else: ?>


<?php if(
    $paginaActual != "index.php" &&
    $paginaActual != "login.php" &&
    $paginaActual != "registro.php"
): ?>



<!-- ==========================
     MENÚ CANDIDATO
========================== -->

<?php if($usuario["id_rol"] == 3): ?>

<li class="nav-item">

<a class="nav-link"
href="<?= BASE_URL ?>/candidato.php?action=dashboard">

Mi panel

</a>

</li>


<li class="nav-item">

<a class="nav-link"
href="<?= BASE_URL ?>/candidato.php?action=perfil">

Mi perfil

</a>

</li>


<li class="nav-item">

<a class="nav-link"
href="<?= BASE_URL ?>/candidato.php?action=misPostulaciones">

Postulaciones

</a>

</li>



<!-- ==========================
     MENÚ EMPRESA
========================== -->

<?php elseif($usuario["id_rol"] == 2): ?>

<li class="nav-item">

<a class="nav-link"
href="<?= BASE_URL ?>/empresa.php?action=dashboard">

Panel empresa

</a>

</li>


<li class="nav-item">

<a class="nav-link"
href="<?= BASE_URL ?>/empresa.php?action=misOfertas">

Mis ofertas

</a>

</li>



<!-- ==========================
     MENÚ ADMINISTRADOR
========================== -->

<?php elseif($usuario["id_rol"] == 1): ?>

<li class="nav-item">

<a class="nav-link"
href="<?= BASE_URL ?>/admin.php?action=dashboard">

Panel administrador

</a>

</li>


<?php endif; ?>



<!-- ==========================
     CERRAR SESIÓN
========================== -->

<li class="nav-item">

<a class="nav-link text-warning"
href="<?= BASE_URL ?>/logout.php">

Cerrar sesión

</a>

</li>



<?php endif; ?>


<?php endif; ?>


</ul>

</div>

</div>

</nav>