<?php
  session_start([
      'cookie_lifetime' => 86400,
      'gc_maxlifetime' => 86400,
  ]);
  include("Conexion.php");

  $con=conectar();
  $username = $_SESSION['usuario'];

  $solicitante=$_POST['postSolicitante'];

  $query = "UPDATE Contactos SET Notificacion='Notificado' WHERE Usuario1='".$solicitante."' and Usuario2='".$username."' and Notificacion='Sin notificar'";
    mysqli_query($con, $query) or die('Consulta fallida: ' . mysqli_error($con));

  mysqli_close($con);
?>