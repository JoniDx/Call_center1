<?php
require('../../models/Class.System.php');
$html = '';
$IdTicket = $_POST['IdTicket'];
$sesion=$_SESSION["IdUsuario"];
$db = new Conexion();
$sql = $db->query("SELECT * FROM tblp_ticket WHERE tblp_ticket.IdTicket = '$IdTicket'");
$db->rows($sql);
$datos = $db->recorrer($sql);

$id=$datos["IdServicio"];
$sql1 = $db->query("SELECT * FROM tblc_servicios WHERE tblc_servicios.IdServicio= '$id' ");
$db->rows($sql1);
$servicio = $db->recorrer($sql1);


$ide=$datos["Encargado"];
$sql2 = $db->query("SELECT * FROM tblp_usuarios WHERE tblp_usuarios.IdUsuario= '$ide' ");
$db->rows($sql2);
$encargado = $db->recorrer($sql2);

$idA=$datos["IdDoc"];
$sql2 = $db->query("SELECT * FROM tblc_doc WHERE tblc_doc.IdDoc= '$idA' ");
$db->rows($sql2);
$doc = $db->recorrer($sql2);




// $sql = $db->query("SELECT * FROM tblc_estados");
// $sql1 = $db->query("SELECT Sexo FROM tblp_miembros");
// $sql = $db->query("SELECT * FROM tblc_municipio");
?>
<h1 class="bottom" style="color:gray;">&nbsp;Ticket: #<?php echo $IdTicket; ?>&nbsp;/&nbsp;Codigo: <?php echo $datos["Codigo"]; ?></h1>
<!-- <form name="frm" id="frm" action="?mwc=getModal" method="POST" enctype="multipart/form-data"> -->
<input type="hidden" class="form-control" id="txtIdTicket" name="txtIdTicket" value="<?php echo $IdTicket; ?>">
<input type="hidden" name="txtPermiso" id="txtPermiso" value="<?php echo $_SESSION["IdPermiso"]; ?>">
<input type="hidden" class="form-control" id="IdTicket" name="IdTicket" value="<?php echo $IdTicket; ?>">
  <div class="row">
    <div class="col-lg-4 col-xs-4">
      <div class="form-group">
       <label for="recipient-name" class="control-label">Cliente:</label>
       <label><?php echo $datos['NombreU']; ?></label>
      </div>
    </div>
    <div class="col-lg-4 col-xs-4">
      <div class="form-group">
       <label for="recipient-name" class="control-label">Email:</label>
       <label><?php echo $datos['Email']; ?></label>
      </div>
    </div>
    <div class="col-lg-4 col-xs-4">
      <div class="form-group">
       <label for="recipient-name" class="control-label">Telefono:</label>
       <label> <?php echo $datos['Telefono']; ?></label>
      </div>
    </div>
	 <div class="col-lg-4 col-xs-4">
		<div class="form-group">
		  <label for="recipient-name" class="control-label">Asunto:</label>
      <label> <?php echo $datos['Asunto']; ?></label>
  	</div>
	 </div>

  <div class="col-lg-4 col-xs-4">
	 <div class="form-group">
    <label for="recipient-name" class="control-label">Software:</label>
    <label for="recipient-name" class="control-label"> <?php echo $servicio['Nombre']; ?></label>
   </div>
	</div>

	<div class="col-lg-12 col-xs-12">
   <div class="form-group">
    <label for="recipient-name" class="control-label">Descripcion</label>
		<p style="text-align:justify;"><?php echo $datos['Descripcion']; ?></p>
	 </div>
	</div>


