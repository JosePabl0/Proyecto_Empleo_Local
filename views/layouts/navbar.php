<?php

// Configuración y sesión
require_once __DIR__ . "/../../app/config/constants.php";

if (session_status() == PHP_SESSION_NONE) {
     session_start();
}

$usuario = $_SESSION["usuario"] ?? null;
$paginaActual = basename($_SERVER["PHP_SELF"]);

// Destino del logo
$logoDestino = BASE_URL . "/";

if ($usuario) {
     switch ($usuario["id_rol"]) {
          case 1:
               $logoDestino = BASE_URL . "/admin.php?action=dashboard";
               break;
          case 2:
               $logoDestino = BASE_URL . "/empresa/dashboard";
               break;
          case 3:
               $logoDestino = BASE_URL . "/candidato/dashboard";
               break;
     }
}
?>

<!-- Navbar principal -->
<nav
     class="navbar navbar-expand-lg <?= $paginaActual == 'index.php' ? 'navbar-flotante navbar-light' : 'navbar-dark bg-primary' ?>">
     <div class="container">

          <!-- Logo -->
          <a class="navbar-brand d-flex align-items-center" href="<?= $logoDestino ?>">
               <img src="<?= BASE_URL ?>/img/logo.png" alt="IMPULSA" height="45" class="me-2">
               <span>IMPULSA</span>
          </a>

          <!-- Botón menu responsive -->
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
               <span class="navbar-toggler-icon"></span>
          </button>

          <!-- Menu navegación -->
          <div class="collapse navbar-collapse" id="menu">
               <ul class="navbar-nav ms-auto">

                    <!-- Usuario no autenticado -->
                    <?php if (!$usuario): ?>

                         <?php if ($paginaActual != "index.php"): ?>

                              <?php if ($paginaActual != "login.php"): ?>
                                   <li class="nav-item">
                                        <a class="nav-link" href="<?= BASE_URL ?>/login">Ingresar</a>
                                   </li>
                              <?php endif; ?>

                              <?php if ($paginaActual != "registro.php"): ?>
                                   <li class="nav-item">
                                        <a class="nav-link" href="<?= BASE_URL ?>/registro">Registrarse</a>
                                   </li>
                              <?php endif; ?>

                         <?php endif; ?>

                         <!-- Usuario autenticado -->
                    <?php else: ?>

                         <?php if ($paginaActual != "index.php" && $paginaActual != "login.php" && $paginaActual != "registro.php"): ?>

                              <!-- Menu candidato -->
                              <?php if ($usuario["id_rol"] == 3): ?>
                                   <li class="nav-item">
                                        <a class="nav-link" href="<?= BASE_URL ?>/candidato/dashboard">Mi panel</a>
                                   </li>
                                   <li class="nav-item">
                                        <a class="nav-link" href="<?= BASE_URL ?>/candidato/perfil">Mi perfil</a>
                                   </li>
                                   <li class="nav-item">
                                        <a class="nav-link" href="<?= BASE_URL ?>/candidato/misPostulaciones">Postulaciones</a>
                                   </li>

                                   <!-- Menu empresa -->
                              <?php elseif ($usuario["id_rol"] == 2): ?>
                                   <li class="nav-item">
                                        <a class="nav-link" href="<?= BASE_URL ?>/empresa/dashboard">Panel empresa</a>
                                   </li>
                                   <li class="nav-item">
                                        <a class="nav-link" href="<?= BASE_URL ?>/empresa/misOfertas">Mis ofertas</a>
                                   </li>

                                   <!-- Menu administrador -->
                              <?php elseif ($usuario["id_rol"] == 1): ?>
                                   <li class="nav-item">
                                        <a class="nav-link" href="<?= BASE_URL ?>/admin.php?action=dashboard">Panel administrador</a>
                                   </li>
                              <?php endif; ?>

                              <!-- Cerrar sesion -->
                              <li class="nav-item">
                                   <a class="nav-link text-warning" href="<?= BASE_URL ?>/logout">Cerrar sesión</a>
                              </li>

                         <?php endif; ?>

                    <?php endif; ?>

               </ul>
          </div>
     </div>
</nav>