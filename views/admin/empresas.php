<?php
// VISTA EMPRESAS ADMIN
require_once __DIR__ . "/../layouts/header.php";
require_once __DIR__ . "/../layouts/navbar.php";
?>

<div class="container mt-5 espacio-antes-footer">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2>Empresas registradas</h2>
            <p class="text-muted mb-0">Listado de todas las empresas en la plataforma.</p>
        </div>

        <a href="<?= BASE_URL ?>/admin/dashboard" class="btn btn-outline-secondary">
            ← Volver al panel
        </a>
    </div>

    <div class="row mt-4 g-4">

        <?php if (!empty($empresas)): ?>

            <?php foreach ($empresas as $empresa): ?>

                <div class="col-md-4">

                    <div class="card shadow h-100">

                        <div class="card-body">

                            <h5>
                                <?= htmlspecialchars($empresa["nombre_empresa"] ?? "Sin nombre") ?>
                            </h5>

                            <p class="mb-1">
                                Sector: <?= htmlspecialchars($empresa["sector"] ?? "No especificado") ?>
                            </p>

                            <p class="mb-3">
                                Ubicación: <?= htmlspecialchars($empresa["ubicacion"] ?? "No especificada") ?>
                            </p>

                            <span class="badge bg-primary mb-3">
                                <?= $empresa["total_ofertas"] ?? 0 ?> oferta(s) activa(s)
                            </span>

                        </div>

                    </div>

                </div>

            <?php endforeach; ?>

        <?php else: ?>

            <div class="col-12">
                <div class="alert alert-info mb-0">
                    No hay empresas registradas todavía.
                </div>
            </div>

        <?php endif; ?>

    </div>

</div>

<?php
// FOOTER
require_once __DIR__ . "/../layouts/footer.php";
?>