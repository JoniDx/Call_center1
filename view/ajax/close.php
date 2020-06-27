  <?php
   $_SESSION["IdSesion"] = '0';
   session_start();
   session_unset();
   session_Destroy();
  header("Location: ?mwc=index")
  ?>
