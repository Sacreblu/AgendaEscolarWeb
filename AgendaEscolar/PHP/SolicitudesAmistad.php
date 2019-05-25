<?php
  session_start([
      'cookie_lifetime' => 86400,
      'gc_maxlifetime' => 86400,
  ]);
  include("Conexion.php");


  $con=conectar();
  $username = $_SESSION['usuario'];
  $cad="";

  $query = 'SELECT Usuario1 as UserName, usuarios.Nombre as Nombre, usuarios.Apellidos, usuarios.FotoPerfil FROM Contactos inner join usuarios on (Contactos.Usuario1 = usuarios.NombreUsuario)  WHERE Contactos.Estado = "Pendiente" and Usuario2 ="'.$username.'" ORDER BY Nombre asc';

  $result = mysqli_query($con, $query) or die('Consulta fallida: ' . mysqli_error($con));
  while($row = mysqli_fetch_assoc($result)){
  	$cad=$cad."-".$row['UserName']."|".$row['Nombre']." ".$row['Apellidos']."|".$row['FotoPerfil'];
  }

  echo $cad;
  mysqli_close($con);
  
?>