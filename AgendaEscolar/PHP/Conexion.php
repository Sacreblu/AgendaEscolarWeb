<?php
  
  function conectar(){
    $servidor = "107.180.12.177:3306"; //el servidor que utilizaremos, en este caso será el localhost
    $usuario = "proyectoagenda2"; //El usuario que acabamos de crear en la base de datos
    $contrasenha = "proyecto"; //La contraseña del usuario que utilizaremos
    $BD = "agendaescolar2"; //El nombre de la base de datos

    $conexion = @mysqli_connect($servidor, $usuario, $contrasenha) or die("Error de conexion".mysqli_error());
    mysqli_select_db($conexion, $BD);

    return $conexion;
  }

?>

