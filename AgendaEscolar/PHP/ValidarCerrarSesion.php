<?php
	session_start([
    	'cookie_lifetime' => 86400,
    	'gc_maxlifetime' => 86400,
	]);
	error_reporting(0);
	$varsesion = $_SESSION['usuario'];

	if($varsesion != null || $varsesion!=""){
		echo "<script> location.href='HTML/Inicio.php' </script>";
	}
?>