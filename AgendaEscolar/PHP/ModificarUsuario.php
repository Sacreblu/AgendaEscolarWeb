<?php
session_start([
      'cookie_lifetime' => 86400,
      'gc_maxlifetime' => 86400,
  ]);
  include("Conexion.php");

  $con=conectar();
  $username = $_SESSION['usuario'];

  $nombre=$_POST['postNombre'];
  $apellidos=$_POST['postApellidos'];
  $Nuser=$_POST['postUsuario'];
  $password=$_POST['postPass'];
  $tel=$_POST['postTel'];
  $correo=$_POST['postCorreo'];
  $carrera=$_POST['postCarrera'];
  $inst=$_POST['postInst'];

  if($password==""){
  	$query = "UPDATE usuarios SET NombreUsuario='".$Nuser."', Nombre='".$nombre."', Apellidos='".$apellidos."', Correo='".$correo."', Telefono='".$tel."', Carrera='".$carrera."', Institucion='".$inst."' WHERE NombreUsuario='".$username."'";
    mysqli_query($con, $query) or die('Consulta fallida: ' . mysqli_error($con));
  }
  else{
  	$passEncryp = hash('md5', $password);
  	$query = "UPDATE usuarios SET NombreUsuario='".$Nuser."', Contrasena='".$passEncryp."', Nombre='".$nombre."', Apellidos='".$apellidos."', Correo='".$correo."', Telefono='".$tel."', Carrera='".$carrera."', Institucion='".$inst."' WHERE NombreUsuario='".$username."'";
    mysqli_query($con, $query) or die('Consulta fallida: ' . mysqli_error($con));	
  }
  $_SESSION['usuario'] = $Nuser;

?>