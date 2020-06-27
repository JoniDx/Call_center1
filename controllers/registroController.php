<?php
$men1 = 1;

include('models/Class.Consulta.php');
$Estado = new Ciudad();
$lstestado = $Estado->get_estados();
// $lstmunicipio = $Estado->get_municipio();

require_once 'view/public/registro.php';
unset($_SESSION["Alerta"]);
?>
