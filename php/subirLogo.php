<?php

$file = $_FILES[0];

$allowedExts = array("jpg", "png");
$temp = explode(".", $_FILES[0]["name"]);
$extension = end($temp);
$fecha = $fecha = date("Y-m-d H:i:s");

if ($_FILES[0]["size"] / 1024 / 1024 < 10 && in_array($extension, $allowedExts)) {
	include ('conexion.php');		
	
	session_start();
	$usuario = $_SESSION['usuarioId'];
	$pais = $_GET["Pais"];
	$ciudad = $_GET["Ciudad"];
	$compania = $_GET["Compania"];
	
	$chr = array('\\','/',':','*','?','"','<','>','|','@');
	$uploaddir = 'logos/' . 
				str_replace($chr,'',$usuario) . '/' . $pais . '/'. $ciudad . '/'. 
				str_replace($chr,'',$compania) . '/';				
	 
	if (!file_exists($uploaddir)) {
		mkdir($uploaddir, 0777, true);
	}
	
	if(move_uploaded_file($file['tmp_name'], '../'.$uploaddir. basename($file['name'])))
	{
		$params = array(':usuarioid' => $usuario, ':pais' => $pais, ':ciudad' => $ciudad, ':compania' => $compania,
				':logo' => $uploaddir. basename($file['name']));
		
		$query = "update companias set
			Logo = :logo
			where UsuarioId = :usuarioid and Compania = :compania and Pais = :pais and Ciudad = :ciudad";
		
		$stmt = $pdo->prepare($query);
		
		try {
			$stmt->execute($params);
		
			echo 'Ok';
		} catch (Exception $e) {
			echo 'Error al guardar';
		}				
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



