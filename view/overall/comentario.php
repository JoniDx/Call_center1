<?php
  // require('../../models/Class.System.php');
  // require('view/ajax/Hora.php');

  if ($_SESSION['IdTiket']!="") {
    $Ticket=$_SESSION['IdTiket'];
    $_SESSION['IdTiket']="";
  }else {
    $Ticket=$_SESSION['IdTicketR'];
  }
  $codigo=$_SESSION['Codigo'];
  $db = new Conexion();

  $sql1 = $db->query("SELECT * FROM tblp_ticket WHERE tblp_ticket.Codigo = '$codigo' OR tblp_ticket.IdTicket = '$Ticket'");
  $db->rows($sql1);
  $datos = $db->recorrer($sql1);
  $IdTicket=$datos["IdTicket"];
  $use=$datos["IdUser"];

  $sql = $db->query("SELECT * FROM tblp_respuestap WHERE tblp_respuestap.IdTicket = '$IdTicket' ORDER BY FecCap DESC ");
  while($a = $db->recorrer($sql)){
    $respuestapl[] = $a;
  }

  $sql4 = $db->query("SELECT * FROM tblp_usuarios WHERE tblp_usuarios.IdUsuario = '$use' ");
  $X = $db->recorrer($sql4);
  if ($X['IdPermiso']==1) {
    $T="Gerente";
  }elseif ($X['IdPermiso']==2) {
    $T="Empleado";
  }elseif ($X['IdPermiso']==3) {
    $T="Cliente";
  }elseif ($X['IdPermiso']==0) {
    $T="No Asignado";
  }
  ?>

  <!-- // if ($respuestapl[$i]["IdUsuario"]=="") {?> -->

