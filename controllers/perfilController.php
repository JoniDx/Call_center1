<?php

include('models/Class.Consulta.php');
$datos = new Usuario();
$lstdatos = $datos->get_datosU();
$lstestatus = $datos->get_estatus();
$lstestado = $datos->get_estados();
$lstmunicipio = $datos->get_municipio();
$datot = new TicketsP();
$lsttickets = $datot->lst_tickets();
require_once 'view/public/Perfil.php';
?>
