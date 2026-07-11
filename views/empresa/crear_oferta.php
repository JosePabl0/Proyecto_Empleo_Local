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

<div class="card shadow">

<div class="card-body">


<!-- ==========================
     TÍTULO
========================== -->

<h3 class="mb-4">📄 Crear oferta laboral</h3>


<!-- ==========================
     FORMULARIO CREAR OFERTA
========================== -->

<form method="POST" action="/EmpleoLocal/public/empresa.php?action=crearOferta">


<!-- ==========================
     INFORMACIÓN BÁSICA
========================== -->

<div class="mb-3">

<label class="form-label">
Título del puesto
</label>

<input 
type="text" 
class="form-control" 
name="titulo" 
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
required></textarea>

</div>


<div class="mb-3">

<label class="form-label">
Requisitos
</label>

<textarea 
class="form-control" 
name="requisitos" 
rows="4"></textarea>

</div>


<!-- ==========================
     SALARIO Y MODALIDAD
========================== -->

<div class="row">

<div class="col-md-6 mb-3">

<label class="form-label">
Salario
</label>

<input 
type="number" 
class="form-control" 
name="salario" 
min="0" 
step="0.01">

</div>


<div class="col-md-6 mb-3">

<label class="form-label">
Modalidad
</label>

<select 
class="form-select" 
name="modalidad" 
required>

<option value="Presencial">
Presencial
</option>

<option value="Remoto">
Remoto
</option>

<option value="Hibrido">
Híbrido
</option>

</select>

</div>

</div>


<!-- ==========================
     UBICACIÓN
========================== -->

<div class="mb-3">

<label class="form-label">
Ubicación
</label>

<input 
type="text" 
class="form-control" 
name="ubicacion" 
placeholder="Ejemplo: Heredia, Costa Rica" 
required>

</div>


<!-- ==========================
     CATEGORÍA
========================== -->

<div class="mb-4">

<label class="form-label">
Categoría
</label>

<select 
class="form-select" 
name="categoria" 
required>

<option value="">
Seleccione una categoría
</option>

<option value="1">
Tecnología
</option>

<option value="2">
Administración
</option>

<option value="3">
Ventas
</option>

<option value="4">
Diseño
</option>

<option value="5">
Educación
</option>

<option value="6">
Marketing
</option>

<option value="7">
Servicio al cliente
</option>

</select>

</div>


<!-- ==========================
     BOTONES
========================== -->

<div class="d-flex justify-content-between">

<a href="/EmpleoLocal/public/empresa.php?action=dashboard" 
class="btn btn-secondary">

← Volver al panel

</a>

<button 
type="submit" 
class="btn btn-primary">

Publicar oferta

</button>

</div>


</form>

</div>

</div>

</div>


<!-- ==========================
     FOOTER
========================== -->

<?php require_once __DIR__."/../layouts/footer.php"; ?>