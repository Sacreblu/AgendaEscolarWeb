<?php
  session_start([
      'cookie_lifetime' => 86400,
      'gc_maxlifetime' => 86400,
  ]);
  include("Conexion.php");


  $con=conectar();
  $username = $_SESSION['usuario'];
  $amigo = $_POST['postuserAmigo'];
  $respuesta=$_POST['postRespuesta'];
  $query="";

  if($respuesta=="Aceptar"){
    $query = "UPDATE Contactos SET Estado='Aceptada' WHERE Usuario1='".$amigo."'and Usuario2='".$username."'";
    echo 0;
  }
  else{
    $query = "DELETE FROM Contactos WHERE Usuario1='".$amigo."' and Usuario2='".$username."'";
    echo 1;
  }
  mysqli_query($con, $query) or die('Consulta fallida: ' . mysqli_error($con)); 
  mysqli_close($con);
  
?>