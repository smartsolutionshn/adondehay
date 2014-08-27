<?php

require 'PHPMailer/PHPMailerAutoload.php';
include ('conexion.php');

$usuario = htmlentities($_POST['correo']);
$fecha = date("Y-m-d H:i:s");

$params = array(':usuarioid' => $usuario);
        
$stmt = $pdo->prepare('select UsuarioId, Contrasena from usuarios where UsuarioId = :usuarioid');
$stmt->execute($params);

// Si el usuario existe, enviar el correo para recuperar contraseña.
if($user = $stmt->fetch(PDO::FETCH_LAZY))
{			
	$actual_link = "http://$_SERVER[HTTP_HOST]"; //$_SERVER[REQUEST_URI]";
	
	$mail = new PHPMailer;
	
	$clave = md5($usuario.'c1@ve');
	
	$mail->CharSet  = 'UTF-8';
	$mail->Encoding = 'quoted-printable';
	
	$mail->IsSMTP();
	$mail->Host = "smtp.gmail.com";
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "ssl";
	$mail->Username = "wguerram@gmail.com";
	$mail->Password = "Jchrist@1979";
	$mail->Port = "465";
	$mail->from = "wguerram@gmail.com";//'notificacion@adondehay.com';
	$mail->SetFrom('wguerram@gmail.com', 'Notificacion Adondehay');
	$mail->addAddress($usuario);
	$mail->Subject = utf8_encode("Recuperar contraseña");
	$mail->isHtml(true);
	$mail->Body = '<BR><BR>Haga clic en el siguiente hipervinculo para cambiar su contrase&ntilde;a<br><br>'.
				  '<a href="'.$actual_link.'/adondehay/cambiar_contrasena.html?clave='.$clave.'&correo='.$usuario.'">'.
				  $actual_link.'/cambiar_contrasena.html?clave='.$clave.'&correo='.$usuario.'</a>';

	$mail->send();
		
	echo 'Ok';	
}
else{
	echo 'Correo no registrado.';
}			
	
$stmt->closeCursor();