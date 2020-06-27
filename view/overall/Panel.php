<?php
$datot = new Time();
$db = new Conexion();
$ID = $_SESSION["IdUsuario"] ;
// $sesion ='1';
$sql = $db->query("SELECT * FROM tblp_ticket WHERE  tblp_ticket.IdUser='$ID' ORDER BY tblp_ticket.FecCap  DESC LIMIT 0,5 ");
while($x = $db->recorrer($sql)){
  $tickets[] = $x;
}
?>
<?php if ($datos["Estatus"]==1) {
  $estatus="Enviado";
}elseif ($datos["Estatus"]==2) {
  $estatus="En Espera";
}elseif ($datos["Estatus"]==3) {
  $estatus="Cerrado";
}elseif ($datos["Estatus"]==4) {
  $estatus="Atasado";
}


if ($datos["Prioridad"]==1) {
  $Prioridad="Alta";
}elseif ($datos["Prioridad"]==2) {
  $Prioridad="Media";
}elseif ($datos["Prioridad"]==3) {
  $Prioridad="Baja";
}
$service=$datos["IdServicio"];

$sql = $db->query("SELECT * FROM tblc_servicios WHERE  tblc_servicios.IdServicio='$service'  ");
$x = $db->recorrer($sql);

$encargado =$datos["Encargado"];
$sql1 = $db->query("SELECT * FROM tblp_usuarios WHERE  tblp_usuarios.IdUsuario='$encargado '  ");
$z = $db->recorrer($sql1);


?>
<div class="" align:"right" >

<?php if ($_SESSION['TicketRS']==1) {?>
<!-- Ticket -->
  <div class="panel panel-warning col-md-4 col-sm-6 col-xs-12" style="margin-top:30px; float:right; " >
    <div class="panel-heading pointer" data-toggle="collapse" data-target="#demo3"  style="margin-top:12px; color:; border-radius: 15px; "><i class="fa fa-folder-open" aria-hidden="true"></i>&nbsp;&nbsp;Datos del Ticket
      <i class="fa fa-arrow-down" aria-hidden="true" style="margin-left:150px"></i>
    </div><br>
    <div class="panel-body" style="color:grey;" id="demo3" class="collapse">
      <label for="">#<?php echo $datos["Codigo"]." ".$datos["Asunto"]; ?></label><br>
      <label for="" class="btn-warning" style="width:75px;height:25px;text-align:center;padding:3px; margin-top:5px;"><?php echo $estatus." " ?> </label>
      <label for="" ><?php //echo "Codigo: ".$datos["Codigo"]; ?></label>
      <hr width="100%" style="float:left ;"/><br>
      <label for="" style="color:#D5D8DC;">Departamento</label><br>
      <label for=""><?php echo "-".$x["Nombre"]."- Nivel: ".$datos["Nivel"];?></label>
      <hr width="100%" style="float:left ;"/><br>
      <label for="" style="color:#D5D8DC;">Enviado</label><br>
      <label for=""><?php echo $datos["FecComplet"]; ?></label>
      <hr width="100%" style="float:left ;"/><br>
      <label for="" style="color:#D5D8DC;">Encargado</label><br>
      <label for=""><?php echo $z["Nombre"]." ".$z["APaterno"]." ".$z["AMaterno"]; ?></label>
      <hr width="100%" style="float:left ;"/><br>
      <label for="" style="color:#D5D8DC;">Prioridad</label><br>
      <label for=""><?php echo $Prioridad; ?></label>
      <hr width="100%" style="float:left ;"/><br>
      <?php if ($datos['Estatus']!='3'&&($datos['Estatus']=='2'||$datos['Encargado']==$_SESSION["IdUsuario"])) {?>
        <button type="button" class="scroll btn btn-danger"  name="button"><a href="#Responder" style="color:white;"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Responder</a></button>
      <?php }  ?>
    </div>
  </div> <br>

<?php } ?>

