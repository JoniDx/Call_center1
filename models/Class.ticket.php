<?php

class Ticket
{
  public function get_servicios() {
    $db = new Conexion();
    $sql = $db->query("SELECT * FROM tblc_servicios ");
    while($x = $db->recorrer($sql)){
      $lstservi[] = $x;
    }
    return $lstservi;
  }
}


 ?>
