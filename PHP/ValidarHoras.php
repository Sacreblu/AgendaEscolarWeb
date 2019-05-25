<?php
  include("Conexion.php");

  $con=conectar();

  $user=$_POST['postUser'];
  $dia=$_POST['postDia'];
  $hrInicio=$_POST['posthrInicio'];
  $hrFin=$_POST['posthrFin'];

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

  $query = 'SELECT hrsOcupadas FROM Horario WHERE NombreUsuario="'.$user.'" AND Dia="'.$dia.'" ORDER BY hrsOcupadas asc';

  $result = mysqli_query($con, $query) or die('Consulta fallida: ' . mysqli_error($con));
  while($row = mysqli_fetch_assoc($result)){
    $cadenaHoras=$row['hrsOcupadas'];
    $horas = explode(" ", $cadenaHoras);
    $horas2 = explode(" ", $hrOcupCad);
    foreach ($horas as &$valor) {
      foreach ($horas2 as &$valor2) {
        if($valor==$valor2){
          echo "1";
          return 0;
        }
      }
    }
  };
  echo "0";
  return 0;

  
?>