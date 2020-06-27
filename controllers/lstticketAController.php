<?php
include('models/Class.Consulta.php');
$datoA = new Admin($_GET["Id"]);
$lstticketsA = $datoA->lst_ticketsA($_GET["Id"]);
$lstestatusA = $datoA->get_estatusA($_GET["Id"]);
$lstticketServicesA = $datoA->get_servicioA($_GET["Id"]);
$NumBo1 = $datoA ->  get_1A();
$NumBo3 = $datoA ->  get_3A();
$NumBo4 = $datoA ->  get_4A();
$datet = $datoA ->  ticketdate();

$lstticketA = $datoA->lst_ticketsADate($_GET["Id"],$_GET["Est"]);
$lstestatusAD = $datoA->get_estatusAD($_GET["Id"],$_GET["Est"]);
$lstticketServicesAD = $datoA->get_servicioAD($_GET["Id"],$_GET["Est"]);
$NumBo1DA = $datoA ->  get_1D($_GET["Id"]);
$NumBo3DA = $datoA ->  get_3D($_GET["Id"]);
$NumBo4DA = $datoA ->  get_4D($_GET["Id"]);

require_once 'view/public/lstticketA.php';
?>
