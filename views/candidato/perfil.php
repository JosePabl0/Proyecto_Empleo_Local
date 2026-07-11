<?php
// PERFIL PROFESIONAL CANDIDATO
require_once __DIR__."/../layouts/header.php";
require_once __DIR__."/../layouts/navbar.php";
?>

<div class="container mt-5">

<div class="card shadow">

<div class="card-body">

<h3>
Mi perfil profesional 👤
</h3>

<?php if(isset($_GET["error"]) && $_GET["error"]=="completar"): ?>

<div class="alert alert-warning">
⚠️ Para poder postularte debes completar tu información profesional y subir tu currículum.
</div>

<?php endif; ?>

<form method="POST"
action="/EmpleoLocal/public/candidato.php?action=actualizarPerfil"
enctype="multipart/form-data">

<div class="mb-3">

<label class="form-label">
Descripción profesional
</label>

<textarea
class="form-control"
name="descripcion"
rows="4"><?= htmlspecialchars($perfil["descripcion"] ?? ""); ?></textarea>

</div>

<div class="mb-3">

<label class="form-label">
Ubicación
</label>

<input
type="text"
class="form-control"
name="ubicacion"
value="<?= htmlspecialchars($perfil["ubicacion"] ?? ""); ?>">

</div>

<div class="mb-3">

<label class="form-label">
Experiencia
</label>

<input
type="text"
class="form-control"
name="experiencia"
value="<?= htmlspecialchars($perfil["experiencia"] ?? ""); ?>">

</div>

<div class="mb-3">

<label class="form-label">
Disponibilidad
</label>

<select class="form-select" name="disponibilidad">

<option value="Tiempo completo"
<?= (($perfil["disponibilidad"] ?? "")=="Tiempo completo") ? "selected" : ""; ?>>
Tiempo completo
</option>

<option value="Medio tiempo"
<?= (($perfil["disponibilidad"] ?? "")=="Medio tiempo") ? "selected" : ""; ?>>
Medio tiempo
</option>

<option value="Freelance"
<?= (($perfil["disponibilidad"] ?? "")=="Freelance") ? "selected" : ""; ?>>
Freelance
</option>

</select>

</div>

<hr>

<h5>
Currículum (PDF)
</h5>

<?php if(!empty($perfil["curriculum"])): ?>

<div class="alert alert-success">
✔ Currículum cargado correctamente.
</div>

<a
href="/EmpleoLocal/public/uploads/curriculums/<?= htmlspecialchars($perfil["curriculum"]); ?>"
target="_blank"
class="btn btn-outline-primary btn-sm mb-3">

Ver currículum

</a>

<?php else: ?>

<div class="alert alert-warning">
Aún no has subido un currículum.
</div>

<?php endif; ?>

<div class="mb-3">

<label class="form-label">
Seleccionar archivo PDF
</label>

<input
type="file"
name="curriculum"
class="form-control"
accept=".pdf,application/pdf">

<div class="form-text">
Solo se permiten archivos PDF. Tamaño máximo: 5 MB.
</div>

</div>

<hr>

<button class="btn btn-success">
Guardar cambios
</button>

<a
href="/EmpleoLocal/public/candidato.php?action=dashboard"
class="btn btn-secondary">

Volver

</a>

</form>

</div>

</div>

</div>

<?php
// FOOTER
require_once __DIR__."/../layouts/footer.php";
?>