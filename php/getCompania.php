<?php

include ('conexion.php');

session_start();
$usuario = $_SESSION['usuarioId'];
$pais = $_GET["Pais"];
$ciudad = $_GET["Ciudad"];
$compania = $_GET["Compania"];

$params = array(':usuarioid' => $usuario, ':pais' => $pais, ':ciudad' => $ciudad, ':compania' => $compania);

$query = "SELECT * FROM companias 
			where UsuarioId = :usuarioid and Compania = :compania and Pais = :pais and Ciudad = :ciudad"; 			

$stmt = $pdo->prepare($query);
$stmt->execute($params);

$result = $stmt->fetchAll(PDO::FETCH_OBJ);

echo json_encode($result);