<?php
// VISTA USUARIOS ADMIN
require_once "../layouts/header.php";
require_once "../layouts/navbar.php";

?>

<div class="container mt-5">

<h2>
Usuarios registrados
</h2>

<table class="table table-striped mt-4">

<thead>

<tr>

<th>
Nombre
</th>

<th>
Correo
</th>

<th>
Rol
</th>

<th>
Estado
</th>

<th>
Acciones
</th>

</tr>

</thead>

<tbody>

<tr>

<td>
Juan Pérez
</td>

<td>
juan@email.com
</td>

<td>
Candidato
</td>

<td>
Activo
</td>

<td>

<button class="btn btn-warning btn-sm">
Bloquear
</button>

</td>

</tr>

<tr>

<td>
Empresa ABC
</td>

<td>
contacto@empresa.com
</td>

<td>
Empresa
</td>

<td>
Activo
</td>

<td>

<button class="btn btn-warning btn-sm">
Bloquear
</button>

</td>

</tr>

</tbody>

</table>

</div>

<?php
// FOOTER
require_once "../layouts/footer.php";
?>