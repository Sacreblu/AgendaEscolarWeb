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

    <div class="container">
      <div class="row justify-content-md-center">
        <div class="Perfil col-sm-12 col-md-10 col-md-offset-2">
          <!-- code start -->
          <div class="twPc-div col-sm-12 col-md-12">
              <a class="twPc-bg twPc-block"></a>

            <div class="datos">
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
              <form action="../PHP/ActualizarFoto.php" method="post" enctype="multipart/form-data">
                <input type="file" name="file-1" id="file-1" class="inputfile inputfile-1" accept=".jpg, .png"/>
                <label for="file-1">
                  <span class="iborrainputfile">Elige una foto</span>
                </label>
                <label class="labelGuardar" onclick="guardarFoto()">
                  <input type="submit" class="guardarFoto" value="Guardar"/>
                </label>
              </form>

              <div class="contenedorPerfil">
                <?php
                  if($row['PrivacidadHorario']=="Publico"){
                    echo '
                    <div class="form-row">
                      <label class="cont" style="font-size: 15px;">Publicar horario
                        <input type="checkbox" id="checkbocs" onclick="changeHorario()" checked>
                        <span class="checkmark"></span>
                      </label>
                    </div>
                    ';
                  }else{
                    echo '
                      <div class="form-row">
                        <label class="cont" style="font-size: 15px;">Publicar horario
                          <input type="checkbox" id="checkbocs" onclick="changeHorario()">
                          <span class="checkmark"></span>
                        </label>
                      </div>
                    ';
                  }
                ?>
                
                <div class="form-row">
                  <div id="inpt1" class="col-ms-12 col-md-6 form-group">
                    <label>Nombre (s)</label>
                    <input type="text" class="form-control" id="name" name="nombre" value="<?php echo$row['Nombre']?>" pattern="[A-Za-z ñÑ]{0,30}" maxlength="30" readonly>
                  </div> <!-- form-group end.// -->
                  <div id="inpt2" class="col-ms-12 col-md-6 form-group">
                    <label>Apellidos</label>
                    <input type="text" class="form-control" id="lastname" name="apellidos" value="<?php echo$row['Apellidos']?>" pattern="[A-Za-z ñ]{0,30}" maxlength="30" readonly>
                  </div> <!-- form-group end.// -->
                </div> <!-- form-row end.// -->
                <div class="form-row">
                  <div id="inpt" class="col-ms-12 col-md-6 form-group">
                    <label>Nombre de Usuario </label>   
                    <input type="text" class="form-control" value="<?php echo$row['NombreUsuario']?>" id="user" name="user" pattern="[A-Za-z0-9ñ]{0,20}" maxlength="20" readonly>
                  </div> <!-- form-group end.// -->
                  <div id="inpt4" class="col-ms-12 col-md-6 form-group">
                    <label>Contraseña </label>   
                    <input type="password" class="form-control" id="pass" name="pass" pattern="[A-Za-z0-9 ñ]{8,16}" maxlength="16" readonly>
                  </div> <!-- form-group end.// -->
                </div>
                <div class="form-row">
                  <div id="inpt" class="col-ms-12 col-md-6 form-group">
                    <label>Numero Telefonico</label>   
                    <input type="text" class="form-control" value="<?php echo$row['Telefono']?>" id="tel" name="tel" pattern="[0-9]{0,10}" maxlength="10" readonly>
                  </div> <!-- form-group end.// -->
                  <div id="inpt3" class="col-ms-12 col-md-6 form-group">
                    <label>Correo Electronico</label>
                    <input type="email" class="form-control" id="email" value="<?php echo$row['Correo']?>" name="correo" readonly>
                  </div> <!-- form-group end.// -->
                </div>
                <div class="form-row">
                  <div id="inpt1" class="col-ms-12 col-md-6 form-group">
                    <label>Carrera</label>
                    <input type="text" class="form-control" id="carrera" value="<?php echo$row['Carrera']?>" name="carrera" pattern="[A-Za-z ñÑ]{0,30}" maxlength="30" readonly>
                  </div> <!-- form-group end.// -->
                  <div id="inpt2" class="col-ms-12 col-md-6 form-group">
                    <label>Institución</label>
                    <input type="text" class="form-control" id="inst" name="inst" value="<?php echo$row['Institucion']?>" pattern="[A-Za-z ñ]{0,30}" maxlength="30" readonly>
                  </div> <!-- form-group end.// -->
                </div> <!-- form-row end.// -->
                <div class="form-row">
                  <div style="text-align: center; padding: 0;" class="col-xs-3 col-md-3 form-group">
                    <button id="Modificar" type='button' class='btn btn-success btn-sm' onclick='Modificar()'>Modificar</button>
                  </div> <!-- form-group end.// -->
                  <div style="text-align: center; padding: 0;"  class="col-xs-3 col-md-3 form-group">
                    <button id="Guardar" type='button' class='btn btn-primary btn-sm' onclick='Guardar()'>Guardar</button>
                  </div> <!-- form-group end.// -->
                  <div style="text-align: center; padding: 0;" class="col-xs-3 col-md-3 form-group">
                    <button id="Cancelar" type='button' class='btn btn-warning btn-sm' onclick='Cancelar()'>Cancelar</button>
                  </div> <!-- form-group end.// -->
                  <div style="text-align: center; padding: 0;" class="col-xs-3 col-md-3 form-group">
                    <button id="Eliminar" type='button' class='btn btn-danger btn-sm' onclick='Eliminar()'>Eliminar</button>
                  </div> <!-- form-group end.// -->
                </div> <!-- form-row end.// -->
              </div>
            </div>
          </div>
          <!-- code end -->
        </div>
      </div>
    </div>

    <div class="overlay3" id="overlay3" style="display:none;"></div>
    <div class="box3" id="box3">
      <a class="boxclose3" id="boxclose3"></a>
      <h4>¡Mensaje Importante!</h4>
      <p id="msg"> 
      </p>
    </div>
  </body> 
</html>