<?php   $iduser = $_SESSION["IdUsuario"]; ?>
<?php if ($_SESSION["Tic"]=="1"){ ?>
<!-- Ticket's -->
<?php if ($_SESSION["IdPermiso"]!='2') { ?>
  <div class="panel panel-danger col-md-4 col-sm-6 col-xs-12 " style="margin-top:30px; ">
    <!-- <a href="" data-toggle="collapse" data-target="#demo"> -->
      <div class="panel-heading pointer"  data-toggle="collapse" data-target="#demo" style="margin-top:12px; color:#CD6155; border-radius: 15px; "><i class="fa fa-comments-o" aria-hidden="true"></i>&nbsp;&nbsp;
        Ticket's Recientes
        <i class="fa fa-arrow-down" aria-hidden="true" style="margin-left:105px"></i>
      </div> <br>
    <!-- </a> -->
    <div class="panel-body" style="color:grey;" id="demo" class="collapse" >
      <?php if ($tickets[0]!="") { ?>
        <?php for ($i=0; $i <sizeof($tickets) ; $i++) {
          $time=$tickets[$i]['Duracion'];
          $text = $datot->toHours($time);

          $idestatus=$tickets[$i]['Estatus'];
          $sql3 = $db->query("SELECT * FROM tblc_estatus WHERE tblc_estatus.IdEstatus='$idestatus'");
          $row3 = $db->recorrer($sql3);
          //echo $time;
          $rest = $tickets[$i]["Asunto"];
          $desc = substr($rest, 0, 20).'...';?>
          <div class="" style="margin-bottom:20px;">
            <label  style="font-size:15px; font:Arial;"><a href='?mwc=respuesta&Id=<?php echo $tickets[$i]["IdTicket"]; ?>'> # <?php echo $tickets[$i]['Codigo'];?>-<?php echo $desc; ?></a> </label>
            <p><?php echo  $row3['Nombre'] ; ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo " ".$text;  ?>
            </p>
            <hr width="100%" style="float:left ;"/>
          </div>
        <?php } ?>
      <?php }else {
        echo "No cuentas con ningun registro de algun Ticket aun ";
      }?>
    </div>
  </div>
<?php } ?>



<!-- Soporte -->
  <div class="panel panel-info col-md-4 col-sm-6 col-xs-12" style="margin-top:30px; float:right" >
    <div class="panel-heading pointer" data-toggle="collapse" data-target="#demo2"  style="margin-top:12px; color:; border-radius: 15px; "><i class="fa fa-life-ring" aria-hidden="true"></i>&nbsp;&nbsp;Soporte
      <i class="fa fa-arrow-down" aria-hidden="true" style="margin-left:175px"></i>
    </div><br>
    <div class='panel-body' style="color:grey;" id="demo2" class="collapse" >
      <a href="?mwc=lstticket" style="color:grey;" class="pointer">
        <div width="100">
          <label  class="pointer" style="font-size:15px; font:Arial; margin-right:159px;" >Mis Ticket's</label>
          <i class="fa fa-ticket" aria-hidden="true"></i>
        </div>
      </a>      <hr width="100%" style="float:left ;"/><br><br>
      <?php if($_SESSION["IdUsuario"] == ""){ ?>
        <a  href="javascript:void(0);" data-toggle="modal" data-target="#responsive-modal" style="color:grey;" >
          <div width="100">
            <label  class="pointer" style="font-size:15px; font:Arial; margin-right:180px;" >Ingresar</label>
            <i class="fa fa-sign-in" aria-hidden="true"></i>
          </div>
        </a><br><br>
      <!-- <li><a href="javascript:void(0);" data-toggle="modal" data-target="#responsive-modal">Ingresar</a></li> -->
    <?php }else { ?>
      <a href="?mwc=perfil&Id=<?php echo $iduser; ?>" style="color:grey;">
        <div width="100">
          <label class="pointer" style="font-size:15px; font:Arial; margin-right:190px;" >Mi Perfil</label>
          <i class="fa fa-user" aria-hidden="true"></i>
        </div>
      </a>      <hr width="100%" style="float:left ;"/><br><br>
      <?php }?>
      <a href="?mwc=ticket" style="color:grey;" >
        <div width="100">
          <label class="pointer"  style="font-size:15px; font:Arial; margin-right:159px;" >Abrir Ticket</label>
          <i class="fa fa-comments" aria-hidden="true"></i>
        </div>
      </a>      <hr width="100%" style="float:left ;"/><br><br>
    </div>
  </div>
<?php } ?>

</div>
