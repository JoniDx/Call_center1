<?php
// $iduser = $_SESSION["IdUsuario"];
class Ticket
{
  public function get_servicios() {
    $db = new Conexion();
    $sql = $db->query("SELECT * FROM tblc_servicios LIMIT 6");
    while($x = $db->recorrer($sql)){
      $lstservi[] = $x;
    }
    return $lstservi;
  }
  public function get_servicio() {
    $db = new Conexion();
    $sql = $db->query("SELECT * FROM tblc_servicios ");
    while($x = $db->recorrer($sql)){
      $lstservi[] = $x;
    }
    return $lstservi;
  }

  public function lst_ticket()
    {
      $ID = $_SESSION["IdUsuario"] ;
      $db = new Conexion();
      // $sesion ='1';
      $sql = $db->query("SELECT * FROM tblp_ticket WHERE  tblp_ticket.IdUser='$ID' ORDER BY tblp_ticket.FecCap  DESC LIMIT 0,5 ");
      while($x = $db->recorrer($sql)){
        $tickets[] = $x;
      }
     return $tickets;
    }






}

class Ciudad
{
  public function get_estados() {
    $db = new Conexion();
    $sql = $db->query("SELECT * FROM tblc_estados ");
    while($x = $db->recorrer($sql)){
      $lstestado[] = $x;
    }
    return $lstestado;
  }

  public function get_municipio() {
    $db = new Conexion();
    $sql = $db->query("SELECT * FROM tblc_municipio");
    while($x = $db->recorrer($sql)){
      $lstmunicipio[] = $x;
    }
    return $lstmunicipio;
  }

}

class Usuario
{
  public function get_estatus(){
    $db = new Conexion();
    $sesion = $_SESSION["IdUsuario"] ;
    $sql = $db->query("SELECT * FROM tblp_ticket WHERE tblp_ticket.IdUser = '$sesion'  ORDER BY tblp_ticket.Estatus ASC ");
    while($x = $db->recorrer($sql)){
      $Estatus[] = $x;
    }
    for ($i=0;$i< sizeof($Estatus);$i++) {
      $id=$Estatus[$i]["Estatus"];
      $sql = $db->query("SELECT * FROM tblc_estatus WHERE tblc_estatus.IdEstatus= '$id' ");
      while($x = $db->recorrer($sql)){
        $lstEstatus[] = $x;
      }
    }
    return $lstEstatus;
  }

  public function get_datosU() {
    $db = new Conexion();
    $ID = $_SESSION["IdUsuario"] ;
    $sql = $db->query("SELECT * FROM tblp_usuarios WHERE IdUsuario = '$ID'");
    $datos = $db->recorrer($sql);
    $_SESSION["Estado"] = $datos['IdEstado'];
    $_SESSION["Ciudad"] = $datos['IdCiudad'];
    $sql = $db->query("SELECT * FROM tblp_usuarios WHERE IdUsuario = '$ID'");
    while($x = $db->recorrer($sql)){
      $lstusuario[] = $x;
    }
    return $lstusuario;
  }
  public function get_estados() {
    $estado = $_SESSION["Estado"];
    $db = new Conexion();
    $sql = $db->query("SELECT * FROM tblc_estados WHERE IdEstado = '$estado'");
    while($x = $db->recorrer($sql)){
      $lstestado[] = $x;
    }
    return $lstestado;
  }
  public function get_municipio() {
    $ciudad = $_SESSION["Ciudad"];
    $db = new Conexion();
    $sql = $db->query("SELECT * FROM tblc_municipio WHERE IdMunicipio ='$ciudad'");
    while($x = $db->recorrer($sql)){
      $lstmunicipio[] = $x;
    }
    return $lstmunicipio;
  }

  public function get_usuarios($Id){
    $db = new Conexion();
    $sql = $db->query("SELECT * FROM tblp_usuarios WHERE tblp_usuarios.IdPermiso='$Id'");
    while($x = $db->recorrer($sql)){
      $lstuser[] = $x;
    }
    return $lstuser;
  }

  public function get_1()
  {
    $ID = $_SESSION["IdUsuario"] ;
    $db = new Conexion();
    $sql = $db->query("SELECT COUNT(*) FROM tblp_usuarios WHERE IdPermiso=0    ;");
    while($x = $db->recorrer($sql)){
     $NumB[] = $x;
    }
   return $NumB;
  }

