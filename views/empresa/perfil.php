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
// MENSAJE DE ACTUALIZACIÓN
// ==========================
?>

<?php if(isset($_GET["ok"])): ?>

<div class="alert alert-success alert-dismissible fade show">

<strong>
¡Éxito!
</strong>

La información de la empresa fue actualizada correctamente.

<button type="button"
class="btn-close"
data-bs-dismiss="alert">
</button>

</div>

<?php endif; ?>

<?php
// ==========================
// FORMULARIO PERFIL EMPRESA
// ==========================
?>

<div class="card shadow">

<div class="card-body">

<h3 class="mb-4">
🏢 Información de la empresa
</h3>

<form method="POST"
action="/EmpleoLocal/public/empresa.php?action=actualizarPerfil">

<?php
// ==========================
// INFORMACIÓN GENERAL
// ==========================
?>

<div class="mb-3">

<label class="form-label">
Nombre de la empresa
</label>

<input type="text"
class="form-control"
name="nombre_empresa"
value="<?= htmlspecialchars($empresa["nombre_empresa"]); ?>"
required>

</div>

<div class="mb-3">

<label class="form-label">
Descripción
</label>

<textarea
class="form-control"
rows="4"
name="descripcion"
required><?= htmlspecialchars($empresa["descripcion"]); ?></textarea>

</div>

<?php
// ==========================
// SECTOR Y UBICACIÓN
// ==========================
?>

<div class="row">

<div class="col-md-6 mb-3">

<label class="form-label">
Sector
</label>

<input type="text"
class="form-control"
name="sector"
value="<?= htmlspecialchars($empresa["sector"]); ?>">

</div>

<div class="col-md-6 mb-3">

<label class="form-label">
Ubicación
</label>

<input type="text"
class="form-control"
name="ubicacion"
value="<?= htmlspecialchars($empresa["ubicacion"]); ?>">

</div>

</div>

<?php
// ==========================
// CONTACTO
// ==========================
?>

<div class="row">

<div class="col-md-6 mb-3">

<label class="form-label">
Teléfono
</label>

<input type="text"
class="form-control"
name="telefono"
value="<?= htmlspecialchars($empresa["telefono"]); ?>">

</div>

<div class="col-md-6 mb-3">

<label class="form-label">
Sitio web
</label>

<input type="text"
class="form-control"
name="sitio_web"
value="<?= htmlspecialchars($empresa["sitio_web"]); ?>">

</div>

</div>

<?php
// ==========================
// BOTONES
// ==========================
?>

<div class="d-flex justify-content-between">

<a href="/EmpleoLocal/public/empresa.php?action=dashboard"
class="btn btn-secondary">

← Volver al panel

</a>

<button type="submit"
class="btn btn-success">

Guardar cambios

</button>

</div>

</form>

</div>

</div>

</div>

<?php

// ==========================
// FOOTER
// ==========================

require_once __DIR__."/../layouts/footer.php";

?>