<?php
include('models/Class.Consulta.php');
$datos = new Usuario();
$lstestatus = $datos->get_estatus();
$datoT = new Tickets();
$lsttickets = $datoT->lst_tickets();
$lstticketServices = $datoT->get_servicio();


$datosE = new Listas();
$lstticketService = $datosE->get_serviciou($_GET["Id"]);
$lstticketsE = $datosE->lst_ticket($_GET["Id"]);
$lstestatusE = $datosE->get_estatu($_GET["Id"]);
$NumBo2 = $datosE ->  get_12();
$NumBo5 = $datosE ->  get_4();
$NumBo4 = $datosE ->  get_3();

require_once 'view/public/lstticket.php';
?>
