<?php

include ('conexion.php');

session_start();
$usuario = $_SESSION['usuarioId'];
$pais = $_GET["Pais"];
$ciudad = $_GET["Ciudad"];
$compania = $_GET["Compania"];

$nuevopais = htmlentities($_POST['pais']);
$nuevaciudad = htmlentities($_POST['ciudad']);
$nuevacompania = htmlentities($_POST['compania']);
$correo = htmlentities($_POST['correo']);
$telefono = htmlentities($_POST['telefono']);
$sitioWeb = htmlentities($_POST['sitioweb']);
$direccion = htmlentities($_POST['direccion']);

$params = array(':usuarioid' => $usuario, ':pais' => $pais, ':ciudad' => $ciudad, ':compania' => $compania,
				':nuevopais' => $nuevopais, ':nuevaciudad' => $nuevaciudad, ':nuevacompania' => $nuevacompania,
				':telefono' => $telefono, ':correo' => $correo, ':sitioWeb' => $sitioWeb, ':direccion' => $direccion);

$query = "update companias set
			Pais = :nuevopais, Ciudad = :nuevaciudad, Compania = :nuevacompania, Telefono = :telefono,
			Correo = :correo, SitioWeb = :sitioWeb, Direccion = :direccion 
			where UsuarioId = :usuarioid and Compania = :compania and Pais = :pais and Ciudad = :ciudad"; 			

$stmt = $pdo->prepare($query);

try {
	$stmt->execute($params);
	
	echo 'Ok';
} catch (Exception $e) {
	echo 'Error al guardar';
}