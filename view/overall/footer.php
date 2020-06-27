<br>
<?php $estado = $_SESSION["Estado"]; ?>
<footer id="footer"  class="footer">
  <div class="container">
    <!-- <div class="footer-menu">
            <div class="row">
              <div class="col-sm-3">
                 <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">list<span>race</span></a>
                </div>
              <div class="col-sm-9">
                <ul class="footer-menu-item">
                      <li class="scroll"><a href="#works">how it works</a></li>
                      <li class="scroll"><a href="#explore">explore</a></li>
                      <li class="scroll"><a href="#reviews">review</a></li>
                      <li class="scroll"><a href="#blog">blog</a></li>
                      <li class="scroll"><a href="#contact">contact</a></li>
                      <li class=" scroll"><a href="#contact">my account</a></li>
                  </ul>
              </div>
           </div>
    </div> -->
    <div class="hm-footer-copyright">
      <div class="rows">
        <div class="col-sm-5">
          <p>
            &copy;Copyright. Diseñado y desarrollado por <a href="https://mwc.com.mx/">MWConsultores</a>
          </p><!--/p--><br>
          <span><i class="fa fa-phone"> 01 800 999 1381</i></span>

        </div>
       <br>

        <div class="col-sm-7">
          <div class="footer-social" style="float:right">
            <a target="_blank" style="padding:10px;" href="https://www.facebook.com/MWConsultores/"><i class="fa fa-facebook"></i></a>
            <!-- <a href="#"><i class="fa fa-twitter"></i></a> -->
            <a  target="_blank" style="padding:10px;" href="https://www.linkedin.com/company/dr-retail/"><i class="fa fa-linkedin"></i></a>
            <!-- <a href="#"><i class="fa fa-google-plus"></i></a> -->
          </div>
        </div>
      </div>
      <br>


    </div><!--/.hm-footer-copyright-->
  </div><!--/.container-->

  <div id="scroll-Top">
    <div class="return-to-top">
      <i class="fa fa-angle-up " id="scroll-top" data-toggle="tooltip" data-placement="top" title="" data-original-title="Back to Top" aria-hidden="true"></i>
    </div>

  </div><!--/.scroll-Top-->

    </footer><!--/.footer-->
<!--footer end-->

<!-- Include all js compiled plugins (below), or include individual files as needed -->

<script src="assets/js/jquery.js"></script>

    <!--modernizr.min.js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

<!--bootstrap.min.js-->
    <script src="assets/js/bootstrap.min.js"></script>

<!-- bootsnav js -->
<script src="assets/js/bootsnav.js"></script>

    <!--feather.min.js-->
    <script  src="assets/js/feather.min.js"></script>

    <!-- counter js -->
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>

    <!--slick.min.js-->
    <script src="assets/js/slick.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

    <!--Custom JS-->
    <script src="assets/js/custom.js"></script>

    <script src="assets/js/ingresar.js"></script>

    <script src="assets/js/effect.js"></script>

    <script src="assets/js/AgregarUsuario.js"></script>
    <script src="assets/js/AgregarTicket.js"></script>
    <script src="assets/js/Respuesta.js"></script>



    <script src="assets/js/jquery-modal-video.js"></script>

    <script src="assets/js/modal-video.js"></script>

    <script src="assets/sweetalert/sweetalert.min.js"></script>
    <script src="assets/sweetalert/jquery.sweet-alert.custom.js"></script>
    
    <script type="text/javascript" src="assets/DataTables/datatables.min.js"></script>

    <script>
    $(document).ready( function () {
      $('#myTable').DataTable(
        {
          language: {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
       }
      );
    } );
    </script>



    <script type="text/javascript">
    $(document).ready(function(){
      $('#txtEstado').val(<?php echo $estado ?>);
      recargarLista();

      $('#txtEstado').change(function(){
        recargarLista();
      });
    })
  </script>
  <script type="text/javascript">
  function recargarLista(){
    $.ajax({
      type:"POST",
      url:"view/ajax/ciudades.php",
      data:"Estado=" + $('#txtEstado').val(),
      success:function(r){
        $('#Ciudad').html(r);
      }
    });
  }
  </script>
