<?php
// DASHBOARD ADMINISTRADOR
require_once __DIR__."/../layouts/header.php";
require_once __DIR__."/../layouts/navbar.php";
?>

<div class="container mt-4">

```
<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h1>Panel de Administración</h1>

        <p class="text-muted">
            Supervisión general de la plataforma IMPULSA.
        </p>
    </div>

</div>

<!-- ESTADISTICAS -->
<div class="row g-4 mb-4">

    <!-- USUARIOS -->
    <div class="col-md-4">

        <div class="card shadow-sm h-100">

            <div class="card-body">

                <h5 class="card-title">
                    👥 Usuarios
                </h5>

                <h2 class="mt-3">
                    <?= count($usuarios) ?>
                </h2>

                <p class="text-muted mb-0">
                    Usuarios registrados
                </p>

            </div>

        </div>

    </div>

    <!-- EMPRESAS -->
    <div class="col-md-4">

        <div class="card shadow-sm h-100">

            <div class="card-body">

                <h5 class="card-title">
                    🏢 Empresas
                </h5>

                <h2 class="mt-3">
                    <?= count($empresas) ?>
                </h2>

                <p class="text-muted mb-0">
                    Empresas registradas
                </p>

            </div>

        </div>

    </div>

    <!-- CANDIDATOS -->
    <div class="col-md-4">

        <div class="card shadow-sm h-100">

            <div class="card-body">

                <h5 class="card-title">
                    👤 Candidatos
                </h5>

                <h2 class="mt-3">
                    <?= count($candidatos) ?>
                </h2>

                <p class="text-muted mb-0">
                    Candidatos registrados
                </p>

            </div>

        </div>

    </div>

</div>

<!-- ACCIONES ADMINISTRATIVAS -->
<div class="card shadow-sm">

    <div class="card-body">

        <h4 class="mb-3">
            Administración
        </h4>

        <div class="d-flex gap-2 flex-wrap">

            <a
                href="<?= BASE_URL ?>/admin.php?action=usuarios"
                class="btn btn-primary"
            >
                👥 Gestionar usuarios
            </a>

            <a
                href="<?= BASE_URL ?>/admin.php?action=empresas"
                class="btn btn-secondary"
            >
                🏢 Gestionar empresas
            </a>

            <a
                href="<?= BASE_URL ?>/admin.php?action=reportes"
                class="btn btn-outline-primary"
            >
                📊 Ver reportes
            </a>

        </div>

    </div>

</div>
```

</div>

<?php
// FOOTER
require_once __DIR__."/../layouts/footer.php";
?>
