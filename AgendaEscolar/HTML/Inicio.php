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

    <title>Inicio</title>

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


    <script src="../JavaScript/glDatePicker.min.js"></script>
    <link href="../CSS/MenuCSS.css" rel="stylesheet">
    <link href="../CSS/glDatePicker.default.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../CSS/Inicio.css">
    <link rel="stylesheet" href="../CSS/Horario.css">
  </head>
  <body>
    <?php
    include("../PHP/Menu.php");
    ?>

    <div id="contenedor" class="row">

      <div id="calendario" class="col-sm-12 col-md-4">
        <input id="calen" type="text" id="mydate" gldp-id="mydate" style="visibility: hidden" />
        <div id="calend" gldp-el="mydate">
        </div>
      </div>

      <div id="horario" class="col-sm-12 col-md-8">  
        <div class="col-sm-12 span7">
          <div class="widget stacked widget-table action-table">

            <div class="widget-header">
              <h3>Horario</h3>
              <a href="../HTML/addMateria.php"><button id="btnMaterias" type="button" class="btn btn-default">Materias</button></a>
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
                    $query = 'SELECT * FROM Horario WHERE NombreUsuario="'.$username.'" AND Dia="Lunes" ORDER By HrInicio asc';
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
                    $query = 'SELECT * FROM Horario WHERE NombreUsuario="'.$username.'" AND Dia="Martes" ORDER By HrInicio asc';
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
                    $query = 'SELECT * FROM Horario WHERE NombreUsuario="'.$username.'" AND Dia="Miercoles" ORDER By HrInicio asc';
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
                    $query = 'SELECT * FROM Horario WHERE NombreUsuario="'.$username.'" AND Dia="Jueves" ORDER By HrInicio asc';
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
                    $query = 'SELECT * FROM Horario WHERE NombreUsuario="'.$username.'" AND Dia="Viernes" ORDER By HrInicio asc';
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
                    $query = 'SELECT * FROM Horario WHERE NombreUsuario="'.$username.'" AND Dia="Sabado" ORDER By HrInicio asc';
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
                    $query = 'SELECT * FROM Horario WHERE NombreUsuario="'.$username.'" AND Dia="Lunes" ORDER By HrInicio asc';
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
                    $query = 'SELECT * FROM Horario WHERE NombreUsuario="'.$username.'" AND Dia="Martes" ORDER By HrInicio asc';
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
                    $query = 'SELECT * FROM Horario WHERE NombreUsuario="'.$username.'" AND Dia="Miercoles" ORDER By HrInicio asc';
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
                    $query = 'SELECT * FROM Horario WHERE NombreUsuario="'.$username.'" AND Dia="Jueves" ORDER By HrInicio asc';
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
                    $query = 'SELECT * FROM Horario WHERE NombreUsuario="'.$username.'" AND Dia="Viernes" ORDER By HrInicio asc';
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
                    $query = 'SELECT * FROM Horario WHERE NombreUsuario="'.$username.'" AND Dia="Sabado" ORDER By HrInicio asc';
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

    <script type="text/javascript">

        $(document).ready(function(){
            $("#myCarousel").carousel({
                interval : false
            });
        });


        $(window).load(function(){
            $('#calen').glDatePicker({
                showAlways: true,
                monthNames:[ 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                dowNames:[ 'Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab' ],
                
                specialDates: [{
                   date: new Date(2019, 4, 1),
                   data: {
                       message: 'Happy Birthday!'
                   },
                   repeatYear: true,
                   cssClass: 'special'
                }],

                onClick: function(target, cell, date, data) {
                    target.val(date.getFullYear() + ' - ' +
                    date.getMonth() + ' - ' +
                    date.getDate());

                    if(data != null) {
                        alert(data.message + '\n' + date.getDate()+' - '+date.getMonth()+' - '+date.getFullYear());
                    }
                }
            });
        });
    </script>
  </body> 
</html>
