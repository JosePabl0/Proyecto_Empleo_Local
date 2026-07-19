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

<?php if(isset($empresa)): ?>

<div class="card shadow border-0 mb-4">

<div class="card-body">

<div class="d-flex justify-content-between align-items-center">

<div>

<h2 class="mb-1">
🏢 <?= htmlspecialchars($empresa["nombre_empresa"]); ?>
</h2>

<p class="text-muted mb-0">
<?= htmlspecialchars($empresa["descripcion"]); ?>
</p>

</div>

<a href="/EmpleoLocal/public/empresa/perfil"
class="btn btn-warning">

Editar perfil

</a>

</div>

</div>

</div>

<?php endif; ?>


<!-- ==========================
     ENCABEZADO DASHBOARD
========================== -->

<h2 class="mb-2">
Panel de Empresa 🏢
</h2>

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

<a href="/EmpleoLocal/public/empresa/crearOferta"
class="btn btn-primary">

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

<a href="/EmpleoLocal/public/empresa/misOfertas"
class="btn btn-success">

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

<a href="/EmpleoLocal/public/empresa/perfil"
class="btn btn-warning">

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