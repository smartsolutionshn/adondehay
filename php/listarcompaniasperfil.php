<?php


include ('conexion.php');

session_start();
$usuario = $_SESSION['usuarioId'];

$params = array(':usuarioid' => $usuario);

$query = "SELECT * FROM companias where UsuarioId = :usuarioid order by Compania, Ciudad";

$stmt = $pdo->prepare($query);
$stmt->execute($params);

$result = $stmt->fetchAll();
 
echo json_encode($result);
