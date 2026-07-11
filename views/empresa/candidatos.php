<?php
// ==========================
// LAYOUTS
// ==========================

require_once __DIR__."/../layouts/header.php";
require_once __DIR__."/../layouts/navbar.php";
?>


<!-- ==========================
     CONTENIDO PRINCIPAL
========================== -->

<div class="container mt-5">


<!-- ==========================
     ENCABEZADO
========================== -->

<div class="d-flex justify-content-between align-items-center mb-4">

<div>

<h2>👥 Candidatos postulados</h2>

<p class="text-muted mb-0">
Oferta:
<strong><?= htmlspecialchars($oferta["titulo"]); ?></strong>
</p>

</div>

<a href="/EmpleoLocal/public/empresa.php?action=misOfertas"
class="btn btn-secondary">

← Volver

</a>

</div>


<!-- ==========================
     LISTADO DE CANDIDATOS
========================== -->

<?php if(count($candidatos)>0): ?>

<?php foreach($candidatos as $candidato): ?>

<div class="card shadow mb-3">

<div class="card-body">

<div class="row">


<!-- ==========================
     INFORMACIÓN DEL CANDIDATO
========================== -->

<div class="col-md-8">

<h5>
<?= htmlspecialchars($candidato["nombre"]); ?>
</h5>

<p class="mb-2">
<strong>Ubicación:</strong>
<?= htmlspecialchars($candidato["ubicacion"] ?? "No indicada"); ?>
</p>

<p class="mb-2">
<strong>Experiencia:</strong>
<?= htmlspecialchars($candidato["experiencia"] ?? "No indicada"); ?>
</p>

<p class="mb-2">
<strong>Disponibilidad:</strong>
<?= htmlspecialchars($candidato["disponibilidad"] ?? "No indicada"); ?>
</p>


<?php if(!empty($candidato["descripcion"])): ?>

<p class="mb-2">

<strong>Perfil:</strong><br>

<?= nl2br(htmlspecialchars($candidato["descripcion"])); ?>

</p>

<?php endif; ?>


<!-- ==========================
     CURRÍCULUM
========================== -->

<?php if(!empty($candidato["curriculum"])): ?>

<p>

<a href="/EmpleoLocal/public/uploads/curriculums/<?= urlencode($candidato["curriculum"]); ?>"
target="_blank"
class="btn btn-outline-primary btn-sm">

📄 Descargar currículum

</a>

</p>

<?php else: ?>

<div class="alert alert-warning">

El candidato no tiene currículum cargado.

</div>

<?php endif; ?>


</div>


<!-- ==========================
     ACTUALIZAR ESTADO
========================== -->

<div class="col-md-4">

<form method="POST"
action="/EmpleoLocal/public/empresa.php?action=actualizarEstado">


<input type="hidden"
name="id_postulacion"
value="<?= $candidato["id_postulacion"]; ?>">


<input type="hidden"
name="id_oferta"
value="<?= $oferta["id_oferta"]; ?>">


<div class="mb-3">

<label class="form-label">

Estado de la postulación

</label>


<select
class="form-select"
name="id_estado">


<?php foreach($estados as $estado): ?>

<option
value="<?= $estado["id_estado"]; ?>"
<?= $estado["id_estado"]==$candidato["id_estado"] ? "selected" : ""; ?>>

<?= htmlspecialchars($estado["nombre"]); ?>

</option>

<?php endforeach; ?>


</select>

</div>


<button
type="submit"
class="btn btn-success w-100">

Actualizar estado

</button>


</form>

</div>


</div>

</div>

</div>


<?php endforeach; ?>


<?php else: ?>


<!-- ==========================
     SIN CANDIDATOS
========================== -->

<div class="alert alert-info">

Todavía no hay candidatos postulados para esta oferta.

</div>


<?php endif; ?>


</div>


<!-- ==========================
     FOOTER
========================== -->

<?php require_once __DIR__."/../layouts/footer.php"; ?>