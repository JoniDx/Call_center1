<?php
require('Class.System.php');

require('Class.Codigo.php');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'Phpmailer/Exception.php';
    require 'Phpmailer/PHPMailer.php';
    require 'Phpmailer/SMTP.php';

class Insertar{
  private $user;
  private $pass;
  // LOGIN
  public function lst_Login($user,$pass){
    $db = new Conexion();
    $this->user = $db->real_escape_string($user);
    // $this->pass = hash($db->real_escape_string($pass));
    $sql = $db->query("SELECT * FROM tblp_usuarios WHERE tblp_usuarios.email = '$this->user'");
    $datos = $db->recorrer($sql);
    if($db->rows($sql) > 0 &&$datos['IdPermiso']!='0'){
      if (password_verify($pass,$datos['Pass'])) {
        $_SESSION["IdUsuario"] = $datos['IdUsuario'];
        $_SESSION["IdPermiso"] = $datos['IdPermiso'];
        $_SESSION["Nombre"] = $datos['Nombre'];
        $_SESSION["APaterno"] = $datos['APaterno'];
        $_SESSION["AMaterno"] = $datos['AMaterno'];
        $_SESSION["email"] = $datos['email'];
        $_SESSION["Sexo"] = $datos['Sexo'];
        $_SESSION["Telefono"] = $datos['Telefono'];
        $_SESSION["Code"] = $datos['Codigo'];
        $_SESSION["Alerta"] = 1;
        return 1;
      }else {
        return 0;
      }
    } else {
      return 0;
    }
  }

