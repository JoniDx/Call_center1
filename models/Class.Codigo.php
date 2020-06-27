<?php
class Codigo
{

  function Random()
  {
    date_default_timezone_set('America/Mexico_City');
    rand(0,500);
    $time = date('YndHis',time());
    $hora = 'MWC'.($time * rand());
    return $hora;
  }

  function generarCodigo($longitud) {
    $db = new Conexion();
    date_default_timezone_set('America/Mexico_City');
    $id=$_SESSION["IdUsuario"];
    $sql = $db->query("SELECT * FROM tblp_usuarios WHERE tblp_usuarios.IdUsuario = '$id'");
    $datos = $db->recorrer($sql);
    $key = '';
    $time = date('YndHis',time());
    $N = substr($datos['Nombre'], 0,1);
    $P = substr($datos['APaterno'], 0,1);
    $M = substr($datos['AMaterno'], 0,1);
    $pattern = $time.$N.$P.$M;
    $max = strlen($pattern)-1;
    for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
    return $key;
  }
}

 ?>
