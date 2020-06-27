<?php if ($_GET["Id"]<5 ){?>
  <?php include("view/overall/head.php"); ?>
  <body>
    <?php include("view/overall/menu2.php") ?>
    <?php require('view/ajax/Hora.php'); $datot = new Time();?>


    <div class="container">
      <div class="">
        <div class="">
          <table><br><br>
          <tr>
           <td class="col-lg-2" height="100" style="background-color: #5499C7;"><center><a href="?mwc=lstticket&Id=1"><div><i class="fa fa-paper-plane" aria-hidden="true" style="font-size: 50px; color:white;"> </i></div></a></center></td>
            <td class="col-lg-2" height="100" style="background-color: #D5D8DC;"><center><a href="?mwc=lstticket&Id=1"><label for="" style="font-size:20px;">
              <?php if ($NumBo2[0][0]!="") { echo $NumBo2[0][0];} else { echo "0"; } ?>
              <?php if ($NumBo2[1][0]!="") { echo "/".$NumBo2[1][0];} ?>
             </label><br>Enviados / Espera</center></a></td>
            <td width="50">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td class="col-lg-2 col-sm-1"  height="100" style="background-color: #2ECC71;"><center><a href="?mwc=lstticket&Id=3"><i class="fa fa-check" aria-hidden="true" style="font-size: 50px; color:white;"> </i></a></center></td>
            <td class="col-lg-2" height="100" style="background-color: #D5D8DC;"><center><a href="?mwc=lstticket&Id=3"><label for="" style="font-size:20px;"> <?php echo $NumBo4[0][0]; ?>  </label> <br>Cerrados</center></a></td>
            <td width="50">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td class="col-lg-2 col-sm-1"  height="100" style="background-color: #E74C3C;"><center><a href="?mwc=lstticket&Id=4"><i class="fa fa-clock-o" aria-hidden="true" style="font-size: 50px; color:white;"> </i></a></center></td>
            <td class="col-lg-2" height="100" style="background-color: #D5D8DC;"><center><a href="?mwc=lstticket&Id=4"><label for="" style="font-size:20px;"> <?php echo $NumBo5[0][0]; ?>  </label> <br>Atrasados</center></a></td>
          </tr>
          </table>
        </div>

        <div class="cler">
          <?php if ($_GET["Id"]==0) { ?>
            <table id="myTable" class="table table-striped">

              <thead>
                  <tr>
                      <th>Asunto</th>
                      <th>Servicio</th>
                      <th>Descripcion</th>
                      <th>Estatus</th>
                      <th>Fecha</th>
                      <th>Tiempo</th>
                      <th>Detalles</th>
                      <th>Seguimiento</th>
                  </tr>
              </thead>
              <tbody>
                <?php for ($i=0;$i< sizeof($lsttickets);$i++) { $IdR = $lsttickets[$i]["IdTicket"];
                  $rest = $lsttickets[$i]["Descripcion"];
                  $desc = substr($rest, 0, 15).'...';
                  $time = $lsttickets[$i]["Duracion"];
                  $text = $datot->toHours($time);
                  ?>
                <input id="idt" name="idt" value="<?php echo $IdR;?>" type="hidden"/>
                  <tr>
                  <form class="" action="?mwc=respuesta" method="post">
                    <input type="hidden" name="txtIdTicket" id="txtIdTicket"  value="<?php echo $lsttickets[$i]["IdTicket"]; ?>">
                    <td><?php echo $lsttickets[$i]["Asunto"]; ?></td>
                    <td><?php echo $lstticketServices[$i]["Nombre"]; ?></td>
                    <td><?php echo $desc; ?></td>
                    <td><?php echo $lstestatus[$i]["Nombre"]; ?></td>
                    <td><?php echo $lsttickets[$i]["FecCap"]; ?></td>
                    <td><?php echo $text;?></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-info view_ticket"  name="view" value="view" id="<?php echo $lsttickets[$i]["IdTicket"]; ?>"><i class="fa fa-file-o" aria-hidden="true"></i></button> </td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" name="button" onclick="location.href='?mwc=respuesta&Id=<?php echo $lsttickets[$i]["IdTicket"]; ?>'" class="btn btn-danger"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> </td>
                  </form>
                  </tr>
                <?php } ?>
                </tbody>

              </table>

            <?php }else if ($_GET["Id"]>0){?>

              <table id="myTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>Asunto</th>
                        <th>Servicio</th>
                        <th>Descripcion</th>
                        <th>Estatus</th>
                        <th>Fecha</th>
                        <th>Tiempo</th>
                        <th>Detalles</th>
                        <th>Segimiento</th>
                    </tr>
                </thead>
                <tbody>
                  <?php for ($i=0;$i< sizeof($lstticketsE);$i++) { $IdR = $lstticketsE[$i]["IdTicket"];
                    $rest = $lstticketsE[$i]["Descripcion"];
                    $desc = substr($rest, 0, 15).'...';
                    $time = $lstticketsE[$i]["Duracion"];
                    $text = $datot->toHours($time);
                    $f=0;
                    $f++;
                    ?>
                  <input id="idt" name="idt" value="<?php echo $IdR;?>" type="hidden"/>

                  <tr>
                    <form class="" action="?mwc=respuesta" id="<?php echo $f; ?>" method="post">
                    <input type="hidden" name="txtIdTicket" value="<?php echo $lstticketsE[$i]["IdTicket"]; ?>">
                    <td><?php echo $lstticketsE[$i]["Asunto"]; ?></td>
                    <td><?php echo $lstticketService[$i]["Nombre"]; ?></td>
                    <td><?php echo $desc; ?></td>
                    <td><?php echo $lstestatusE[$i]["Nombre"]; ?></td>
                    <td><?php echo $lstticketsE[$i]["FecCap"]; ?></td>
                    <td><?php echo $text; ?></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-info view_ticket"  name="view" value="view" id="<?php echo $lstticketsE[$i]["IdTicket"]; ?>"><i class="fa fa-file-o" aria-hidden="true"></i></button></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" name="button" onclick="location.href='?mwc=respuesta&Id=<?php echo $lstticketsE[$i]["IdTicket"]; ?>'" class="btn btn-danger"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> </td>
                    </form>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
           <?php }?>
          </div>
        </div>
      </div>

      <div id="dataModal1" class="modal fade bs-example-modal-lg2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myLargeModalLabel">Detalles del Ticket</h4>
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
    </body>
  <?php }else {?>
    <script type="text/javascript">
    location.href ="?mwc=error";
    </script>
  <?php }?>
