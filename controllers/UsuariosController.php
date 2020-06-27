<?php
include('models/Class.Consulta.php');
$Usuario = new Usuario();
$lstusers = $Usuario->get_usuarios($_GET["Id"]);
$NumBo2 = $Usuario ->  get_1();
$NumBo4 = $Usuario ->  get_3();
$NumBo5 = $Usuario ->  get_2();

require_once 'view/public/Usuarios.php';
?>
