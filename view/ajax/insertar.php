<?php
include('../../models/Class.Insertar.php');
include('../../models/Class.Consulta.php');
$Seguimiento = new Seguimiento();
$insertar = new Insertar();
$tipo = $_POST["TipoGuardar"];
  if($tipo == "Login"){
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    echo $insertar->lst_Login($user,$pass);
  }else if($tipo == "AgregarU"){
    $nombre = $_POST['txtUsuario'];
    $apellidop = $_POST['txtApellidop'];
    $apellidom = $_POST['txtApellidom'];
    $email = $_POST['txtEmail'];
    $telefono = $_POST['txtTelefono'];
    $pass = $_POST['txtPass'];
    $sexo = $_POST['txtSexo'];
    $direccion = $_POST['txtDireccion'];
    $cp = $_POST['txtCP'];
    $Estado = $_POST['txtEstado'];
    $ciudad = $_POST['txtCiudad'];
    echo $insertar->ins_usuario($nombre, $apellidop, $apellidom, $email, $telefono, $sexo,$pass,$direccion,$cp,$Estado,$ciudad);
  }else if ($tipo == "AgregarT") {
    $nombre = $_POST['txtNombre'];
    $email = $_POST['txtEmail'];
    $telefono = $_POST['txtTelefono'];
    $asunto = $_POST['txtAsunto'];
    $descripcion = $_POST['txtDescripcion'];
    $servicio = $_POST['txtServicio'];
    echo $insertar->ins_ticket($nombre, $asunto, $descripcion, $email, $telefono, $servicio);
  }else if($tipo == "AgregarE"){
    $email = $_POST['txtEmail'];
    $telefono = $_POST['txtTelefono'];
    $direccion = $_POST['txtDireccion'];
    $cp = $_POST['txtCP'];
    $estado = $_POST['txtEstado'];
    $ciudad = $_POST['txtCiudad'];
    $empreza = $_POST['txtEmpreza'];
    $telefonoe = $_POST['txtTelefonoE'];
    $puesto = $_POST['txtPuesto'];
    echo $insertar->Udp_User($email, $telefono,$direccion,$cp,$estado,$ciudad, $empreza, $telefonoe, $puesto);
  }else if($tipo == "AgregarP"){
    $passA = $_POST['txtPassA'];
    $pass1 = $_POST['txtPass1'];
    $pass2 = $_POST['txtPass2'];
    echo $insertar->Udp_Pass($passA,$pass1,$pass2);
  }else if($tipo == "ActualizarM"){
      $nombre = $_POST['txtNombre'];
      $apellidop = $_POST['txtAPaterno'];
      $apellidom = $_POST['txtAMaterno'];
      $email = $_POST['txtEmail'];
      $telefono = $_POST['txtTelefono'];
      $sexo = $_POST['txtSexo'];
      $permiso = $_POST['txtPermiso'];
      $nivel = $_POST['txtNivel'];
      $miembro = $_POST['IdMiembro'];
      echo $insertar->Udp_UserA($nombre, $apellidop, $apellidom, $email, $telefono, $sexo, $permiso, $nivel, $miembro);
  }else if($tipo == "AsignarT"){
      $prioridad = $_POST['txtPrioridad'];
      $nivel = $_POST['txtNivel'];
      $encargado = $_POST['txtEncargado'];
      $IdTicket = $_POST['txtIdTicket'];
      echo $insertar->AsignarTicket($prioridad,$encargado,$nivel,$IdTicket,$reset);
  }else if($tipo == "Respuesta"){
      $respuesta = $_POST['txtRespuesta'];
      $IdTicket = $_POST['IdTicket'];
      echo $insertar->respuesta($respuesta,$IdTicket);
  }else if($tipo == "Cerrar"){
      $IdTicket = $_POST['IdTicket'];
      echo $insertar->cerrar($IdTicket);
  }elseif ($tipo == "Recuperar") {
    $email = $_POST['email'];
    echo $insertar->vercorreo($email);
  }else if($tipo == "AgregarP2"){
    $pass1 = $_POST['txtPass1'];
    $pass2 = $_POST['txtPass2'];
    $code = $_POST['txtCode'];
    echo $insertar->Udp_Pass2($pass1,$pass2,$code);
  }else if ($tipo == "Seguimiento") {
    $seguimiento = $_POST['txtSeguimiento'];
    echo $Seguimiento->ValS($seguimiento);
  }



?>
