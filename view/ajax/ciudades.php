<?php
include('../../models/Class.System.php');
  // $conexion=mysqli_connect('localhost','root','','prueba');
  $Estado=$_POST['Estado'];
  $ciudad = $_SESSION["Ciudad"];

  $db = new Conexion();
	// $sql="SELECT id, id_continente,pais from t_mundo where id_continente='$continente'";
  $sql = "SELECT * FROM tblc_municipio WHERE IdEstado = '$Estado' ";

	$result=mysqli_query($db,$sql);

// $delete = $z['Descripcion'];
// $deleteF = strip_tags($delete);
// $Desc = html_entity_decode($deleteF, ENT_QUOTES, "UTF-8");

	$cadena="<select class='form-control' id='txtCiudad' name='txtCiudad'>";

	while ($ver=mysqli_fetch_row($result)) {
    $ver1 = $ver[2];
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
