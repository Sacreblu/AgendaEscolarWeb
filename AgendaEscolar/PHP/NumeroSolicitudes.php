<?php
  session_start([
      'cookie_lifetime' => 86400,
      'gc_maxlifetime' => 86400,
  ]);
  include("Conexion.php");


  $con=conectar();
  $username = $_SESSION['usuario'];
  $cont=0;

  $query = 'SELECT Usuario1 FROM Contactos WHERE Estado = "Pendiente" and Usuario2="'.$username.'"';
  $result = mysqli_query($con, $query) or die('Consulta fallida: ' . mysqli_error($con));
  $cont=0;
  while($row = mysqli_fetch_assoc($result)){
    $cont=$cont+1;
  }
  echo $cont;
  
  mysqli_close($con);
  
?>