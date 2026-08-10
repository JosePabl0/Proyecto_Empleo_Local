<?php
// CONSTANTES GENERALES


// BASE_URL se calcula automáticamente según el dominio y la
// carpeta donde esté alojado el proyecto.


$protocol = (
    !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off'
    || $_SERVER['SERVER_PORT'] == 443
) ? "https://" : "http://";

$domainName = $_SERVER['HTTP_HOST'];

// Esta constante se calcula desde public/, 
$path = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
$path = str_replace('/public', '', $path);

define(
    "BASE_URL",
    $protocol . $domainName . $path . "/public"
);

define(
    "ASSETS_URL",
    $protocol . $domainName . $path . "/assets"
);

define(
    "APP_NAME",
    "EmpleoLocal"
);

define(
    "UPLOAD_PATH",
    __DIR__."/../../storage/uploads/"
);
?>