  public function get_2()
  {
    $ID = $_SESSION["IdUsuario"] ;
    $db = new Conexion();
    $sql = $db->query("SELECT COUNT(*) FROM tblp_usuarios WHERE IdPermiso=2   ;");
    while($x = $db->recorrer($sql)){
      $NumB[] = $x;
    }
   return $NumB;
  }

  public function get_3()
  {
    $ID = $_SESSION["IdUsuario"] ;
    $db = new Conexion();
    $sql = $db->query("SELECT COUNT(*) FROM tblp_usuarios WHERE IdPermiso=3   ;");
    while($x = $db->recorrer($sql)){
      $NumB[] = $x;
    }
   return $NumB;
  }




}

class TicketsP
{
  public function lst_tickets()
    {
      $ID = $_SESSION["IdUsuario"] ;
      $db = new Conexion();
      // $sesion ='1';
      $sql = $db->query("SELECT * FROM tblp_ticket WHERE tblp_ticket.IdUser='$ID' ORDER BY tblp_ticket.Estatus ASC   ");
      while($x = $db->recorrer($sql)){
        $tickets[] = $x;
      }
     return $tickets;
    }
}

class Tickets
{
  public function get_servicio(){
    $db = new Conexion();
    $sesion = $_SESSION["IdUsuario"] ;
    // $sesion ='1';
    $sql = $db->query("SELECT * FROM tblp_ticket WHERE tblp_ticket.IdUser='$sesion' ORDER BY tblp_ticket.Estatus ASC   ");
    while($x = $db->recorrer($sql)){
      $Servicio[] = $x;
    }
    for ($i=0;$i< sizeof($Servicio);$i++) {
      $id=$Servicio[$i]["IdServicio"];
      $sql = $db->query("SELECT * FROM tblc_servicios WHERE tblc_servicios.IdServicio= '$id' ");
      while($x = $db->recorrer($sql)){
        $lstService[] = $x;
      }
    }
    return $lstService;
  }
  public function lst_tickets()
    {
      $ID = $_SESSION["IdUsuario"] ;
      $db = new Conexion();
      // $sesion ='1';
      $sql = $db->query("SELECT * FROM tblp_ticket WHERE  tblp_ticket.IdUser='$ID' ORDER BY tblp_ticket.Estatus  ASC  ");
      while($x = $db->recorrer($sql)){
        $tickets[] = $x;
      }
     return $tickets;
    }

    public function lst_ticketsG($Ids)
    {
      $db = new Conexion();
      // $sesion ='1';
      $sql = $db->query("SELECT * FROM tblp_ticket WHERE  tblp_ticket.Estatus ='$Ids' ORDER BY tblp_ticket.FecCap ASC  ");
      while($x = $db->recorrer($sql)){
        $tickets[] = $x;
      }
     return $tickets;
    }

  public function get_estatusG($Ids){
    $db = new Conexion();
    $sql = $db->query("SELECT * FROM tblp_ticket WHERE tblp_ticket.Estatus ='$Ids' ORDER BY tblp_ticket.Estatus ASC ");
    while($x = $db->recorrer($sql)){
      $Estatus[] = $x;
    }
    for ($i=0;$i< sizeof($Estatus);$i++) {
      $id=$Estatus[$i]["Estatus"];
      $sql = $db->query("SELECT * FROM tblc_estatus WHERE tblc_estatus.IdEstatus= '$id' ");
      while($x = $db->recorrer($sql)){
        $lstEstatus[] = $x;
      }
    }
    return $lstEstatus;
  }


  public function get_servicioG($Ids){
  $db = new Conexion();
  $sql = $db->query("SELECT IdServicio FROM tblp_ticket WHERE  tblp_ticket.Estatus ='$Ids' ORDER BY tblp_ticket.FecCap ASC ");
  while($x = $db->recorrer($sql)){
    $Servicio[] = $x;
  }
  for ($i=0;$i< sizeof($Servicio);$i++) {
    $id=$Servicio[$i]["IdServicio"];
    $sql = $db->query("SELECT * FROM tblc_servicios WHERE tblc_servicios.IdServicio= '$id' ");
    while($x = $db->recorrer($sql)){
      $lstService[] = $x;
    }
  }
  return $lstService;
  }

