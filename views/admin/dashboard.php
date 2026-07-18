<?php
// VISTA DASHBOARD ADMIN
require_once "../layouts/header.php";
require_once "../layouts/navbar.php";

?>

<div class="container mt-5">

    <h2>
        Panel Administrativo 🛠️
    </h2>

    <p class="text-muted">
        Control general de la plataforma EmpleoLocal.
    </p>

    <div class="row mt-4">

        <div class="col-md-3">

            <div class="card shadow text-center">

                <div class="card-body">

                    <h2>
                        250
                    </h2>

                    <p>
                        Usuarios registrados
                    </p>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card shadow text-center">

                <div class="card-body">

                    <h2>
                        120
                    </h2>

                    <p>
                        Candidatos
                    </p>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card shadow text-center">

                <div class="card-body">

                    <h2>
                        50
                    </h2>

                    <p>
                        Empresas
                    </p>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card shadow text-center">

                <div class="card-body">

                    <h2>
                        340
                    </h2>

                    <p>
                        Ofertas publicadas
                    </p>

                </div>

            </div>

        </div>

    </div>

    <hr class="my-5">

    <h3>
        Acciones administrativas
    </h3>

    <div class="row mt-4">

        <div class="col-md-4">

            <div class="card">

                <div class="card-body">

                    <h5>
                        Usuarios
                    </h5>

                    <p>
                        Gestionar cuentas del sistema.
                    </p>

                    <a href="usuarios.php" class="btn btn-primary">
                        Administrar
                    </a>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card">

                <div class="card-body">

                    <h5>
                        Empresas
                    </h5>

                    <p>
                        Revisar empresas registradas.
                    </p>

                    <a href="empresas.php" class="btn btn-success">
                        Ver empresas
                    </a>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card">

                <div class="card-body">

                    <h5>
                        Reportes
                    </h5>

                    <p>
                        Consultar estadísticas.
                    </p>

                    <a href="reportes.php" class="btn btn-dark">
                        Ver reportes
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

<?php
// FOOTER
require_once "../layouts/footer.php";
?>