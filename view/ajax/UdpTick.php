<?php
$db = new Conexion();
$session =$_SESSION["IdUsuario"];
$sql = $db->query("SELECT * FROM tblp_ticket WHERE ((TIMEDIFF (NOW(),tblp_ticket.FecComplet)) > '08:00:00' AND Prioridad =1 AND Estatus = 1) AND (Encargado = '$session' OR IdUser = '$session' )") ;

while($w = $db->recorrer($sql)){
  $IDTK = $w['IdTicket'];
  $insertar = $db->query("UPDATE tblp_ticket SET tblp_ticket.Estatus = '4' WHERE tblp_ticket.IdTicket = '$IDTK' AND tblp_ticket.Reset <= '0' ");

}

$sql1 = $db->query("SELECT *  FROM tblp_ticket WHERE ((TIMEDIFF (NOW(),tblp_ticket.FecComplet)) > '24:00:00' AND Prioridad =2 AND Estatus = 1) AND (Encargado = '$session' OR IdUser = '$session' )");

while($w = $db->recorrer($sql1)){
  $IDTK = $w['IdTicket'];

  $insertar = $db->query("UPDATE tblp_ticket SET tblp_ticket.Estatus = '4' WHERE tblp_ticket.IdTicket = '$IDTK' AND tblp_ticket.Reset <= '0' ");
}

$sql2 = $db->query("SELECT *  FROM tblp_ticket WHERE((TIMEDIFF (NOW(),tblp_ticket.FecComplet)) > '72:00:00' AND Prioridad =3 AND Estatus = 1) AND (Encargado = '$session' OR IdUser = '$session' )");

while($w = $db->recorrer($sql2)){
  $IDTK = $w['IdTicket'];
  $insertar = $db->query("UPDATE tblp_ticket SET tblp_ticket.Estatus = '4' WHERE tblp_ticket.IdTicket = '$IDTK' AND tblp_ticket.Reset <= '0' ");
}

// Retrasos
$sql6 = $db->query("SELECT * FROM tblp_ticket WHERE ((TIMEDIFF (NOW(),tblp_ticket.FecRest)) > '08:00:00' AND Prioridad =1 AND Estatus = 1) AND (Encargado = '$session' OR IdUser = '$session' )") ;

while($w = $db->recorrer($sql6)){
  $IDTK = $w['IdTicket'];
  $insertar = $db->query("UPDATE tblp_ticket SET tblp_ticket.Estatus = '4' WHERE tblp_ticket.IdTicket = '$IDTK' AND tblp_ticket.Reset > '0' ");

}

$sql7 = $db->query("SELECT *  FROM tblp_ticket WHERE ((TIMEDIFF (NOW(),tblp_ticket.FecRest)) > '24:00:00' AND Prioridad =2 AND Estatus = 1) AND (Encargado = '$session' OR IdUser = '$session' )");

while($w = $db->recorrer($sql7)){
  $IDTK = $w['IdTicket'];

  $insertar = $db->query("UPDATE tblp_ticket SET tblp_ticket.Estatus = '4' WHERE tblp_ticket.IdTicket = '$IDTK' AND tblp_ticket.Reset > '0' ");
}

$sql8 = $db->query("SELECT *  FROM tblp_ticket WHERE((TIMEDIFF (NOW(),tblp_ticket.FecRest)) > '72:00:00' AND Prioridad =3 AND Estatus = 1) AND (Encargado = '$session' OR IdUser = '$session' )");

while($w = $db->recorrer($sql8)){
  $IDTK = $w['IdTicket'];
  $insertar = $db->query("UPDATE tblp_ticket SET tblp_ticket.Estatus = '4' WHERE tblp_ticket.IdTicket = '$IDTK' AND tblp_ticket.Reset > '0' ");
}


$sql4 = $db->query("SELECT * FROM tblp_ticket WHERE (tblp_ticket.Estatus != '3')") ;
while ($w = $db->recorrer($sql4)){
  $IDTK = $w['IdTicket'];
  $sql5 = $db->query("SELECT TIMEDIFF (NOW(),tblp_ticket.FecComplet) AS Tim FROM tblp_ticket  WHERE (tblp_ticket.IdTicket = '$IDTK')") ;
  while($y = $db->recorrer($sql5)){
    $Time = $y['Tim'];
    $insertar = $db->query("UPDATE tblp_ticket SET tblp_ticket.Duracion = '$Time' WHERE tblp_ticket.IdTicket = '$IDTK' AND tblp_ticket.Reset <= '0' ");
  }
}



$sql3 = $db->query("SELECT COUNT(*) AS Atrasado FROM tblp_ticket WHERE Estatus = '4' AND (Encargado = '$session' OR IdUser = '$session' ) ");
$datos = $db->recorrer($sql3);

if ($datos[0][0]>'0' ) {
  $_SESSION['Alert'] = '1';
  $alert = "block";
}else {
  $_SESSION['Alert'] = '1';
  $alert = "none";
}



 ?>
