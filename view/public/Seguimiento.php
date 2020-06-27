<?php if ($_SESSION["IdUsuario"]) {?>

<?php include("view/overall/head.php"); ?>
<body>
  <?php include("view/overall/menu2.php") ?>
  <?php $iduser = $_SESSION["IdUsuario"]; ?>
  <div class="container">
    <div class="row ">
      <!-- <form class="cler bottom" action="?mwc=respuesta" method="post" id="Seguimiento" style="margin-top:80px"> -->
        <div class="col-lg-12 col-sm-12 cler bottom " style="margin-top:80px; margin-bottom:80px;" >
          <label for="recipient-name" class="control-label">C&oacute;digo de seguimiento:</label><br>
          <input type="text" required="required" class="form-control" id="txtSegimiento" name="txtSegimiento"  onkeyup = "if(event.keyCode == 13) Seguimiento()">
          <button  style="float:right; margin-top:10px;"class="btn btn-danger" type="button"  onclick="Seguimiento()" name="button">Buscar</button> <br>
        </div>
      <!-- </form> -->
      <center>
        <div class="col-lg-12 bottom visible-lg-inline visible-md-block visible-sm-block"  >
          <section id="intro" class="">
            <center>
              <a href="?mwc=home"><img src="assets/img/2mwcall.png" alt="" style="width:440px; height:280px;"></a>
                <div class="output bottom " id="output">
                  <h1 class="cursor cler" style="font-size:40px"></h1>
                  <p></p>
                </div>
            </center>
          </section>
        </div>
      </center>
    </div>
  </div>
  <?php include("view/overall/contactanos.php"); ?>
  <?php include("view/overall/footer.php"); ?>
</body>
<?php }else {?>
  <script type="text/javascript">
  location.href ="?mwc=home";
  </script>
<?php } ?>
