<?php

$file = $_FILES[0];

$allowedExts = array("csv", "xls", "xlsx", "txt");
$temp = explode(".", $_FILES[0]["name"]);
$extension = end($temp);
$fecha = $fecha = date("Y-m-d H:i:s");

if ($_FILES[0]["size"] / 1024 / 1024 < 10 && in_array($extension, $allowedExts)) {
	include ('conexion.php');
	include ('palabrasReservadas.php');
	include ('Libreria.php');
	
	session_start();
	$usuario = $_SESSION['usuarioId'];
	$pais = $_GET["Pais"];
	$ciudad = $_GET["Ciudad"];
	$compania = $_GET["Compania"];
	
	$chr = array('\\','/',':','*','?','"','<','>','|','@');
	$uploaddir = '../uploads/' . 
				str_replace($chr,'',$usuario) . '/' . $pais . '/'. $ciudad . '/'. 
				str_replace($chr,'',$compania) . '/';				
	 
	if (!file_exists($uploaddir)) {
		mkdir($uploaddir, 0777, true);
	}
	
	if(move_uploaded_file($file['tmp_name'], $uploaddir. basename($file['name'])))
	{
		$query = "insert ignore into productos
				(Descripcion, Compania, Pais, Ciudad, UsuarioId, FechaRegistro) values
				(:descripcion, :compania, :pais, :ciudad, :usuarioid, :fecha)";							
		
		//Subir los productos.
		$fp = fopen($uploaddir. basename($file['name']), 'r');
		
		while ( !feof($fp) )
		{
			$line = fgets($fp);
		
			$someCondition = $extension == "txt";
		
			$delimiter = $someCondition ? "\t" : ",";
			$data = str_getcsv($line, $delimiter);
		
			$descripcion = $data[0];
			
			if($descripcion != NULL && !StringsInString($palabras, $descripcion))
			{
				$params = array(':usuarioid' => $usuario, ':pais' => $pais, ':ciudad' => $ciudad, ':compania' => $compania,
						':descripcion' => $descripcion, ':fecha' => $fecha);
				
				//Guardar en la base de datos
				$stmt = $pdo->prepare($query);
							
				$stmt->execute($params);
			}										
		}
		
		fclose($fp);
		
		Delete('../uploads/' . str_replace($chr,'',$usuario) );
		
		echo 'Ok';
	}
	else
	{
		echo 'Error al subir archivo';
	}
} else {
	echo "Archivo invalido.";
}


function Delete($path)
{
	if (is_dir($path) === true)
	{
		$files = array_diff(scandir($path), array('.', '..'));

		foreach ($files as $file)
		{
			Delete(realpath($path) . '/' . $file);
		}

		return rmdir($path);
	}

	else if (is_file($path) === true)
	{
		return unlink($path);
	}

	return false;
}



