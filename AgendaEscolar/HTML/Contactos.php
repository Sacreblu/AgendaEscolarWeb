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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

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
    					echo "  
    					<div class='col-sm-12 col-md-6 envoltura'>
	    					<div class='panel panel-default'>
	    						<div class='panel-heading'>  <h5>Perfil</h5></div>
	    						<div class='panel-body'>
	    							<div class='col-xs-4 col-md-4 foto'>
	    								<img src='..".$row['FotoPerfil']."' id='profile-image1'>
	    								<button type='button' style='margin-top: 10px' class='btn btn-danger btn-xs' onclick='EliminarAmigo(\"".$username."\", \"".$row['UserName']."\")'>Eliminar</button> 
	    							</div>
	    							<div class='col-xs-8 col-md-8 info'>
	    								<div>
	    									<h3>".$row['Nombre']." ".$row['Apellidos']."</h3>
	    									<p>@".$row['UserName']."</p>
	    									<p>".$dato."</p>
	    								</div>
	    								<hr>
	    							</div>
	    						</div>
	    					</div>
	    				</div>";
	    				if($cont==2){
	    					echo $FinRow;
    						$cont=1;
    					}else{
	    					$cont=$cont+1;
    					}
    				};
    				if($cont==2){
    					echo $FinRow;
    				}
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
    			<div class="row row-centered">
    				<div class="col-md-12 BuscarAimgos">
    					<div class="titulo2"><h4>Buscar Amigos</h4></div> 
    					<div class="searchB">
    						<input class="form-control" id="buscar" type="text" placeholder="Buscar..">
    						<button class="btn btn-primary w3-xlarge srch" onclick="buscarAmigos()"><i class="glyphicon glyphicon-search"></i></button>
    					</div>
    					<div class="Resultados">
    						<div id="resultcards" class="row">
    							
    						</div>
    					</div>
    				</div>
    			</div>
    			<div class="row row-centered">
    				<div class="col-md-12 Solicitudes">
    					<div class="titulo3"><h4>Solicitudes de Amistad</h4></div>
    					<div class="Resultados">
    						<div id="solicitudescards" class="row">
    							
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>

    <!-- Div de advertencia de formulario de Registro" -->
    <div class="overlay3" id="overlay3" style="display:none;"></div>
    <div class="box3" id="box3">
      <a class="boxclose3" id="boxclose3"></a>
      <h4>¡Mensaje Importante!</h4>
      <p id="msg"> 
      </p>
    </div>

    <script type="text/javascript">
    	$(document).ready(function() {
    		var cadena="";
    		$.ajax({
    			type: "POST",
    			async: true,
    			url: "../PHP/SolicitudesAmistad.php",
    			success: function(result){
    				mySplitResult=result.split("-");
    				for(i=1; i < mySplitResult.length; i++){
    					mySplitResult2=mySplitResult[i].split("|");
    					cadena=cadena+"<div class='well well-sm'> <div class='media'> <div class='col-md-3 imgn'> <img class='minImg' src='.."+mySplitResult2[2]+"'> <button type='button' style='margin-top: 5px' class='btn btn-primary btn-xs'>Ver Perfil</button> </div> <div class='col-md-9 media-body'> <h4 class='media-heading'>"+mySplitResult2[1]+"</h4> <p>@"+mySplitResult2[0]+"</p> <button type='button' style='margin-top: 5px' class='btn btn-success btn-xs' onclick='responderSolicitud(\""+mySplitResult2[0]+"\", \"Aceptar\")'>Aceptar</button> <button type='button' style='margin-top: 5px' class='btn btn-danger btn-xs' onclick='responderSolicitud(\""+mySplitResult2[0]+"\", \"Rechazar\")'>Rechazar</button> </div> </div> </div>";
    				}
    				document.getElementById("solicitudescards").innerHTML = cadena;
    			}
    		});
		    function solicitudes(){
		    	var cadena="";
	    		$.ajax({
		          type: "POST",
		          async: true,
		          url: "../PHP/SolicitudesAmistad.php",
		          success: function(result){
		          	mySplitResult=result.split("-");
		          	for(i=1; i < mySplitResult.length; i++){
		          		mySplitResult2=mySplitResult[i].split("|");
		          		cadena=cadena+"<div class='well well-sm'> <div class='media'> <div class='col-md-3 imgn'> <img class='minImg' src='.."+mySplitResult2[2]+"'> <button type='button' style='margin-top: 5px' class='btn btn-primary btn-xs'>Ver Perfil</button> </div> <div class='col-md-9 media-body'> <h4 class='media-heading'>"+mySplitResult2[1]+"</h4> <p>@"+mySplitResult2[0]+"</p> <button type='button' style='margin-top: 5px' class='btn btn-success btn-xs' onclick='responderSolicitud(\""+mySplitResult2[0]+"\", \"Aceptar\")'>Aceptar</button> <button type='button' style='margin-top: 5px' class='btn btn-danger btn-xs' onclick='responderSolicitud(\""+mySplitResult2[0]+"\", \"Rechazar\")'>Rechazar</button> </div> </div> </div>";
		          	}
		          	document.getElementById("solicitudescards").innerHTML = cadena;
		          }
		        });
			}
		    setInterval(solicitudes, 6000);
		});



    	function EliminarAmigo(usuario, amigo){
    		$.ajax({
	          type: "POST",
	          async: false,
	          url: "../PHP/EliminarAmigo.php",
	          data: {"postUser": usuario, "postAmigo": amigo},
	          success: function(result){
	            location.href='Contactos.php';
	          }
	        });
    	}
    	function buscarAmigos(){
    		var busqueda =  document.getElementById("buscar").value;
    		var cadena="";

    		if(busqueda==""){
    			return 0;
    		}
    		$.ajax({
	          type: "POST",
	          async: true,
	          url: "../PHP/BuscarAmigos.php",
	          data: {"postBusqueda": busqueda},
	          success: function(result){
	          	mySplitResult=result.split("-");
	          	for(i=1; i < mySplitResult.length; i++){
	          		mySplitResult2=mySplitResult[i].split("|");
	          		cadena=cadena+"<div class='well well-sm'> <div class='media'> <div class='col-md-3 imgn'> <img class='minImg' src='.."+mySplitResult2[2]+"'> </div> <div class='col-md-9 media-body'> <h4 class='media-heading'>"+mySplitResult2[1]+"</h4> <p>@"+mySplitResult2[0]+"</p> <button type='button' style='margin-top: 5px' class='btn btn-primary btn-xs'>Ver Perfil</button> <button type='button' style='margin-top: 5px' class='btn btn-success btn-xs' onclick='mandarSolicitud(\""+mySplitResult2[0]+"\")'>Agregar</button> </div> </div> </div>";
	          	}
	          	document.getElementById("resultcards").innerHTML = cadena;
	          }
	        });
    	}
    	function mandarSolicitud(usernameAmigo){
    		$.ajax({
	          type: "POST",
	          async: false,
	          url: "../PHP/EnviarSolicitud.php",
	          data: {"postuserAmigo": usernameAmigo},
	          success: function(result){
	          	if(result==1){
	          		$('#msg').html('La solicitud de amistad esta pendiente.');
	          	}
	          	if(result==2){
	          		$('#msg').html('La solicitud de amistad enviada ya ha sido aceptada.');
	          	}
	          	if(result==0){
	          		$('#msg').html('Solicitud de amistad enviada.');
	          	}
	    
					          	
	          	$(function(){
	          		$('#overlay3').fadeIn('fast',function(){
	          			$('#box3').animate({'top':'160px'},500);
	          		});
	          		$('#boxclose3').click(function(){
	          			$('#box3').animate({'top':'-400px'},500,function(){
	          				$('#overlay3').fadeOut('fast');
	          			});
	          		});
	          	});
	          }
	        });
    	}

    	function responderSolicitud(amigo, respuesta){
    		$.ajax({
	          type: "POST",
	          async: false,
	          url: "../PHP/ResponderSolicitud.php",
	          data: {"postuserAmigo": amigo, "postRespuesta": respuesta},
	          success: function(result){
	          	alert(result);
	          	if(result==0){
	          		location.href='Contactos.php';
	          	}
	          }
	        });
    	}
    </script>
  </body> 
</html>
