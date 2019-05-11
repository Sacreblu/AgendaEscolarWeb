<?php
  include("Conexion.php");

  $con=conectar();

  $username=$_POST['postUser'];
  $amigo=$_POST['postAmigo'];

  $query = "DELETE FROM Contactos WHERE Usuario1='".$username."' and Usuario2='".$amigo."'";
  mysqli_query($con, $query) or die('Consulta fallida: ' . mysqli_error($con));

  $query = "DELETE FROM Contactos WHERE Usuario2='".$username."' and Usuario1='".$amigo."'";
  mysqli_query($con, $query) or die('Consulta fallida: ' . mysqli_error($con));

  mysqli_close($con);
  echo "1";
?>