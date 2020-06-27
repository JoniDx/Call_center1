<?php
// session_start();
$view = isset($_GET['mwc']) ? $_GET['mwc'] : 'index';
require_once 'models/Class.System.php';
if(file_exists('controllers/'.$view.'Controller.php')){
	include('controllers/'.$view.'Controller.php');
}else{
//  include('controllers/errorController.php');
}
?>
