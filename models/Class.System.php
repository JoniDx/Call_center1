<?php
session_start();
class Conexion extends mysqli{
  public function __construct()  {
    parent::__construct('localhost','root','','call_center');
    $this->query("SET NAMES utf8;");
    $this->connect_errno ? die('ERROR: Conexión en la base de datos fallida.') : null;
  }

  public function rows($x){
    return mysqli_num_rows($x);
  }

  public function recorrer($x){
    return mysqli_fetch_array($x);
  }

  public function liberar($x){
    return mysqli_free_result($x);
  }

}

?>
