<?php
// VISTA LOGIN
require_once __DIR__ . "/../layouts/header.php";
require_once __DIR__ . "/../layouts/navbar.php";

?>

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-5">

            <div class="card shadow">

                <div class="card-body">

                    <h3 class="text-center mb-4">
                        Iniciar sesión
                    </h3>

                    <form method="POST">

                        <div class="mb-3">

                            <label>
                                Correo
                            </label>

                            <input type="email" name="correo" class="form-control" required>

                        </div>

                        <div class="mb-3">

                            <label>
                                Contraseña
                            </label>

                            <input type="password" name="password" class="form-control" required>

                        </div>

                        <button class="btn btn-primary w-100">
                            Ingresar
                        </button>

                        <div class="text-center mt-3">

                            <p class="mb-0">
                                ¿No tienes una cuenta?
                                <a href="<?= BASE_URL ?>/registro.php">
                                    Regístrate aquí
                                </a>
                            </p>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<?php
// FOOTER
require_once __DIR__ . "/../layouts/footer.php";
?>