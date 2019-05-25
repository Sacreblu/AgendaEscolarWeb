<?php
  include("Conexion.php");

  $con=conectar();

  $valor=$_POST['postUserName'];


  $query = 'SELECT * FROM usuarios WHERE NombreUsuario="'.$valor.'"';


  $result = mysqli_query($con, $query) or die('Consulta fallida: ' . mysqli_error($con));
  $row = mysqli_fetch_assoc($result);


  if (!empty($row)){
    echo "1";
  }
  else{
    echo "0";
  }

?>