  public function get_1()
  {
    $ID = $_SESSION["IdUsuario"] ;
    $db = new Conexion();
    $sql = $db->query("SELECT COUNT(*) FROM tblp_ticket WHERE Estatus=1   GROUP BY Estatus ;");
    while($x = $db->recorrer($sql)){
     $NumB[] = $x;
    }
   return $NumB;
  }

  public function get_3()
  {
    $ID = $_SESSION["IdUsuario"] ;
    $db = new Conexion();
    $sql = $db->query("SELECT COUNT(*) FROM tblp_ticket WHERE Estatus=3  GROUP BY Estatus ;");
    while($x = $db->recorrer($sql)){
      $NumB[] = $x;
    }
   return $NumB;
  }

  public function get_4()
  {
    $ID = $_SESSION["IdUsuario"] ;
    $db = new Conexion();
    $sql = $db->query("SELECT COUNT(*) FROM tblp_ticket WHERE Estatus=4  GROUP BY Estatus ;");
    while($x = $db->recorrer($sql)){
      $NumB[] = $x;
    }
   return $NumB;
  }



}

class Date
{
   public function ticketdate(){
     $db = new Conexion();
     $sql = $db->query("SELECT DISTINCT (SUBSTRING(FecCap,1,7)) AS Fecha FROM tblp_ticket  ORDER BY FecCap ASC;");
     while($x = $db->recorrer($sql)){
      $date[] = $x;
     }
    return $date;
   }

   public function lst_ticketsGDate($Ids,$Est)
   {
     $db = new Conexion();
     $sql = $db->query("SELECT * FROM tblp_ticket WHERE FecCap LIKE '$Ids-%' AND  tblp_ticket.Estatus ='$Est' ORDER BY FecCap ASC;");
     while($x = $db->recorrer($sql)){
       $tickets[] = $x;
     }
    return $tickets;
   }

   public function get_estatusGD($Ids,$Est){
     $db = new Conexion();
     $sql = $db->query("SELECT * FROM tblp_ticket WHERE FecCap LIKE '$Ids-%' AND  tblp_ticket.Estatus ='$Est' ORDER BY FecCap ASC;");
     while($x = $db->recorrer($sql)){
       $Estatus[] = $x;
     }
     for ($i=0;$i< sizeof($Estatus);$i++) {
       $id=$Estatus[$i]["Estatus"];
       $sql = $db->query("SELECT * FROM tblc_estatus WHERE tblc_estatus.IdEstatus= '$id' ");
       while($x = $db->recorrer($sql)){
         $lstEstatus[] = $x;
       }
     }
     return $lstEstatus;
   }


   public function get_servicioGD($Ids,$Est){
   $db = new Conexion();
   $sql = $db->query("SELECT IdServicio FROM tblp_ticket WHERE  FecCap LIKE '$Ids-%' AND  tblp_ticket.Estatus ='$Est' ORDER BY FecCap ASC; ");
   while($x = $db->recorrer($sql)){
     $Servicio[] = $x;
   }
   for ($i=0;$i< sizeof($Servicio);$i++) {
     $id=$Servicio[$i]["IdServicio"];
     $sql = $db->query("SELECT * FROM tblc_servicios WHERE tblc_servicios.IdServicio= '$id' ");
     while($x = $db->recorrer($sql)){
       $lstService[] = $x;
     }
   }
   return $lstService;
   }

   public function get_1D($Ids)
   {
     $ID = $_SESSION["IdUsuario"] ;
     $db = new Conexion();
     $sql = $db->query("SELECT COUNT(*) FROM tblp_ticket WHERE Estatus=1 AND FecCap LIKE '$Ids-%'  GROUP BY Estatus ;");
     while($x = $db->recorrer($sql)){
      $NumB[] = $x;
     }
    return $NumB;
   }

   public function get_3D($Ids)
   {
     $ID = $_SESSION["IdUsuario"] ;
     $db = new Conexion();
     $sql = $db->query("SELECT COUNT(*) FROM tblp_ticket WHERE Estatus=3 AND FecCap LIKE '$Ids-%'  GROUP BY Estatus ;");
     while($x = $db->recorrer($sql)){
       $NumB[] = $x;
     }
    return $NumB;
   }

