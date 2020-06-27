<?php
require('../../models/Class.System.php');
$html = '';
$IdMiembro = $_POST['IdUsuario'];
$db = new Conexion();
$sql = $db->query("SELECT * FROM tblp_usuarios WHERE tblp_usuarios.IdUsuario = '$IdMiembro'");
$db->rows($sql);
$datos = $db->recorrer($sql);

// $sql = $db->query("SELECT * FROM tblc_estados");
// $sql1 = $db->query("SELECT Sexo FROM tblp_miembros");
// $sql = $db->query("SELECT * FROM tblc_municipio");
?>
<form name="frm" id="frm" action="?mwc=getModal" method="POST" enctype="multipart/form-data">
<input type="hidden" class="form-control" id="IdMiembro" name="IdMiembro" value="<?php echo $IdMiembro; ?>">
  <div class="row">
	 <div class="col-lg-4">
		<div class="form-group">
		  <label for="recipient-name" class="control-label">Nombre:</label>
		  <input type="text" class="form-control" id="txtNombre" name="txtNombre" value="<?php echo $datos['Nombre']; ?>">
  	</div>
	 </div>
  <div class="col-lg-4">
	 <div class="form-group">
    <label for="recipient-name" class="control-label">A. Paterno:</label>
    <input type="text" class="form-control" id="txtAPaterno" name="txtAPaterno" value="<?php echo $datos['APaterno']; ?>">
   </div>
	</div>
	<div class="col-lg-4">
   <div class="form-group">
    <label for="recipient-name" class="control-label">A. Materno:</label>
		<input type="text" class="form-control" id="txtAMaterno" name="txtAMaterno" value="<?php echo $datos['AMaterno']; ?>">
	 </div>
	</div>
	<div class="col-lg-5">
		<div class="form-group">
		 <label for="recipient-name" class="control-label">Email:</label>
		 <input type="text" class="form-control" id="txtEmail" name="txtEmail" value="<?php echo $datos['email']; ?>">
		</div>
	</div>
	<div class="col-lg-3">
		<div class="form-group">
		 <label for="recipient-name" class="control-label">Telefono:</label>
		 <input type="text" class="form-control" id="txtTelefono" name="txtTelefono" value="<?php echo $datos['Telefono']; ?>">
		</div>
	</div>

<div class="col-lg-4">
    <div class="form-group">
     <label for="recipient-name" class="control-label">Permiso:</label>
     <select class="form-control" id="txtPermiso" name="txtPermiso"  onchange="hideN()" >
      <option value="" >  - Seleccione un Permiso - </option>
      <option value="1" <?php if($datos["IdPermiso"] == "1") { ?>selected="selected" <?php  } ?>> Gerente </option>
      <option value="2" <?php if($datos["IdPermiso"] == "2") { ?>selected="selected" <?php  } ?>> Empleado </option>
      <option value="3" <?php if($datos["IdPermiso"] == "3") { ?>selected="selected" <?php  } ?>> Cliente </option>
     </select>
     <!-- <input type="text" class="form-control" id="txtPermiso" name="txtPermiso"  onchange="hideN()" value="<?php// echo $datos['IdPermiso']; ?>"> -->
    </div>
  </div>

	<div class="col-lg-4">
	 <div class="form-group">
		<label for="recipient-name" class="control-label">Sexo:</label>
		<select class="form-control" 	id="txtSexo" name="txtSexo">
     <option value="H" <?php if($datos["Sexo"] == "H") { ?>selected="selected" <?php  } ?>> Hombre </option>
     <option value="M" <?php if($datos["Sexo"] == "M") { ?>selected="selected" <?php  } ?>> Mujer </option>
		</select>
   </div>
  </div>

  <div class="col-lg-4" style="<?php if ($datos['IdPermiso']!=2) { echo 'display:none;'; }?>" id="Nivel">
   <div class="form-group">
    <label for="recipient-name" class="control-label">Nivel:</label>
    <select class="form-control" 	id="txtNivel" name="txtNivel">
     <option value="" >  - Seleccione un nivel - </option>
     <option value="1" <?php if($datos["Nivel"] == "1") { ?>selected="selected" <?php  } ?>> Nivel 1 </option>
     <option value="2" <?php if($datos["Nivel"] == "2") { ?>selected="selected" <?php  } ?>> Nivel 2 </option>
     <option value="3" <?php if($datos["Nivel"] == "3") { ?>selected="selected" <?php  } ?>> Nivel 3 </option>
     <option value="4" <?php if($datos["Nivel"] == "4") { ?>selected="selected" <?php  } ?>> Nivel 4 </option>
    </select>
   </div>
  </div>

 </div>

<div class="modal-footer">
  <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancelar</button>
  <button type="button" onclick="AcutualizarUsuario()" class="btn btn-danger waves-effect waves-light">Actualizar</button>
</div>
</form>

<script type="text/javascript">
function hideN(){
  var nivel = document.getElementById('txtPermiso').value;
  if (nivel == '2') {
    document.getElementById('Nivel').style.display = 'block';
  }
  if (nivel!='2') {
    document.getElementById('Nivel').style.display = 'none';
  }
}
</script>
