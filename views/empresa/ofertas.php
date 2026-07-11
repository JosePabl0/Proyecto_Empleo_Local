<?php

// ==========================
// LAYOUTS
// ==========================

require_once __DIR__."/../layouts/header.php";
require_once __DIR__."/../layouts/navbar.php";

?>

<div class="container mt-5">

<?php
// ==========================
// ENCABEZADO
// ==========================
?>

<div class="d-flex justify-content-between align-items-center mb-3">

<div>

<h2>📋 Mis ofertas laborales</h2>

<p class="text-muted mb-0">
Gestiona las ofertas publicadas por tu empresa.
</p>

</div>

<a href="/EmpleoLocal/public/empresa.php?action=crearOferta"
class="btn btn-primary">

➕ Nueva oferta

</a>

</div>

<?php
// ==========================
// LISTADO DE OFERTAS
// ==========================
?>

<div class="card shadow">

<div class="card-body">

<?php if(count($ofertas)>0): ?>

<div class="table-responsive">

<table class="table table-hover align-middle">

<?php
// ==========================
// CABECERA TABLA
// ==========================
?>

<thead class="table-dark">

<tr>

<th>
Título
</th>

<th>
Categoría
</th>

<th>
Modalidad
</th>

<th>
Ubicación
</th>

<th>
Estado
</th>

<th width="220">
Acciones
</th>

</tr>

</thead>

<?php
// ==========================
// DATOS OFERTAS
// ==========================
?>

<tbody>

<?php foreach($ofertas as $oferta): ?>

<tr>

<td>
<?= htmlspecialchars($oferta["titulo"]); ?>
</td>

<td>
<?= htmlspecialchars($oferta["categoria"]); ?>
</td>

<td>
<?= htmlspecialchars($oferta["modalidad"]); ?>
</td>

<td>
<?= htmlspecialchars($oferta["ubicacion"]); ?>
</td>

<?php
// ==========================
// ESTADO OFERTA
// ==========================
?>

<td>

<?php if($oferta["estado"]==1): ?>

<span class="badge bg-success">
Activa
</span>

<?php else: ?>

<span class="badge bg-secondary">
Inactiva
</span>

<?php endif; ?>

</td>

<?php
// ==========================
// ACCIONES OFERTA
// ==========================
?>

<td>

<a href="/EmpleoLocal/public/empresa.php?action=verCandidatos&id=<?= $oferta["id_oferta"]; ?>"
class="btn btn-info btn-sm">

👥 Candidatos

</a>

<a href="/EmpleoLocal/public/empresa.php?action=eliminarOferta&id=<?= $oferta["id_oferta"]; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('¿Desea eliminar esta oferta?');">

Eliminar

</a>

</td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

</div>

<?php else: ?>

<?php
// ==========================
// SIN OFERTAS
// ==========================
?>

<div class="alert alert-info">

Todavía no has publicado ninguna oferta laboral.

</div>

<?php endif; ?>

<?php
// ==========================
// BOTONES NAVEGACIÓN
// ==========================
?>

<div class="mt-3 d-flex justify-content-between">

<a href="/EmpleoLocal/public/empresa.php?action=dashboard"
class="btn btn-secondary">

← Volver al panel

</a>

<a href="/EmpleoLocal/public/empresa.php?action=crearOferta"
class="btn btn-success">

Publicar otra oferta

</a>

</div>

</div>

</div>

</div>

<?php

// ==========================
// FOOTER
// ==========================

require_once __DIR__."/../layouts/footer.php";

?>