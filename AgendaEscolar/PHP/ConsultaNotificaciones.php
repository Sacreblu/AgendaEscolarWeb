<?php
  session_start([
      'cookie_lifetime' => 86400,
      'gc_maxlifetime' => 86400,
  ]);
  include("Conexion.php");


  $con=conectar();
  $username = $_SESSION['usuario'];
  $cadena="";

  $query = 'SELECT Usuario1 as UserName, usuarios.FotoPerfil FROM Contactos inner join usuarios on (Contactos.Usuario1 = usuarios.NombreUsuario)  WHERE Contactos.Notificacion = "Sin notificar" and Usuario2 ="'.$username.'"';
  $result = mysqli_query($con, $query) or die('Consulta fallida: ' . mysqli_error($con));
  while($row = mysqli_fetch_assoc($result)){
    $cadena=$cadena."-".$row['UserName']."|".$row['FotoPerfil'];
  }

  echo $cadena;

  
  mysqli_close($con);
?>