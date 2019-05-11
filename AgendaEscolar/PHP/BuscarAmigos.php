<?php
  session_start([
      'cookie_lifetime' => 86400,
      'gc_maxlifetime' => 86400,
  ]);
  include("Conexion.php");


  $con=conectar();
  $username = $_SESSION['usuario'];

  $busqueda=$_POST['postBusqueda'];
  $cad="";

  $query = "SELECT NombreUsuario, Nombre, Apellidos, FotoPerfil FROM usuarios WHERE NombreUsuario LIKE '".$busqueda." %' OR NombreUsuario LIKE '% ".$busqueda." %' OR NombreUsuario LIKE '% ".$busqueda."' OR NombreUsuario LIKE '%".$busqueda."%' and NombreUsuario <> '".$username."' ORDER BY Nombre asc";

  $result = mysqli_query($con, $query) or die('Consulta fallida: ' . mysqli_error($con));
  while($row = mysqli_fetch_assoc($result)){
  	$cad=$cad." ".$row['NombreUsuario']."|".$row['Nombre']." ".$row['Apellidos']."|".$row['FotoPerfil']."-";
  }

  echo $cad;
  mysqli_close($con);
  
?>