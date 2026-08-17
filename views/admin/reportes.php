<?php
// VISTA REPORTES ADMIN
require_once __DIR__ . "/../layouts/header.php";
require_once __DIR__ . "/../layouts/navbar.php";
?>

<div class="container mt-5 espacio-antes-footer">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2>Reportes del sistema</h2>
            <p class="text-muted mb-0">Estadísticas generales calculadas en tiempo real.</p>
        </div>

        <a href="<?= BASE_URL ?>/admin/dashboard" class="btn btn-outline-secondary">
            ← Volver al panel
        </a>
    </div>

    <div class="row g-4">

        <div class="col-md-6 col-lg-3">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <h2 class="text-primary"><?= $usuariosNuevosMes ?></h2>
                    <p class="text-muted mb-0">Usuarios nuevos este mes</p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <h2 class="text-success"><?= $ofertasPublicadas ?></h2>
                    <p class="text-muted mb-0">Ofertas publicadas (total)</p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <h2 class="text-warning"><?= $ofertasEsteMes ?></h2>
                    <p class="text-muted mb-0">Ofertas publicadas este mes</p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <h2 class="text-info"><?= $contrataciones ?></h2>
                    <p class="text-muted mb-0">Contrataciones realizadas</p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <h2><?= $totalPostulaciones ?></h2>
                    <p class="text-muted mb-0">Postulaciones totales</p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <h2><?= $empresasActivas ?></h2>
                    <p class="text-muted mb-0">Empresas con ofertas activas</p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <h2><?= $totalEmpresas ?></h2>
                    <p class="text-muted mb-0">Empresas registradas (total)</p>
                </div>
            </div>
        </div>

    </div>

</div>

<?php
// FOOTER
require_once __DIR__ . "/../layouts/footer.php";
?>