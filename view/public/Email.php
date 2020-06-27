<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'assets/src/Exception.php';
require 'assets/src/PHPMailer.php';
require 'assets/src/SMTP.php';

// Instantiation and passing `true` enables exceptions
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
    $mail->setFrom('mwc.callcenter@gmail.com', 'Jonathan');
    $mail->addAddress('jonidx@live.com', 'Joni');       // Quien lo resive
    // $mail->addAddress('ellen@example.com');               // Mandar A Otro
    // $mail->addReplyTo('info@example.com', 'Information'); //Respuesta
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Archivos
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Imagenes

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Asunto Importante';
    $mail->Body    = '  
  <table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;">
	<tr>
		<td style="background-color: #ecf0f1; text-align: left; padding: 0">
      <!-- Boton -->
			<a href="">
				<!-- <img width="20%" style="display:block; margin: 1.5% 3%" src="https://s16.postimg.org/arsbkbzlh/poketrainers.png"> -->
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
				<h2 style="color: #CD6155; margin: 0 0 7px">Hola </h2>
				<p style="margin: 2px; font-size: 15px">
					Muchas gracias por utilizar nuestra plataforma de servicio al cliente para completar su registro click en "Completa tu cuenta".<br><br>
					Si el botón no funciona en su cliente de correo electrónico, cópielo y pégue el siguiente elnace en su navegador web:<br>
          http://callcenter.mazatanmpio.gob.mx/?mwc=Verify&Id=<br><br>
          Al crear una cuenta en MWC, usted puede solicitar:</p>
				<ul style="font-size: 15px;  margin: 10px 0">
					<li>Información sobre nuestros sistemas.</li>
					<li>Nuestros cusos.</li>
					<li>Atencion a cliente.</li>
					<li>Apollo o Capacitación.</li>
					<li>Muchas sorpresas más.</li>
				</ul>
				<div style="width: 100%;margin:20px 0; display: inline-block;text-align: center">
					<!-- <img style="padding: 0; width: 200px; margin: 5px" src="https://s19.postimg.org/np3e1b7pv/premier.jpg">
					<img style="padding: 0; width: 200px; margin: 5px" src="https://s19.postimg.org/ejzml6toz/banner_hoenn.png"> -->
				</div>
        <div style="width: 100%; text-align: center; ">
          <a style="text-decoration: none; border-radius: 5px; padding: 11px 23px; color: white; background-color: #CB4335" href="http://callcenter.mazatanmpio.gob.mx/?mwc=Verify&Id=">Completa tu cuenta</a>
        </div>
        <div class="" style="margin-top:20px">
          <p style="margin: 2px; font-size: 15px">
            Si no se ha registrado en una cuenta de miembros de SQUARE ENIX y ha recibido este correo electrónico por error, ignórelo. No le enviaremos ninguna otra comunicación.
          </p>
        </div>

				<p style="color: #b3b3b3; font-size: 12px; text-align: center;margin: 30px 0 0">Copyright. Diseñado y desarrollado por <a href="https://mwc.com.mx/">MWConsultorias</a></p>
			</div>
		</td>
	</tr>
</table>';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Mensaje enviado';
} catch (Exception $e) {
    echo "Error al enviar: {$mail->ErrorInfo}";
}

?>
