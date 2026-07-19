
<?php
// Detectar la página actual de forma confiable
$paginaActual = basename($_SERVER["SCRIPT_NAME"]);
$accionActual = $_GET["action"] ?? "";

// Páginas/acciones donde el footer se ve COMPLETO (grande)
// lo demás usa el footer compacto por defecto
$esInicio    = ($paginaActual === "index.php");
$esDashboard = in_array($paginaActual, ["candidato.php", "empresa.php"]) && $accionActual === "dashboard";

$footerCompacto = !($esInicio || $esDashboard);
?>
<!-- Footer principal -->
<footer class="footer-principal mt-auto <?= $footerCompacto ? 'footer-compacto' : '' ?>">

    <div class="container">

        <?php if (!$footerCompacto): ?>

        <!-- Versión completa (inicio y páginas internas) -->
        <div class="row gy-4">

            <div class="col-md-4">
                <h5 class="footer-logo">IMPULSA</h5>
                <p class="footer-desc">
                    Plataforma inteligente para la gestión de oportunidades laborales
                    entre empresas y candidatos.
                </p>

                <p class="footer-heading mt-3 mb-2">Síguenos</p>
                <div class="d-flex gap-2">

                    <a href="#" class="footer-red-social" aria-label="Facebook">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>
                        </svg>
                    </a>

                    <a href="#" class="footer-red-social" aria-label="Instagram">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="2" y="2" width="20" height="20" rx="5"/>
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>
                        </svg>
                    </a>

                    <a href="#" class="footer-red-social" aria-label="LinkedIn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/>
                            <rect x="2" y="9" width="4" height="12"/>
                            <circle cx="4" cy="4" r="2"/>
                        </svg>
                    </a>

                </div>
            </div>

            <div class="col-md-2 offset-md-2 text-md-start">
                <h6 class="footer-heading">Candidatos</h6>
                <ul class="footer-links">
                    <li><a href="<?= BASE_URL ?>/registro">Crear cuenta</a></li>
                    <li><a href="<?= BASE_URL ?>/login">Ingresar</a></li>
                    <li><a href="<?= BASE_URL ?>/candidato/explorar">Ver empleos</a></li>
                </ul>
            </div>

            <div class="col-md-2 text-md-start">
                <h6 class="footer-heading">Empresas</h6>
                <ul class="footer-links">
                    <li><a href="<?= BASE_URL ?>/registro">Registrar empresa</a></li>
                    <li><a href="<?= BASE_URL ?>/empresa/crearOferta">Publicar oferta</a></li>
                </ul>
            </div>

            <div class="col-md-2 text-md-start">
                <h6 class="footer-heading">Legal</h6>
                <ul class="footer-links">
                    <li><a href="#">Términos de uso</a></li>
                    <li><a href="#">Política de privacidad</a></li>
                    <li><a href="#">Ayuda y soporte</a></li>
                </ul>
            </div>

        </div>

        <hr class="footer-hr">

        <?php endif; ?>

        <!-- Linea inferior siempre visible, en ambas versiones -->
        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center gap-2">
            <p class="footer-copy mb-0">
                &copy; <?= date('Y') ?> IMPULSA &mdash; Sistema inteligente de oportunidades laborales
            </p>
            <?php if (!$footerCompacto): ?>
            <p class="footer-copy mb-0">
                Desarrollado en Fidélitas 
            </p>
            <?php endif; ?>
        </div>

    </div>

</footer>

<script src="<?= BASE_URL ?>/js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>