<?php

include('models/Class.Consulta.php');
$datos = new Usuario();
$lstdatos = $datos->get_datosU($_GET["Id"]);
$Estado = new Ciudad();
$lstestado = $Estado->get_estados();

require_once 'view/public/UdpUser.php';
?>
