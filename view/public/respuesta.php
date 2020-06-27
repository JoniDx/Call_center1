<?php include("view/overall/head.php"); ?>
<body>
  <?php include("view/overall/menu2.php") ?>

  <?php
  require('view/ajax/Hora.php');
  $_SESSION['TicketRS']=1;
  $_SESSION["Tic"]=0;

   $codigos=$_GET['Id'];
   $ticket=$_GET['Id'];
   $db = new Conexion();
   $tick = $db->query("SELECT * FROM tblp_ticket WHERE Codigo ='$codigos' OR IdTicket = '$ticket'");
   $rows = $db->recorrer($tick);
   $encargado=$rows['Encargado'];
   $usuario =$rows['IdUser'];
   $_SESSION['Codigo']=$codigos;
   $_SESSION['IdTicketR']=$ticket;
   if($usuario!=""){
    $_SESSION["En"]=$rows['Encargado'];
    $_SESSION["Us"]=$rows['IdUser'];
    $encargado=$_SESSION["En"];
    $usuario =$_SESSION["Us"];
   }else{
    $encargado=$_SESSION["En"];
    $usuario =$_SESSION["Us"];
   }
   $user=$_SESSION["IdUsuario"];

  if ($usuario!= $user && $encargado!=$user) {?>
	<script>
  location.href ="?mwc=error";
	</script>
<?php }?>


  <?php

  if ((isset($_POST["MovA"]) && $_POST["MovA"]=="GuardarA")) {
      $file->add_adj();
      exit;
      ?> <?php
      }

      ?>
<form class="" action="?mwc=respuesta&Id=<?php echo $ticket; ?>" name="frmA" id="frmA"  method="POST" enctype="multipart/form-data">
  <input id="MovA" name="MovA" value="<?php echo $_GET['MovA'];?>" type="hidden"/>
  <input type="hidden" name="IdT" value="<?php echo $ticket;?>">
    <?php include("view/overall/comentario.php") ?>
</form>



  <?php include("view/overall/contactanos.php"); ?>
  <?php include("view/overall/footer.php"); ?>
  <?php
  $_SESSION['Codigo']="";
  $_SESSION['IdTicketR']="";
  $_SESSION['TicketRS']="";
  $_SESSION["En"]="";
  $_SESSION["Us"]="";


   ?>
</body>
