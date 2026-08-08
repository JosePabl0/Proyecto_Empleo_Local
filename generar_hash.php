<?php

// GENERADOR DE HASH PARA EL ADMINISTRADOR
// Este archivo genera el hash de la contraseña del administrador.
// 1. Ejecutar el proyecto en XAMPP como administrador.
// 2. Abrir: http://localhost/EmpleoLocal/generar_hash.php
// 3. Copiar el hash generado.
// 4. Colocar el hash en el INSERT del administrador dentro de empleolocal.sql.
// 5. en empleolocal.sql, reemplazar la contraseña del administrador con el hash  donde dice 'PEGAR_AQUI_HASH_GENERADO' .
$password = "12345";

$hash = password_hash($password, PASSWORD_DEFAULT);

echo "<h2>Hash generado</h2>";
echo "<p>Contraseña: 12345</p>";
echo "<p>Hash:</p>";
echo "<textarea rows='3' cols='100'>$hash</textarea>";

?>