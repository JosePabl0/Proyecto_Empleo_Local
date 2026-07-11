<?php
// CERRAR SESION USUARIO
session_start();

session_destroy();

header(
    "Location: /EmpleoLocal/public/login.php"
);

exit();

?>