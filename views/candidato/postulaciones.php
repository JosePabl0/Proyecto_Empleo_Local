<?php

// ==========================
// LAYOUTS
// ==========================

require_once "../layouts/header.php";
require_once "../layouts/navbar.php";

?>

<!-- ==========================
     CONTENIDO PRINCIPAL
========================== -->

<div class="container mt-5">

<h2>
Mis postulaciones
</h2>

<table class="table table-striped mt-4">

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

</tr>


<!-- ==========================
     POSTULACIÓN 1
========================== -->

<tr>

<td>
Programador PHP
</td>

<td>
Empresa ABC
</td>

<td>

<span class="badge bg-warning">
Pendiente
</span>

</td>

</tr>


<!-- ==========================
     POSTULACIÓN 2
========================== -->

<tr>

<td>
Analista Junior
</td>

<td>
Data Solutions
</td>

<td>

<span class="badge bg-success">
Entrevista
</span>

</td>

</tr>


</table>

</div>


<?php

// ==========================
// FOOTER
// ==========================

require_once "../layouts/footer.php";

?>