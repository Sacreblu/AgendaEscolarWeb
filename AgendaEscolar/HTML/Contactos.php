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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>

    <title>Studium College</title>

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


    <link href="../CSS/MenuCSS.css" rel="stylesheet">
    <link href="../CSS/Contactos.css" rel="stylesheet">
  </head>
  <body>
    <?php
      include("../PHP/Menu.php");
    ?>

    <div class="contenedor">
    	<div class="row row-centered">
    		<div class="col-xs-12 col-md-7 col-centered listaAmigos">
    			<div class="titulo"><h3>Lista de Amigos</h3></div>  
    			<div class="divAmigos">
    				<?php
    				$InicioRow='<div class="row amigos">';
    				$FinRow='</div>';
    				$cont=1;
    				$query = 'SELECT Usuario1 as UserName, usuarios.Nombre as Nombre, usuarios.Apellidos, usuarios.Correo, usuarios.Telefono, usuarios.FotoPerfil FROM Contactos inner join usuarios on (Contactos.Usuario1 = usuarios.NombreUsuario)  WHERE Contactos.Estado = "Aceptada" and Usuario2 ="'.$username.'" UNION SELECT Usuario2 as UserName, usuarios.Nombre as Nombre, usuarios.Apellidos, usuarios.Correo, usuarios.Telefono, usuarios.FotoPerfil FROM Contactos inner join usuarios on (Contactos.Usuario2 = usuarios.NombreUsuario)  WHERE Contactos.Estado = "Aceptada" and Usuario1 ="'.$username.'" ORDER BY Nombre asc';
    				$result = mysqli_query($con, $query) or die('Consulta fallida: ' . mysqli_error($con));
    				while($row = mysqli_fetch_assoc($result)){
    					if(""==$row['Telefono']){
    						$dato=$row['Correo'];
    					}else{
    						$dato=$row['Telefono'];
    					}
    					if($cont==1){
    						echo $InicioRow;
    					}
    					echo '  
    					<div class="col-sm-12 col-md-6 envoltura">
	    					<div class="panel panel-default">
	    						<div class="panel-heading">  <h5>Perfil</h5></div>
	    						<div class="panel-body">
	    							<div class=col-xs-4 "col-md-4 foto">
	    								<img src="..'.$row['FotoPerfil'].'" id="profile-image1" >
	    								<button type="button"style="margin-top: 10px" class="btn btn-danger btn-xs">Eliminar</button> 
	    							</div>
	    							<div class="col-xs-8 col-md-8 info">
	    								<div>
	    									<h3>'.$row['Nombre'].' '.$row['Apellidos'].'</h3>
	    									<p>@'.$row['UserName'].'</p>
	    									<p>'.$dato.'</p>
	    								</div>
	    								<hr>
	    							</div>
	    						</div>
	    					</div>
	    				</div>';
	    				if($cont==2){
	    					echo $FinRow;
    						$cont=1;
    					}else{
	    					$cont=$cont+1;
    					}
    				};
    				?>
    			</div>
    			<div class="divAmigosCel">
    				<?php
    				$result = mysqli_query($con, $query) or die('Consulta fallida: ' . mysqli_error($con));
    				while($row = mysqli_fetch_assoc($result)){
    					if(""==$row['Telefono']){
    						$dato=$row['Correo'];
    					}else{
    						$dato=$row['Telefono'];
    					}
    					echo '  
    					<div class="col-sm-12 col-md-6 envoltura">
	    					<div class="panel panel-default">
	    						<div class="panel-heading">  <h5>Perfil</h5></div>
	    						<div class="panel-body">
	    							<div class=col-xs-4 "col-md-4 foto">
	    								<img src="..'.$row['FotoPerfil'].'" id="profile-image1" >
	    								<button type="button"style="margin-top: 10px" class="btn btn-danger btn-xs">Eliminar</button> 
	    							</div>
	    							<div class="col-xs-8 col-md-8 info">
	    								<div>
	    									<h3>'.$row['Nombre'].' '.$row['Apellidos'].'</h3>
	    									<p>@'.$row['UserName'].'</p>
	    									<p>'.$dato.'</p>
	    								</div>
	    								<hr>
	    							</div>
	    						</div>
	    					</div>
	    				</div>';
    				};
    				?>
    			</div>
    		</div>
    		
    		<div class="col-ms-12 col-md-4 col-centered Contactos">

    		</div>
    	</div>
    </div>
  </body> 
</html>
