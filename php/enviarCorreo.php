<?php

require 'PHPMailer/PHPMailerAutoload.php';
include ('conexion.php');

$nombre = htmlentities($_POST['nombre']);
$correo = htmlentities($_POST['correo']);
$asunto = htmlentities($_POST['asunto']);
$mensaje = htmlentities($_POST['mensaje']);


$mail = new PHPMailer;

$mail->CharSet = 'UTF-8';
$mail->Encoding = 'quoted-printable';

$mail->IsSMTP();
//$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
//$mail->SMTPSecure = "ssl";
$mail->Username = "notificacion@adondehay.com";
$mail->Password = "cara2014#";
$mail->from = "notificacion@adondehay.com";
$mail->SetFrom('notificacion@adondehay.com', 'Notificacion Adondehay');
$mail->addAddress("lcontreras@smartsolutions.hn");
$mail->addAddress("wguerra@smartsolutions.hn");
$mail->addAddress("wguerra@outlook.com");
$mail->Subject = utf8_encode($asunto);
$mail->isHtml(true);
$mail->Body = "Correo: ".$correo."<BR><BR>Mensaje: ".$mensaje;

try {
    
    $mail->send();   
    echo 'Ok';
} catch (Exception $ex) {
    echo 'Error al enviar formulario.';
}
