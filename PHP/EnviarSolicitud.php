<?php
  session_start([
      'cookie_lifetime' => 86400,
      'gc_maxlifetime' => 86400,
  ]);
  include("Conexion.php");


  $con=conectar();
  $username = $_SESSION['usuario'];
  $amigo = $_POST['postuserAmigo'];
  $cadena="";

  $query = 'SELECT Estado FROM Contactos WHERE Usuario1 = "'.$username.'" and Usuario2 ="'.$amigo.'" or Usuario1 = "'.$amigo.'" and Usuario2 = "'.$username.'"';

  $result = mysqli_query($con, $query) or die('Consulta fallida: ' . mysqli_error($con));
  while($row = mysqli_fetch_assoc($result)){
  	$cadena=$row['Estado'];
  }

  switch ($cadena) {
    case "Pendiente":
        echo 1;
        break;
    case "Aceptada":
        echo 2;
        break;
    default:
        $query = "INSERT INTO Contactos (Usuario1, Usuario2) VALUES ('".$username."', '".$amigo."')";
        mysqli_query($con, $query) or die('Consulta fallida: ' . mysqli_error($con));
        echo 0;
  }
  mysqli_close($con);
  
?>