<div class="" style=''>
  <div class="col-lg-4 col-xs-4">
   <div class="form-group">
    <label for="recipient-name"  class="control-label">Prioridad:</label>
    <select class="form-control" <?php if ($datos['Estatus']==3) { echo 'disabled="true"'; }?> id="txtPrioridad" name="txtPrioridad">
     <option value="" >  - Seleccione una prioridad - </option>
     <option value="1" <?php if($datos["Prioridad"] == "1") { ?>selected="selected" <?php  } ?>> Alta </option>
     <option value="2" <?php if($datos["Prioridad"] == "2") { ?>selected="selected" <?php  } ?>> Media </option>
     <option value="3" <?php if($datos["Prioridad"] == "3") { ?>selected="selected" <?php  } ?>> Baja </option>
    </select>
   </div>
  </div>


  <div class="col-lg-4 col-xs-4"  id="Nivel">
   <div class="form-group">
    <label for="recipient-name" class="control-label">Nivel:</label>
    <select class="form-control" <?php if ($datos['Estatus']==3) { echo 'disabled="true"'; }?>	id="txtNivel" name="txtNivel">
     <option value="" >  - Seleccione un nivel - </option>
     <option value="1" <?php if($datos["Nivel"] == "1") { ?>selected="selected" <?php  } ?>> Nivel 1 </option>
     <option value="2" <?php if($datos["Nivel"] == "2") { ?>selected="selected" <?php  } ?>> Nivel 2 </option>
     <option value="3" <?php if($datos["Nivel"] == "3") { ?>selected="selected" <?php  } ?>> Nivel 3 </option>
     <option value="4" <?php if($datos["Nivel"] == "4") { ?>selected="selected" <?php  } ?>> Nivel 4 </option>
    </select>
   </div>
  </div>

  <div class="col-lg-4 bottom col-xs-4" style="<?php if ($datos['Estatus']==3) { echo 'display:none;'; }?>" >
    <div class="form-group">
      <label for="recipient-name" class="control-label">Encargado:</label>
      <div class="" id="Admin">
        <select class='form-control' id='txtAdmin' name='txtAdmin'>
          <option value="<?php echo $ide; ?>" <?php if($datos["Encargado"] == $ide) { ?>selected="selected" <?php  } ?>> <?php echo $encargado["Nombre"]." ".$encargado["APaterno"]." ".$encargado["AMaterno"]; ?> </option>
        </select>
      </div>

    </div>
  </div>

  <div class="col-lg-4 col-xs-4"  style="<?php if ($datos['Estatus']!=3) { echo 'display:none;'; }?>">
   <div class="form-group">
    <label for="recipient-name" class="control-label"> Encargado:</label>
    <label for="recipient-name" class="control-label"> <?php echo $encargado["Nombre"]." ".$encargado["APaterno"]." ".$encargado["AMaterno"]; ?></label>
   </div>
  </div>
</div>

</div>

<div class="modal-footer" >
  <form class="" action="view/ajax/Pdfticket.php" target="_blank" method="post">
    <a style="float:left; padding:10px; <?php if ($doc["Ubicacion"]=="") { echo'display:none;'; } ?>" class="" role="button" type="button"  href='assets/adjuntos/<?php echo $doc["Ubicacion"]; ?>'  target="_blank">Adjunto</a>
    <input type="button"  style="<?php if ($datos['Estatus']==3) { echo 'display:none;'; }?> float:left; padding:10px;" onclick="Cerrar()" class="btn btn-danger waves-effect waves-ligh"  value="Cerrar Ticket">
    <input type="hidden" name="IdTicket" value="<?php echo $IdTicket; ?>">
    <button type="button" style="<?php if ($datos['Estatus']==3) { echo 'display:none;'; }?>" class="btn btn-default waves-effect" data-dismiss="modal">Cancelar</button>
    <button type="button" style="<?php if ($datos['Estatus']==3) { echo 'display:none;'; }?>" onclick="AsignarTicket()" class="btn btn-danger waves-effect waves-light">Asignar</button>
    <input type="submit" class="btn btn-danger waves-effect waves-ligh"  value="Descargar PDF">
  </form>
</div>
<!-- </form> -->

<script type="text/javascript">
  var nivel = document.getElementById('txtNivel').value;
  $(document).ready(function(){
    $('#txtNivel').val(nivel);
    recargarLista();

    $('#txtNivel').change(function(){
      recargarLista();
    });
  })
  </script>
  <script type="text/javascript">
  function recargarLista(){
  $.ajax({
    type:"POST",
    url:"view/ajax/Administradores.php",
    data:"txtNivel=" + $('#txtNivel').val(),
    success:function(r){
      $('#Admin').html(r);
    }
  });
  }
</script>
