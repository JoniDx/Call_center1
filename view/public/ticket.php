<?php if ($_SESSION["IdUsuario"]) {?>

<?php include("view/overall/head.php"); ?>
<body>
  <?php include("view/overall/menu2.php"); ?>
  <?php require('view/ajax/Hora.php');

  $db = new Conexion();
  $_SESSION["Tic"]=1;

    if ((isset($_POST["MovI"]) && $_POST["MovI"]=="GuardarI")) {
        $file->add_Img();
          exit;
        }
   ?>
  <?php
  $nombre=$_SESSION["Nombre"] ;
  $AP=$_SESSION["APaterno"] ;
  $AM= $_SESSION["AMaterno"] ;
  $email = $_SESSION["email"] ;
  $telefono = $_SESSION["Telefono"];
  $id=$_SESSION["IdUsuario"];
   ?>

  <div class="container">



    <div class="col-md-8 col-sm-6 col-xs-12">
      <form class="" action="?mwc=ticket" name="frmI" id="frmI"  method="POST" enctype="multipart/form-data">
        <input id="MovI" name="MovI" value="<?php echo $_GET['MovI'];?>" type="hidden"/>
        <input id="id" name="id" value="<?php echo $id;?>" type="hidden"/>

        <div class="row">

          <div class="col-lg-6" >
            <br>
            <div class="form-group">
              <label for="recipient-name" class="control-label">Nombre:</label>
              <input type="text" class="form-control"  id="txtNombre" name="txtNombre"  <?php if ($_SESSION["IdPermiso"]=='3') {
                echo "disabled=true";
              }?> value="<?php if ($_SESSION["IdPermiso"]=='3') {
                echo $nombre." ".$AP." ".$AM;
              } ?>" >
            </div>
          </div>

          <div class="col-lg-6">
            <br>
            <div class="form-group">
              <label for="recipient-name" class="control-label" >Email:</label>
              <input type="text" class="form-control"  id="txtEmail" name="txtEmail"<?php if ($_SESSION["IdPermiso"]=='3') {
                echo "disabled=true";
              }?> value="<?php if ($_SESSION["IdPermiso"]=='3') {
                echo $email;
              }?>" >
            </div>
          </div>

          <div class="col-lg-4" >
            <br>
            <div class="form-group">
              <label for="recipient-name" class="control-label" >Asunto:</label>
              <input type="text" class="form-control"  id="txtAsunto" name="txtAsunto" value="" >
            </div>
          </div>

          <div class="col-lg-4 col-xs-6">
            <br>
            <div class="form-group">
              <label for="recipient-name" class="control-label" >Telefono:</label>
              <input type="text" class="form-control"  id="txtTelefono" name="txtTelefono" <?php if ($_SESSION["IdPermiso"]=='3') {
                echo "disabled=true";
              }?> value="<?php if ($_SESSION["IdPermiso"]=='3') {
                echo $telefono;
              } ?>" >
            </div>
          </div>

          <div class="col-lg-4 col-xs-6" style="float:left;">
            <br>
            <div class="form-group">
              <label for="recipient-name" class="control-label">Servicio</label>
              <select class="form-control" name="txtServicio" id="txtServicio" >
                <option value=""> - Seleccione uno - </option>
                <?php for ($i=0;$i< sizeof($lstservicios);$i++) { ?>
                  <option value="<?php echo $lstservicios[$i]["IdServicio"]; ?>" <?php if($lstservicios[$i]["IdServicio"]==$lstservicios[$B]['IdServicio']){?>selected="selected"<?php }?>><?php echo $lstservicios[$i]["Nombre"]; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="col-xs-12" >
            <br>
            <div class="form-group">
              <label for="recipient-name" class="control-label" >Descripcion:</label>
              <textarea type="text" id="txtDescripcion" name="txtDescripcion" class="col-xl-12 form-control"  rows="6"> </textarea>
            </div>
          </div>

          <div class="col-xs-6">
            <br>
            <div class="form-group">
              <label for="inputPassword3" style="text-align: left;">Adjuntos: <br>
              <input id="txtImgT" name="txtImgT" type="file"  class="btn btn-outline-secondary" onchange="validarArchivoCo(this,'txtImgT');" >
              <p class="help-block">El archivo puede ser en formato .jpg .jpeg .png .pdf .docx .pptx .xlsx .txt</p>
            </div>
          </div>
        </div>

        <div style="float:right;" class="btn-group">
          <button type="button" onclick="AddTicket()" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Verifique los campos antes de Enviar" >Enviar</button>
          <button type="button" onclick="window.location.href='?mwc=home'" class="btn btn-danger" data-toggle="tooltip" data-placement="top" >Cancelar</button>
        </div>
      </form>
    </div> <br>
    <?php include("view/overall/Panel.php") ?>
  </div>

  <?php include("view/overall/footer.php"); ?>
</body>
<?php }else {?>
  <script type="text/javascript">
  location.href ="?mwc=home";
  </script>
<?php } ?>
