<?php

include ('conexion.php');

$usuario = htmlentities($_POST['usuario']);
$contrasena = md5(htmlentities($_POST['contrasena']));
$fecha = date("Y-m-d H:i:s");

$params = array(':usuarioid' => $usuario);
        
$stmt = $pdo->prepare('select UsuarioId, Contrasena from usuarios where UsuarioId = :usuarioid');
$stmt->execute($params);

if($user = $stmt->fetch(PDO::FETCH_LAZY))
{			
	// Si la contrasena es igual, iniciar sesion.
	if($user->Contrasena == $contrasena)
	{
		$stmt->closeCursor();
		
		//Actualizar ultima fecha sesion.
		$params = array(':usuarioid' => $usuario, ':fechaActual' => $fecha);
		
		$stmt = $pdo->prepare('
	    update usuarios set UltimoInicioSesion = :fechaActual where UsuarioId = :usuarioid');
			
		$stmt->execute($params);
		
		//Iniciar sesion
		session_start();
		$_SESSION['usuarioId']=$usuario;
		
		echo 'Ok';
	}
	else{
		echo '<div class="alert alert-danger">Contrase&ntilde;a incorrecta.</div>';
	}
}
else{
	echo '<div class="alert alert-danger">Usuario no existe.</div>';
}			
	
$stmt->closeCursor();
	
	
	


	
	






?>