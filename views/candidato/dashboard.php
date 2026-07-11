<?php
// ==========================
// DASHBOARD CANDIDATO
// ==========================

require_once __DIR__."/../layouts/header.php";
require_once __DIR__."/../layouts/navbar.php";
?>

<!-- ==========================
     CONTENIDO PRINCIPAL
========================== -->

<div class="container mt-5">

<?php if(isset($perfil)): ?>

<!-- ==========================
     INFORMACIÓN DEL CANDIDATO
========================== -->

<div class="card shadow mb-4">
<div class="card-body">

<h3>👤 <?= htmlspecialchars($usuario["nombre"]); ?></h3>

<p class="text-muted mb-3">
<?= !empty($perfil["descripcion"])
? htmlspecialchars($perfil["descripcion"])
: "Completa tu perfil profesional para mejorar tus oportunidades laborales."; ?>
</p>

<a href="/EmpleoLocal/public/candidato.php?action=perfil"
class="btn btn-warning">
Editar perfil
</a>

</div>
</div>

<?php endif; ?>


<!-- ==========================
     ENCABEZADO DASHBOARD
========================== -->

<h2>Panel del Candidato 👨‍💼</h2>

<p class="text-muted">
Encuentra oportunidades laborales y administra tus postulaciones.
</p>


<!-- ==========================
     ACCIONES DEL CANDIDATO
========================== -->

<div class="row mt-4">

<div class="col-md-3">
<div class="card shadow text-center">
<div class="card-body">

<h3>💼</h3>
<h5>Buscar empleo</h5>

<p>
Explora las ofertas disponibles.
</p>

<a href="/EmpleoLocal/public/candidato.php?action=explorar"
class="btn btn-primary">
Explorar
</a>

</div>
</div>
</div>


<div class="col-md-3">
<div class="card shadow text-center">
<div class="card-body">

<h3>📄</h3>
<h5>Mis postulaciones</h5>

<p>
Consulta el estado de tus solicitudes.
</p>

<a href="/EmpleoLocal/public/candidato.php?action=misPostulaciones"
class="btn btn-success">
Ver
</a>

</div>
</div>
</div>


<div class="col-md-3">
<div class="card shadow text-center">
<div class="card-body">

<h3>👤</h3>
<h5>Mi perfil</h5>

<p>
Actualiza tu información profesional.
</p>

<a href="/EmpleoLocal/public/candidato.php?action=perfil"
class="btn btn-dark">
Perfil
</a>

</div>
</div>
</div>


<div class="col-md-3">
<div class="card shadow text-center">
<div class="card-body">

<h3>📄</h3>
<h5>Currículum</h5>

<p>
Administra tu hoja de vida.
</p>

<a href="/EmpleoLocal/public/candidato.php?action=perfil"
class="btn btn-secondary">
Gestionar
</a>

</div>
</div>
</div>

</div>


<!-- ==========================
     OPORTUNIDADES LABORALES
========================== -->

<div class="card shadow mt-5">

<div class="card-body">

<h4>
Últimas oportunidades laborales
</h4>

<hr>

<?php if(isset($ofertas) && count($ofertas)>0): ?>

<div class="list-group">

<?php foreach(array_slice($ofertas,0,5) as $oferta): ?>

<div class="list-group-item">

<div class="d-flex justify-content-between align-items-center">

<div>

<h5 class="mb-1">
<?= htmlspecialchars($oferta["titulo"]); ?>
</h5>

<p class="mb-1 text-muted">
<?= htmlspecialchars($oferta["nombre_empresa"]); ?>
</p>

<small>
<?= htmlspecialchars($oferta["ubicacion"]); ?> |
<?= htmlspecialchars($oferta["modalidad"]); ?>
</small>

</div>

<a href="/EmpleoLocal/public/candidato.php?action=detalleOferta&id=<?= $oferta["id_oferta"]; ?>"
class="btn btn-outline-primary btn-sm">
Ver oferta
</a>

</div>

</div>

<?php endforeach; ?>

</div>

<?php else: ?>

<div class="alert alert-info mb-0">

No hay ofertas publicadas por el momento.

</div>

<?php endif; ?>

</div>

</div>

</div>


<!-- ==========================
     FOOTER
========================== -->

<?php require_once __DIR__."/../layouts/footer.php"; ?>