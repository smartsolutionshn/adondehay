<?php

include ('conexion.php');

session_start();
$usuario = $_SESSION['usuarioId'];
$pais = $_GET["Pais"];
$ciudad = $_GET["Ciudad"];
$compania = $_GET["Compania"];
$indiceDG = (intval($_GET["Indice"]) - 1) * 10;
if($indiceDG < 0){
	$indiceDG = 0;
}
$filtro = $_GET["Filtro"];


$params = array(':usuarioid' => $usuario, ':pais' => $pais, ':ciudad' => $ciudad, ':compania' => $compania,
				':indiceDG' => $indiceDG);

$query = "SELECT * FROM productos
			where UsuarioId = :usuarioid and Compania = :compania and Pais = :pais and Ciudad = :ciudad
			order by Descripcion LIMIT :indiceDG, 10";

if($filtro != ""){
	$params = array(':usuarioid' => $usuario, ':pais' => $pais, ':ciudad' => $ciudad, ':compania' => $compania,
					':filtro' => '%'.$filtro.'%', ':indiceDG' => $indiceDG);
	
	$query = "SELECT * FROM productos
			where UsuarioId = :usuarioid and Compania = :compania and Pais = :pais and Ciudad = :ciudad
			and Descripcion like :filtro
			order by Descripcion LIMIT :indiceDG, 10";
	
}
 			

$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$stmt = $pdo->prepare($query);
$stmt->execute($params);

$result = $stmt->fetchAll(PDO::FETCH_OBJ);


$query = "SELECT count(*) as cuantos FROM productos
			where UsuarioId = :usuarioid and Compania = :compania and Pais = :pais and Ciudad = :ciudad";

$params = array(':usuarioid' => $usuario, ':pais' => $pais, ':ciudad' => $ciudad, ':compania' => $compania);

$stmt = $pdo->prepare($query);
$stmt->execute($params);

$cuantos = $stmt->fetchColumn();

$json = array('Registros' => $cuantos, 'Data' => $result);

echo json_encode($json);