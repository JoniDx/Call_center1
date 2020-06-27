<?php if ($_SESSION["IdPermiso"]==1){ ?>
  <?php if ($_GET["Id"]==2||$_GET["Est"]==2){?>
    <script type="text/javascript">
    location.href ="?mwc=error";
    </script>
  <?php }else {?>
    <?php include("view/overall/head.php"); ?>
    <body>
      <?php include("view/overall/menu2.php") ?>
      <?php require('view/ajax/Hora.php'); $datot = new Time();?>


      <div class="container">
        <div class="">

          <div class="cler">
            <?php if ($_GET["Id"]>5) { ?>

              <div class="">
                <table><br><br>
                <tr>
                  <td class="col-lg-2 col-sm-1"  height="100" style="background-color: #5499C7;"><center><a href="?mwc=lstticketG&Id=<?php echo $_GET["Id"]; ?>&Est=1"><i class="fa fa-paper-plane" aria-hidden="true" style="font-size: 50px; color:white;"> </i></a></center></td>
                  <td class="col-lg-2 col-sm-1"  height="100" style="background-color: #D5D8DC;"><center><a href="?mwc=lstticketG&Id=<?php echo $_GET["Id"]; ?>&Est=1"><label for="" style="font-size:20px;"> <?php echo $NumBo2D[0][0]; ?> </label> <br>Enviados</center></a></td>
                  <td width="50">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td class="col-lg-2 col-sm-1"  height="100" style="background-color: #2ECC71;"><center><a href="?mwc=lstticketG&Id=<?php echo $_GET["Id"]; ?>&Est=3"><i class="fa fa-check" aria-hidden="true" style="font-size: 50px; color:white;"> </i></a></center></td>
                  <td class="col-lg-2 col-sm-1"  height="100" style="background-color: #D5D8DC;"><center><a href="?mwc=lstticketG&Id=<?php echo $_GET["Id"]; ?>&Est=3"><label for="" style="font-size:20px;"> <?php echo $NumBo4D[0][0]; ?>  </label> <br>Cerrados</center></a></td>
                  <td width="50">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td class="col-lg-2 col-sm-1"  height="100" style="background-color: #E74C3C;"><center><a href="?mwc=lstticketG&Id=<?php echo $_GET["Id"]; ?>&Est=4"><i class="fa fa-clock-o" aria-hidden="true" style="font-size: 50px; color:white;"> </i></a></center></td>
                  <td class="col-lg-2 col-sm-1"  height="100" style="background-color: #D5D8DC;"><center><a href="?mwc=lstticketG&Id=<?php echo $_GET["Id"]; ?>&Est=4"><label for="" style="font-size:20px;"> <?php echo $NumBo5D[0][0]; ?>  </label> <br>Atrasado</center></a></td>
                </tr>
                </table>
              </div>


              <div class="cler col-lg-12">
                <select class="form-control" name="txtDate" id="txtDate" onchange="date()" style="width:200px; float:right; margin-bottom:20px;">
                  <option value="1">- Ordenar por fecha -</option>
                  <?php for ($i=0;$i< sizeof($datet);$i++) { ?>
                    <option value="<?php echo $datet[$i]["Fecha"]; ?>"><?php echo $datet[$i]["Fecha"]; ?></option>
                  <?php } ?>
                </select>
                <!-- <a href="?mwc=reporte" style="float:right; margin-right:10px; padding:7px;">Descargar <i class="fa fa-file-excel-o" aria-hidden="true"></i></a> -->
                <form action="view/ajax/reporteG.php" method="post">
                  <?php $excel = $_SESSION['IdUsuario'];  $Fec = $_GET["Id"];?>
                <input type="hidden" name="user" value="<?php echo $excel; ?>">
                <input type="hidden" name="fecha" value="<?php echo $Fec; ?>">
                <input type="submit" class="btn btn-danger waves-effect waves-ligh"   value="Reporte">
                </form>
              </div>

              <table id="myTable" class="table table-striped ">
                <thead>
                    <tr>
                        <th>Asunto</th>
                        <th>Servicio</th>
                        <th>Descripcion</th>
                        <th>Estatus</th>
                        <th>Fecha</th>
                        <th>Teimpo</th>
                        <th>Detalles</th>
                    </tr>
                </thead>
                <tbody>
                  <?php for ($i=0;$i< sizeof($lstticketG);$i++) { $IdR = $lstticketG[$i]["IdTicket"];
                    $rest = $lstticketG[$i]["Descripcion"];
                    $desc = substr($rest, 0, 15).'...';
                    $time=$lstticketG[$i]["Duracion"];
                    $text = $datot->toHours($time);
                    ?><?php if ($lstticketG[$i]["Reset"]>'0') { $color="#FCE4EC"; } else { $color="white"; } ?>
                  <input id="idt" name="idt" value="<?php echo $IdR;?>" type="hidden"/>
                  <tr  style="background-color:<?php echo $color; ?>;">
                    <td><?php echo $lstticketG[$i]["Asunto"]; ?></td>
                    <td><?php echo $lstticketServicesGD[$i]["Nombre"]; ?></td>
                    <td><?php echo $desc; ?></td>
                    <td><?php echo $lstestatusGD[$i]["Nombre"]; ?></td>
                    <td><?php echo $lstticketG[$i]["FecCap"]; ?></td>
                    <td><?php echo $text?></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-danger view_ticket"  name="view" value="view" id="<?php echo $lstticketG[$i]["IdTicket"]; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            <?php }else if ($_GET["Id"]>0 && $_GET["Id"]<5){?>
              <div class="">
                <table><br><br>
                <tr>
                  <td class="col-lg-2 col-sm-1"  height="100" style="background-color: #5499C7;"><center><a href="?mwc=lstticketG&Id=1"><i class="fa fa-paper-plane" aria-hidden="true" style="font-size: 50px; color:white;"> </i></a></center></td>
                  <td class="col-lg-2 col-sm-1"  height="100" style="background-color: #D5D8DC;"><center><a href="?mwc=lstticketG&Id=1"><label for="" style="font-size:20px;"> <?php echo $NumBo2[0][0]; ?> </label> <br>Enviados</center></a></td>
                  <td width="50">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td class="col-lg-2 col-sm-1"  height="100" style="background-color: #2ECC71;"><center><a href="?mwc=lstticketG&Id=3"><i class="fa fa-check" aria-hidden="true" style="font-size: 50px; color:white;"> </i></a></center></td>
                  <td class="col-lg-2 col-sm-1"  height="100" style="background-color: #D5D8DC;"><center><a href="?mwc=lstticketG&Id=3"><label for="" style="font-size:20px;"> <?php echo $NumBo4[0][0]; ?>  </label> <br>Cerrados</center></a></td>
                  <td width="50">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td class="col-lg-2 col-sm-1"  height="100" style="background-color: #E74C3C;"><center><a href="?mwc=lstticketG&Id=4"><i class="fa fa-clock-o" aria-hidden="true" style="font-size: 50px; color:white;"> </i></a></center></td>
                  <td class="col-lg-2 col-sm-1"  height="100" style="background-color: #D5D8DC;"><center><a href="?mwc=lstticketG&Id=4"><label for="" style="font-size:20px;"> <?php echo $NumBo5[0][0]; ?>  </label> <br>Atrasado</center></a></td>
                </tr>
                </table>
              </div>

              <div class="cler col-lg-12">
                <select class="form-control" name="txtDate" id="txtDate" onchange="date()" style="width:200px; float:right; margin-bottom:20px;">
                  <option value="1">- Ordenar por fecha -</option>
                  <?php for ($i=0;$i< sizeof($datet);$i++) { ?>
                    <option value="<?php echo $datet[$i]["Fecha"]; ?>"><?php echo $datet[$i]["Fecha"]; ?></option>
                  <?php } ?>
                </select>
                <!-- <a href="?mwc=reporte" style="float:right; margin-right:10px; padding:7px;">Descargar <i class="fa fa-file-excel-o" aria-hidden="true"></i></a> -->
                <form action="view/ajax/reporteG.php" method="post">
                  <?php $Fec = $_GET["Id"];?>
                <input type="hidden" name="fecha" value="<?php echo $Fec; ?>">
                </form>
              </div>


              <table id="myTable" class="table table-striped ">
                <thead>
                    <tr>
                        <th>Asunto</th>
                        <th>Servicio</th>
                        <th>Descripcion</th>
                        <th>Estatus</th>
                        <th>Fecha</th>
                        <th>Tiempo</th>
                        <th>Detalles</th>
                    </tr>
                </thead>
                <tbody>
                  <?php for ($i=0;$i< sizeof($lstticketsG);$i++) { $IdR = $lstticketsG[$i]["IdTicket"];

                    $rest = $lstticketsG[$i]["Descripcion"];
                    $desc = substr($rest, 0, 15).'...';
                    $time=$lstticketsG[$i]["Duracion"];
                    $text = $datot->toHours($time);
                    ?><?php if ($lstticketsG[$i]["Reset"]>'0') { $color="#FCE4EC"; } else { $color="white"; } ?>
                  <input id="idt" name="idt" value="<?php echo $IdR;?>" type="hidden"/>
                  <tr style="background-color:<?php echo $color; ?>;" >
                    <td><?php echo $lstticketsG[$i]["Asunto"]; ?></td>
                    <td><?php echo $lstticketServicesG[$i]["Nombre"]; ?></td>
                    <td><?php echo $desc; ?></td>
                    <td><?php echo $lstestatusG[$i]["Nombre"]; ?></td>
                    <td><?php echo $lstticketsG[$i]["FecCap"]; ?></td>
                    <td><?php echo $text ?></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-info view_ticket"  name="view" value="view" id="<?php echo $lstticketsG[$i]["IdTicket"]; ?>"><i class="fa fa-file-o" aria-hidden="true"></i></i></button> </td>
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
              <h4 class="modal-title" id="myLargeModalLabel"> <?php echo $lstticketsG[$i]["IdTicket"];; ?> </h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body" id="employee_detail3">

            </div>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


      <?php include("view/overall/footer.php"); ?>
      <script type="text/javascript">
        $(document).ready(function(){
          $(document).on('click', '.view_ticket', function(){
            var IdTicket = $(this).attr("id");
             if(IdTicket != '')
             {
                $.ajax({
                  url:"view/ajax/ticketmodal.php",
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
<?php }?>
<?php }else {?>
  <script type="text/javascript">
  location.href ="?mwc=error";
  </script>
<?php } ?>
