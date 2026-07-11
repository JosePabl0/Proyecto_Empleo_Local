<?php
// BUSCAR EMPLEO CANDIDATO
require_once "../layouts/header.php";
require_once "../layouts/navbar.php";

?>

<div class="container mt-5">

<h2>
Buscar empleo
</h2>

<div class="row mt-4">

<?php for($i=1;$i<=6;$i++){ ?>

<div class="col-md-4 mb-4">

<div class="card shadow">

<div class="card-body">

<h5>
Programador Web Junior
</h5>

<p>
PHP - MySQL - JavaScript
</p>

<p>
Modalidad: Remoto
</p>

<button class="btn btn-primary">
Postular
</button>

<button class="btn btn-outline-danger">
♡ Favorito
</button>

</div>

</div>

</div>

<?php } ?>

</div>

</div>

<?php
// FOOTER
require_once "../layouts/footer.php";
?>