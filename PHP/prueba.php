<?php
include("../PHP/Conexion.php");
$con=conectar();
$username = "feliz";

$query = 'SELECT * FROM usuarios WHERE NombreUsuario="'.$username.'"';
                $result = mysqli_query($con, $query) or die('Consulta fallida: ' . mysqli_error($con));
                $row = mysqli_fetch_assoc($result);
                echo $row['Apellidos'];

?>