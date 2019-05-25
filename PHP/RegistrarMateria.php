<?php
  include("Conexion.php");

  $con=conectar();

  $username=$_POST['postUser'];
  $materia=$_POST['postMateria'];
  $dia=$_POST['postDia'];
  $hrInicio=$_POST['posthrInicio'];
  $hrFin=$_POST['posthrFin'];
  $Aula=$_POST['postAula'];

  $hrTotal=$hrFin-$hrInicio;
  $hrOcupCad=$hrInicio;
  $hrOcup;

  for ($i=1; $i<$hrTotal; $i++){
    $hrOcup=$hrInicio+$i;
    if($hrOcup<10){
      $hrOcupCad=$hrOcupCad." 0".$hrOcup;
    }else{
      $hrOcupCad=$hrOcupCad." ".$hrOcup;
    }
  }
  
  $query = "INSERT INTO Horario (NombreUsuario, Materia, Dia, HrInicio, HrFin, Lugar, hrsOcupadas) VALUES ('".$username."', '".$materia."', '".$dia."', '".$hrInicio."', '".$hrFin."', '".$Aula."', '".$hrOcupCad."')";
    mysqli_query($con, $query) or die('Consulta fallida: ' . mysqli_error($con));

  mysqli_close($con);
  echo "1";
?>