   public function get_4D($Ids)
   {
     $ID = $_SESSION["IdUsuario"] ;
     $db = new Conexion();
     $sql = $db->query("SELECT COUNT(*) FROM tblp_ticket WHERE Estatus=4 AND FecCap LIKE '$Ids-%' GROUP BY Estatus ;");
     while($x = $db->recorrer($sql)){
       $NumB[] = $x;
     }
    return $NumB;
   }




 }

class Admin
{
  public function ticketdate(){
    $db = new Conexion();
    $sesion=$_SESSION["IdUsuario"];
    $sql = $db->query("SELECT DISTINCT (SUBSTRING(FecCap,1,7)) AS Fecha FROM tblp_ticket  WHERE tblp_ticket.Encargado='$sesion' ORDER BY FecCap ASC;");
    while($x = $db->recorrer($sql)){
     $date[] = $x;
    }
   return $date;
  }

  public function lst_ticketsA($Ids)
  {
    if ($Ids==1) {
      $Idd=2;
    }
    $db = new Conexion();
    $sesion=$_SESSION["IdUsuario"];
    // $sesion ='1';
    $sql = $db->query("SELECT * FROM tblp_ticket WHERE  (tblp_ticket.Estatus ='$Ids' OR tblp_ticket.Estatus ='$Idd')AND tblp_ticket.Encargado='$sesion' ORDER BY tblp_ticket.Estatus ASC  ");
    while($x = $db->recorrer($sql)){
      $tickets[] = $x;
    }
   return $tickets;
  }

  public function get_estatusA($Ids){
    if ($Ids==1) {
      $Idd=2;
    }
    $db = new Conexion();
    $sesion=$_SESSION["IdUsuario"];
    $sql = $db->query("SELECT * FROM tblp_ticket WHERE (tblp_ticket.Estatus ='$Ids' OR tblp_ticket.Estatus ='$Idd') AND tblp_ticket.Encargado='$sesion' ORDER BY tblp_ticket.Estatus ASC ");
    while($x = $db->recorrer($sql)){
      $Estatus[] = $x;
    }
    for ($i=0;$i< sizeof($Estatus);$i++) {
      $id=$Estatus[$i]["Estatus"];
      $sql = $db->query("SELECT * FROM tblc_estatus WHERE tblc_estatus.IdEstatus= '$id' ");
      while($x = $db->recorrer($sql)){
        $lstEstatus[] = $x;
      }
    }
    return $lstEstatus;
  }


  public function get_servicioA($Ids){
    if ($Ids==1) {
      $Idd=2;
    }
    $db = new Conexion();
    $sesion=$_SESSION["IdUsuario"];
    $sql = $db->query("SELECT IdServicio FROM tblp_ticket WHERE  (tblp_ticket.Estatus ='$Ids' OR tblp_ticket.Estatus ='$Idd')AND tblp_ticket.Encargado='$sesion' ORDER BY tblp_ticket.Estatus ASC ");
    while($x = $db->recorrer($sql)){
      $Servicio[] = $x;
    }
    for ($i=0;$i< sizeof($Servicio);$i++) {
      $id=$Servicio[$i]["IdServicio"];
      $sql = $db->query("SELECT * FROM tblc_servicios WHERE tblc_servicios.IdServicio= '$id' ");
      while($x = $db->recorrer($sql)){
        $lstService[] = $x;
      }
    }
    return $lstService;
  }

  public function get_1A()
  {
    $ID = $_SESSION["IdUsuario"] ;
    $db = new Conexion();
    $sql = $db->query("SELECT COUNT(*) FROM tblp_ticket WHERE (Estatus=1 OR Estatus=2) AND tblp_ticket.Encargado='$ID' GROUP BY Estatus");
    while($x = $db->recorrer($sql)){
     $NumB[] = $x;
    }
   return $NumB;
  }

  public function get_3A()
  {
    $ID = $_SESSION["IdUsuario"] ;
    $db = new Conexion();
    $sql = $db->query("SELECT COUNT(*) FROM tblp_ticket WHERE Estatus=3 AND tblp_ticket.Encargado='$ID' ;");
    while($x = $db->recorrer($sql)){
      $NumB[] = $x;
    }
   return $NumB;
  }

