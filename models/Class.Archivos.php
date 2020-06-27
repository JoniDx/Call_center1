<?php
class Files
{
  public function add_Img(){
    $sesion = $_SESSION["IdUsuario"];
    $carpeta = "assets/adjuntos/"; //nombre de la carpeta en la que se guardaran los archivos (si es en el directorio ponga /)
    $archivo = $_FILES["txtImgT"]['name']; //nombre del archivo
    $tamaño = $_FILES["txtImgT"]['size']; //tamaño del archivo
    $nombreImg = explode(".", $archivo);
    $nombreImg[1]; // Extención de la imagen
    // $_SESSION["Imagen"] = $archivo ;
    $IdTicket=$_SESSION["IdTicket"];
    $IdTicket1 =$IdTicket[0];
    $archivo=$IdTicket1.$archivo;

    // echo "<script type='text/javascript'> alert('$IdTicket'); </script>";
    // echo "<script type='text/javascript'> alert('$sesion'); </script>";
    // echo "<script type='text/javascript'> alert('$archivo'); </script>";
    // echo "<script type='text/javascript'> alert('$nombreImg[1]'); </script>";

    if(!move_uploaded_file($_FILES["txtImgT"]['tmp_name'], $carpeta.$archivo)){
      echo "<script type='text/javascript'>window.location='?mwc=ticket';</script>";
          exit();
        }
      $db = new Conexion();
      $insertar = $db->query("INSERT INTO tblc_doc(Ubicacion,Extension,FecCap,IdUsuario,IdTipo,IdTicket) VALUES('$archivo','$nombreImg[1]',NOW(),'$sesion','2','$IdTicket1')");
      $sql1 = $db->query("SELECT MAX(IdDoc) AS IdDoc FROM tblc_doc;");
      while($x = $db->recorrer($sql1)){
        $lstticket[] = $x;
      }
      $_SESSION["IdDoc"]=$lstticket[0];
      $alert = $_SESSION["IdDoc"];
      $alert1 =$alert[0];
      $_SESSION["IdDoc"]="";

      $inserta = $db->query("UPDATE tblp_ticket SET tblp_ticket.IdDoc = '$alert1'  WHERE tblp_ticket.IdTicket = '$IdTicket1'");
      // $insertar = $db->query("INSERT INTO tblc_doc (Ubicacion,Nombre,Extension,FecCap,IdMiembro,Tipo,IdBlog) VALUES('$archivo','$archivo','$nombreImg[1]',NOW(),'$sesion','2','$IdBlog')");

     if ($insertar) {
      echo "<script type='text/javascript'>window.location='?mwc=ticket';</script>";
     } else {
      echo "<script type='text/javascript'>window.location='?mwc=ticket';</script>";
     }
   }

}


class Adjuntos
{
  public function add_adj(){

    $sesion = $_SESSION["IdUsuario"];
    $carpeta = "assets/adjuntos/"; //nombre de la carpeta en la que se guardaran los archivos (si es en el directorio ponga /)
    $archivo = $_FILES["txtImgT"]['name']; //nombre del archivo
    $tamaño = $_FILES["txtImgT"]['size']; //tamaño del archivo
    $nombreImg = explode(".", $archivo);
    $nombreImg[1]; // Extención de la imagen
    // $_SESSION["Imagen"] = $archivo ;
    $IdRespuesta=$_SESSION["IdRespuesta"];
    $archivo= "R".$IdRespuesta.$archivo;
    // $IdTicket=$_SESSION["IdTicket"];
    $IdTicket=$_POST["IdT"];


    // echo "<script type='text/javascript'> alert('$IdTicket'); </script>";

    // echo "<script type='text/javascript'> alert('$IdRespuesta'); </script>";
    // echo "<script type='text/javascript'> alert('$sesion'); </script>";
    // echo "<script type='text/javascript'> alert('$archivo'); </script>";
    // echo "<script type='text/javascript'> alert('$nombreImg[1]'); </script>";

    if(!move_uploaded_file($_FILES["txtImgT"]['tmp_name'], $carpeta.$archivo)){
      echo "<script type='text/javascript'>window.location='?mwc=respuesta&Id=".$IdTicket."';</script>";
          exit();
        }
      $db = new Conexion();
      $insertar = $db->query("INSERT INTO tblc_doc(Ubicacion,Extension,FecCap,IdUsuario,IdTipo,IdRespuesta) VALUES('$archivo','$nombreImg[1]',NOW(),'$sesion','2','$IdRespuesta')");
      $sql1 = $db->query("SELECT MAX(IdDoc) AS IdDoc FROM tblc_doc;");
      $x = $db->recorrer($sql1);

      $alert = $x["IdDoc"];


      $_SESSION["IdDoc"]="";
      $_SESSION["IdRespuesta"]="";
      $inserta = $db->query("UPDATE tblp_respuestap SET tblp_respuestap.Ubicacion = '$alert'  WHERE tblp_respuestap.IdRespuesta = '$IdRespuesta'");

     if ($insertar) {

       echo "<script type='text/javascript'>window.location='?mwc=respuesta&Id=".$IdTicket."';</script>";
     } else {
       echo "<script type='text/javascript'>window.location='?mwc=respuesta&Id=".$IdTicket."';</script>";
     }
  }
}



 ?>
