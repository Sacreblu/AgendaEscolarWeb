<?php
  include("Conexion.php");

  $con=conectar();

  $username=$_POST['postUser'];
  $materia=$_POST['postMateria'];
  $dia=$_POST['postDia'];

  $query = "DELETE FROM Horario WHERE NombreUsuario='".$username."' and Materia='".$materia."' and Dia='".$dia."'";
  mysqli_query($con, $query) or die('Consulta fallida: ' . mysqli_error($con));

  mysqli_close($con);
  echo "1";
?>