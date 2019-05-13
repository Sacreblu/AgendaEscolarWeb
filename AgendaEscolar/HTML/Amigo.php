<?php
include("../PHP/ValidarSesion.php");
include("../PHP/Conexion.php");
$con=conectar();
$usernameamigo = $_SESSION['amigo'];
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
    <script type="text/javascript" src="../JavaScript/push.min.js"></script>
    <script type="text/javascript" src="../JavaScript/jquery.custom-file-input.js"></script>
    <script type="text/javascript" src="../JavaScript/ValidacionesModificarCuenta.js"></script>


    <link href="../CSS/MenuCSS.css" rel="stylesheet">
    <link href="../CSS/Perfil.css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/Horario.css">
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
                $query = 'SELECT * FROM usuarios WHERE NombreUsuario="'.$usernameamigo.'"';
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
              <br><br><br><br>

              <div class="contenedorPerfil">
                
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
                  <div id="inpt" class="col-ms-12 col-md-12 form-group">
                    <label>Nombre de Usuario </label>   
                    <input type="text" class="form-control" value="<?php echo$row['NombreUsuario']?>" id="user" name="user" pattern="[A-Za-z0-9ñ]{0,20}" maxlength="20" readonly>
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
                
              </div>
            </div>
            <div id="horario">  
                <div class="col-sm-12 span7">
                  <div class="widget stacked widget-table action-table">

                    <div class="widget-header">
                      <h3>Horario</h3>
                    </div> <!-- /widget-header -->

                    <div id="table-box" class="row">
                      <div id="dias" class="col-md-2">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Lunes</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                            $query = 'SELECT * FROM Horario WHERE NombreUsuario="'.$usernameamigo.'" AND Dia="Lunes" ORDER By HrInicio asc';
                            $result = mysqli_query($con, $query) or die('Consulta fallida: ' . mysqli_error($con));
                            $row = mysqli_fetch_assoc($result);
                            if (empty($row)){
                              echo "<tr><td class='vacio'></td</tr>";
                            }
                            else{
                              $cadenaTabla = "  
                                <tr>
                                <td style='vertical-align:middle;'><b>".$row['Materia']."</b><br>Aula ".$row['Lugar']."<br>".$row['HrInicio'].":00 - ".$horaFin.":59</td>
                                </tr>";
                                while($row = mysqli_fetch_assoc($result)){
                                  $horaFin=$row['HrFin']-1;
                                  $cadenaTabla=$cadenaTabla."  
                                  <tr>
                                  <td style='vertical-align:middle;'><b>".$row['Materia']."</b><br>Aula ".$row['Lugar']."<br>".$row['HrInicio'].":00 - ".$horaFin.":59</td>
                                  </tr>";
                                };
                                echo $cadenaTabla;
                            }
                          ?>
                          </tbody>
                        </table>
                      </div>

                      <div id="dias" class="col-md-2">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Martes</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                            $query = 'SELECT * FROM Horario WHERE NombreUsuario="'.$usernameamigo.'" AND Dia="Martes" ORDER By HrInicio asc';
                            $result = mysqli_query($con, $query) or die('Consulta fallida: ' . mysqli_error($con));
                            $row = mysqli_fetch_assoc($result);
                            if (empty($row)){
                              echo "<tr><td class='vacio'></td</tr>";
                            }
                            else{
                              $cadenaTabla = "  
                                <tr>
                                <td style='vertical-align:middle;'><b>".$row['Materia']."</b><br>Aula ".$row['Lugar']."<br>".$row['HrInicio'].":00 - ".$horaFin.":59</td>
                                </tr>";
                                while($row = mysqli_fetch_assoc($result)){
                                  $horaFin=$row['HrFin']-1;
                                  $cadenaTabla=$cadenaTabla."  
                                  <tr>
                                  <td style='vertical-align:middle;'><b>".$row['Materia']."</b><br>Aula ".$row['Lugar']."<br>".$row['HrInicio'].":00 - ".$horaFin.":59</td>
                                  </tr>";
                                };
                                echo $cadenaTabla;
                            }
                          ?>
                          </tbody>
                        </table>
                      </div>

                      <div id="dias" class="col-md-2">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Miércoles</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                            $query = 'SELECT * FROM Horario WHERE NombreUsuario="'.$usernameamigo.'" AND Dia="Miercoles" ORDER By HrInicio asc';
                            $result = mysqli_query($con, $query) or die('Consulta fallida: ' . mysqli_error($con));
                            $row = mysqli_fetch_assoc($result);
                            if (empty($row)){
                              echo "<tr><td class='vacio'></td</tr>";
                            }
                            else{
                              $cadenaTabla = "  
                                <tr>
                                <td style='vertical-align:middle;'><b>".$row['Materia']."</b><br>Aula ".$row['Lugar']."<br>".$row['HrInicio'].":00 - ".$horaFin.":59</td>
                                </tr>";
                                while($row = mysqli_fetch_assoc($result)){
                                  $horaFin=$row['HrFin']-1;
                                  $cadenaTabla=$cadenaTabla."  
                                  <tr>
                                  <td style='vertical-align:middle;'><b>".$row['Materia']."</b><br>Aula ".$row['Lugar']."<br>".$row['HrInicio'].":00 - ".$horaFin.":59</td>
                                  </tr>";
                                };
                                echo $cadenaTabla;
                            }
                          ?>
                          </tbody>
                        </table>
                      </div>

                      <div id="dias" class="col-md-2">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Jueves</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                            $query = 'SELECT * FROM Horario WHERE NombreUsuario="'.$usernameamigo.'" AND Dia="Jueves" ORDER By HrInicio asc';
                            $result = mysqli_query($con, $query) or die('Consulta fallida: ' . mysqli_error($con));
                            $row = mysqli_fetch_assoc($result);
                            if (empty($row)){
                              echo "<tr><td class='vacio'></td</tr>";
                            }
                            else{
                              $cadenaTabla = "  
                                <tr>
                                <td style='vertical-align:middle;'><b>".$row['Materia']."</b><br>Aula ".$row['Lugar']."<br>".$row['HrInicio'].":00 - ".$horaFin.":59</td>
                                </tr>";
                                while($row = mysqli_fetch_assoc($result)){
                                  $horaFin=$row['HrFin']-1;
                                  $cadenaTabla=$cadenaTabla."  
                                  <tr>
                                  <td style='vertical-align:middle;'><b>".$row['Materia']."</b><br>Aula ".$row['Lugar']."<br>".$row['HrInicio'].":00 - ".$horaFin.":59</td>
                                  </tr>";
                                };
                                echo $cadenaTabla;
                            }
                          ?>
                          </tbody>
                        </table>
                      </div>

                      <div id="dias" class="col-md-2">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Viernes</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                            $query = 'SELECT * FROM Horario WHERE NombreUsuario="'.$usernameamigo.'" AND Dia="Viernes" ORDER By HrInicio asc';
                            $result = mysqli_query($con, $query) or die('Consulta fallida: ' . mysqli_error($con));
                            $row = mysqli_fetch_assoc($result);
                            if (empty($row)){
                              echo "<tr><td class='vacio'></td</tr>";
                            }
                            else{
                              $cadenaTabla = "  
                                <tr>
                                <td style='vertical-align:middle;'><b>".$row['Materia']."</b><br>Aula ".$row['Lugar']."<br>".$row['HrInicio'].":00 - ".$horaFin.":59</td>
                                </tr>";
                                while($row = mysqli_fetch_assoc($result)){
                                  $horaFin=$row['HrFin']-1;
                                  $cadenaTabla=$cadenaTabla."  
                                  <tr>
                                  <td style='vertical-align:middle;'><b>".$row['Materia']."</b><br>Aula ".$row['Lugar']."<br>".$row['HrInicio'].":00 - ".$horaFin.":59</td>
                                  </tr>";
                                };
                                echo $cadenaTabla;
                            }
                          ?>
                          </tbody>
                        </table>
                      </div>

                      <div id="dias" class="col-md-2">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Sábado</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                            $query = 'SELECT * FROM Horario WHERE NombreUsuario="'.$usernameamigo.'" AND Dia="Sabado" ORDER By HrInicio asc';
                            $result = mysqli_query($con, $query) or die('Consulta fallida: ' . mysqli_error($con));
                            $row = mysqli_fetch_assoc($result);
                            if (empty($row)){
                              echo "<tr><td class='vacio'></td</tr>";
                            }
                            else{
                              $cadenaTabla = "  
                                <tr>
                                <td style='vertical-align:middle;'><b>".$row['Materia']."</b><br>Aula ".$row['Lugar']."<br>".$row['HrInicio'].":00 - ".$horaFin.":59</td>
                                </tr>";
                                while($row = mysqli_fetch_assoc($result)){
                                  $horaFin=$row['HrFin']-1;
                                  $cadenaTabla=$cadenaTabla."  
                                  <tr>
                                  <td style='vertical-align:middle;'><b>".$row['Materia']."</b><br>Aula ".$row['Lugar']."<br>".$row['HrInicio'].":00 - ".$horaFin.":59</td>
                                  </tr>";
                                };
                                echo $cadenaTabla;
                            }
                          ?>
                          </tbody>
                        </table>
                      </div>
                    </div>

                  </div> <!-- /widget -->
                </div>
              </div>
              <div class="carusel">
                <div class="col-sm-12 span7">
                  <div class="widget stacked widget-table action-table">

                    <div class="widget-header">
                      <h3>Horario</h3>
                      <a href="../HTML/addMateria.html"><button id="btnMaterias" type="button" class="btn btn-default">Materias</button></a>
                    </div> <!-- /widget-header -->

                  </div>
                </div>

                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">
                    <div class="item active">
                      <div id="dias" class="col-md-2">
                        <table class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th>Lunes</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                            $query = 'SELECT * FROM Horario WHERE NombreUsuario="'.$usernameamigo.'" AND Dia="Lunes" ORDER By HrInicio asc';
                            $result = mysqli_query($con, $query) or die('Consulta fallida: ' . mysqli_error($con));
                            while($row = mysqli_fetch_assoc($result)){
                              $horaFin=$row['HrFin']-1;
                              echo "  
                                <tr>
                                  <td style='vertical-align:middle; text-align:center;'><b>".$row['Materia']."</b><br>Aula ".$row['Lugar']."<br>".$row['HrInicio'].":00 - ".$horaFin.":59</td>
                                </tr>";
                            };
                          ?>
                          </tbody>
                        </table>
                      </div>
                    </div>

                    <div class="item">
                      <div id="dias" class="col-md-2">
                        <table class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th>Martes</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                            $query = 'SELECT * FROM Horario WHERE NombreUsuario="'.$usernameamigo.'" AND Dia="Martes" ORDER By HrInicio asc';
                            $result = mysqli_query($con, $query) or die('Consulta fallida: ' . mysqli_error($con));
                            while($row = mysqli_fetch_assoc($result)){
                              $horaFin=$row['HrFin']-1;
                              echo "  
                                <tr>
                                  <td style='vertical-align:middle; text-align:center;'><b>".$row['Materia']."</b><br>Aula ".$row['Lugar']."<br>".$row['HrInicio'].":00 - ".$horaFin.":59</td>
                                </tr>";
                            };
                          ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  
                    <div class="item">
                      <div id="dias" class="col-md-2">
                        <table class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th>Miércoles</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                            $query = 'SELECT * FROM Horario WHERE NombreUsuario="'.$usernameamigo.'" AND Dia="Miercoles" ORDER By HrInicio asc';
                            $result = mysqli_query($con, $query) or die('Consulta fallida: ' . mysqli_error($con));
                            while($row = mysqli_fetch_assoc($result)){
                              $horaFin=$row['HrFin']-1;
                              echo "  
                                <tr>
                                  <td style='vertical-align:middle; text-align:center;'><b>".$row['Materia']."</b><br>Aula ".$row['Lugar']."<br>".$row['HrInicio'].":00 - ".$horaFin.":59</td>
                                </tr>";
                            };
                          ?>
                          </tbody>
                        </table>
                      </div>
                    </div>

                    <div class="item">
                      <div id="dias" class="col-md-2">
                        <table class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th>Jueves</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                            $query = 'SELECT * FROM Horario WHERE NombreUsuario="'.$usernameamigo.'" AND Dia="Jueves" ORDER By HrInicio asc';
                            $result = mysqli_query($con, $query) or die('Consulta fallida: ' . mysqli_error($con));
                            while($row = mysqli_fetch_assoc($result)){
                              $horaFin=$row['HrFin']-1;
                              echo "  
                                <tr>
                                  <td style='vertical-align:middle; text-align:center;'><b>".$row['Materia']."</b><br>Aula ".$row['Lugar']."<br>".$row['HrInicio'].":00 - ".$horaFin.":59</td>
                                </tr>";
                            };
                          ?>
                          </tbody>
                        </table>
                      </div>
                    </div>

                    <div class="item">
                      <div id="dias" class="col-md-2">
                        <table class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th>Viernes</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                            $query = 'SELECT * FROM Horario WHERE NombreUsuario="'.$usernameamigo.'" AND Dia="Viernes" ORDER By HrInicio asc';
                            $result = mysqli_query($con, $query) or die('Consulta fallida: ' . mysqli_error($con));
                            while($row = mysqli_fetch_assoc($result)){
                              $horaFin=$row['HrFin']-1;
                              echo "  
                                <tr>
                                  <td style='vertical-align:middle; text-align:center;'><b>".$row['Materia']."</b><br>Aula ".$row['Lugar']."<br>".$row['HrInicio'].":00 - ".$horaFin.":59</td>
                                </tr>";
                            };
                          ?>
                          </tbody>
                        </table>
                      </div>
                    </div>

                    <div class="item">
                      <div id="dias" class="col-md-2">
                        <table class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th>Sábado</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                            $query = 'SELECT * FROM Horario WHERE NombreUsuario="'.$usernameamigo.'" AND Dia="Sabado" ORDER By HrInicio asc';
                            $result = mysqli_query($con, $query) or die('Consulta fallida: ' . mysqli_error($con));
                            while($row = mysqli_fetch_assoc($result)){
                              $horaFin=$row['HrFin']-1;
                              echo "  
                                <tr>
                                  <td style='vertical-align:middle;text-align:center;'><b>".$row['Materia']."</b><br>Aula ".$row['Lugar']."<br>".$row['HrInicio'].":00 - ".$horaFin.":59</td>
                                </tr>";
                            };
                          ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                  <!-- Left and right controls -->
                  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>
          </div>
          <!-- code end -->
        </div>
      </div>
    </div>
    <script type="text/javascript">
      $(document).ready(function() {
        var cadena="";
        $.ajax({
          type: "POST",
          async: true,
          url: "../PHP/VerHorario.php",
          success: function(result){
           if(result==0){
            document.getElementById("horario").style.display="block";
           }
          }
        });
      });
    </script>
  </body>
</html>
