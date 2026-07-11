<?php

// ==========================
// LAYOUTS
// ==========================

require_once __DIR__."/../layouts/header.php";
require_once __DIR__."/../layouts/navbar.php";

?>

<div class="container mt-5">

<div class="card shadow">

<div class="card-body">

<?php
// ==========================
// TÍTULO
// ==========================
?>

<h3 class="mb-4">✏️ Editar oferta laboral</h3>

<?php
// ==========================
// FORMULARIO EDITAR OFERTA
// ==========================
?>

<form method="POST" action="/EmpleoLocal/public/empresa.php?action=editarOferta">

<?php
// ==========================
// ID OFERTA
// ==========================
?>

<input type="hidden" name="id_oferta" value="<?= $oferta["id_oferta"]; ?>">

<?php
// ==========================
// INFORMACIÓN BÁSICA
// ==========================
?>

<div class="mb-3">

<label class="form-label">
Título
</label>

<input type="text"
class="form-control"
name="titulo"
value="<?= htmlspecialchars($oferta["titulo"]); ?>"
maxlength="150"
required>

</div>

<div class="mb-3">

<label class="form-label">
Descripción
</label>

<textarea
class="form-control"
name="descripcion"
rows="4"
required><?= htmlspecialchars($oferta["descripcion"]); ?></textarea>

</div>

<div class="mb-3">

<label class="form-label">
Requisitos
</label>

<textarea
class="form-control"
name="requisitos"
rows="4"><?= htmlspecialchars($oferta["requisitos"]); ?></textarea>

</div>

<?php
// ==========================
// SALARIO Y MODALIDAD
// ==========================
?>

<div class="row">

<div class="col-md-6 mb-3">

<label class="form-label">
Salario
</label>

<input type="number"
class="form-control"
name="salario"
value="<?= $oferta["salario"]; ?>"
min="0"
step="0.01">

</div>

<div class="col-md-6 mb-3">

<label class="form-label">
Modalidad
</label>

<select class="form-select" name="modalidad">

<option value="Presencial" <?= $oferta["modalidad"]=="Presencial" ? "selected" : ""; ?>>
Presencial
</option>

<option value="Remoto" <?= $oferta["modalidad"]=="Remoto" ? "selected" : ""; ?>>
Remoto
</option>

<option value="Hibrido" <?= $oferta["modalidad"]=="Hibrido" ? "selected" : ""; ?>>
Híbrido
</option>

</select>

</div>

</div>

<?php
// ==========================
// UBICACIÓN
// ==========================
?>

<div class="mb-3">

<label class="form-label">
Ubicación
</label>

<input type="text"
class="form-control"
name="ubicacion"
value="<?= htmlspecialchars($oferta["ubicacion"]); ?>"
required>

</div>

<?php
// ==========================
// CATEGORÍA
// ==========================
?>

<div class="mb-4">

<label class="form-label">
Categoría
</label>

<select class="form-select" name="categoria">

<option value="1" <?= $oferta["id_categoria"]==1 ? "selected" : ""; ?>>
Tecnología
</option>

<option value="2" <?= $oferta["id_categoria"]==2 ? "selected" : ""; ?>>
Administración
</option>

<option value="3" <?= $oferta["id_categoria"]==3 ? "selected" : ""; ?>>
Ventas
</option>

<option value="4" <?= $oferta["id_categoria"]==4 ? "selected" : ""; ?>>
Diseño
</option>

<option value="5" <?= $oferta["id_categoria"]==5 ? "selected" : ""; ?>>
Educación
</option>

<option value="6" <?= $oferta["id_categoria"]==6 ? "selected" : ""; ?>>
Marketing
</option>

<option value="7" <?= $oferta["id_categoria"]==7 ? "selected" : ""; ?>>
Servicio al cliente
</option>

</select>

</div>

<?php
// ==========================
// BOTONES
// ==========================
?>

<div class="d-flex justify-content-between">

<a href="/EmpleoLocal/public/empresa.php?action=misOfertas"
class="btn btn-secondary">

← Volver

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