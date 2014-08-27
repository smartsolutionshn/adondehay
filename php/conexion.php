<?php

//$cn = mysql_connect("localhost","root","1") or die("Error de conexion");
$pdo = new PDO("mysql:host=localhost;dbname=adondehay", 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

return($pdo);
?>