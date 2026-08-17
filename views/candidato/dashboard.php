<?php
// Dashboard del candidato
require_once __DIR__ . "/../layouts/header.php";
require_once __DIR__ . "/../layouts/navbar.php";
?>

<!-- Contenido principal -->
<div class="container mt-5 espacio-antes-footer">

    <?php if (isset($perfil)): ?>
        <!-- Información del candidato -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="d-flex align-items-center gap-2 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         fill="none" stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                    <h3 class="mb-0"><?= htmlspecialchars($usuario["nombre"]); ?></h3>
                </div>
                <p class="text-muted mb-3">
                    <?= !empty($perfil["descripcion"])
                        ? htmlspecialchars($perfil["descripcion"])
                        : "Completa tu perfil profesional para mejorar tus oportunidades laborales."; ?>
                </p>
                <a href="<?= BASE_URL ?>/candidato/perfil" class="btn btn-warning">Editar perfil</a>
            </div>
        </div>
    <?php endif; ?>

    <!-- Encabezado dashboard -->
    <div class="d-flex align-items-center gap-2 mb-1">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
             fill="none" stroke="#1e293b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
            <line x1="16" y1="2" x2="16" y2="6"/>
            <line x1="8" y1="2" x2="8" y2="6"/>
            <line x1="3" y1="10" x2="21" y2="10"/>
        </svg>
        <h2 class="mb-0">Panel del Candidato</h2>
    </div>
    <p class="text-muted">Encuentra oportunidades laborales y administra tus postulaciones.</p>

    <!-- Acciones del candidato -->
    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card shadow text-center">
                <div class="card-body">
                    <div class="icono-dashboard mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                             fill="none" stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="7" width="20" height="14" rx="2"/>
                            <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>
                        </svg>
                    </div>
                    <h5>Buscar empleo</h5>
                    <p>Explora las ofertas disponibles.</p>
                    <a href="<?= BASE_URL ?>/candidato/explorar" class="btn btn-primary">Explorar</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow text-center">
                <div class="card-body">
                    <div class="icono-dashboard mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                             fill="none" stroke="#16a34a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                            <polyline points="22 4 12 14.01 9 11.01"/>
                        </svg>
                    </div>
                    <h5>Mis postulaciones</h5>
                    <p>Consulta el estado de tus solicitudes.</p>
                    <a href="<?= BASE_URL ?>/candidato/misPostulaciones" class="btn btn-success">Ver</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow text-center">
                <div class="card-body">
                    <div class="icono-dashboard mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                             fill="none" stroke="#1e293b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                            <circle cx="12" cy="7" r="4"/>
                        </svg>
                    </div>
                    <h5>Mi perfil</h5>
                    <p>Actualiza tu información profesional.</p>
                    <a href="<?= BASE_URL ?>/candidato/perfil" class="btn btn-dark">Perfil</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow text-center">
                <div class="card-body">
                    <div class="icono-dashboard mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                             fill="none" stroke="#64748b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                            <polyline points="14 2 14 8 20 8"/>
                            <line x1="16" y1="13" x2="8" y2="13"/>
                            <line x1="16" y1="17" x2="8" y2="17"/>
                        </svg>
                    </div>
                    <h5>Currículum</h5>
                    <p>Administra tu hoja de vida.</p>
                    <a href="<?= BASE_URL ?>/candidato/perfil" class="btn btn-secondary">Gestionar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Oportunidades laborales -->
    <div class="card shadow mt-5">
        <div class="card-body">
            <h4>Últimas oportunidades laborales</h4>
            <hr>

            <?php if (isset($ofertas) && count($ofertas) > 0): ?>
                <div class="list-group">
                    <?php foreach (array_slice($ofertas, 0, 5) as $oferta): ?>
                        <div class="list-group-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="mb-1"><?= htmlspecialchars($oferta["titulo"]); ?></h5>
                                    <p class="mb-1 text-muted"><?= htmlspecialchars($oferta["nombre_empresa"]); ?></p>
                                    <small><?= htmlspecialchars($oferta["ubicacion"]); ?> | <?= htmlspecialchars($oferta["modalidad"]); ?></small>
                                </div>
                                <a href="<?= BASE_URL ?>/candidato/detalleOferta?id=<?= $oferta["id_oferta"]; ?>"
                                   class="btn btn-outline-primary btn-sm">
                                    Ver oferta
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="alert alert-info mb-0">No hay ofertas publicadas por el momento.</div>
            <?php endif; ?>
        </div>
    </div>

</div>

<!-- Footer -->
<?php require_once __DIR__ . "/../layouts/footer.php"; ?>