  public function get_4A()
  {
    $ID = $_SESSION["IdUsuario"] ;
    $db = new Conexion();
    $sql = $db->query("SELECT COUNT(*) FROM tblp_ticket WHERE Estatus=4 AND tblp_ticket.Encargado='$ID' ;");
    while($x = $db->recorrer($sql)){
      $NumB[] = $x;
    }
   return $NumB;
  }

  public function lst_ticketsADate($Ids,$Est)
  {
    $db = new Conexion();
    if ($Est==1) {
      $Idd=2;
    }
    $ID = $_SESSION["IdUsuario"] ;
    $sql = $db->query("SELECT * FROM tblp_ticket WHERE FecCap LIKE '$Ids-%' AND  (tblp_ticket.Estatus ='$Est' OR tblp_ticket.Estatus ='$Idd') AND tblp_ticket.Encargado='$ID' ORDER BY Estatus ASC;");
    while($x = $db->recorrer($sql)){
      $tickets[] = $x;
    }
   return $tickets;
  }

  public function get_estatusAD($Ids,$Est){
    $db = new Conexion();
    if ($Est==1) {
      $Idd=2;
    }
    $ID = $_SESSION["IdUsuario"] ;
    $sql = $db->query("SELECT * FROM tblp_ticket WHERE FecCap LIKE '$Ids-%' AND (tblp_ticket.Estatus ='$Est' OR tblp_ticket.Estatus ='$Idd') AND tblp_ticket.Encargado='$ID' ORDER BY Estatus ASC;");
    while($x = $db->recorrer($sql)){
      $Estatus[] = $x;
    }
    for ($i=0;$i< sizeof($Estatus);$i++) {
      $id=$Estatus[$i]["Estatus"];
      $sql = $db->query("SELECT * FROM tblc_estatus WHERE tblc_estatus.IdEstatus= '$id' ");
      while($x = $db->recorrer($sql)){
        $lstEstatus[] = $x;
      }
    }
    return $lstEstatus;
  }

  public function get_servicioAD($Ids,$Est){
    $db = new Conexion();
    if ($Est==1) {
      $Idd=2;
    }
    $ID = $_SESSION["IdUsuario"] ;
    $sql = $db->query("SELECT IdServicio FROM tblp_ticket WHERE  FecCap LIKE '$Ids-%' AND  (tblp_ticket.Estatus ='$Est' OR tblp_ticket.Estatus ='$Idd') AND tblp_ticket.Encargado='$ID' ORDER BY Estatus ASC; ");
    while($x = $db->recorrer($sql)){
      $Servicio[] = $x;
    }
    for ($i=0;$i< sizeof($Servicio);$i++) {
      $id=$Servicio[$i]["IdServicio"];
      $sql = $db->query("SELECT * FROM tblc_servicios WHERE tblc_servicios.IdServicio= '$id' ");
      while($x = $db->recorrer($sql)){
        $lstService[] = $x;
      }
    }
    return $lstService;
  }

  public function get_1D($Ids)
  {
    $ID = $_SESSION["IdUsuario"] ;
    $db = new Conexion();
    $sql = $db->query("SELECT COUNT(*) FROM tblp_ticket WHERE (Estatus=1 OR Estatus=2) AND tblp_ticket.Encargado='$ID' AND FecCap LIKE '$Ids-%'  GROUP BY Estatus ;");
    while($x = $db->recorrer($sql)){
     $NumB[] = $x;
    }
   return $NumB;
  }

  public function get_3D($Ids)
  {
    $ID = $_SESSION["IdUsuario"] ;
    $db = new Conexion();
    $sql = $db->query("SELECT COUNT(*) FROM tblp_ticket WHERE Estatus=3 AND FecCap LIKE '$Ids-%'  AND tblp_ticket.Encargado='$ID' GROUP BY Estatus ;");
    while($x = $db->recorrer($sql)){
      $NumB[] = $x;
    }
   return $NumB;
  }

  public function get_4D($Ids)
  {
    $ID = $_SESSION["IdUsuario"] ;
    $db = new Conexion();
    $sql = $db->query("SELECT COUNT(*) FROM tblp_ticket WHERE Estatus=4 AND FecCap LIKE '$Ids-%' AND tblp_ticket.Encargado='$ID' GROUP BY Estatus ;");
    while($x = $db->recorrer($sql)){
      $NumB[] = $x;
    }
   return $NumB;
  }



}

