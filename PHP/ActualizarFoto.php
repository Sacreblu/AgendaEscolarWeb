<?php
	include("Conexion.php");
	session_start([
    	'cookie_lifetime' => 86400,
    	'gc_maxlifetime' => 86400,
	]);

	$con=conectar();
	$username = $_SESSION['usuario'];

	$nombre = $_FILES['file-1']['name']; //Nombre del archivo y su extencion
	$nombreMinusculas = strtolower($nombre);//Nombre en minusculas
	$extencion=substr($nombreMinusculas, strrpos($nombreMinusculas, '.'));//Extencion del archivo
	$NuevoName = $username.$extencion;
	$ruta = "../Complementos/FotoPerfil/".$NuevoName;
	$resultado = @move_uploaded_file($_FILES["file-1"]["tmp_name"], $ruta); //determina si se pudo o no copiar el archivo

	if(!empty($resultado)){
		$query = "UPDATE usuarios SET FotoPerfil='/Complementos/FotoPerfil/".$NuevoName."' WHERE NombreUsuario='".$username."'";
    	mysqli_query($con, $query) or die('Consulta fallida: ' . mysqli_error($con));
    	header('Location: ../HTML/Perfil.php');
	}
	else{
		header('Location: ../HTML/Perfil.php');
	}

?>