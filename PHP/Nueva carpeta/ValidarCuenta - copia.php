<?php
  session_start([
      'cookie_lifetime' => 86400,
      'gc_maxlifetime' => 86400,
  ]);
  include("Conexion.php");

  $con=conectar();

  $user=$_POST['username'];
  $password=$_POST['pass'];

  
 
  $query = 'SELECT * FROM usuarios WHERE NombreUsuario="'.$user.'" AND Contrasena="'.$password.'"';


  $result = mysqli_query($con, $query) or die('Consulta fallida: ' . mysqli_error($con));
  $row = mysqli_fetch_assoc($result);


  if (!empty($row)){
    $_SESSION['usuario'] = $user;
    echo "<script> location.href='../HTML/Inicio.php' </script>";
  }
  else{
    echo "<script> location.href='../' </script>";
    echo "<script>alert('Cuenta erronea...')</script>";
  }

  mysqli_free_result($result);
  mysqli_close($con);
?>