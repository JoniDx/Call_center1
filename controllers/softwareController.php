<?php
include('models/Class.Consulta.php');
$datos = new Ticket();
$lstservicios = $datos->get_servicios();


require_once 'view/public/software.php';
?>
