<?php
// ==========================
// LAYOUTS
// ==========================

require_once __DIR__ . "/../layouts/header.php";
require_once __DIR__ . "/../layouts/navbar.php";
?>

<!-- ==========================
     CONTENIDO PRINCIPAL
========================== -->

<div class="container mt-5">

<!-- ENCABEZADO -->

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2>
            Usuarios registrados
        </h2>

        <p class="text-muted mb-0">
            Administración de las cuentas registradas en IMPULSA.
        </p>

    </div>

    <a
        href="<?= BASE_URL ?>/admin.php?action=dashboard"
        class="btn btn-outline-secondary"
    >
        ← Volver al panel
    </a>

</div>


<!-- TABLA DE USUARIOS -->

<div class="card shadow">

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead>

                    <tr>

                        <th>Nombre</th>

                        <th>Correo</th>

                        <th>Rol</th>

                        <th>Estado</th>

                        <th class="text-center">Acciones</th>

                    </tr>

                </thead>

                <tbody>

                    <?php if(!empty($usuarios)): ?>

                        <?php foreach($usuarios as $usuario): ?>

                            <tr>

                                <td>
                                    <?= htmlspecialchars($usuario["nombre"]) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($usuario["correo"]) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($usuario["rol"]) ?>
                                </td>

                                <td>

                                    <?php if($usuario["estado"]==1): ?>

                                        <span class="badge bg-success">
                                            Activo
                                        </span>

                                    <?php else: ?>

                                        <span class="badge bg-danger">
                                            Bloqueado
                                        </span>

                                    <?php endif; ?>

                                </td>

                                <td class="text-center">

                                    <?php if($usuario["rol"]=="Administrador"): ?>

                                        <span class="text-muted">
                                            Cuenta protegida
                                        </span>

                                    <?php else: ?>

                                        <!-- VER PERFIL -->

                                        <a
                                            href="<?= BASE_URL ?>/admin.php?action=perfilUsuario&id=<?= $usuario["id_usuario"] ?>"
                                            class="btn btn-primary btn-sm me-1"
                                        >
                                            👤 Ver perfil
                                        </a>


                                        <!-- BLOQUEAR / DESBLOQUEAR -->

                                        <?php if($usuario["estado"]==1): ?>

                                            <form
                                                action="<?= BASE_URL ?>/admin.php?action=bloquear"
                                                method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('¿Está seguro de bloquear esta cuenta?');"
                                            >

                                                <input
                                                    type="hidden"
                                                    name="id_usuario"
                                                    value="<?= $usuario["id_usuario"] ?>"
                                                >

                                                <button
                                                    type="submit"
                                                    class="btn btn-warning btn-sm"
                                                >
                                                    🔒 Bloquear
                                                </button>

                                            </form>

                                        <?php else: ?>

                                            <form
                                                action="<?= BASE_URL ?>/admin.php?action=desbloquear"
                                                method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('¿Desea desbloquear esta cuenta?');"
                                            >

                                                <input
                                                    type="hidden"
                                                    name="id_usuario"
                                                    value="<?= $usuario["id_usuario"] ?>"
                                                >

                                                <button
                                                    type="submit"
                                                    class="btn btn-success btn-sm"
                                                >
                                                    🔓 Desbloquear
                                                </button>

                                            </form>

                                        <?php endif; ?>

                                    <?php endif; ?>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>

                            <td
                                colspan="5"
                                class="text-center text-muted py-4"
                            >
                                No hay usuarios registrados.
                            </td>

                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

</div>

<!-- ==========================
     FOOTER
========================== -->
<?php require_once __DIR__ . "/../layouts/footer.php"; ?>
