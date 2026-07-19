<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php

// Página principal index
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Redireccionar usuario con sesión activa
if (isset($_SESSION["usuario"])) {
    switch ($_SESSION["usuario"]["id_rol"]) {
        case 1:
            header("Location: admin.php?action=dashboard");
            exit();
        case 2:
            header("Location: empresa.php?action=dashboard");
            exit();
        case 3:
            header("Location: candidato.php?action=dashboard");
            exit();
    }
}

// Cargar layout
require_once "../app/config/constants.php";
require_once "../views/layouts/header.php";

?>


<!-- Barra superior (login / registro rápido) -->
<div class="barra-acciones-top" id="barra-top">
    <div class="container d-flex justify-content-between align-items-center">

        <a href="<?= BASE_URL ?>/" class="marca">
            <img src="<?= BASE_URL ?>/img/logo.png" alt="IMPULSA">
            <span>IMPULSA</span>
        </a>

        <div class="d-flex gap-2">
            <a href="<?= BASE_URL ?>/login" class="btn btn-outline-dark btn-sm px-3">
                Iniciar sesión
            </a>
            <a href="<?= BASE_URL ?>/registro" class="btn btn-primary btn-sm px-3">
                Únete ahora
            </a>
        </div>

    </div>
</div>

<!-- 1. Hero -->
<section class="hero-inicio">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-6">
                <h1 class="mb-4">
                    Las oportunidades laborales<br>
                    empiezan <span class="subrayado">contigo</span>
                </h1>
                <p class="lead mb-4">
                    Como candidato en IMPULSA, explora vacantes de empresas reales,
                    crea tu perfil profesional y postúlate en minutos — o publica tus
                    propias ofertas si buscas talento para tu empresa.
                </p>
                <div class="d-flex gap-3 flex-wrap">
                    <a href="<?= BASE_URL ?>/registro" class="btn btn-primary btn-lg px-4">
                        Empieza ahora
                    </a>
                    <a href="#caminos" class="btn btn-outline-dark btn-lg px-4">
                        Ver cómo funciona
                    </a>
                </div>
            </div>

            <div class="col-lg-6 text-center mt-5 mt-lg-0">
                <img src="<?= BASE_URL ?>/img/Busca_Ofrece_limpio.png" alt="IMPULSA" style="max-width:320px;width:100%;">
            </div>

        </div>
    </div>
</section>


<!-- 2. Sección de valor -->
<section class="seccion-valor">
    <div class="container">
        <div class="row align-items-center g-5">

            <div class="col-lg-6">
                <h2 class="mb-3">Empleo centralizado, sin complicaciones</h2>
                <p class="text-muted" style="font-size:1.05rem;line-height:1.8;">
                    Publica o encuentra oportunidades laborales desde un solo lugar.
                    Sin redes sociales dispersas, sin publicaciones informales:
                    todo el proceso de contratación en una sola plataforma pensada
                    para empresas y candidatos costarricenses.
                </p>
            </div>

            <div class="col-lg-6">
                <div class="row g-3">
                    <div class="col-6">
                        <div class="p-4 bg-light rounded-4 text-center">
                            <div class="fs-2 fw-bold text-primary">100%</div>
                            <div class="text-muted small">Gratis para candidatos</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-4 bg-light rounded-4 text-center">
                            <div class="fs-2 fw-bold text-success">1 clic</div>
                            <div class="text-muted small">Para postularte</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- 3. Beneficios -->
<section class="seccion-beneficios">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">¿Por qué usar IMPULSA?</h2>
            <p class="text-muted">Todo lo que necesitas para conectar talento con oportunidades</p>
        </div>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="tarjeta-beneficio">
                    <div class="icono-circulo">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none"
                            stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                        </svg>
                    </div>
                    <h5 class="fw-bold mb-2">Conecta con empresas reales</h5>
                    <p class="text-muted mb-0">
                        Explora vacantes publicadas directamente por empresas
                        costarricenses en búsqueda de talento.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="tarjeta-beneficio">
                    <div class="icono-circulo">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none"
                            stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                            <polyline points="14 2 14 8 20 8" />
                            <line x1="16" y1="13" x2="8" y2="13" />
                            <line x1="16" y1="17" x2="8" y2="17" />
                        </svg>
                    </div>
                    <h5 class="fw-bold mb-2">Perfil profesional centralizado</h5>
                    <p class="text-muted mb-0">
                        Carga tu currículum una sola vez y postúlate a múltiples
                        ofertas desde tu panel de candidato.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="tarjeta-beneficio">
                    <div class="icono-circulo">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none"
                            stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                            <polyline points="22 4 12 14.01 9 11.01" />
                        </svg>
                    </div>
                    <h5 class="fw-bold mb-2">Postulación en un clic</h5>
                    <p class="text-muted mb-0">
                        Sin formularios repetidos ni correos perdidos: postúlate
                        y da seguimiento al estado de tu aplicación en tiempo real.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- 4. Elige tu camino -->
<section class="seccion-caminos" id="caminos">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">Elige tu camino</h2>
            <p class="text-muted">Dos formas de aprovechar la plataforma</p>
        </div>

        <div class="row g-4 justify-content-center">

            <div class="col-md-5">
                <div class="tarjeta-camino">
                    <div class="icono-circulo">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                            <circle cx="12" cy="7" r="4" />
                        </svg>
                    </div>
                    <h5 class="fw-bold mb-2">Soy candidato</h5>
                    <p class="text-muted mb-3">
                        Crea tu perfil, sube tu currículum en PDF y explora ofertas
                        laborales según tu experiencia y ubicación.
                    </p>
                    <a href="<?= BASE_URL ?>/registro" class="btn btn-outline-primary">
                        Buscar empleo →
                    </a>
                </div>
            </div>

            <div class="col-md-5">
                <div class="tarjeta-camino">
                    <div class="icono-circulo">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="7" width="20" height="14" rx="2" />
                            <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16" />
                        </svg>
                    </div>
                    <h5 class="fw-bold mb-2">Soy empresa</h5>
                    <p class="text-muted mb-3">
                        Publica tus vacantes, revisa candidatos postulados y
                        gestiona tu proceso de selección desde un solo panel.
                    </p>
                    <a href="<?= BASE_URL ?>/registro" class="btn btn-outline-primary">
                        Publicar vacante →
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- 5. Testimonio -->
<section class="seccion-testimonio">
    <div class="container">
        <blockquote>
            "Registrarme fue rápido y en el mismo día ya tenía mi perfil listo
            para postularme. Se siente mucho más ordenado que buscar
            en redes sociales."
        </blockquote>
        <p class="autor mb-0">— Usuario candidato, comunidad IMPULSA</p>
    </div>
</section>


<!-- 6. CTA final -->
<section class="seccion-cta-final">
    <div class="container">
        <h2 class="mb-3">¿Listo para empezar?</h2>
        <p class="mb-4" style="opacity:.9;font-size:1.1rem;">
            Crea tu cuenta gratis y conecta con las oportunidades que mereces.
        </p>
        <a href="<?= BASE_URL ?>/registro" class="btn btn-light btn-lg">
            Crear cuenta gratis
        </a>
    </div>
</section>

<script src="<?= BASE_URL ?>/js/inicio.js"></script>

<?php require_once "../views/layouts/footer.php"; ?>