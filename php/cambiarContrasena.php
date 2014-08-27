<?php

include ('conexion.php');

$usuario = $_GET["correo"];
$clave = $_GET["clave"];
$contrasena = md5(htmlentities($_POST['contrasena']));
$fecha = date("Y-m-d H:i:s");

$params = array(':usuarioid' => $usuario);
        
$stmt = $pdo->prepare('select UsuarioId, Contrasena from usuarios where UsuarioId = :usuarioid');
$stmt->execute($params);

if($user = $stmt->fetch(PDO::FETCH_LAZY))
{				
	$stmt->closeCursor();
	
	if(md5($usuario.'c1@ve') == $clave)
	{
		//Actualizar ultima fecha sesion.
		$params = array(':usuarioid' => $usuario, ':contrasena' => $contrasena);
		
		$stmt = $pdo->prepare('update usuarios set Contrasena = :contrasena where UsuarioId = :usuarioid');
		
		$stmt->execute($params);
		
		//Iniciar sesion
		session_start();
		$_SESSION['usuarioId']=$usuario;
		
		echo 'Ok';
	}
	else{
		echo 'URL incorrecta.';
	}
		
}
else{
	echo 'Usuario no existe.';
}			
	
$stmt->closeCursor();