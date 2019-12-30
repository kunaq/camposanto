<?php
session_start();

require_once "extensiones/captcha/simple-php-captcha.php";
require_once "funciones.php";
require_once "controlador/plantilla.controlador.php";
require_once "controlador/empresa.controlador.php";
require_once "controlador/controlEmpresa.controlador.php";
require_once "modelo/empresa.modelo.php";
require_once "modelo/controlEmpresa.modelo.php";
// require_once "controlador/arbolVen.controlador.php";
// require_once "modelo/arbolVen.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();
?>
