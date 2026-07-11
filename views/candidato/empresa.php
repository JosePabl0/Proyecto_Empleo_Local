<?php
// INFORMACIÓN EMPRESA
require_once __DIR__."/../layouts/header.php";
require_once __DIR__."/../layouts/navbar.php";

?>

<div class="container mt-5">

<div class="card shadow">

<div class="card-body">

<h2>
🏢 Información de la empresa
</h2>

<hr>

<h3 class="text-primary">
<?= htmlspecialchars($empresa["nombre_empresa"]); ?>
</h3>

<div class="mt-4">

<h5>
Descripción
</h5>

<p>
<?= nl2br(htmlspecialchars(
    $empresa["descripcion"] ?? "Sin información disponible."
)); ?>
</p>

</div>

<div class="mt-4">

<h5>
Información general
</h5>

<p>
<strong>Sector:</strong>
<?= htmlspecialchars(
    $empresa["sector"] ?? "No especificado"
); ?>
</p>

<p>
<strong>Ubicación:</strong>
<?= htmlspecialchars(
    $empresa["ubicacion"] ?? "No especificada"
); ?>
</p>

<p>
<strong>Teléfono:</strong>
<?= htmlspecialchars(
    $empresa["telefono"] ?? "No disponible"
); ?>
</p>

<?php if(!empty($empresa["sitio_web"])): ?>

<p>

<strong>Sitio web:</strong>

<a href="<?= htmlspecialchars($empresa["sitio_web"]); ?>"
target="_blank">

<?= htmlspecialchars($empresa["sitio_web"]); ?>

</a>

</p>

<?php endif; ?>

</div>

<hr>

<a href="/EmpleoLocal/public/candidato.php?action=explorar"
class="btn btn-secondary">

← Volver a ofertas

</a>

</div>

</div>

</div>

<?php
// FOOTER
require_once __DIR__."/../layouts/footer.php";
?>