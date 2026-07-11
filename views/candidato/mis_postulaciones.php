<?php
// MIS POSTULACIONES CANDIDATO
require_once __DIR__."/../layouts/header.php";
require_once __DIR__."/../layouts/navbar.php";

?>

<div class="container mt-5">

<h2>
Mis postulaciones 📋
</h2>

<p class="text-muted">
Consulta el estado de tus solicitudes laborales.
</p>

<?php if(isset($_GET["cancelado"])): ?>

<div class="alert alert-success">
✔ Tu postulación fue cancelada correctamente.
</div>

<?php endif; ?>

<div class="card shadow">

<div class="card-body">

<?php if(count($postulaciones)>0): ?>

<div class="table-responsive">

<table class="table table-striped">

<thead>

<tr>

<th>
Oferta
</th>

<th>
Empresa
</th>

<th>
Estado
</th>

<th>
Fecha
</th>

<th>
Acciones
</th>

</tr>

</thead>

<tbody>

<?php foreach($postulaciones as $postulacion): ?>

<tr>

<td>
<?= htmlspecialchars($postulacion["titulo"]); ?>
</td>

<td>
<?= htmlspecialchars($postulacion["nombre_empresa"]); ?>
</td>

<td>

<?php

$estado=$postulacion["estado"];

if($estado=="Pendiente"){

    echo '<span class="badge bg-warning">
    Pendiente
    </span>';

}elseif($estado=="En revisión"){

    echo '<span class="badge bg-primary">
    En revisión
    </span>';

}elseif($estado=="Entrevista"){

    echo '<span class="badge bg-info">
    Entrevista
    </span>';

}elseif($estado=="Aceptado"){

    echo '<span class="badge bg-success">
    Aceptado
    </span>';

}elseif($estado=="Rechazado"){

    echo '<span class="badge bg-danger">
    Rechazado
    </span>';

}else{

    echo htmlspecialchars($estado);

}

?>

</td>

<td>

<?= date(
"d/m/Y",
strtotime($postulacion["fecha_postulacion"])
); ?>

</td>

<td>

<?php if($estado=="Pendiente"): ?>

<a
href="/EmpleoLocal/public/candidato.php?action=cancelarPostulacion&id=<?= $postulacion["id_postulacion"]; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('¿Deseas cancelar esta postulación?');">

Cancelar

</a>

<?php else: ?>

<span class="text-muted">
No disponible
</span>

<?php endif; ?>

</td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

</div>

<?php else: ?>

<div class="alert alert-info">

Todavía no has enviado ninguna postulación.

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