<?php  ?>
    <div class="container bottom cler">
      <div class="rows" >
        <div class=" col-lg-8">
        <?php for ($i=0;$i<sizeof($respuestapl);$i++) {
          $user=$respuestapl[$i]["IdUsuario"];
          $IdDoc = $respuestapl[$i]["Ubicacion"];
          $sql5 = $db->query("SELECT * FROM tblc_doc WHERE tblc_doc.IdDoc = '$IdDoc' ");
          $Doc = $db->recorrer($sql5);
          $IdRespuesta=$Doc["IdRespuesta"];
          $ubicacion=$Doc["Ubicacion"];
          $nombreDoc = explode("R".$IdRespuesta,$ubicacion);

          $sql3 = $db->query("SELECT * FROM tblp_usuarios WHERE tblp_usuarios.IdUsuario = '$user' ");
          while($w = $db->recorrer($sql3)){
            if ($w['IdPermiso']==1) {
              $P="Gerente";
            }elseif ($w['IdPermiso']==2) {
              $P="Empleado";
            }elseif ($w['IdPermiso']==3) {
              $P="Cliente";
            }elseif ($w['IdPermiso']==0) {
              $P="No Asignado";
            } ?>
          <div class="panel panel-success" style="background-color:#D5F5E3;">
            <div style="margin-top:10px; ">
              <div style="float:left">
                <i class="fa fa-user" style="font-size:50px;margin-left:15px;width:50px; " aria-hidden="true"></i>
              </div>
              <div style="padding:5px;" >
                <label for="" style="width:450px; " ><?php echo $w['Nombre']." ".$w['APaterno']." ".$w['AMaterno']; ?> </label>
                <label for="" ><?php echo $respuestapl[$i]["FecCap"]; ?></label><br>
                <label for="" ><?php echo $P ;?></label>
              </div>
            </div>
            <div class="panel-body" style="color:grey; background-color:white;">
              <div class="" style="">
                <p style="text-align:justify;"><?php echo  $respuestapl[$i]["Descripcion"];?></p><br>
                <?php if ($w["IdPermiso"]==3) {?>
                  <label for="">Telefono: <?php echo $w['Telefono'] ?></label>
                <?php }?>
              </div>
            </div>
            <!-- Adjuntos -->
            <div style="margin-top:10px; ">
              <div style="padding:5px;" >
                <?php if ($respuestapl[$i]["Ubicacion"]!="") {?>
                  <label for="" style="margin-left:10px;"> <a href='assets/adjuntos/<?php echo $Doc["Ubicacion"]; ?>'  target="_blank"> Adjunto:&nbsp; <?php echo $nombreDoc[1]; ?></a> </label>
                <?php } ?>
              </div>
            </div>
          </div>

        <?php } } ?>
        <!-- Ticket -->
        <?php
        $sql6 = $db->query("SELECT * FROM tblc_doc WHERE tblc_doc.IdTicket = '$IdTicket' ");
        $Docs = $db->recorrer($sql6);
        $ubicaciones=$Docs["Ubicacion"];
        $nombreDocs = explode($IdTicket,$ubicaciones);
        ?>
        <div class="panel panel-success" style="background-color:#D5F5E3;">
          <div style="margin-top:10px; ">
            <div style="float:left">
              <i class="fa fa-user" style="font-size:50px;margin-left:15px;width:50px; " aria-hidden="true"></i>
            </div>
            <div style="padding:5px;" >
              <label for="" style="width:450px;" ><?php echo $datos["NombreU"]; ?> </label>
              <label for="" ><?php echo $datos["FecCap"]; ?></label><br>
              <label for="" ><?php echo $T;?></label>
            </div>
          </div>
          <div class="panel-body" style="color:grey; background-color:white;">
            <div class="" style="">
              <p style="text-align:justify;"><?php echo  $datos["Descripcion"];?></p><br>
              <label for="">Telefono: <?php echo $X['Telefono'] ?></label>
            </div>
          </div>

          <div style="margin-top:10px; ">
            <div style="padding:5px;" >
              <?php if ($datos["IdDoc"]!="") {?>
                <label for="" style="margin-left:10px;"> <a href='assets/adjuntos/<?php echo $Docs["Ubicacion"]; ?>'  target="_blank"> Adjunto:&nbsp; <?php echo $nombreDocs[1]; ?></a> </label>
              <?php } ?>
            </div>
          </div>
        </div>
        </div>

        <?php include("view/overall/Panel.php") ?>

        <?php if ($datos['Estatus']!='3'&&($datos['Estatus']=='2'||$datos['Encargado']==$_SESSION["IdUsuario"])) { ?>
          <div class="col-lg-8" style="float:left; " id="Responder">
            <br>

            <div class="form-group ">
              <input type="hidden" name="txtIdTicket" id="txtIdTicket" value="<?php echo $IdTicket; ?>">
              <input type="hidden" name="txtPermiso" id="txtPermiso" value="<?php echo $_SESSION["IdPermiso"]; ?>">

              <label for="recipient-name" class="control-label" >Contestar:</label>
              <textarea id="txtDescripcion" name="txtDescripcion" class="col-sm-12 form-control"  rows="3"></textarea>
            </div>
            <div class="form-group" >
              <label style="margin-top:20px;" for="Adjuntos" style="text-align: left;">Adjuntos: <br>
              <input id="txtImgT" name="txtImgT" type="file"  class="btn btn-outline-secondary" onchange="validarArchivoCo(this,'txtImgT');" >
              <p class="help-block">El archivo puede ser en formato .png .jpg .jpeg .pdf .docx .pptx .xlsx .txt</p>
            </div>
            <div  class=" "><br>
              <button type="button" onclick="Cerrar()" class="btn btn-danger" style="float:left; margin-left:15px; <?php if ($_SESSION["IdPermiso"] == '3' || $_SESSION["IdPermiso"] == '0' ) {echo "display:none;";} ?>" data-placement="top" >Cerrar Ticket</button>
              <button type="button" style="float:right;" <?php if ($_SESSION["IdUsuario"] !="") {
              echo "onclick='Respuesta()'";}else {
                echo "onclick='window.location.href = 'javascript:void(0);';'
                data-toggle='modal' data-target='#responsive-modal'";
              } ?> class="btn btn-danger"  data-placement="top" >Enviar</button>
            </div>
          </div>

        <?php } ?>


        </div>
      </div>
    </div>
