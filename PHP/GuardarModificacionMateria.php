<?php
  include("Conexion.php");

  $con=conectar();

  $username=$_POST['postUser'];
  $materia=$_POST['postMateria'];
  $dia=$_POST['postDia'];

  $NuevaMateria=$_POST['NuevaMateria'];
  $NuevoDia=$_POST['NuevoDia'];
  $NuevahrInicio=$_POST['NuevahrInicio'];
  $NuevahrFin=$_POST['NuevahrFin'];
  $NuevaAula=$_POST['NuevaAula'];

  $hrTotal=$NuevahrFin-$NuevahrInicio;
  $hrOcupCad=$NuevahrInicio;
  $hrOcup;

  for ($i=1; $i<$hrTotal; $i++){
    $hrOcup=$NuevahrInicio+$i;
    if($hrOcup<10){
      $hrOcupCad=$hrOcupCad." 0".$hrOcup;
    }else{
      $hrOcupCad=$hrOcupCad." ".$hrOcup;
    }
  }

  $query = "UPDATE Horario SET Materia='".$NuevaMateria."', Dia='".$NuevoDia."', HrInicio='".$NuevahrInicio."', HrFin='".$NuevahrFin."', Lugar='".$NuevaAula."', hrsOcupadas='".$hrOcupCad."' WHERE NombreUsuario='".$username."' and Materia='".$materia."' and Dia='".$dia."'";
    mysqli_query($con, $query) or die('Consulta fallida: ' . mysqli_error($con));

  mysqli_close($con);
  echo "1";
?>