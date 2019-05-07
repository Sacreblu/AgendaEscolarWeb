<?php
include("../PHP/ValidarSesion.php");
include("../PHP/Conexion.php");
$con=conectar();
$username = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="shortcut icon" href="../Complementos/Imagenes/students.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta charset="utf-8">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>

    <title>Studium College</title>

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../JavaScript/custom-file-input.js"></script>
    <script type="text/javascript" src="../JavaScript/jquery.custom-file-input.js"></script>
    <script type="text/javascript" src="../JavaScript/ValidacionesModificarCuenta.js"></script>


    <link href="../CSS/MenuCSS.css" rel="stylesheet">
    <link href="../CSS/Perfil.css" rel="stylesheet">
    <link href="../CSS/file-input.css" rel="stylesheet">
  </head>
  <body>
    <?php
      include("../PHP/Menu.php");
    ?>

    
  </body> 
</html>
