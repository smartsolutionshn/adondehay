<?php

include ('conexion.php');

session_start();
$usuario = $_SESSION['usuarioId'];
$pais = $_GET["Pais"];
$ciudad = $_GET["Ciudad"];
$compania = $_GET["Compania"];
$producto = $_GET["Producto"];

$params = array(':usuarioid' => $usuario, ':pais' => $pais, ':ciudad' => $ciudad, ':compania' => $compania,
				':producto' => $producto);

$query = "DELETE FROM productos 
			where UsuarioId = :usuarioid and Compania = :compania and Pais = :pais and Ciudad = :ciudad and Descripcion = :producto"; 			

$stmt = $pdo->prepare($query);

$stmt->execute($params);

echo 'Ok';