<?php
  include("Conexion.php");

  $con=conectar();

  $user=$_POST['postUser'];
  $dia=$_POST['postDia'];
  $materia=$_POST['postMateria'];


  $query = 'SELECT * FROM Horario WHERE NombreUsuario="'.$user.'" AND Dia="'.$dia.'" AND Materia="'.$materia.'"';


  $result = mysqli_query($con, $query) or die('Consulta fallida: ' . mysqli_error($con));
  $row = mysqli_fetch_assoc($result);


  if (!empty($row)){
    echo "1";
  }
  else{
    echo "0";
  }

?>