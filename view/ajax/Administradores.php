<?php
include('../../models/Class.System.php');
  // $conexion=mysqli_connect('localhost','root','','prueba');
  $txtNivel=$_POST['txtNivel'];

  $db = new Conexion();
	// $sql="SELECT id, id_continente,pais from t_mundo where id_continente='$continente'";
  $sql = "SELECT * FROM tblp_usuarios WHERE IdPermiso = '2' AND Nivel ='$txtNivel' ";

	$result=mysqli_query($db,$sql);

// $delete = $z['Descripcion'];
// $deleteF = strip_tags($delete);
// $Desc = html_entity_decode($deleteF, ENT_QUOTES, "UTF-8");

	$cadena="<select class='form-control' id='txtAdmin' name='txtAdmin'>";

	while ($ver=mysqli_fetch_row($result)) {
    $ver1 = $ver[1]." ".$ver[2]." ".$ver[3];
    // if ($ciudad>0) {
    //   $ver[0]=$ciudad;
    // }

    $Desc = html_entity_decode($ver1, ENT_QUOTES, "UTF-8");
    if ($ciudad==$ver[0]) {
      $cadena=$cadena.'<option value='.$ver[0].' selected="selected">'.$Desc.'</option>';
    }else {
      $cadena=$cadena.'<option value='.$ver[0].'>'.$Desc.'</option>';
    }
	}

	echo  $cadena."</select>";
?>
<!-- <option value='$ciudad'></option> -->
