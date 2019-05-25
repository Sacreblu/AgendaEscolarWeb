<?php
	include("Conexion.php");
	session_start([
    	'cookie_lifetime' => 86400,
    	'gc_maxlifetime' => 86400,
	]);

	$con=conectar();
	$username = $_SESSION['amigo'];

	$query = 'SELECT PrivacidadHorario FROM usuarios WHERE NombreUsuario="'.$username.'"';
	$result = mysqli_query($con, $query) or die('Consulta fallida: ' . mysqli_error($con));
	$row = mysqli_fetch_assoc($result);

	if($row['PrivacidadHorario']=="Publico"){
		echo 0;
	}else{
		echo 1;
	}

?>