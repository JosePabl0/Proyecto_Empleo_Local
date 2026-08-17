<div class="container-fluid px-4">

    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
        <div>
            <h2 class="mb-1">
                Perfil de usuario
            </h2>
            <p class="text-muted mb-0">
                Información del usuario seleccionado.
            </p>
        </div>

        <a
            href="<?= BASE_URL ?>/admin/usuarios"
            class="btn btn-outline-secondary"
        >
            ← Volver a usuarios
        </a>
    </div>

    <div class="card shadow border-0 mb-4 w-100">
        <div class="card-body">
            <h4 class="mb-4">
                👤 Información personal
            </h4>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <strong>Nombre</strong>
                    <p class="mb-0">
                        <?= htmlspecialchars(
                            $usuarioSeleccionado["nombre"] ?? "No especificado"
                        ) ?>
                    </p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Correo electrónico</strong>
                    <p class="mb-0">
                        <?= htmlspecialchars(
                            $usuarioSeleccionado["correo"] ?? "No especificado"
                        ) ?>
                    </p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Rol</strong>
                    <p class="mb-0">
                        <?php if(($usuarioSeleccionado["id_rol"] ?? 0) == 1): ?>
                            Administrador
                        <?php elseif(($usuarioSeleccionado["id_rol"] ?? 0) == 2): ?>
                            Empresa
                        <?php elseif(($usuarioSeleccionado["id_rol"] ?? 0) == 3): ?>
                            Candidato
                        <?php else: ?>
                            Desconocido
                        <?php endif; ?>
                    </p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Estado</strong>
                    <p class="mb-0">
                        <?php if(($usuarioSeleccionado["estado"] ?? 0) == 1): ?>
                            <span class="badge bg-success">
                                Activo
                            </span>
                        <?php else: ?>
                            <span class="badge bg-danger">
                                Bloqueado
                            </span>
                        <?php endif; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <?php if(($usuarioSeleccionado["id_rol"] ?? 0) == 3): ?>

        <?php if(isset($perfil) && $perfil): ?>

            <div class="card shadow border-0 mb-4 w-100">
                <div class="card-body">
                    <h4 class="mb-4">
                        👤 Perfil del candidato
                    </h4>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <strong>📍 Ubicación</strong>
                            <p class="mb-0">
                                <?= htmlspecialchars(
                                    $perfil["ubicacion"] ?? "No especificada"
                                ) ?>
                            </p>
                        </div>

                        <div class="col-md-6 mb-3">
                            <strong>🕐 Disponibilidad</strong>
                            <p class="mb-0">
                                <?= htmlspecialchars(
                                    $perfil["disponibilidad"] ?? "No especificada"
                                ) ?>
                            </p>
                        </div>

                        <div class="col-12 mb-3">
                            <strong>💼 Experiencia</strong>
                            <p class="mb-0">
                                <?= nl2br(
                                    htmlspecialchars(
                                        $perfil["experiencia"] ?? "No especificada"
                                    )
                                ) ?>
                            </p>
                        </div>

                        <div class="col-12 mb-3">
                            <strong>📝 Descripción</strong>
                            <p class="mb-0">
                                <?= nl2br(
                                    htmlspecialchars(
                                        $perfil["descripcion"] ?? "No especificada"
                                    )
                                ) ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow border-0 mb-4 w-100">
                <div class="card-body">
                    <h4 class="mb-3">
                        📄 Currículum
                    </h4>

                    <?php if(!empty($perfil["curriculum"])): ?>

                        <p class="text-muted">
                            El candidato tiene un currículum registrado.
                        </p>

                        <a
                            href="<?= BASE_URL ?>/uploads/curriculums/<?= rawurlencode(basename($perfil["curriculum"])) ?>"
                            class="btn btn-primary"
                            download
                        >
                            📥 Descargar currículum
                        </a>

                    <?php else: ?>

                        <p class="text-muted mb-0">
                            Este candidato no ha cargado un currículum.
                        </p>

                    <?php endif; ?>
                </div>
            </div>

            <div class="card shadow border-0 mb-5 w-100">
                <div class="card-body">
                    <h4 class="mb-4">
                        📋 Historial de postulaciones
                    </h4>

                    <?php if(!empty($postulaciones)): ?>

                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">

                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Empresa</th>
                                        <th>Puesto</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php foreach($postulaciones as $postulacion): ?>

                                        <tr>
                                            <td>
                                                <?php
                                                $fechaPostulacion = strtotime(
                                                    $postulacion["fecha_postulacion"]
                                                );

                                                echo date(
                                                    "d/m/Y",
                                                    $fechaPostulacion
                                                );
                                                ?>
                                            </td>

                                            <td>
                                                <?php
                                                echo date(
                                                    "h:i A",
                                                    $fechaPostulacion
                                                );
                                                ?>
                                            </td>

                                            <td>
                                                <?= htmlspecialchars(
                                                    $postulacion["nombre_empresa"] ?? "No especificada"
                                                ) ?>
                                            </td>

                                            <td>
                                                <?= htmlspecialchars(
                                                    $postulacion["titulo"] ?? "No especificado"
                                                ) ?>
                                            </td>

                                            <td>
                                                <?php
                                                $estado = strtolower(
                                                    $postulacion["estado"] ?? ""
                                                );
                                                ?>

                                                <?php if(
                                                    strpos($estado, "acept") !== false
                                                ): ?>

                                                    <span class="badge bg-success">
                                                        <?= htmlspecialchars(
                                                            $postulacion["estado"] ?? "Aceptado"
                                                        ) ?>
                                                    </span>

                                                <?php elseif(
                                                    strpos($estado, "rechaz") !== false
                                                ): ?>

                                                    <span class="badge bg-danger">
                                                        <?= htmlspecialchars(
                                                            $postulacion["estado"] ?? "Rechazado"
                                                        ) ?>
                                                    </span>

                                                <?php elseif(
                                                    strpos($estado, "pend") !== false ||
                                                    strpos($estado, "revision") !== false
                                                ): ?>

                                                    <span class="badge bg-warning text-dark">
                                                        <?= htmlspecialchars(
                                                            $postulacion["estado"] ?? "Pendiente"
                                                        ) ?>
                                                    </span>

                                                <?php else: ?>

                                                    <span class="badge bg-primary">
                                                        <?= htmlspecialchars(
                                                            $postulacion["estado"] ?? "Sin estado"
                                                        ) ?>
                                                    </span>

                                                <?php endif; ?>
                                            </td>
                                        </tr>

                                    <?php endforeach; ?>

                                </tbody>

                            </table>
                        </div>

                    <?php else: ?>

                        <div class="text-center py-4">
                            <p class="text-muted mb-0">
                                Este candidato todavía no ha realizado ninguna postulación.
                            </p>
                        </div>

                    <?php endif; ?>
                </div>
            </div>

        <?php else: ?>

            <div class="alert alert-warning">
                Este candidato todavía no tiene un perfil registrado.
            </div>

        <?php endif; ?>


    <?php elseif(($usuarioSeleccionado["id_rol"] ?? 0) == 2): ?>

        <?php if(isset($perfil) && $perfil): ?>

            <div class="card shadow border-0 mb-5 w-100">
                <div class="card-body">

                    <h4 class="mb-4">
                        🏢 Perfil de la empresa
                    </h4>

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <strong>Empresa</strong>
                            <p class="mb-0">
                                <?= htmlspecialchars(
                                    $perfil["nombre_empresa"] ?? "No especificada"
                                ) ?>
                            </p>
                        </div>

                        <div class="col-md-6 mb-3">
                            <strong>Sector</strong>
                            <p class="mb-0">
                                <?= htmlspecialchars(
                                    $perfil["sector"] ?? "No especificado"
                                ) ?>
                            </p>
                        </div>

                        <div class="col-md-6 mb-3">
                            <strong>📍 Ubicación</strong>
                            <p class="mb-0">
                                <?= htmlspecialchars(
                                    $perfil["ubicacion"] ?? "No especificada"
                                ) ?>
                            </p>
                        </div>

                        <div class="col-md-6 mb-3">
                            <strong>📞 Teléfono</strong>
                            <p class="mb-0">
                                <?= htmlspecialchars(
                                    $perfil["telefono"] ?? "No especificado"
                                ) ?>
                            </p>
                        </div>

                        <div class="col-12 mb-3">
                            <strong>📝 Descripción</strong>
                            <p class="mb-0">
                                <?= nl2br(
                                    htmlspecialchars(
                                        $perfil["descripcion"] ?? "No especificada"
                                    )
                                ) ?>
                            </p>
                        </div>

                        <div class="col-12">
                            <strong>🌐 Sitio web</strong>
                            <p class="mb-0">
                                <?= htmlspecialchars(
                                    $perfil["sitio_web"] ?? "No especificado"
                                ) ?>
                            </p>
                        </div>

                    </div>
                </div>
            </div>

        <?php else: ?>

            <div class="alert alert-warning mb-5">
                Esta empresa todavía no tiene un perfil registrado.
            </div>

        <?php endif; ?>


    <?php elseif(($usuarioSeleccionado["id_rol"] ?? 0) == 1): ?>

        <div class="card shadow border-0 mb-5 w-100">
            <div class="card-body">

                <h4 class="mb-3">
                    🔐 Cuenta de administrador
                </h4>

                <p class="text-muted mb-0">
                    Esta cuenta corresponde a un administrador
                    de la plataforma y no posee perfil de candidato
                    ni historial de postulaciones.
                </p>

            </div>
        </div>

    <?php endif; ?>

</div>