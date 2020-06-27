<?php
include('models/Class.Consulta.php');
$datoT = new Tickets($_GET["Id"]);
$lstticketsG = $datoT->lst_ticketsG($_GET["Id"]);
$lstestatusG = $datoT->get_estatusG($_GET["Id"]);
$lstticketServicesG = $datoT->get_servicioG($_GET["Id"]);
$NumBo2 = $datoT ->  get_1();
$NumBo4 = $datoT ->  get_3();
$NumBo5 = $datoT ->  get_4();

$datosd = new Date($_GET["Id"]);
$lstticketG = $datosd->lst_ticketsGDate($_GET["Id"],$_GET["Est"]);
$datet = $datosd ->  ticketdate();
$lstestatusGD = $datosd->get_estatusGD($_GET["Id"],$_GET["Est"]);
$lstticketServicesGD = $datosd->get_servicioGD($_GET["Id"],$_GET["Est"]);
$NumBo2D = $datosd ->  get_1D($_GET["Id"]);
$NumBo4D = $datosd ->  get_3D($_GET["Id"]);
$NumBo5D = $datosd ->  get_4D($_GET["Id"]);

require_once 'view/public/lstticketG.php';
?>
