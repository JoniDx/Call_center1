<?php include("view/overall/head.php"); ?>
<body>
  <?php include("view/overall/menu1.php"); ?>
  <?php
  $db = new Conexion();
  $id=$_GET["Id"];
  $sql = $db->query("SELECT * FROM tblp_usuarios WHERE tblp_usuarios.Codigo ='$id';") ;
  $datos = $db->recorrer($sql);
  $sql = $db->query("SELECT TIMEDIFF (NOW(),tblp_usuarios.FecCod) From tblp_usuarios WHERE tblp_usuarios.Codigo ='$id';") ;
  $dato = $db->recorrer($sql);
  $diff=$dato[0];
  if ($diff<'24:00:00' && $diff!='' && $diff!='00-00-00 00:00:00') {   //echo $dato[0];?>
    <div class="container cler bottom" style="margin-bottom:200px;">
      <div class="col-lg-12 bottom">
        <input type="hidden" name="txtCode" id="txtCode" value="<?php echo $id; ?>">
        <div class="col-lg-6 bottom" ><br>
          <label for="recipient-name" class="control-label">Nueva Contraseña:</label>
          <input type="password" required="required" class="form-control" id="txtPass1" name="txtPas1" placeholder="8 caracteres minimo">
        </div>

        <div class="col-lg-6 bottom"><br>
          <label for="recipient-name" class="control-label">Confirmar Contraseña:</label>
          <input type="password" required="required" class="form-control" id="txtPass2" name="txtPass2"  placeholder="8 caracteres minimo">
        </div>
      </div>

      <div class="col-lg-12">
        <div class="col-lg-4 " style="float:right;"><br>
          <button type="button" onclick="Restablecer()" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Verifica tus datos antes de Restablecer">Restablecer</button>
        </div>
      </div>
    </div>
  <?php }else {?>
    <script>
      alert("Este token no es valido");
      window.location.href='?mwc=index';
    </script>
  <?php }?>

  <?php include("view/overall/footer.php"); ?>
</body>
