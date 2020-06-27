<?php if ($_SESSION["IdPermiso"]==1){ ?>
  <?php if ($_GET["Id"]>=4||$_GET["Est"]>=4){?>
    <script type="text/javascript">
    location.href ="?mwc=error";
    </script>
  <?php }else {?>
<?php include("view/overall/head.php"); ?>
<body>
  <?php include("view/overall/menu2.php") ?>
  <div class="container">
    <div class="">

      <div class="">
        <table><br><br>
        <tr>
          <td class="col-lg-2" height="100" style="background-color: #2ECC71; "><center><a href="?mwc=Usuarios&Id=0"><i class="fa fa-user-plus" aria-hidden="true" style="font-size: 50px; color:white;"> </i></a></center></td>
          <td class="col-lg-2" height="100" style="background-color: #D5D8DC; "><center><a href="?mwc=Usuarios&Id=0"><label for="" style="font-size:20px;"> <?php echo $NumBo2[0][0]; ?> </label> <br>Nuevos</center></a></td>
          <td width="50">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
          <td class="col-lg-2" height="100" style="background-color: #F1C40F; "><center><a href="?mwc=Usuarios&Id=3"><i class="fa fa-users" aria-hidden="true" style="font-size: 50px; color:white;"> </i></a></center></td>
          <td class="col-lg-2" height="100" style="background-color: #D5D8DC; "><center><a href="?mwc=Usuarios&Id=3"><label for="" style="font-size:20px;"> <?php echo $NumBo4[0][0]; ?>  </label> <br>Clientes</center></a></td>
          <td width="50">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
          <td class="col-lg-2" height="100" style="background-color: #E74C3C; "><center><a href="?mwc=Usuarios&Id=2"><i class="fa fa-user-o" aria-hidden="true" style="font-size: 50px; color:white;"> </i></a></center></td>
          <td class="col-lg-2" height="100" style="background-color: #D5D8DC; "><center><a href="?mwc=Usuarios&Id=2"><label for="" style="font-size:20px;"> <?php echo $NumBo5[0][0]; ?>  </label> <br>Encargados</center></a></td>
        </tr>
        </table>
      </div>

      <hr width="100%" style="float:left ;"/>
      <table id="myTable" class="table table-striped">
        <thead>
            <tr>
              <th>Id Usuario</th>
              <th>Nombre</th>
              <th>Correo</th>
              <th>Direccion</th>
              <th>Telefono</th>
              <th>Detalles</th>
            </tr>
        </thead>
        <tbody>
          <?php for ($i=0;$i< sizeof($lstusers);$i++) { $IdR = $lstusers[$i]["IdUsuario"];?>
          <input id="idt" name="idt" value="<?php echo $IdR;?>" type="hidden"/>
          <tr  >
            <td><?php echo $lstusers[$i]["IdUsuario"]; ?></td>
            <td><?php echo $lstusers[$i]["Nombre"]." ".$lstusers[$i]["APaterno"]." ".$lstusers[$i]["AMaterno"] ; ?></td>
            <td><?php echo $lstusers[$i]["email"]; ?></td>
            <td><?php echo $lstusers[$i]["Direccion"]; ?></td>
            <td><?php echo $lstusers[$i]["Telefono"]; ?></td>
            <td> <button type="button" class="btn btn-info view_miembro"  name="view" value="view" id="<?php echo $lstusers[$i]["IdUsuario"]; ?>"><i class="fa fa-file-o" aria-hidden="true"></i></button> </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

  <div id="dataModal1" class="modal fade bs-example-modal-lg2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myLargeModalLabel">Editar Registro</h4>
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
  $(".js-modal-btn").modalVideo();
  </script>

  <script type="text/javascript">
		$(document).ready(function(){
		  $(document).on('click', '.view_miembro', function(){
		    var IdUsuario = $(this).attr("id");
		     if(IdUsuario != '')
		     {
		        $.ajax({
		          url:"view/ajax/usuarioModal.php",
		          method:"POST",
		          data:{IdUsuario:IdUsuario},
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
