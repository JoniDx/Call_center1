<?php include("view/overall/head.php"); ?>
<body>
  <?php include("view/overall/menu1.php") ?>
  <div class="container " style="color:gray; ">
    <div class="rows">
      <!-- <center class=""> -->
        <div class="">
          <div class="">
            <form class="" action="index.php" method="post">
              <div class="form-group">

                <div class="col-lg-4" style="margin-bottom:15px;">
                  <label for="recipient-name" class="control-label">Nombre:</label><br>
                  <input type="text" required="required" class="form-control" id="txtUsuario" name="txtUsuario">
                </div>

                <div class="col-lg-4" style="margin-bottom:15px;">
                  <label for="recipient-name" class="control-label">Apellido Paterno:</label><br>
                  <input type="text" required="required" class="form-control" id="txtApellidop" name="txtApellidop">
                </div>

                <div class="col-lg-4 bottom" >
                  <label for="recipient-name" class="control-label">Apellido Materno:</label><br>
                  <input type="text" required="required" class="form-control" id="txtApellidom" name="txtApellidop">
                </div>

                <div class="col-lg-4"><br>
                  <label for="recipient-name" class="control-label">Email:</label>
                  <input type="email" required="required" class="form-control" id="txtEmail" name="txtEmail" placeholder="example@gmail.com">
                </div>

                <div class="col-lg-4"><br>
                  <label for="recipient-name" class="control-label">Sexo:</label>
                  <select class="form-control" required="required" class="form-control" id="txtSexo" name="txtSexo" >
                    <option value=""> - Seleccione Tipo - </option>
                    <option value="Hombre"> Hombre </option>
                    <option value="Mujer"> Mujer </option>
                  </select>
                </div>

                <div class="col-lg-4 bottom"><br>
                  <label for="recipient-name" class="control-label">Teléfono:</label><br>
                  <input type="text" required="required" maxlength="10" class="form-control" id="txtTelefono" name="txtTelefono">
                </div>

                <div class="col-lg-4 bottom"><br>
                  <label for="recipient-name" class="control-label">Dirección:</label><br>
                  <input type="text" required="required" class="form-control" id="txtDireccion" name="txtDireccion">
                </div>

                <div class="col-lg-4 bottom"><br>
                  <label for="recipient-name" class="control-label">Código postal:</label><br>
                  <input type="text" required="required" maxlength="5" class="form-control" id="txtCP" name="txtCP">
                </div>

                <div class="col-lg-12">
                  <div class="col-lg-6 bottom">
                    <div class="form-group">
                      <label for="recipient-name" class="control-label">Estado</label>
                      <select class="form-control" name="txtEstado" id="txtEstado">
                        <option value=""> - Seleccione Uno - </option>
                        <?php for ($i=0;$i< sizeof($lstestado);$i++) { ?>
                          <option value="<?php echo $lstestado[$i]["IdEstado"]; ?>"><?php echo $lstestado[$i]["NomEstado"]; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-lg-6 bottom" >
                    <div class="form-group">
                      <label for="recipient-name" class="control-label">Ciudad</label>
                      <div class="" id="Ciudad">
                      </div>

                    </div>
                  </div>
                </div>

                <div class="col-lg-6 bottom" ><br>
                  <label for="recipient-name" class="control-label">Contraseña:</label>
                  <input type="password" required="required" class="form-control" id="txtPass" name="txtPass" placeholder="8 carácteres mínimo">
                </div>

                <div class="col-lg-6 bottom"><br>
                  <label for="recipient-name" class="control-label">Confirmar Contraseña:</label>
                  <input type="password" required="required" class="form-control" id="txtPass1" name="txtPass1"  placeholder="8 carácteres mínimo">
                </div>

                <div class="col-lg-4" style="float:right;"><br>
                  <button type="button" onclick="AddUsuario()" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Verifica tus datos antes de Registrarte">Registrar</button>
                  <button type="button" onclick="window.location.href='?mwc=index'" class="btn btn-danger" data-toggle="tooltip" data-placement="top" >Cancelar</button>
                </div>

              </div>
            </form>
          </div>
        </div>
      <!-- </center> -->
    </div>
  </div>
  <?php include("view/overall/footer.php"); ?>
</body>