class Listas
{
  public function get_serviciou($Ids){
    $db = new Conexion();
    $sesion = $_SESSION["IdUsuario"] ;
    if ($Ids==1) {
      $estatus =2;
    }
    $sql = $db->query("SELECT IdServicio FROM tblp_ticket WHERE tblp_ticket.IdUser = '$sesion' AND (tblp_ticket.Estatus ='$Ids' OR tblp_ticket.Estatus ='$estatus') ORDER BY tblp_ticket.Estatus ASC  ");
    while($x = $db->recorrer($sql)){
      $Servicio[] = $x;
    }
    for ($i=0;$i< sizeof($Servicio);$i++) {
      $id=$Servicio[$i]["IdServicio"];
      $sql = $db->query("SELECT * FROM tblc_servicios WHERE tblc_servicios.IdServicio= '$id' ");
      while($x = $db->recorrer($sql)){
        $lstService[] = $x;
      }
    }
    return $lstService;
  }
  public function get_estatu($Ids){
    $db = new Conexion();
    $sesion = $_SESSION["IdUsuario"] ;
    if ($Ids==1) {
      $estatus =2;
    }
    $sql = $db->query("SELECT * FROM tblp_ticket WHERE tblp_ticket.IdUser = '$sesion' AND (tblp_ticket.Estatus ='$Ids' OR tblp_ticket.Estatus ='$estatus')  ORDER BY tblp_ticket.Estatus ASC ");
    while($x = $db->recorrer($sql)){
      $Estatus[] = $x;
    }
    for ($i=0;$i< sizeof($Estatus);$i++) {
      $id=$Estatus[$i]["Estatus"];
      $sql = $db->query("SELECT * FROM tblc_estatus WHERE tblc_estatus.IdEstatus= '$id' ");
      while($x = $db->recorrer($sql)){
        $lstEstatus[] = $x;
      }
    }
    return $lstEstatus;
  }
  public function lst_ticket($Ids)
  {
    $ID = $_SESSION["IdUsuario"] ;
    $db = new Conexion();
    if ($Ids==1) {
      $estatus =2;
    }
    $sql = $db->query("SELECT * FROM tblp_ticket WHERE tblp_ticket.IdUser='$ID' AND (tblp_ticket.Estatus ='$Ids' OR tblp_ticket.Estatus ='$estatus')  ORDER BY tblp_ticket.FecCap ASC  ");
    while($x = $db->recorrer($sql)){
      $tickets[] = $x;
    }
   return $tickets;
  }

  public function get_12()
  {
    $ID = $_SESSION["IdUsuario"] ;
    $db = new Conexion();
    $sql = $db->query("SELECT COUNT(*) FROM tblp_ticket WHERE (Estatus=1 OR Estatus=2 ) AND IdUser='$ID'  GROUP BY Estatus ;");
    while($x = $db->recorrer($sql)){
     $NumB[] = $x;
    }
   return $NumB;
  }

  public function get_4()
  {
    $ID = $_SESSION["IdUsuario"] ;
    $db = new Conexion();
    $sql = $db->query("SELECT COUNT(*) FROM tblp_ticket WHERE Estatus=4 AND IdUser='$ID' GROUP BY Estatus ;");
    while($x = $db->recorrer($sql)){
      $NumB[] = $x;
    }
   return $NumB;
  }

  public function get_3()
  {
    $ID = $_SESSION["IdUsuario"] ;
    $db = new Conexion();
    $sql = $db->query("SELECT COUNT(*) FROM tblp_ticket WHERE Estatus=3 AND IdUser='$ID' GROUP BY Estatus ;");
    while($x = $db->recorrer($sql)){
      $NumB[] = $x;
    }
   return $NumB;
  }



}


class Seguimiento
{
  function ValS($seguimiento)
  {
    $db = new Conexion();
    $sql = $db->query("SELECT * FROM tblp_ticket WHERE tblp_ticket.Codigo ='$seguimiento';");
    if($db->rows($sql) > 0 ){
      return 1;
    }else {
      return 0;
    }
  }
}







 ?>
