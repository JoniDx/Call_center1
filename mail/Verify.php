<?php include("view/overall/head.php"); ?>
<body>
  <?php include("view/overall/menu1.php"); ?>
  <?php
  $db = new Conexion();
  $id=$_GET["Id"];
  $sql = $db->query("SELECT * FROM tblp_usuarios WHERE tblp_usuarios.Codigo ='$id';") ;
  $data=$db->recorrer($sql);
  if ($data['IdPermiso']=='0')
  {
    $insertar = $db->query("UPDATE tblp_usuarios SET tblp_usuarios.IdPermiso='3' WHERE tblp_usuarios.Codigo ='$id'; ");
  }else {?>
    <script>
      alert("Este token ya se utilizo");
    </script>
  <?php } ?>
  <div class="" style="margin-bottom:200px; margin-top:200px;">
    <center>
      <div class=" cler" >
        <p style="margin: 2px; font-size: 15px">
          <?php echo $id; ?>

          Muchas gracias por completar tu cuenta.<br><br>
        </p>
        <a style="text-decoration: none; border-radius: 5px; padding: 11px 23px; color: white; background-color: #CB4335" href="?mwc=index">Continua</a>
        <br><br>
      </div>
    </center>
  </div>  <?php include("view/overall/footer.php"); ?>
</body>
