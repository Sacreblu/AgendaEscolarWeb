<?php
	include("Conexion.php");
	session_start([
    	'cookie_lifetime' => 86400,
    	'gc_maxlifetime' => 86400,
	]);

	$con=conectar();
	$username = $_SESSION['usuario'];

	$checkBox = $_POST['postCheck'];

	if($checkBox=="true"){
		$query = "UPDATE usuarios SET PrivacidadHorario='Publico' WHERE NombreUsuario='".$username."'";
    	mysqli_query($con, $query) or die('Consulta fallida: ' . mysqli_error($con));
    	echo "publico";
	}else{
		$query = "UPDATE usuarios SET PrivacidadHorario='Privado' WHERE NombreUsuario='".$username."'";
    	mysqli_query($con, $query) or die('Consulta fallida: ' . mysqli_error($con));
    	echo "privado";
	}
?>