  // REGISTRO
  public function ins_usuario($nombre, $apellidop, $apellidom, $email, $telefono, $sexo,$pass,$direccion,$cp,$Estado,$ciudad){
    $db = new Conexion();
    $codigo = new Codigo();

    $CodigoR = $codigo->generarCodigo(12);
    $CodigoR='MWC'.$CodigoR;

    $sql2 = $db->query("SELECT *  FROM tblp_usuarios WHERE tblp_usuarios.Codigo='$CodigoR';");
    $x = $db->recorrer($sql2);
    while ($x['Codigo']==$CodigoR) {
      $CodigoR = $codigo->generarCodigo(8);
      $CodigoR ='MWC'.$CodigoR;
    }

    $pass_has=password_hash($pass, PASSWORD_DEFAULT);

    $sql = $db->query("SELECT * FROM tblp_usuarios WHERE tblp_usuarios.email = '$email'");
    if($db->rows($sql) > 0){
      $alert = "el correo ya esta ocupado";
      return $alert;
    }else {
      $sql = $db->query("INSERT INTO tblp_usuarios(Nombre, APaterno, AMaterno, email, Pass, Telefono, Sexo, FecCap,Direccion,CP,IdEstado,IdCiudad,IdPermiso,Codigo)
      VALUES('$nombre', '$apellidop', '$apellidom', '$email', '$pass_has','$telefono', '$sexo', NOW(),'$direccion','$cp','$Estado','$ciudad','0','$CodigoR')");
      if($sql){
       $mail = new PHPMailer(true);
  	try {
            //Server settings
            $mail->SMTPDebug = 0;                                       // Errores
            $mail->isSMTP();                                            // Protocolo SMTP
            $mail->Host       = 'smtp.gmail.com';                       // Server de correo
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'mwc.callcenter@gmail.com';             // correo
            $mail->Password   = 'mwcc3nt3r';                            // password
            $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
            $mail->Port       = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('mwc.callcenter@gmail.com', 'MWCALL CENTER');
            $mail->addAddress($email, $nombre);       // Quien lo resive

            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = utf8_decode('Verificación de correo');
            $mail->Body    = utf8_decode('
            <table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;">
            <tr>
          		<td style="background-color: #ecf0f1; text-align: left; padding: 0">
                <!-- Boton -->
          			<a href="">
          			</a>
          		</td>
          	</tr>
          	<tr>
          		<td style="padding: 0">
          		</td>
          	</tr>
          	<tr>
          		<td style="background-color: #ecf0f1">
          			<div style="color: #34495e; margin: 4% 10% 2%; text-align: justify;font-family: sans-serif">
          				<h2 style="color: #CD6155; margin: 0 0 7px">Hola'." ".$nombre. " ".$apellidop." ".$apellidom.' </h2>
          				<p style="margin: 2px; font-size: 15px">
          					Muchas gracias por utilizar nuestra plataforma de servicio al cliente, para completar su registro click en "Completa tu cuenta".<br><br>
          					Si el bot&oacute;n no funciona en su cuenta de correo electr&oacute;nico, c&oacute;pielo y pegue el siguiente enlace en su navegador web:<br>
                    http://callcenter.mazatanmpio.gob.mx/?mwc=Verify&Id='.$CodigoR.'<br><br>
                    Al crear una cuenta en MWC, usted puede solicitar:</p>
          				<ul style="font-size: 15px;  margin: 10px 0">
          					<li>Informaci&oacute;n sobre nuestros sistemas.</li>
          					<li>Nuestros cursos.</li>
          					<li>Atenci&oacute;n al cliente.</li>
          					<li>Apoyo o Capacitaci&oacute;n.</li>
          				</ul>
          				<div style="width: 100%;margin:20px 0; display: inline-block;text-align: center">
          					<!-- <img style="padding: 0; width: 200px; margin: 5px" src="https://s19.postimg.org/np3e1b7pv/premier.jpg">
          					<img style="padding: 0; width: 200px; margin: 5px" src="https://s19.postimg.org/ejzml6toz/banner_hoenn.png"> -->
          				</div>
                  <div style="width: 100%; text-align: center; ">
                    <a style="text-decoration: none; border-radius: 5px; padding: 11px 23px; color: white; background-color: #CB4335" href="http://callcenter.mazatanmpio.gob.mx/?mwc=Verify&Id='.$CodigoR.'">Completa tu cuenta</a>
                  </div>
                  <div class="" style="margin-top:20px">
                    <p style="margin: 2px; font-size: 15px">
                      Si no se ha registrado en una cuenta de miembros en MWC y ha recibido este correo electr&oacute;nico por error, ign&oacute;relo. No le enviaremos ningun otro correo.
                    </p>
                  </div>

          				<p style="color: #b3b3b3; font-size: 12px; text-align: center;margin: 30px 0 0">Copyright. Dise&ntilde;ado y desarrollado por <a href="https://mwc.com.mx/">MWConsultores</a></p>
          			</div>
          		</td>
          	</tr>
          </table>

 ');
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->send();
            // echo 'Mensaje enviado';
        }catch (Exception $e) {
        // echo "Hay problemas con el envío: {$mail->ErrorInfo}";
    	}
        $alert = "Registro Existoso";
        return $alert;
      }else{
        $alert = "A sucedido un error";
        return $alert;
      }
    }
  }
  // INGRESAR TICKET
  public function ins_ticket($nombre, $asunto, $descripcion, $email, $telefono, $servicio){
    $db = new Conexion();
    $codigo = new Codigo();
    $nombre1=utf8_decode($nombre);

    $CodigoR = $codigo->generarCodigo(8);
    $aux=0;
    $email1 = $db->query("SELECT *  FROM tblp_usuarios WHERE tblp_usuarios.email ='$email'");
    $y = $db->recorrer($email1);
    $idusuario=$y["IdUsuario"];

    if ($db->rows($email1) <= 0) {

      $CodigoRe = $codigo->generarCodigo(12);
      $CodigoRe='MWC'.$CodigoRe;
      $pass_has=password_hash($CodigoRe, PASSWORD_DEFAULT);

      $sql6 = $db->query("INSERT INTO tblp_usuarios(Nombre, email, Pass, Telefono, FecCap,IdPermiso,Codigo)
      VALUES('$nombre', '$email', '$pass_has','$telefono', NOW(),'3','$CodigoRe')");

      $email6 = $db->query("SELECT *  FROM tblp_usuarios WHERE tblp_usuarios.email ='$email';");

      $x = $db->recorrer($email6);
      $idusuario=$x["IdUsuario"];
      $aux=1;
    }

    $sql2 = $db->query("SELECT *  FROM tblp_ticket WHERE tblp_ticket.Codigo='$CodigoR';");
    $x = $db->recorrer($sql2);
    while ($x['Codigo']==$CodigoR) {
      $CodigoR = $codigo->generarCodigo(8);
    }

    if($aux==1) {
      $Reg= "Le agradecemos por usar nuestro servicio de ayuda al cliente, se ha creado su cuenta de manera automatica, ahora usted puede solicitar:
       <ul style='font-size: 15px;  margin: 10px 0'>
        <li>Informaci&oacute;n sobre nuestros sistemas.</li>
        <li>Nuestros cursos.</li>
        <li>Atenci&oacute;n al cliente.</li>
        <li>Apoyo o Capacitaci&oacute;n.</li>
      </ul><br>
      Adjunto a eso le enviamos la informaci&oacute;n de su cuenta:
        <ul style='font-size: 15px;  margin: 10px 0'>
        <li>Usuario: $nombre</li>
        <li>Correo: $email</li>
        <li>Contraseña: $CodigoRe</li>
        </ul><br>";
    }
    if ($idusuario>0) {
      $sql = $db->query("INSERT INTO tblp_ticket(NombreU, Email, Asunto, Telefono, IdServicio, Descripcion, FecCap,IdUser, Codigo, Estatus,FecComplet,Reset)
      VALUES('$nombre', '$email', '$asunto', '$telefono', '$servicio','$descripcion', NOW(), '$idusuario','$CodigoR','1',NOW(),'0')");
      if($sql){
        $sql1 = $db->query("SELECT *  FROM tblp_ticket WHERE tblp_ticket.Codigo='$CodigoR';");
        while($x = $db->recorrer($sql1)){
          $lstticket[] = $x;
        }
        $sql2 = $db->query("SELECT *  FROM tblp_ticket WHERE tblp_ticket.Codigo='$CodigoR';");
        $x = $db->recorrer($sql2);
	       $F=$x['FecCap'];

        $sql3 = $db->query("SELECT * FROM tblc_servicios WHERE IdServicio ='$servicio';");
        $w = $db->recorrer($sql3);
	       $S = $w['Nombre'];


         // $nombre=utf8_decode($nombre);

        $mail = new PHPMailer(true);
        try {
          //Server settings
          $mail->SMTPDebug = 0;                                       // Errores
          $mail->isSMTP();                                            // Protocolo SMTP
          $mail->Host       = 'smtp.gmail.com';                       // Server de correo
          $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
          $mail->Username   = 'mwc.callcenter@gmail.com';             // correo
          $mail->Password   = 'mwcc3nt3r';                            // password
          $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
          $mail->Port       = 587;                                    // TCP port to connect to

          //Recipients
          $mail->setFrom('mwc.callcenter@gmail.com', 'MWCALL CENTER');
          $mail->addAddress($email,$nombre1);       // Quien lo resive

          $mail->isHTML(true);                                  // Set email format to HTML
          $mail->Subject =utf8_decode( 'Información del Ticket');
          $mail->Body    = utf8_decode('
                    <table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;">
          <tr>
            <td style="background-color: #ecf0f1; text-align: left; padding: 0">
              <!-- Boton -->
              <a href="">
              </a>
            </td>
          </tr>
          <tr>
            <td style="padding: 0">
            </td>
          </tr>
          <tr>
            <td style="background-color: #ecf0f1">
              <div style="color: #34495e; margin: 4% 10% 2%; text-align: justify;font-family: sans-serif">
                <h2 style="color: #CD6155; margin: 0 0 7px">Hola'." ".$nombre.' </h2>
                <p style="margin: 2px; font-size: 15px">
                '.$Reg.'
                Le enviamos la informaci&oacute;n de su ticket, si necesitas algo m&aacute;s en lo que te podamos apoyar, no dudes en contactarnos.<br>
                Quedamos a tus &oacute;rdenes.<br><br>
                Asunto:'.$asunto." ".'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fecha:'.$F.'<br>
                Descripci&oacute;n:<br>
                '.$descripcion.'<br><br>

                Codigo : # '.$CodigoR.'<br>
                Servicio: '.$S.' <br>
                Estatus: Enviado<br><br>
                Puede entrar al siguiente enlace " http://callcenter.mazatanmpio.gob.mx/?mwc=home " para dar seguimiento a su ticket y/o preguntar por otra cosa,
                solo necesita ingresar su codigo de seguimiento.<br>

                </p>

                <div style="width: 100%;margin:20px 0; display: inline-block;text-align: center">
                </div>
                <div style="width: 100%; text-align: center; ">
                  <a style="text-decoration: none; border-radius: 5px; padding: 11px 23px; color: white; background-color: #CB4335" href="http://callcenter.mazatanmpio.gob.mx/?mwc=home">Seguimiento</a>
                </div>

                <p style="color: #b3b3b3; font-size: 12px; text-align: center;margin: 30px 0 0">Copyright. Dise&ntilde;ado y desarrollado por <a href="https://mwc.com.mx/">MWConsultores</a></p>
              </div>
            </td>
          </tr>
        </table>
     ');
          // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
          $mail->send();
          // echo 'Mensaje enviado';
      }catch (Exception $e) {
      // echo "Hay problemas con el envío: {$mail->ErrorInfo}";
     }
        $_SESSION["IdTicket"]=$lstticket[0];
        $alert = $_SESSION["IdTicket"];
        $alert1 =$alert[0];
        return $alert1;
      }else{
        // $alert = "A sucedido un error";
        return 0;
      }
    }else {
      return 0;
    }
  }
// Respuesta
  public function respuesta($respuesta,$IdTicket){
    $db = new Conexion();
    $user =  $_SESSION["IdUsuario"] ;
    $sql = $db->query("INSERT INTO tblp_respuestap(Descripcion,IdUsuario,IdTicket, FecCap)
    VALUES('$respuesta', '$user', '$IdTicket', NOW())");
    $sql1 = $db->query("SELECT *  FROM tblp_respuestap ORDER BY IdRespuesta DESC LIMIT 1;");
    $datos = $db->recorrer($sql1);
    $_SESSION["IdRespuesta"]=$datos["IdRespuesta"];
    $_SESSION["IdTiket"]=$datos["IdTicket"];
    $_SESSION["Code"] = $datos['Codigo'];
    $alert = $_SESSION["IdTiket"];
    $sql2 = $db->query("SELECT *  FROM tblp_ticket WHERE tblp_ticket.IdTicket = '$IdTicket'");
    $datos2 = $db->recorrer($sql2);
    if($datos2['Estatus']!='3'){
      $insertar = $db->query("UPDATE tblp_ticket SET tblp_ticket.Estatus = '2' WHERE tblp_ticket.IdTicket = '$IdTicket' ");
    }
      if($user==$datos2['IdUser']){
      $ide =$datos2['Encargado'];
      $sql3 = $db->query("SELECT *  FROM tblp_usuarios WHERE tblp_usuarios.IdUsuario = '$ide'");
      $datos3 = $db->recorrer($sql3);
      $email=$datos3["email"];
      $nombre=$datos3["Nombre"]." ".$datos3["APaterno"]." ".$datos3["AMaterno"];
    }elseif ($user==$datos2['Encargado']) {
      $ide =$datos2['IdUser'];
      $sql3 = $db->query("SELECT *  FROM tblp_usuarios WHERE tblp_usuarios.IdUsuario = '$ide'");
      $datos3 = $db->recorrer($sql3);
      $email=$datos3["email"];
      $nombre=$datos3["Nombre"]." ".$datos3["APaterno"]." ".$datos3["AMaterno"];
    }
    $n=$_SESSION["Nombre"];
    $ap=$_SESSION["APaterno"];
    $am=$_SESSION["AMaterno"];
    $CodigoR=$datos2["Codigo"];
	  $mail = new PHPMailer(true);
        try {
          //Server settings
          $mail->SMTPDebug = 0;                                       // Errores
          $mail->isSMTP();                                            // Protocolo SMTP
          $mail->Host       = 'smtp.gmail.com';                       // Server de correo
          $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
          $mail->Username   = 'mwc.callcenter@gmail.com';             // correo
          $mail->Password   = 'mwcc3nt3r';                            // password
          $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
          $mail->Port       = 587;                                    // TCP port to connect to

          //Recipients
          $mail->setFrom('mwc.callcenter@gmail.com', 'MWCALL CENTER');
          $mail->addAddress($email, $nombre);       // Quien lo resive

	  $mail->isHTML(true);                                  // Set email format to HTML
          $mail->Subject = utf8_decode('Información del Ticket');
          $mail->Body    = utf8_decode('
                    <table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;">
          <tr>
            <td style="background-color: #ecf0f1; text-align: left; padding: 0">
              <!-- Boton -->
              <a href="">
              </a>
            </td>
          </tr>
          <tr>
            <td style="padding: 0">
            </td>
          </tr>
          <tr>
            <td style="background-color: #ecf0f1">
              <div style="color: #34495e; margin: 4% 10% 2%; text-align: justify;font-family: sans-serif">
                <h2 style="color: #CD6155; margin: 0 0 7px">Hola'." ".$nombre.' </h2>
                <p style="margin: 2px; font-size: 15px">
                Le enviamos la respuesta de su ticket, si necesitas algo m&aacute;s en lo que te podamos apoyar, no dudes en contactarnos.<br>
                Quedamos a tus &oacute;rdenes.<br><br>
                Nombre:'." ".$n." ".$ap." ".$am.'<br>
                Descripcion: <br>
                '.$respuesta.'
                </p><br><br>
                Codigo de seguimiento: '.$CodigoR.'<br>

                <div style="width: 100%;margin:20px 0; display: inline-block;text-align: center">
                </div>
                <div style="width: 100%; text-align: center; ">
                  <a style="text-decoration: none; border-radius: 5px; padding: 11px 23px; color: white; background-color: #CB4335" href="http://callcenter.mazatanmpio.gob.mx/?mwc=home">Seguimiento</a>
                </div>

                <p style="color: #b3b3b3; font-size: 12px; text-align: center;margin: 30px 0 0">Copyright. Dise&ntilde;ado y desarrollado por <a href="https://mwc.com.mx/">MWConsultores</a></p>
              </div>
            </td>
          </tr>
        </table>
     ');
          // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
          $mail->send();
          // echo 'Mensaje enviado';
      }catch (Exception $e) {
      // echo "Hay problemas con el envío: {$mail->ErrorInfo}";
     }






    return $alert;

  }

  public function cerrar($IdTicket){
    $db = new Conexion();
    $user =  $_SESSION["IdUsuario"] ;
    date_default_timezone_set('America/Mexico_City');
    $time = date('Y-n-d H:i:s',time());
    $insertar = $db->query("UPDATE tblp_ticket SET tblp_ticket.Estatus = '3' WHERE tblp_ticket.IdTicket = '$IdTicket' ");
    $sql = $db->query("INSERT INTO tblp_respuestap(Descripcion,IdUsuario,IdTicket, FecCap)
    VALUES('Este ticket se cerro en la fecha: $time, si desea mas información favor de abrir otro ticket. ', '$user', '$IdTicket', NOW())");
    if ($insertar) {
      return 1;
    }else {
      return 0;
    }
  }

  public function Udp_User($email,$telefono,$direccion,$cp,$estado,$ciudad,$empreza,$telefonoe,$puesto){
    $db = new Conexion();
    $idusuario=$_SESSION["IdUsuario"];
    $sql = $db->query("SELECT * FROM tblp_usuarios WHERE tblp_usuarios.email = '$email' AND tblp_usuarios.IdUsuario != '$idusuario'");
    if($db->rows($sql) > 0){
      return 0;
    }else {
    $insertar = $db->query("UPDATE tblp_usuarios SET tblp_usuarios.email = '$email', tblp_usuarios.Telefono = '$telefono', tblp_usuarios.Direccion ='$direccion', tblp_usuarios.CP='$cp',
      tblp_usuarios.IdEstado='$estado',tblp_usuarios.IdCiudad='$ciudad',tblp_usuarios.Empreza='$empreza',tblp_usuarios.FecCap=Now(),
      tblp_usuarios.TelefonoE='$telefonoe' ,tblp_usuarios.Puesto='$puesto' WHERE tblp_usuarios.IdUsuario = '$idusuario'");
    if($insertar){
      $sql = $db->query("SELECT * FROM tblp_usuarios WHERE tblp_usuarios.IdUsuario = '$idusuario'");
      if($db->rows($sql) > 0){
        $datos = $db->recorrer($sql);
        $_SESSION["Nombre"] = $datos['Nombre'];
        $_SESSION["APaterno"] = $datos['APaterno'];
        $_SESSION["AMaterno"] = $datos['AMaterno'];
        $_SESSION["email"] = $datos['email'];
        $_SESSION["Sexo"] = $datos['Sexo'];
        $_SESSION["Telefono"] = $datos['Telefono'];
        $_SESSION["Estado"] = $datos['IdEstado'];
        $_SESSION["Ciudad"] = $datos['IdCiudad'];
      }
      return 1;
    }else {
      return 0;
    }
   }
  }

  public function Udp_Pass($passA,$pass1,$pass2){
    $db = new Conexion();
    $idusuario=$_SESSION["IdUsuario"];
    $pass_has=password_hash($pass1, PASSWORD_DEFAULT);
    $sql = $db->query("SELECT * FROM tblp_usuarios WHERE tblp_usuarios.IdUsuario = '$idusuario'");
    if($db->rows($sql) > 0){
      $datos = $db->recorrer($sql);
      if (password_verify($passA,$datos['Pass'])) {
        $insertar = $db->query("UPDATE tblp_usuarios SET tblp_usuarios.Pass = '$pass_has' WHERE tblp_usuarios.IdUsuario = '$idusuario'");
        if($insertar){
          return 1;
        }else {
          return 0;
        }
      }else {
        return 0;
      }
    }
  }

  public function Udp_UserA($nombre, $apellidop, $apellidom, $email, $telefono, $sexo, $permiso, $nivel, $miembro){
    $db = new Conexion();
    // $idusuario=$_SESSION["IdUsuario"];
    $insertar = $db->query("UPDATE tblp_usuarios SET tblp_usuarios.Nombre='$nombre', tblp_usuarios.APaterno='$apellidop', tblp_usuarios.AMaterno='$apellidom', tblp_usuarios.email='$email',
       tblp_usuarios.Telefono='$telefono', tblp_usuarios.Sexo='$sexo', tblp_usuarios.IdPermiso='$permiso', tblp_usuarios.Nivel='$nivel' WHERE tblp_usuarios.IdUsuario = '$miembro'");
    if($insertar){
      return 1;
    }else {
      return 0;
    }
  }

  public function AsignarTicket($prioridad,$encargado,$nivel,$IdTicket){
    $db = new Conexion();
    $user =  $_SESSION["IdUsuario"] ;
    $sql = $db->query("SELECT * FROM tblp_ticket WHERE tblp_ticket.IdTicket = '$IdTicket'");
    $datos = $db->recorrer($sql);
    if ($_SESSION["IdPermiso"]=='1' && $datos['Estatus']=='4' ) {
      $reset=$datos['Reset'];
      $reset=$reset+1;
      $estatus=1;
      $sql = $db->query("INSERT INTO tblp_respuestap(Descripcion,IdUsuario,IdTicket, FecCap) VALUES('Le informamos que su ticket, lo hemos subido la prioridad y lo atenderemos lo más pronto posible, le agradecemos su atención y preferencia, si necesitas algo más en lo que te podamos apoyar, no dudes en contactarnos. Quedamos a tus órdenes.', '$user', '$IdTicket', NOW())");
    }else {
      $estatus=$datos['Estatus'];
      $reset=$datos['Reset'];
    }
    $insertar = $db->query("UPDATE tblp_ticket SET tblp_ticket.Prioridad='$prioridad', tblp_ticket.Nivel='$nivel', tblp_ticket.Encargado='$encargado', tblp_ticket.Reset='$reset', tblp_ticket.Estatus='$estatus',tblp_ticket.FecRest= NOW() WHERE tblp_ticket.IdTicket = '$IdTicket'");
    if ($reset >'0') {

      $email=$datos["Email"];
      $nombre=$datos["NombreU"];
      $servicio=$datos["IdServicio"];
      $asunto=$datos["Asunto"];
      $descripcion=$datos["Descripcion"];
      $CodigoR=$datos["Codigo"];
      $F=$datos["FecCap"];

      $sql3 = $db->query("SELECT * FROM tblc_servicios WHERE IdServicio ='$servicio';");
      $w = $db->recorrer($sql3);
       $S = $w['Nombre'];
      $mail = new PHPMailer(true);
      try {
        //Server settings
        $mail->SMTPDebug = 0;                                       // Errores
        $mail->isSMTP();                                            // Protocolo SMTP
        $mail->Host       = 'smtp.gmail.com';                       // Server de correo
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'mwc.callcenter@gmail.com';             // correo
        $mail->Password   = 'mwcc3nt3r';                            // password
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('mwc.callcenter@gmail.com', 'MWCALL CENTER');
        $mail->addAddress($email, $nombre);       // Quien lo resive

        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject =utf8_decode('Información del Ticket');
        $mail->Body = utf8_decode('
                  <table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;">
                  <tr>
                    <td style="background-color: #ecf0f1; text-align: left; padding: 0">
                      <!-- Boton -->
                      <a href="">
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td style="padding: 0">
                    </td>
                  </tr>
                  <tr>
                    <td style="background-color: #ecf0f1">
                      <div style="color: #34495e; margin: 4% 10% 2%; text-align: justify;font-family: sans-serif">
                        <h2 style="color: #CD6155; margin: 0 0 7px">Hola'." ".$nombre.' </h2>
                        <p style="margin: 2px; font-size: 15px">
                        Le informamos que su ticket, lo hemos subido la prioridad y lo atenderemos lo m&aacute;s pronto posible, le agradecemos su atenci&oacute;n y preferencia, si necesitas algo m&aacute;s en lo que te podamos apoyar, no dudes en contactarnos.<br>
                        Quedamos a tus &oacute;rdenes.<br><br>
                        <label for="" style="font-size:15px;">Ticket</label><br>
                        Asunto:'.$asunto." ".'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fecha:'.$F.'<br>
                        Descripci&oacute;n:<br>
                        '.$descripcion.'<br><br>

                        Codigo : # '.$CodigoR.'<br>
                        Servicio: '.$S.' <br>
                        Estatus: Atrasado<br><br>
                        Puede entrar al siguiente enlace " http://callcenter.mazatanmpio.gob.mx/?mwc=home " para dar seguimiento a su ticket y/o preguntar por otra cosa,
                        solo necesita ingresar su codigo de seguimiento.<br>

                        </p>

                        <div style="width: 100%;margin:20px 0; display: inline-block;text-align: center">
                        </div>
                        <div style="width: 100%; text-align: center; ">
                          <a style="text-decoration: none; border-radius: 5px; padding: 11px 23px; color: white; background-color: #CB4335" href="http://callcenter.mazatanmpio.gob.mx/?mwc=home">Seguimiento</a>
                        </div>

                        <p style="color: #b3b3b3; font-size: 12px; text-align: center;margin: 30px 0 0">Copyright. Dise&ntilde;ado y desarrollado por <a href="https://mwc.com.mx/">MWConsultores</a></p>
                      </div>
                    </td>
                  </tr>
                </table>
             ');
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
      $mail->send();            // echo 'Mensaje enviado';
      }catch (Exception $e) {            // echo "Hay problemas con el envío: {$mail->ErrorInfo}";
     }
    }
    if($insertar){
      return 1;
    }else {
      return 0;
    }
  }

  public function vercorreo($email){
    $db = new Conexion();
    // $this->pass = hash($db->real_escape_string($pass));
    $sql = $db->query("SELECT * FROM tblp_usuarios WHERE tblp_usuarios.email = '$email'");
    $datos = $db->recorrer($sql);
    $codigo = $datos['Codigo'];
    $nombre = $datos['Nombre']." ".$datos['APaterno']." ".$datos['AMaterno'];
    if($db->rows($sql) > 0){
      $sql2 = $db->query("UPDATE tblp_usuarios SET tblp_usuarios.FecCod = NOW() WHERE tblp_usuarios.email = '$email'");

      $mail = new PHPMailer(true);
      try {
        //Server settings
        $mail->SMTPDebug = 0;                                       // Errores
        $mail->isSMTP();                                            // Protocolo SMTP
        $mail->Host       = 'smtp.gmail.com';                       // Server de correo
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'mwc.callcenter@gmail.com';             // correo
        $mail->Password   = 'mwcc3nt3r';                            // password
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('mwc.callcenter@gmail.com', 'MWCALL CENTER');
        $mail->addAddress($email, $nombre);       // Quien lo resive

        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Restablecer';
        $mail->Body    = utf8_decode('
        <table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;">
        <tr>
          <td style="background-color: #ecf0f1; text-align: left; padding: 0">
            <!-- Boton -->
            <a href="">
            </a>
          </td>
        </tr>
        <tr>
          <td style="padding: 0">
            <img style="padding: 0; display: block" src="http://callcenter.mazatanmpio.gob.mx/assets/img/mw.jpg" width="100%">
          </td>
        </tr>
        <tr>
          <td style="background-color: #ecf0f1">
            <div style="color: #34495e; margin: 4% 10% 2%; text-align: justify;font-family: sans-serif">
              <h2 style="color: #CD6155; margin: 0 0 7px">Hola'." ".$nombre.' </h2>
              <p style="margin: 2px; font-size: 15px">
              Le enviamos la informaci&oacute;n de su cuenta, si necesitas algo m&aacute;s en lo que te podamos apoyar, no dudes en contactarnos.<br>
              Quedamos a tus &oacute;rdenes.<br><br>

              Para restablecer su contrase&ntilde;a presione el bot&oacute;n "Restablecer", en dado caso que el bot&oacute;n no sirva, c&oacute;pielo y pegue el siguiente enlace en su navegador web:<br>
              http://callcenter.mazatanmpio.gob.mx/?mwc=restablecer&Id='.$codigo.'<br><br>
		El siguiente enlace solo dura 24 horas despu&eacute;s de ese tiempo tendr&aacute; que volver a mandar la solicitud</p>

              <div style="width: 100%;margin:20px 0; display: inline-block;text-align: center">
              </div>
              <div style="width: 100%; text-align: center; ">
                <a style="text-decoration: none; border-radius: 5px; padding: 11px 23px; color: white; background-color: #CB4335" href="http://callcenter.mazatanmpio.gob.mx/?mwc=restablecer&Id='.$codigo.'">Restablecer</a>
              </div>

              <p style="color: #b3b3b3; font-size: 12px; text-align: center;margin: 30px 0 0">Copyright. Dise&ntilde;ado y desarrollado por <a href="https://mwc.com.mx/">MWConsultores</a></p>
            </div>
          </td>
        </tr>
      </table>
   ');
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();
        // echo 'Mensaje enviado';
    }catch (Exception $e) {
    // echo "Hay problemas con el envío: {$mail->ErrorInfo}";
   }
      return 1;
    } else {
      return 0;
    }


  }

  public function Udp_Pass2($pass1,$pass2,$code){
    $db = new Conexion();
    $idusuario=$code;
    $pass_has=password_hash($pass1, PASSWORD_DEFAULT);
    $sql = $db->query("SELECT * FROM tblp_usuarios WHERE tblp_usuarios.Codigo = '$idusuario'");
    if($db->rows($sql) > 0){
      // $datos = $db->recorrer($sql);
      $insertar = $db->query("UPDATE tblp_usuarios SET tblp_usuarios.Pass = '$pass_has' WHERE tblp_usuarios.Codigo = '$idusuario'");
      if($insertar){
        $sql2 = $db->query("UPDATE tblp_usuarios SET tblp_usuarios.FecCod = '' WHERE tblp_usuarios.Codigo = '$idusuario'");
        if ($sql2) {
          return 1;
        }
      }else {
        return 0;
      }
    }else {
      return 0;
    }
  }










}




 ?>
