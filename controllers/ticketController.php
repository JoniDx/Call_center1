<?php
$men1 = 1;
include('models/Class.Consulta.php');
$ticket = new Ticket();
$lstservicios = $ticket->get_servicio();
$lstticket = $ticket->lst_ticket();


include('models/Class.Archivos.php');
$file = new Files();
require_once 'view/public/ticket.php';
?>
