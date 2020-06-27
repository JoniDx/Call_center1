<?php include("view/overall/head.php"); ?>
<?php
$iduser = $_SESSION["IdUsuario"];
$nombre=$_SESSION["Nombre"] ;
$email = $_SESSION["email"] ;
$telefono = $_SESSION["Telefono"];
$estado = $lstestado[0]["NomEstado"];
$ciudad = $lstmunicipio[0]["NomMunicipio"];
$idusuario=$lstdatos[0]["IdUsuario"];
$direccion=$lstdatos[0]["Direccion"];
$cp=$lstdatos[0]["CP"];
$empreza=$lstdatos[0]["Empreza"];
$telefonoe=$lstdatos[0]["TelefonoE"];
$puesto=$lstdatos[0]["Puesto"];

 ?>

<?php if ($iduser==$_GET["Id"]){?>
<body>
  <?php include("view/overall/menu2.php") ?>

  <div class="container">
    <div class="col-lg-3 cler"><br><br>
      <div class="list-group">
        <button class="list-group-item list-group-item-danger" onclick="hideB()">Actualizar datos</button>
        <button class="list-group-item list-group-item-danger" onclick="hideA()">Cambiar Contraseña</button>
      </div>
    </div>

    <div class="col-lg-9" id="WindowA" style="display:block;">
      <form class="" action="index.php" method="post">
        <input id="IdUsuario" name="IdUsuario" value="<?php echo $iduser; ?>" type="hidden">
        <div class="form-group bottom">
          <br><br>
          <center>
            <div class="section-title cler">
              <h2 style="color:grey;">Información Personal</h2>
            </div>
          </center>

          <div class="col-lg-6 bottom">
            <label for="recipient-name" class="control-label" >Email:</label>
            <input type="email" required="required" class="form-control" id="txtEmail" name="txtEmail" placeholder="example@gmail.com" value="<?php echo $email; ?>">
          </div>

          <div class="col-lg-6 bottom">
            <label for="recipient-name" class="control-label">Teléfono:</label>
            <input type="text" required="required" class="form-control" id="txtTelefono" name="txtTelefono" value="<?php echo $telefono; ?>">
          </div>

          <div class="col-lg-6 bottom">
            <label for="recipient-name" class="control-label">Dirección:</label>
            <input type="text" required="required" class="form-control" id="txtDireccion" name="txtDireccion" value="<?php echo $direccion; ?>">
          </div>

          <div class="col-lg-6 bottom">
            <label for="recipient-name" class="control-label">Código postal:</label>
            <input type="text" required="required" class="form-control" id="txtCP" name="txtCP" value="<?php echo $cp; ?>">
          </div>

          <!-- <div class="col-lg-12"> -->
            <div class="col-lg-6 bottom">
              <div class="form-group">
                <label for="recipient-name" class="control-label">Estado</label>
                <select class="form-control" name="txtEstado" id="txtEstado">
                  <option value=""> - Seleccione Uno - </option>
                  <?php for ($i=0;$i< sizeof($lstestado);$i++) { ?>
                    <option value="<?php echo $lstestado[$i]["IdEstado"]; ?>"<?php if($estado== $lstestado[$i]["IdEstado"]){?> selected="selected" <?php } ?> ><?php echo $lstestado[$i]["NomEstado"]; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="col-lg-6 bottom">
              <div class="form-group">
                <label for="recipient-name" class="control-label">Ciudad</label>
                <div class="" id="Ciudad">
                </div>
              </div>
            </div>

              <center>
                <h1 class="bottom" style="color:grey;"> <u>&nbsp;&nbsp;&nbsp;&nbsp;Datos Adicionales&nbsp;&nbsp;&nbsp;&nbsp;</u> </h1>
              </center>


            <div class="col-lg-6 bottom">
              <label for="recipient-name" class="control-label">Empresa y/o Industria:</label>
              <input type="text" required="required" class="form-control" id="txtEmpreza" name="txtEmpreza" value="<?php echo $empreza; ?>">
            </div>

            <div class="col-lg-6 bottom">
              <label for="recipient-name" class="control-label">Teléfono de Empresa y/o Industria:</label>
              <input type="text" required="required" class="form-control" id="txtTelefonoE" name="txtTelefonoE" value="<?php echo $telefonoe; ?>">
            </div>

            <div class="col-lg-6 bottom">
              <label for="recipient-name" class="control-label">Puesto:</label>
              <input type="text" required="required" class="form-control" id="txtPuesto" name="txtPuesto" value="<?php echo $puesto; ?>">
            </div>
        </div>
        <div class="col-lg-12">
          <div class="col-lg-4 " style="float:right;"><br>
            <button type="button" onclick="EditU()" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Verifica tus datos antes de Actualizar">Actualizar</button>
          </div>
        </div>
      </form>
    </div><br><br>

    <div class="col-lg-9" id="WindowB" style="display:none;">
      <form class="" action="index.html" method="post">
        <div class="form-group bottom">
          <center>
            <div class="section-title cler">
              <label style="color:grey; font-size:25px;">Cambio de contraseña</label>
            </div>
          </center>

          <div class="col-lg-12">
            <div class="col-lg-6 bottom" ><br>
              <label for="recipient-name" class="control-label">Actual contraseña:</label>
              <input type="password" required="required" class="form-control" id="txtPassA" name="txtPassA">
            </div>
          </div>

          <div class="col-lg-12 bottom">
            <div class="col-lg-6 bottom" ><br>
              <label for="recipient-name" class="control-label">Nueva contraseña:</label>
              <input type="password" required="required" class="form-control" id="txtPass1" name="txtPas1" placeholder="8 caracteres minimo">
            </div>

            <div class="col-lg-6 bottom"><br>
              <label for="recipient-name" class="control-label">Confirmar contraseña:</label>
              <input type="password" required="required" class="form-control" id="txtPass2" name="txtPass2"  placeholder="8 caracteres minimo">
            </div>
          </div>

          <div class="col-lg-12">
            <div class="col-lg-4 " style="float:right;"><br>
              <button type="button" onclick="EditarP()" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Verifica tus datos antes de Actualizar">Actualizar</button>
            </div>
          </div>

        </div>
      </form>
    </div>


  </div>

  <?php include("view/overall/footer.php"); ?>
  <script type="text/javascript">
  $(".js-modal-btn").modalVideo();
  </script>
</body>
<?php }else {?>
  <script type="text/javascript">
  location.href ="?mwc=error";
  </script>
<?php } ?>
