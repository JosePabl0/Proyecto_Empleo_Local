<?php
// DETALLE OFERTA LABORAL
require_once __DIR__."/../layouts/header.php";
require_once __DIR__."/../layouts/navbar.php";
?>

<div class="container mt-5">

<div class="card shadow">

<div class="card-body">

<h2>
<?= htmlspecialchars($oferta["titulo"]); ?>
</h2>

<h5 class="text-primary">
🏢 <?= htmlspecialchars($oferta["nombre_empresa"] ?? "Empresa"); ?>
</h5>

<a href="/EmpleoLocal/public/candidato.php?action=verEmpresa&id=<?= $oferta["id_empresa"]; ?>"
class="btn btn-outline-primary btn-sm mb-3">
🏢 Ver información de la empresa
</a>

<hr>

<div class="mb-3">

<h5>
Descripción del puesto
</h5>

<p>
<?= nl2br(htmlspecialchars($oferta["descripcion"])); ?>
</p>

</div>

<div class="mb-3">

<h5>
Información de la oferta
</h5>

<p>
<strong>Categoría:</strong>
<?= htmlspecialchars($oferta["categoria"] ?? ""); ?>
</p>

<p>
<strong>Modalidad:</strong>
<?= htmlspecialchars($oferta["modalidad"]); ?>
</p>

<p>
<strong>Ubicación:</strong>
<?= htmlspecialchars($oferta["ubicacion"]); ?>
</p>

<p>
<strong>Salario:</strong>
₡ <?= htmlspecialchars($oferta["salario"]); ?>
</p>

</div>

<div class="mb-3">

<h5>
Requisitos
</h5>

<p>
<?= nl2br(htmlspecialchars($oferta["requisitos"])); ?>
</p>

</div>

<hr>

// VALIDACIÓN PERFIL CANDIDATO
<?php

$perfilCompleto =
!empty($perfil["descripcion"]) &&
!empty($perfil["ubicacion"]) &&
!empty($perfil["experiencia"]) &&
!empty($perfil["disponibilidad"]) &&
!empty($perfil["curriculum"]);

?>

<?php if(isset($yaPostulado) && $yaPostulado): ?>

<div class="alert alert-info">

✔ Ya realizaste una postulación para esta oferta.

</div>

<?php elseif(!$perfilCompleto): ?>

<div class="alert alert-warning">

⚠️ Para postularte debes completar tu perfil profesional y subir tu currículum.

</div>

<a href="/EmpleoLocal/public/candidato.php?action=perfil"
class="btn btn-primary">

👤 Completar perfil

</a>

<?php else: ?>

<a href="/EmpleoLocal/public/candidato.php?action=postular&id=<?= $oferta["id_oferta"]; ?>"
class="btn btn-success">

📩 Postularme

</a>

<?php endif; ?>

<a href="/EmpleoLocal/public/candidato.php?action=explorar"
class="btn btn-secondary ms-2">

Volver

</a>

</div>

</div>

</div>

<?php
// FOOTER
require_once __DIR__."/../layouts/footer.php";
?>