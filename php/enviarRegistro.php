<?php

include ('conexion.php');

include_once $_SERVER['DOCUMENT_ROOT'] . '/securimage/securimage.php';

$securimage = new Securimage();

$pais = htmlentities($_POST['pais']);
$ciudad = htmlentities($_POST['ciudad']);
$compania = htmlentities($_POST['compania']);
$correo = htmlentities($_POST['correo']);
$contrasena = md5(htmlentities($_POST['contrasena']));
$telefono = htmlentities($_POST['telefono']);
$fecha = date("Y-m-d H:i:s");

if ($securimage->check($_POST['captcha_code']) == true) {
  echo '<div class="alert alert-danger">Codigo de seguridad incorrecto.</div>';
  
  exit;
}

$params = array(':usuarioid' => $correo, ':nombre' => $compania, ':contrasena' => $contrasena, ':fechaRegistro' => $fecha);
     

$paramsCia = array(':usuarioid' => $correo, ':compania' => $compania, ':pais' => $pais, ':ciudad' => $ciudad, ':fechaRegistro' => $fecha,
						':telefono' => $telefono);
     
try{
	$pdo->beginTransaction();
	
	$stmt = $pdo->prepare('
    INSERT INTO usuarios (UsuarioId, Nombre, Contrasena, FechaRegistro)
    VALUES (:usuarioid, :nombre, :contrasena, :fechaRegistro)');
	
	$stmtCia = $pdo->prepare('
    INSERT INTO companias (UsuarioId, Compania, Pais, Ciudad, Correo, Telefono, FechaRegistro)
    VALUES (:usuarioid, :compania, :pais, :ciudad, :usuarioid, :telefono, :fechaRegistro)');
	
	$stmt->execute($params);
	$stmtCia->execute($paramsCia);
	
	$pdo->commit();
	
	session_start();
	$_SESSION['usuarioId']=$correo;
	
	echo 'Ok';
}
catch (PDOException $exception){
	$pdo->rollBack();
	
	if (strpos($exception->getMessage(),'Duplicate entry') !== false) {
		echo '<div class="alert alert-danger">El correo ingresado ya existe.</div>';
	}
	else{
		echo '<div class="alert alert-danger">Error de registro.</div>';
	}		
}
catch (Exception $exception){
	if($pdo->inTransaction())
	{
		$pdo->rollBack();
	}
	
	echo '<div class="alert alert-danger">Error de registro.</div>';
}

?>