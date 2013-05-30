<?php
	if(isset($_REQUEST['nombre'])){ $nom=$_REQUEST['nombre']; }
	if(isset($_REQUEST['celular'])){ $cel=$_REQUEST['celular']; }
	if(isset($_REQUEST['correo'])){ $mail=$_REQUEST['correo']; }
	if(isset($_REQUEST['asunto'])){ $asunto=$_REQUEST['asunto']; }
	if(isset($_REQUEST['contenido'])){ $cont=$_REQUEST['contenido']; }

	$body = '<table>'.
  		'<tr><td colspan="2">Claro @ 2012</td></tr>'.
  		'<tr><td colspan="2">Email desde http://www.claro.com.co</td></tr>'.
  		'<tr><td>Usuario:</td><td>'.$nom.'</td></tr>'.
  		'<tr><td>Linea celular:</td><td>'.$cel.'</td></tr>'.
  		'<tr><td>Correo:</td><td>'.$mail.'</td></tr>'.
  		'<tr><td>Asunto:</td><td>'.$asunto.'</td></tr>'.
  		'<tr><td colspan="2">Detalle: </td></tr>'.
  		'<tr><td colspan="2">'.$cont.'</td></tr>'.
		'</table>'; // Mensaje a enviar
	echo $body;

	try{
		//Importamos la función PHP class.phpmailer
		require("../lib/phpmailer/class.phpmailer.php");
		require("../lib/phpmailer/class.smtp.php");

		$mail = new PHPMailer();
		$mail->From = $mail; // Desde donde enviamos (Para mostrar)
		$mail->FromName = $nom; // Nombre de quien lo envia (Para mostrar)
		$mail->Subject = "Solicitud Web desde claro.com.co"; // Este es el titulo del email.
		$mail->AddAddress("clarocolombia2012@gmail.com","Claro Colombia"); // Esta es la dirección a donde enviamos
		$mail->Body=$body;
		$mail->IsHTML(true); // El correo se envía como HTML
		
		if(!$mail->Send()){ // Notificamos al usuario del estado del mensaje
		   echo "No se pudo enviar el Mensaje como smtp. " . $mail->ErrorInfo;
		}else{
		   echo "Mensaje enviado al fin!";
		}
	}catch(Exception $e){
		header('location: ../colombia/');
	}
	header('location: ../colombia/');
?>