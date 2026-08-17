<?php
// ==========================
// LAYOUTS
// ==========================

require_once __DIR__ . "/../layouts/header.php";
require_once __DIR__ . "/../layouts/navbar.php";
?>


<!-- ==========================
     CONTENIDO PRINCIPAL
========================== -->

<div class="container mt-5 espacio-antes-footer">


     <!-- ==========================
     INFORMACIÓN EMPRESA
========================== -->

     <?php if (isset($empresa)): ?>

          <div class="card shadow border-0 mb-4">

               <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                         <div>

                              <div class="d-flex align-items-center gap-2 mb-1">
                                   <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="2" y="7" width="20" height="14" rx="2"/>
                                        <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>
                                   </svg>
                                   <h2 class="mb-0">
                                        <?= htmlspecialchars($empresa["nombre_empresa"]); ?>
                                   </h2>
                              </div>

                              <p class="text-muted mb-0">
                                   <?= htmlspecialchars($empresa["descripcion"]); ?>
                              </p>

                         </div>

                         <a href="<?= BASE_URL ?>/empresa/perfil" class="btn btn-warning">

                              Editar perfil

                         </a>

                    </div>

               </div>

          </div>

     <?php endif; ?>


     <!-- ==========================
     ENCABEZADO DASHBOARD
========================== -->

     <div class="d-flex align-items-center gap-2 mb-1">
          <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
               fill="none" stroke="#1e293b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
               <rect x="2" y="7" width="20" height="14" rx="2"/>
               <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>
          </svg>
          <h2 class="mb-0">Panel de Empresa</h2>
     </div>

     <p class="text-muted">
          Gestiona tus ofertas laborales y candidatos desde un solo lugar.
     </p>


     <!-- ==========================
     ESTADÍSTICAS
========================== -->

     <div class="row mt-4">

          <div class="col-md-4 mb-3">

               <div class="card shadow h-100">

                    <div class="card-body text-center">

                         <h2>
                              <?= $totalOfertas ?? 0; ?>
                         </h2>

                         <p class="mb-0">
                              Ofertas activas
                         </p>

                    </div>

               </div>

          </div>


          <div class="col-md-4 mb-3">

               <div class="card shadow h-100">

                    <div class="card-body text-center">

                         <h2>
                              <?= $totalCandidatos ?? 0; ?>
                         </h2>

                         <p class="mb-0">
                              Candidatos recibidos
                         </p>

                    </div>

               </div>

          </div>


          <div class="col-md-4 mb-3">

               <div class="card shadow h-100">

                    <div class="card-body text-center">

                         <h2>
                              <?= $procesosPendientes ?? 0; ?>
                         </h2>

                         <p class="mb-0">
                              Procesos pendientes
                         </p>

                    </div>

               </div>

          </div>

     </div>


     <!-- ==========================
     ACCIONES EMPRESA
========================== -->

     <hr class="my-5">


     <div class="row">


          <div class="col-md-4 mb-3">

               <div class="card shadow h-100">

                    <div class="card-body">

                         <h4>
                              Crear nueva oferta
                         </h4>

                         <p>
                              Publica una nueva oportunidad laboral.
                         </p>

                         <a href="<?= BASE_URL ?>/empresa/crearOferta" class="btn btn-primary">

                              Crear oferta

                         </a>

                    </div>

               </div>

          </div>


          <div class="col-md-4 mb-3">

               <div class="card shadow h-100">

                    <div class="card-body">

                         <h4>
                              Mis ofertas
                         </h4>

                         <p>
                              Consulta y elimina tus publicaciones.
                         </p>

                         <a href="<?= BASE_URL ?>/empresa/misOfertas" class="btn btn-success">

                              Ver ofertas

                         </a>

                    </div>

               </div>

          </div>


          <div class="col-md-4 mb-3">

               <div class="card shadow h-100">

                    <div class="card-body">

                         <h4>
                              Mi perfil
                         </h4>

                         <p>
                              Actualiza la información pública de tu empresa.
                         </p>

                         <a href="<?= BASE_URL ?>/empresa/perfil" class="btn btn-warning">

                              Editar perfil

                         </a>

                    </div>

               </div>

          </div>


     </div>


</div>


<!-- ==========================
     FOOTER
========================== -->

<?php require_once __DIR__ . "/../layouts/footer.php"; ?>