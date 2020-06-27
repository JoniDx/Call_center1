<header id="header-top" class="header-top">
  <section class="top-area">
    <div class="header-area">
      <?php   $iduser = $_SESSION["IdUsuario"]; ?>
      <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
        #idnvar{
          font-family:"Arial", Serif;
          background-color:#fff;
          overflow-x:hidden;
        }

        .navbar{
          background-color:#ffffff;
          overflow:hidden;
          height:63px;
        }

        .navbar a{
          float:left;
          display:block;
          color:#black;
          text-align:center;
          padding:14px 16px;
          text-decoration:none;
          font-size:17px;
        }

        .navbar ul{
          margin:8px 0 0 0;
          list-style:none;
        }

        .side-nav{
          height:100%;
          width:0;
          position:fixed;
          z-index:1;
          top:0;
          left:0;
          background-color:#111;
          opacity:0.9;
          overflow-x:hidden;
          padding-top:60px;
          transition:0.5s;
        }

        .side-nav a{
          padding:10px 10px 10px 30px;
          text-decoration:none;
          font-size:22px;
          color:#ccc;
          display:block;
          transition:0.3s;
        }

        .side-nav a:hover{
          color:#red;
        }

        .side-nav .btn-close{
          position:absolute;
          top:0;
          right:22px;
          font-size:36px;
          margin-left:50px;
        }

        #main{
          transition:margin-left 0.5s;
          padding:20px;
          overflow:hidden;
          width:100%;
        }

        /* @media(max-width:568px){
          .navbar-nav{display:none}
        } */

        @media(min-width:568px){
          /*.open-slide{display:none}*/
        }

        /* @media (max-width:1200px) {
          #bar{display:none}
         } */

        </style>
      </head>
      <!-- Start Navigation -->
      <body id="idnvar">

        <nav class="navbar" style="height:120px;">

          <a href="?mwc=home"><img src="assets/img/2mwcall.png"  style="width:200px; height:100px; margin-left:10px; margin-top: 5px;float:left;" ></a>
          <ul class="navbar-nav <?php if ($_SESSION["IdUsuario"]!="") { echo "visible-lg"; } ?>"  style="align:center; margin-top:40px;
          <?php if ($_SESSION['IdUsuario'] =='') { echo 'display:none;';} ?>">

            <li  class="scroll active" style="margin-left:50px"><a href="?mwc=home">Inicio <span class="sr-only">(current)</span></a></li>
            <!-- <li  class="scroll"><a href="#works">Servicios</a></li> -->
            <li ><a href="?mwc=software">Software</a></li>
            <?php if ($_SESSION["IdPermiso"]) {?>
              <?php if ($_SESSION["IdPermiso"]==3) {?>
                <li ><a href="?mwc=perfil&Id=<?php echo $iduser; ?>">Mi perfil</a></li>
                <li ><a href="?mwc=ticket">Abrir ticket</a></li>
                <li ><a href="?mwc=seguimiento">Seguimiento</a></li>
                <li ><a href="?mwc=lstticket&Id=0">Mis Ticket's</a></li>
              <?php } ?>
              <!-- <a class="dropdown-item menu" href="?mwc=Email">Email</a> -->
              <?php if($_SESSION["IdPermiso"] == 1){ ?>
                <li  ><a href="?mwc=Usuarios&Id=0">Usuarios</a></li>
                <li  ><a href="?mwc=lstticketG&Id=1">Ticket's</a></li>
              <?php }?>
              <?php if($_SESSION["IdPermiso"] == 2){ ?>
                <li ><a href="?mwc=ticket">Abrir ticket</a></li>
                <li  ><a href="?mwc=lstticketA&Id=1"> Mis ticket's</a></li>
              <?php }?>
              <li   role="separator" class="divider"></li>
              <li style="float:right;"><a href="?mwc=close"> <i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Cerrar sesión</a></li>
            <?php } ?>
            <?php if($_SESSION["IdUsuario"] == ""){ ?>
            <li><a href="javascript:void(0);" data-toggle="modal" data-target="#responsive-modal">Ingresar</a></li>
            <?php }?>

          </ul>


          <span class="open-slide <?php if ($_SESSION["IdUsuario"]) {echo "hidden-lg"; } ?>"  id="bar" style="margin-top: 30px; float:right;">
            <a href="#" onclick="openSlideMenu()">
              <svg width="30" height="30">
                  <path d="M0,5 30,5" stroke="#566573" stroke-width="5"/>
                  <path d="M0,14 30,14" stroke="#566573" stroke-width="5"/>
                  <path d="M0,23 30,23" stroke="#566573" stroke-width="5"/>
              </svg>
            </a>
          </span>
        </nav>


        <div id="side-menu" class="side-nav" style="text-align: left;">
          <a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>

          <!-- <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a> -->
          <a href="?mwc=home">Inicio <span class="sr-only">(current)</span></a>
          <!-- <a href="#works">Servicios</a> -->
          <a href="?mwc=software">Software</a>
          <?php if ($_SESSION["IdPermiso"]) {?>
            <?php if ($_SESSION["IdPermiso"]==3) {?>
            <a href="?mwc=perfil&Id=<?php echo $iduser; ?>">Mi perfil</a>
            <a href="?mwc=ticket">Abrir ticket</a>
            <a href="?mwc=seguimiento">Seguimiento</a>
            <a href="?mwc=lstticket&Id=0">Mis ticket's</a>
            <?php }?>

            <!-- <a class="dropdown-item menu" href="?mwc=Email">Email</a> -->
            <?php if($_SESSION["IdPermiso"] == 1){ ?>
              <a href="?mwc=Usuarios&Id=0">Usuarios</a>
              <a href="?mwc=lstticketG&Id=1">Ticket's</a>
            <?php }?>
            <?php if($_SESSION["IdPermiso"] == 2){ ?>
              <a href="?mwc=ticket">Abrir ticket</a>
              <a href="?mwc=lstticketA&Id=1">Mis ticket's</a>
            <?php }?>

            <a href="?mwc=close">Cerrar</a>
          <?php } ?>
          <?php if($_SESSION["IdUsuario"] == ""){ ?>
          <a href="javascript:void(0);" data-toggle="modal" data-target="#responsive-modal">Ingresar</a>
          <?php }?>
        </div>



        <script>
          function openSlideMenu(){
            document.getElementById('side-menu').style.width = '250px';
            document.getElementById('main').style.marginLeft = '250px';
          }

          function closeSlideMenu(){
            document.getElementById('side-menu').style.width = '0';
            document.getElementById('main').style.marginLeft = '0';
          }
        </script>
      </body>


        <!-- End Navigation -->
        <!-- End Navigation -->
    </div><!--/.header-area-->
    <!-- Ingresar -->
    <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 style="text-align: left; float: left;" class="modal-title">Ingresar</h4>
                <button style="text-align: right; float: right;" type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              </div>
            <div class="modal-body">
                <form>
                  <div class="form-group">
                    <label for="recipient-name" class="control-label">Email:</label>
                    <input type="email" required="required" class="form-control" id="user" nmae="user">
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="control-label">Password:</label>
                    <input type="password" required="required" class="form-control" id="pass" name="pass" onkeyup = "if(event.keyCode == 13) enviarDatos()">
                  </div>
                </form>
            </div>
            <div class="modal-footer">
              <a href="?mwc=registro" style="color:red; font-size:12px; float:left; padding:10px;"> &nbsp; Regístrate</a>
              <a href="javascript:void(0);" data-toggle="modal" data-target="#forget"  style="color:red; font-size:12px; align:center; margin-right:10px;"> <u>Olvide la contre&ntilde;a</u> </a>
              <button type="button" onclick="enviarDatos()" class="btn btn-danger waves-effect waves-light">Ingresar</button>
            </div>
        </div>
      </div>
    </div>
    <!-- Olvide Contrase�a -->
    <div id="forget" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 style="text-align: left; float: left;" class="modal-title">Recuperar la Contrase&ntilde;a</h4>
                <button style="text-align: right; float: right;" type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
              </div>
            <div class="modal-body">
              <div></div>
                <form>
                  <div class="">
                    <label for="recipient-name" class="control-label">Email:</label>
                    <input type="email" required="required" class="form-control" id="email" name="email">
                  </div>
                  <div class="form-group">
                    <input type="hidden"class="form-control" id="user1" name="user1" value="<?php echo $user1; ?>">
                  </div>
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancelar</button>
              <button type="button" onclick="Recuperar()" class="btn btn-danger waves-effect waves-light">Recuperar</button>
            </div>
        </div>
    </div>
    </div>
  </section><!-- /.top-area-->
</header><!--/.header-top-->
  <?php include('view/ajax/UdpTick.php'); ?>

<?php if ($_SESSION['Alert']=="1" && $_SESSION["IdPermiso"] == '2'){?>
  <div class="alert alert-danger" style="display:<?php echo $alert; ?>;" role="alert">Tienes Ticket's caducado/s
    <a href="?mwc=lstticketA&Id=4" class="alert-link">Click Aquí</a>
  </div>
<?php }else if ($_SESSION['Alert']=="1" && $_SESSION["IdPermiso"] == '2') {?>
  <div class="alert alert-danger" style="display:<?php echo $alert; ?>;" role="alert">Tienes Ticket's caducado/s
    <a href="?mwc=lstticket" class="alert-link">Click Aquí</a>
  </div>
<?php }else if ($_SESSION['Alert']=="1" && $_SESSION["IdPermiso"] == '1') {?>
  <div class="alert alert-danger" style="display:<?php echo $alert; ?>;" role="alert">Tienes Ticket's caducado/s
    <a href="?mwc=lstticketG&Id=4" class="alert-link">Click Aquí</a>
  </div>
<?php }?>
