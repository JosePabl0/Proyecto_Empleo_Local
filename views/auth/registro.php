<?php
// VISTA REGISTRO USUARIO
require_once __DIR__ . "/../layouts/header.php";
require_once __DIR__ . "/../layouts/navbar.php";

?>

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-6">

<div class="card shadow">

<div class="card-body">

<h3 class="text-center">
Crear cuenta
</h3>

<form method="POST">

<div class="mb-3">

<label>
Nombre completo
</label>

<input
class="form-control"
name="nombre"
required>

</div>

<div class="mb-3">

<label>
Correo
</label>

<input
type="email"
class="form-control"
name="correo"
required>

</div>

<div class="mb-3">

<label>
Contraseña
</label>

<input
type="password"
class="form-control"
name="password"
required>

</div>

<div class="mb-3">

<label>
Tipo de usuario
</label>

<select
class="form-select"
name="id_rol">

<option value="3">
Candidato
</option>

<option value="2">
Empresa
</option>

</select>

</div>

<button
class="btn btn-success w-100">
Registrarse
</button>

<div class="text-center mt-3">

<p class="mb-0">
¿Ya tienes una cuenta?

<a href="<?= BASE_URL ?>/login.php">
Ingresa aquí
</a>

</p>

</div>

</form>

</div>

</div>

</div>

</div>

</div>

<?php
// FOOTER
require_once __DIR__ . "/../layouts/footer.php";
?>