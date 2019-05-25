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
    <script type="text/javascript" src="../JavaScript/push.min.js"></script>
    <script src='../JavaScript/moment.min.js'></script>
    <link rel='stylesheet' href='../CSS/fullcalendar.min.css'>
    <script src='../JavaScript/fullcalendar.min.js'></script>
    <script src='../JavaScript/es.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    
    <!--<script src="../JavaScript/glDatePicker.min.js"></script>-->
    <link href="../CSS/MenuCSS.css" rel="stylesheet">
    <link href="../CSS/Calendario.css" rel="stylesheet">
    <!--<link href="../CSS/glDatePicker.default.css" rel="stylesheet" type="text/css">-->
    <link rel="stylesheet" href="../CSS/Inicio.css">
    <link rel="stylesheet" href="../CSS/Horario.css">
  </head>
  <body>
    <?php
    include("../PHP/Menu.php");
    ?>

    <div id="contenedor" class="row">

      <div id="calendario" class="col-sm-12 col-md-4">
        <div class="col"></div>
        <div class="col-7"><div id='calendarioWeb'></div></div>
        <div class="col"></div>
      </div>

      <div id="modalEventos" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title" id="tituloEvento"></h5>
              <button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="../PHP/eventos.php" method="POST">
                <div class="form-group">
                  <label for="title">Titulo:</label>
                  <input type="text" class="form-control" id="txt_titulo" name="txt_titulo">
                </div>
                <div class="form-group">
                  <input type="hidden" class="form-control" id="txt_id" name="txt_id">
                </div>
                <div class="form-group">
                  <label for="title"> Fecha:</label>
                  <input type="text" class="form-control" id="txt_fecha" name="start">
                </div>
                <div id="divFechaFin" class="form-group">
                  <label for="title"> Fecha Final:</label>
                  <input type="text" class="form-control" id="txt_fechafinal" name="end">
                </div>
                <div class="form-group">
                  <label for="title">Descripcion:</label>
                  <textarea class="form-control" rows="2" name="descripcion" id="descripcion"></textarea>
                </div>
                <div class="form-group">
                  <label for="title">Elige un color:</label>
                  <input type="color" class="form-control" id="color" name="color"> 
                </div>
                <input type="submit" id="Agregar" name="accion" class="btn btn-success btn-block" value="Agregar">
                <input type="submit" id="Modificar" name="accion" class="btn btn-warning btn-block" value="Modificar">
                <input type="submit" id="Eliminar" name="accion" class="btn btn-danger btn-block" value="Eliminar">
              </form>
            </div>
          </div>
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
                      $horaFin=$row['HrFin']-1;
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
                      $horaFin=$row['HrFin']-1;
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
                      $horaFin=$row['HrFin']-1;
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
                      $horaFin=$row['HrFin']-1;
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
                      $horaFin=$row['HrFin']-1;
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
                      $horaFin=$row['HrFin']-1;
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
          $("#close").on("click", function () {
            $('#txt_id').val("");
            $('#txt_titulo').val("");
            $('#descripcion').val("");
            $('#color').val("");
            $('#txt_fecha').val("");
            $('#txt_fechafinal').val("");
          });
          $("#modalEventos").on("click", function () {
            setTimeout(function(){
              if($("#modalEventos").hasClass("in")!=true){
                $('#txt_id').val("");
                $('#txt_titulo').val("");
                $('#descripcion').val("");
                $('#color').val("");
                $('#txt_fecha').val("");
                $('#txt_fechafinal').val("");
              }
            },
            500
            );
            
          });
        $('#calendarioWeb').fullCalendar({
          header:{
            left:'prev,today,next',
            center: 'title',
            right: 'month'
          },

          dayClick:function(date, jsEvent, view){
            $("#divFechaFin").css("display", "none");
            $('#txt_fecha').val(date.format());
            $("#modalEventos").modal();
            $('#tituloEvento').html("Agrega un evento");
            $("#Agregar").css("display", "block");
            $("#Modificar").css("display", "none");
            $("#Eliminar").css("display", "none");
          },

          events:'../PHP/eventos.php',

          eventClick:function(calEvent,jsEvent,view)
          {

            $("#Agregar").css("display", "none");
            $("#Modificar").css("display", "block");
            $("#Eliminar").css("display", "block");
            $('#tituloEvento').html(calEvent.title);

            $('#txt_id').val(calEvent.id);
            $('#txt_titulo').val(calEvent.title);
            $('#descripcion').val(calEvent.descripcion);
            $('#color').val(calEvent.color);

            Fecha= calEvent.start._i.split(" ");
            $('#txt_fecha').val(Fecha[0]);

            if(null!=calEvent.end){
              $("#divFechaFin").css("display", "block");
              Fechaf= calEvent.end._i.split(" ");
              $('#txt_fechafinal').val(Fechaf[0]);
            }else{
              $("#divFechaFin").css("display", "none");
            }
            $("#modalEventos").modal();
          },
          eventDrop:function(calEvent){
            $('#txt_id').val(calEvent.id);
            $('#txt_titulo').val(calEvent.title);
            $('#txt_color').val(calEvent.color);
            $('#descripcion').val(calEvent.descripcion);

            FechaHora= calEvent.start._i.split(" ");
            $('#txt_fecha').val(FechaHora[0]);
            $('#txt_hora').val(FechaHora[1]);

            FechaHoraf= calEvent.end._i.split(" ");
            $('#txt_fechafinal').val(FechaHoraf[0]);
            $('#txt_horafinal').val(FechaHoraf[1]);
            $("#modalEventos").modal();
          }
        });
        
          $(".fc-day-grid-container").removeAttr("style");
          $(".fc-widget-header").removeAttr("style");
            
      });

     $(document).ready(function() {
        function ajustar(){
          $(".fc-day-grid-container").removeAttr("style");
          $(".fc-widget-header").removeAttr("style");
        }
        setInterval(ajustar, 500);
      });
        $(document).ready(function(){
            $("#myCarousel").carousel({
                interval : false
            });
        });
    </script>
  </body> 
</html>
