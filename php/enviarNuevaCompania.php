<?php

include ('conexion.php');

session_start();

$pais = htmlentities($_POST['pais']);
$ciudad = htmlentities($_POST['ciudad']);
$compania = htmlentities($_POST['compania']);
$correo = htmlentities($_POST['correo']);
$telefono = htmlentities($_POST['telefono']);
$fecha = date("Y-m-d H:i:s");
$usuario = $_SESSION['usuarioId'];

$paramsCia = array(':usuarioid' => $usuario, ':compania' => $compania, ':pais' => $pais, ':ciudad' => $ciudad, ':fechaRegistro' => $fecha,
						':telefono' => $telefono, ':correo' => $correo);
     
try{
	$pdo->beginTransaction();		
	
	$stmtCia = $pdo->prepare('
    INSERT INTO companias (UsuarioId, Compania, Pais, Ciudad, Correo, Telefono, FechaRegistro)
    VALUES (:usuarioid, :compania, :pais, :ciudad, :correo, :telefono, :fechaRegistro)');
		
	$stmtCia->execute($paramsCia);
	
	$pdo->commit();
	
	echo 'Ok';
}
catch (PDOException $exception){
	$pdo->rollBack();
	
	if (strpos($exception->getMessage(),'Duplicate entry') !== false) {
		echo '<div class="alert alert-danger">La compa&ntilde;ia ingresada ya existe.</div>';
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