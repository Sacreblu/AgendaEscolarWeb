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

    <title>Inicio</title>

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../JavaScript/custom-file-input.js"></script>
    <script type="text/javascript" src="../JavaScript/jquery.custom-file-input.js"></script>


    <link href="../CSS/MenuCSS.css" rel="stylesheet">
    <link href="../CSS/Perfil.css" rel="stylesheet">
    <link href="../CSS/file-input.css" rel="stylesheet">
  </head>
  <body>
    <?php
      include("../PHP/Menu.php");
    ?>

    <div class="container">
      <div class="row justify-content-md-center">
        <div class="Perfil col-sm-12 col-md-10 col-md-offset-2">
          <!-- code start -->
          <div class="twPc-div col-sm-12 col-md-12">
              <a class="twPc-bg twPc-block"></a>

            <div>
              <?php
                $query = 'SELECT * FROM usuarios WHERE NombreUsuario="'.$username.'"';
                $result = mysqli_query($con, $query) or die('Consulta fallida: ' . mysqli_error($con));
                $row = mysqli_fetch_assoc($result);
                echo '
                  <a title="'.$row['Nombre'].' '.$row['Apellidos'].'" class="twPc-avatarLink">
                    <img src="..'.$row['FotoPerfil'].'" class="twPc-avatarImg">
                  </a>
                  <div class="twPc-divUser">
                    <div class="twPc-divName">
                      <p>'.$row['Nombre'].' '.$row['Apellidos'].'</p>
                    </div>
                    <span>
                      @<span>'.$row['NombreUsuario'].'</span>
                    </span>
                  </div>
                ';
              ?>
              <!--ESTILO 1-->
              <input type="file" name="file-1" id="file-1" class="inputfile inputfile-1" accept="image/jpeg"/>
              <label for="file-1">
                <span class="iborrainputfile">Elige una foto</span>
              </label>
              

              <div class="contenedorPerfil">
                <div class="form-row">
                  <div id="inpt" class="col-ms-12 col-md-4 form-group">
                    <label>Nombre de Usuario </label>   
                    <input type="text" class="form-control" value="asdasldlasd skdjvns" id="user" name="user" onblur="postUserName()" pattern="[A-Za-z0-9ñ]{0,20}" maxlength="20" readonly="true">
                    <p class="advertencias" id="mensajeUserName"></p>
                    <p class="advertencias" id="mensajeUserName2"></p>
                  </div> <!-- form-group end.// -->
                  <div id="inpt1" class="col-ms-12 col-md-4 form-group">
                    <label>Nombre (s)</label>
                    <input type="text" class="form-control" id="name" name="nombre" onblur="validarNombre()" pattern="[A-Za-z ñÑ]{0,30}" maxlength="30" readonly="true">
                    <p class="advertencias" id="mensajeName"></p>
                  </div> <!-- form-group end.// -->
                  <div id="inpt2" class="col-ms-12 col-md-4 form-group">
                    <label>Apellidos</label>
                    <input type="text" class="form-control" id="lastname" name="apellidos" onblur="validarLastN()" pattern="[A-Za-z ñ]{0,30}" maxlength="30" readonly="true">
                    <p class="advertencias" id="mensajeLastName"></p>
                  </div> <!-- form-group end.// -->
                </div> <!-- form-row end.// -->
                <div class="form-row">
                  <div id="inpt3" class="col-ms-12 col-md-6 form-group">
                    <label>Correo Electronico</label>
                    <input type="email" class="form-control" id="email" name="correo" onblur="validarEmail()" readonly="true">
                    <p class="advertencias" id="mensajeEmail"></p>
                  </div> <!-- form-group end.// -->
                  <div id="inpt4" class="col-ms-12 col-md-6 form-group">
                    <label>Contraseña </label>   
                    <input type="password" class="form-control" id="pass" name="pass" onblur="validarPassword()" pattern="[A-Za-z0-9 ñ]{8,16}" maxlength="16">
                    <p class="advertencias" id="mensajePass"></p>
                  </div> <!-- form-group end.// -->
                </div>
                
              </div>
            </div>
          </div>
          <!-- code end -->
        </div>
      </div>
    </div>
  </body> 
</html>
