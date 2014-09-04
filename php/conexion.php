<?php

//$cn = mysql_connect("localhost","root","1") or die("Error de conexion");
$pdo = new PDO("mysql:host=saturno;dbname=smartsq4_adondehay", 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
//$pdo = new PDO("mysql:host=localhost;dbname=smartsq4_adondehay", 'smartsq4_smart', 'smartpass1979#', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

return($pdo);
?>