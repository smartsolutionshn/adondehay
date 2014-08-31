<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include ('conexion.php');

session_start();

$query = "SELECT * FROM paises order by pais";
 			
$stmt = $pdo->prepare($query);
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_OBJ);

$json = array('data' => $result);

echo json_encode($json);