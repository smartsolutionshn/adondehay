<?php

require 'PHPMailer/PHPMailerAutoload.php';
include ('conexion.php');

$usuario = htmlentities($_POST['correo']);
$fecha = date("Y-m-d H:i:s");

$params = array(':usuarioid' => $usuario);
        
$stmt = $pdo->prepare('select UsuarioId, Contrasena from usuarios where UsuarioId = :usuarioid');
$stmt->execute($params);

// Si el usuario existe, enviar el correo para recuperar contrase�a.
if($user = $stmt->fetch(PDO::FETCH_LAZY))
{			
	$actual_link = "http://$_SERVER[HTTP_HOST]"; //$_SERVER[REQUEST_URI]";
	
	$mail = new PHPMailer;
	
	$clave = md5($usuario.'c1@ve');
	
	$mail->CharSet  = 'UTF-8';
	$mail->Encoding = 'quoted-printable';
	
	$mail->IsSMTP();
	//$mail->Host = "smtp.gmail.com";
	$mail->SMTPAuth = true;
	//$mail->SMTPSecure = "ssl";
	$mail->Username = "notificacion@adondehay.com";
	$mail->Password = "cara2014#";	
	$mail->from = "notificacion@adondehay.com";
	$mail->SetFrom('notificacion@adondehay.com', 'Notificacion Adondehay');
	$mail->addAddress($usuario);
	$mail->Subject = utf8_encode("Recuperar contraseña");
	$mail->isHtml(true);
	$mail->Body = '<BR><BR>Haga clic en el siguiente hipervinculo para cambiar su contrase&ntilde;a<br><br>'.
				  '<a href="'.$actual_link.'/cambiar_contrasena.php?clave='.$clave.'&correo='.$usuario.'">'.
				  $actual_link.'/cambiar_contrasena.php?clave='.$clave.'&correo='.$usuario.'</a>';

	$mail->send();
		
	echo 'Ok';	
}
else{
	echo 'Correo no registrado.';
}			
	
$stmt->closeCursor();