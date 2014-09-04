<?php

include ('conexion.php');

$busqueda = htmlentities($_POST['busqueda']);
$pais = htmlentities($_POST['pais']);
$ciudad = htmlentities($_POST['ciudad']);

$fecha = date("Y-m-d H:i:s");

$params = array(':buscar' => $busqueda, ':pais' => $pais, ':ciudad' => $ciudad, ':fecha' => $fecha);

$query = "INSERT INTO resultado_busquedas (pais, ciudad, busqueda, fecha_busqueda)"
        . " VALUES (:pais, :ciudad, :buscar, :fecha)";
      
$stmt = $pdo->prepare($query);
$stmt->execute($params);

$params = array(':buscar' => '%' . $busqueda . '%', ':pais' => $pais, ':ciudad' => $ciudad);

$query = "SELECT * FROM companias where CONCAT(Pais, Ciudad, Compania) IN
                        (SELECT distinct CONCAT(Pais, Ciudad, Compania) from productos 
			where (Compania like :buscar or Descripcion like :buscar) and Pais = :pais and Ciudad = :ciudad)
			order by Compania";

//set_time_limit ( 0 ) ; 
   
//ini_set('memory_limit', '1024M');
      
$stmt = $pdo->prepare($query);
$stmt->execute($params);

$result = $stmt->fetchAll(PDO::FETCH_OBJ);

$json = array('data' => $result);

echo json_encode($json);

