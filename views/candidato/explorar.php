<?php
// EXPLORAR OFERTAS LABORALES
require_once __DIR__."/../layouts/header.php";
require_once __DIR__."/../layouts/navbar.php";

?>

<div class="container mt-5">

<h2>
Buscar oportunidades laborales 💼
</h2>

<p class="text-muted">
Explora las ofertas disponibles y encuentra la oportunidad ideal.
</p>

<div class="card shadow">

<div class="card-body">

<?php if(count($ofertas)>0): ?>

<div class="row">

<?php foreach($ofertas as $oferta): ?>

<div class="col-md-6 mb-4">

<div class="card h-100 shadow-sm">

<div class="card-body">

<h4>
<?= htmlspecialchars($oferta["titulo"]); ?>
</h4>

<h6 class="text-primary">
🏢 <?= htmlspecialchars($oferta["nombre_empresa"]); ?>
</h6>

<p>
<?= htmlspecialchars($oferta["descripcion"]); ?>
</p>

<p class="mb-1">

<strong>Categoría:</strong>

<?= htmlspecialchars($oferta["categoria"]); ?>

</p>

<p class="mb-1">

<strong>Modalidad:</strong>

<?= htmlspecialchars($oferta["modalidad"]); ?>

</p>

<p>

<strong>Ubicación:</strong>

<?= htmlspecialchars($oferta["ubicacion"]); ?>

</p>

<a href="/EmpleoLocal/public/candidato.php?action=detalleOferta&id=<?= $oferta["id_oferta"]; ?>"
class="btn btn-primary">

Ver oferta

</a>

</div>

</div>

</div>

<?php endforeach; ?>

</div>

<?php else: ?>

<div class="alert alert-info">

No hay ofertas disponibles actualmente.

</div>

<?php endif; ?>

<a href="/EmpleoLocal/public/candidato.php"
class="btn btn-secondary">

Volver al panel

</a>

</div>

</div>

</div>

<?php
// FOOTER
require_once __DIR__."/../layouts/footer.php";
?>