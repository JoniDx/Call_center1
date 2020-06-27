<?php include("view/overall/head.php"); ?>
<?php
$iduser = $_SESSION["IdUsuario"];
$nombre=$_SESSION["Nombre"] ;
$AP=$_SESSION["APaterno"] ;
$AM= $_SESSION["AMaterno"] ;
$email = $_SESSION["email"] ;
$telefono = $_SESSION["Telefono"];
$estado = $lstestado[0]["NomEstado"];
$ciudad = $lstmunicipio[0]["NomMunicipio"];
$idusuario=$lstdatos[0]["IdUsuario"];
$direccion=$lstdatos[0]["Direccion"];
$cp=$lstdatos[0]["CP"];
 ?>

<?php if ($iduser==$_GET["Id"]){?>
<body>
  <?php include("view/overall/menu2.php") ?>


  <!-- <section id="home" class="welcome-hero2"> -->
  <div class="container">
    <div class="panel panel-danger col-lg-3 col-sm-6 cler">
      <div class="panel-heading" style="margin-top:12px;">Mi cuenta</div>
      <div class="panel-body" style="color:grey;">
        <h1><?php echo $nombre." ".$AP." ".$AM; ?></h1><br>
        <p><?php echo $email; ?> <br> <?php echo "+52 ".$telefono; ?> </p>
        <h3 style="color:grey;"><?php echo $direccion; ?></h3>
        <h3 style="color:grey; margin-top:4px; margin-bottom:10px;"><?php echo $estado.", ".$ciudad.", ".$cp; ?></h3>
        <button onclick="location.href='?mwc=UdpUser&Id=<?php echo $iduser; ?>'"  class="btn btn-danger" style="float:right;"> <i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Actualizar</button>
      </div>
    </div>

    <div class="col-lg-9 col-sm-12" style="margin-top:14px; margin-bottom:122px;">
      <div class="">
        <label style="color:grey; font-size:20px;" > Tickets de soporte - recientes</label>
        <hr width="100%" style="float:left ;"/>
        <br>
        <table style="font-size:14px;" id="myTable" class="table table-striped">
          <thead>
              <tr>
                  <th>Asunto</th>
                  <th>Descripcion</th>
                  <th>Estatus</th>
                  <th>Fecha</th>
                  <th>Detalles</th>
                  <th>Seguimiento</th>
              </tr>
          </thead>
          <tbody>
            <?php for ($i=0;$i< sizeof($lsttickets);$i++) { $IdR = $lsttickets[$i]["IdTicket"];?>
            <?php
            $rest = $lsttickets[$i]["Descripcion"];
            $desc = substr($rest, 0, 15).'...';
            ?>
            <input id="idt" name="idt" value="<?php echo $IdR;?>" type="hidden"/>
              <tr>
                <form class="" action="?mwc=respuesta" method="post">
                <input type="hidden" name="txtIdTicket" value="<?php echo $lsttickets[$i]["IdTicket"]; ?>">
                <td><?php echo $lsttickets[$i]["Asunto"]; ?></td>
                <td><?php echo $desc; ?></td>
                <td><?php echo $lstestatus[$i]["Nombre"]; ?></td>
                <td><?php echo $lsttickets[$i]["FecCap"]; ?></td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-danger view_ticket"  name="view" value="view" id="<?php echo $lsttickets[$i]["IdTicket"]; ?>"><i class="fa fa-eye" aria-hidden="true"></i></button> </td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" name="button" onclick="location.href='?mwc=respuesta&Id=<?php echo $lsttickets[$i]["IdTicket"]; ?>'" class="btn btn-danger"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></td>
                </form>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>



  </div>

  <div id="dataModal1" class="modal fade bs-example-modal-lg2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myLargeModalLabel">Detalles del ticket</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body" id="employee_detail3">

        </div>
      </div>
    </div>
  </div>


  <?php include("view/overall/footer.php"); ?>
  <script type="text/javascript">
    $(document).ready(function()
    {
      $(document).on('click', '.view_ticket', function()
      {
        var IdTicket = $(this).attr("id");
         if(IdTicket != '')
         {
          $.ajax(
            {
              url:"view/ajax/ticketCliente.php",
              method:"POST",
              data:{IdTicket:IdTicket},
              success:function(data){
                 $('#employee_detail3').html(data);
                 $('#dataModal1').modal('show');
              }
          });
         }
        });
      });
    </script>
  <script type="text/javascript">
  $(".js-modal-btn").modalVideo();
  </script>
</body>
<?php }else {?>
  <script type="text/javascript">
    location.href ="?mwc=error";
  </script>
<?php }?>
