<?php
  include("Conexion.php");

  $con=conectar();

  $name=$_POST['postName'];
  $lastname=$_POST['postLast'];
  $username=$_POST['postUser'];
  $email=$_POST['postEmail'];
  $pass=$_POST['postPass'];
  $pass2=$_POST['postPass2'];
  
  $query = 'SELECT * FROM usuarios WHERE NombreUsuario="'.$username.'"';

  $result = mysqli_query($con, $query) or die('Consulta fallida: ' . mysqli_error($con));
  $row = mysqli_fetch_assoc($result);

  if (empty($row)){
    $passEncryp = hash('md5', $pass);
    $query = "INSERT INTO usuarios (NombreUsuario, Contrasena, Nombre, Apellidos, Correo) VALUES ('".$username."', '".$passEncryp."', '".$name."', '".$lastname."', '".$email."')";
    mysqli_query($con, $query) or die('Consulta fallida: ' . mysqli_error($con));
    echo "0";
  }
  else{
    echo "1";
  }
  mysqli_close($con);
?>