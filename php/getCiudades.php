<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include ('conexion.php');

session_start();
$pais = utf8_encode($_GET["pais"]);

$params = array(':pais' => $pais);

$query = "SELECT * FROM ciudades
			where pais = :pais
			order by ciudad";
 			
$stmt = $pdo->prepare($query);
$stmt->execute($params);

$result = $stmt->fetchAll(PDO::FETCH_OBJ);

$json = array('data' => $result);

echo json_encode($json);