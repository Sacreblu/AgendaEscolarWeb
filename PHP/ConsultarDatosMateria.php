<?php
  include("Conexion.php");

  $con=conectar();

  $user=$_POST['postUser'];
  $materia=$_POST['postMateria'];
  $dia=$_POST['postDia'];


  $query = 'SELECT * FROM Horario WHERE NombreUsuario="'.$user.'" AND Dia="'.$dia.'" AND Materia="'.$materia.'"';


  $result = mysqli_query($con, $query) or die('Consulta fallida: ' . mysqli_error($con));
  $row = mysqli_fetch_assoc($result);

  $cadena = $row['Materia']."-".$row['Dia']."-".$row['HrInicio']."-".$row['HrFin']."-".$row['Lugar'];

  echo $cadena;

?>