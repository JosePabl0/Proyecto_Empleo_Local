<?php
// DASHBOARD ADMINISTRADOR
require_once __DIR__ . "/../layouts/header.php";
require_once __DIR__ . "/../layouts/navbar.php";
?>

<div class="container mt-4 espacio-antes-footer">

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

                    <div class="icono-dashboard mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24"
                             fill="none" stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                        </svg>
                    </div>

                    <h5 class="card-title">
                        Usuarios
                    </h5>

                    <h2 class="mt-2">
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

                    <div class="icono-dashboard mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24"
                             fill="none" stroke="#16a34a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="7" width="20" height="14" rx="2"/>
                            <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>
                        </svg>
                    </div>

                    <h5 class="card-title">
                        Empresas
                    </h5>

                    <h2 class="mt-2">
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

                    <div class="icono-dashboard mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24"
                             fill="none" stroke="#f59e0b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                            <circle cx="12" cy="7" r="4"/>
                        </svg>
                    </div>

                    <h5 class="card-title">
                        Candidatos
                    </h5>

                    <h2 class="mt-2">
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

                <a href="<?= BASE_URL ?>/admin/usuarios" class="btn btn-primary">
                    Gestionar usuarios
                </a>

                <a href="<?= BASE_URL ?>/admin/empresas" class="btn btn-secondary">
                    Gestionar empresas
                </a>

                <a href="<?= BASE_URL ?>/admin/reportes" class="btn btn-outline-primary">
                    Ver reportes
                </a>

            </div>

        </div>

    </div>

</div>

<?php
// FOOTER
require_once __DIR__ . "/../layouts/footer.php";
?>