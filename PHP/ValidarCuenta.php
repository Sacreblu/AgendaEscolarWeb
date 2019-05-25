<?php
  session_start([
      'cookie_lifetime' => 86400,
      'gc_maxlifetime' => 86400,
  ]);
  include("Conexion.php");

  $con=conectar();

  $user=$_POST['postUser'];
  $password=$_POST['postPass'];

  $passEncryp = hash('md5', $password);
 
  $query = 'SELECT * FROM usuarios WHERE NombreUsuario="'.$user.'" AND Contrasena="'.$passEncryp.'"';


  $result = mysqli_query($con, $query) or die('Consulta fallida: ' . mysqli_error($con));
  $row = mysqli_fetch_assoc($result);


  if (!empty($row)){
    $_SESSION['usuario'] = $user;
    $_SESSION['password'] = $passEncryp;
    echo "1";
  }
  else{
    echo "0";
  }

  mysqli_free_result($result);
  mysqli_close($con);
?>