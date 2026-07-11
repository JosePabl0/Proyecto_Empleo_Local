<?php
// PAGINA PRINCIPAL INDEX
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

// REDIRECCIONAR USUARIO CON SESION ACTIVA
if(isset($_SESSION["usuario"])){

    switch($_SESSION["usuario"]["id_rol"]){

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

// CARGAR LAYOUT
require_once "../views/layouts/header.php";
require_once "../views/layouts/navbar.php";

?>

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-8 text-center">

            <div class="card shadow p-5">

                <img
                src="<?= BASE_URL ?>/img/logo.png"
                alt="IMPULSA"
                class="logo-index mb-4">

                <h1 class="display-4">
                    Bienvenido a IMPULSA
                </h1>

                <p class="lead mt-3">
                    La plataforma que conecta talento con oportunidades laborales.
                    Encuentra empleos, publica vacantes y construye nuevas oportunidades.
                </p>

                <a href="<?= BASE_URL ?>/login.php"
                class="btn btn-primary btn-lg mt-4">
                    Empezar
                </a>

            </div>

        </div>

    </div>

</div>

<?php require_once "../views/layouts/footer.php"; ?>