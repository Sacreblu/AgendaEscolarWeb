<?php 
session_start([
      'cookie_lifetime' => 86400,
      'gc_maxlifetime' => 86400,
  ]);

include("Conexion.php");

$conn=conectar();
$username = $_SESSION['usuario'];

$pdo=new PDO("mysql:dbname=agendaescolar2;host=107.180.12.177:3306","proyectoagenda2","proyecto");


$accion=(isset($_POST['accion']))?$_POST['accion']:'leer';

switch ($accion) {
	case 'Agregar':
		$title=$_POST['txt_titulo'];
		$descripcion=$_POST['descripcion'];
		$color=$_POST['color'];
		$textColor="#FFFFFF";
		$start=$_POST['start'];
		$end=$_POST['end'];

  		$query = "INSERT INTO eventos(title,descripcion,color,textColor,start,end,Usuario) VALUES('$title','$descripcion','$color','$textColor','$start','$end', '$username')";
  		mysqli_query($conn, $query) or die('Consulta fallida: ' . mysqli_error($conn));;
  		//echo "<script>location.href='../HTML/Inicio.php'</script>";
 		

		break;
	case 'Eliminar':
  			$id = $_POST['txt_id'];
  			$query = "DELETE FROM eventos WHERE id = '$id' and Usuario = '$username'";
  			mysqli_query($conn, $query);
  			echo "<script>location.href='../HTML/Inicio.php'</script>";
		break;
	case 'Modificar':
  		$id = $_POST['txt_id'];
		$title=$_POST['txt_titulo'];
		$descripcion=$_POST['descripcion'];
		$color=$_POST['color'];
		$textColor="#FFFFFF";
		$start=$_POST['start'];
		$end=$_POST['end'];
		
		$query = "UPDATE eventos set title = '".$title."', descripcion = '".$descripcion."', color = '".$color."', textColor = '".$textColor."', start = '".$start."', end = '".$end."' WHERE id='".$id."' and Usuario = '".$username."'";
		mysqli_query($conn, $query) or die('Consulta fallida: ' . mysqli_error($conn));
  		echo "<script>location.href='../HTML/Inicio.php'</script>";
		break;
	default:
	$sentenciaSQL=$pdo->prepare("SELECT id,title,descripcion,color,start,end FROM eventos WHERE Usuario = '".$username."'");
	$sentenciaSQL->execute();

	$resultado=$sentenciaSQL->fetchALL(PDO::FETCH_ASSOC);
	echo json_encode($resultado);
	break;
}
?>