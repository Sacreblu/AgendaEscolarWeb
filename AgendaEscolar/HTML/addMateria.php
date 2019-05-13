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
    <script type="text/javascript" src="../JavaScript/push.min.js"></script>
    <link href="../CSS/MenuCSS.css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/addMateria.css">

  </head>
  <body>
    <?php
    include("../PHP/Menu.php");
    ?>

    <div id="contenedor" class="row">
      <div id="formulario" class="col-sm-12 col-md-4">
        <div id="formReg">
        <fieldset>

        <legend id="lgn">Registrar Materia</legend>

        <!-- Text input-->
        <div class="form-group">
          <label class="control-label" for="Materia">Materia</label><br>  
          <div class="col-md-12">
            <input id="Materia" name="Materia" type="text" placeholder="" maxlength="40" class="form-control input-md" required=""> 
          </div>
        </div>
        <br><br>

        <div class="form-group">
          <label class="control-label" for="hrInicio">Día</label><br>
          <div class="col-md-12">
            <select id="dia" name="dia" class="form-control">
              <option value="default">Elige un día</option>
              <option value="Lunes">Lunes</option>
              <option value="Martes">Martes</option>
              <option value="Miercoles">Miércoles</option>
              <option value="Jueves">Jueves</option>
              <option value="Viernes">Viernes</option>
              <option value="Sabado">Sábado</option>
            </select>
          </div>
        </div>
        <br><br>

        <!-- Select Basic -->
        <div class="form-group">
          <label class="control-label" for="hrInicio">Hora Inicio</label><br>
          <div class="col-md-12">
            <select id="hrInicio" name="hrInicio" class="form-control">
              <option value="default">Elige una hora</option>
              <option value="07">7:00</option>
              <option value="08">8:00</option>
              <option value="09">9:00</option>
              <option value="10">10:00</option>
              <option value="11">11:00</option>
              <option value="12">12:00</option>
              <option value="13">13:00</option>
              <option value="14">14:00</option>
              <option value="15">15:00</option>
              <option value="16">16:00</option>
              <option value="17">17:00</option>
              <option value="18">18:00</option>
              <option value="19">19:00</option>
              <option value="20">20:00</option>
            </select>
          </div>
        </div>
        <br><br>

        <!-- Select Basic -->
        <div class="form-group">
          <label class="control-label" for="hrFin">Hora Fin</label><br>
          <div class="col-md-12">
            <select id="hrFin" name="hrFin" class="form-control">
              <option value="default">Elige una hora</option>
              <option value="8">7:59</option>
              <option value="9">8:59</option>
              <option value="10">9:59</option>
              <option value="11">10:59</option>
              <option value="12">11:59</option>
              <option value="13">12:59</option>
              <option value="14">13:59</option>
              <option value="15">14:59</option>
              <option value="16">15:59</option>
              <option value="17">16:59</option>
              <option value="18">17:59</option>
              <option value="19">18:59</option>
              <option value="20">19:59</option>
              <option value="21">20:59</option>
            </select>
          </div>
        </div>
        <br><br>

        <!-- Text input-->
        <div class="form-group">
          <label class="control-label" for="Aula">Aula</label> <br>
          <div class="col-md-12">
          <input id="Aula" name="Aula" type="text" placeholder="" maxlength="10" class="form-control input-md" required="">
          </div>
        </div>
        <br><br>

        <br>

        <div class="form-group">
          <div class="col-md-4">
            <button id="Registrar" name="" class="btn btn-primary" onclick="RegistrarMateria()">Registrar</button>
          </div>          
          <div class="col-md-4">
            <button id="Guardar" name="" class="btn btn-success" onclick="GuardarModificacion()">Guardar</button>
          </div>
          <div class="col-md-4">
            <button id="Cancelar" name="" class="btn btn-default" onclick="Cancelar()">Cancelar</button>
          </div>
        </div>

        </fieldset>
        </div>
      </div>

      <div id="tabla" class="col-sm-12 col-md-8">
        <div class="panel panel-primary filterable">
          <div class="panel-heading">
            <h3 class="panel-title">Materias Registradas</h3>
          </div>
          <div class="table-box">
            <table class="table">
              <thead>
                <tr>
                  <th style='vertical-align:middle;'>Materia</th>
                  <th style='vertical-align:middle;'>Día</th>
                  <th style='vertical-align:middle;'>Hora Inicio</th>
                  <th style='vertical-align:middle;'>Hora Fin</th>
                  <th style='vertical-align:middle;'>Aula</th>
                  <th style='vertical-align:middle;' colspan="2">Opciones</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $query = 'SELECT * FROM Horario WHERE NombreUsuario="'.$username.'" ORDER BY hrInicio asc';
                $result = mysqli_query($con, $query) or die('Consulta fallida: ' . mysqli_error($con));
                while($row = mysqli_fetch_assoc($result)){
                  $horaFin=$row['HrFin']-1;
                  echo "  
                  <tr>
                  <td style='vertical-align:middle;'>".$row['Materia']."</td>
                  <td style='vertical-align:middle;'>".$row['Dia']."</td>
                  <td style='vertical-align:middle;'>".$row['HrInicio'].":00</td>
                  <td style='vertical-align:middle;'>".$horaFin.":59</td>
                  <td style='vertical-align:middle;'>".$row['Lugar']."</td>
                  <td><button type='button' class='btn btn-success btn-sm' onclick='ModificarMateria(\"".$username."\", \"".$row['Materia']."\", \"".$row['Dia']."\")'>Modificar</button></td>
                  <td><button type='button' class='btn btn-danger btn-sm' onclick='Eliminar(\"".$username."\", \"".$row['Materia']."\", \"".$row['Dia']."\")'>Eliminar</button></td>
                  </tr>";
                };
                ?>
              </tbody>
            </table>
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

      var materia;
      var dia;
      var usernamee;
      
      window.onload = function() {
        document.getElementById('Guardar').disabled=true;
      };

      function RegistrarMateria(){
        var NameMateria = document.getElementById("Materia").value;
        var Dia = document.getElementById("dia").value;
        var hrInicio = document.getElementById("hrInicio").value;
        var hrFin = document.getElementById("hrFin").value;
        var Aula = document.getElementById("Aula").value;
        var UserName = "<?php echo $username; ?>";
        var Bandera = 0;
        document.getElementById('Registrar').disabled=true;
        document.getElementById('Registrar').style.cursor = "progress";

        if(NameMateria=="" || Dia=="default" || hrInicio=="default" || hrFin=="default" || Aula==""){
          $('#msg').html('Parece que al menos uno de los campos de registro está vacío o con valor por default.<br>Por favor completa todos los campos para el registro.');
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
          document.getElementById('Registrar').disabled=false;
          document.getElementById('Registrar').style.cursor = "pointer";
          return 0;
        }

        $.ajax({
          type: "POST",
          async: false,
          url: "../PHP/ValidarMateria.php",
          data: {"postUser": UserName, "postDia": Dia, "postMateria": NameMateria},
          success: function(result){
            if(result==1){
              Bandera=1;
              $('#msg').html('Parece que esta materia ya ha sido registrada para el día '+Dia+'.<br>Por favor revisa que coincida con tu horario establecido.');
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
            else{
              Bandera=0;
            }
          }
        });

        if(Bandera==1){
          document.getElementById('Registrar').disabled=false;
          document.getElementById('Registrar').style.cursor = "pointer";
          return 0;
        }

        if(hrFin-hrInicio<1){
          $('#msg').html('Parece que el horario ingresado no es valido.<br>Por favor revisa que coincida con tu horario establecido.');
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
          document.getElementById('Registrar').disabled=false;
          document.getElementById('Registrar').style.cursor = "pointer";
          return 0;
        }

        $.ajax({
          type: "POST",
          async: false,
          url: "../PHP/ValidarHoras.php",
          data: {"postUser": UserName, "postDia": Dia, "posthrInicio": hrInicio, "posthrFin": hrFin},
          success: function(result){
            if(result==1){;
              Bandera = 1;
              var fin = hrFin-1;
              if(fin<10){
                $('#msg').html('Parece que el horario ('+hrInicio+':00 - 0'+fin+':59) en el que deseas registrar esta materia ya está cubierto por otra.<br>Por favor revisa que coincida con tu horario establecido.');
              }else{
                $('#msg').html('Parece que el horario ('+hrInicio+':00 - '+fin+':59) en el que deseas registrar esta materia ya está cubierto por otra.<br>Por favor revisa que coincida con tu horario establecido.');
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
            else{
              Bandera=0;
            }
          }
        });

        if(Bandera==1){
          document.getElementById('Registrar').disabled=false;
          document.getElementById('Registrar').style.cursor = "pointer";
          return 0;
        }

        $.ajax({
          type: "POST",
          async: false,
          url: "../PHP/RegistrarMateria.php",
          data: {"postUser": UserName, "postMateria": NameMateria, "postDia": Dia, "posthrInicio": hrInicio, "posthrFin":hrFin, "postAula":Aula},
          success: function(result){
            if(result==1){
              location.href='AddMateria.php';
            }
          }
        });
      }

      function ModificarMateria(NombreUser, Materia, Dia){
        $('#lgn').html('Modificar Materia');
        usernamee = NombreUser;
        materia = Materia;
        dia = Dia;
        document.getElementById('Guardar').disabled=false;
        document.getElementById('Registrar').disabled=true;

        $.ajax({
          type: "POST",
          url: "../PHP/ConsultarDatosMateria.php",
          data: {"postUser": NombreUser, "postMateria": Materia, "postDia": Dia},
          success: function(result){
            var arregloCad = result.split("-");
            
            document.getElementById("Materia").value = arregloCad[0];
            document.getElementById("dia").value = arregloCad[1];
            document.getElementById("hrInicio").value = arregloCad[2];
            document.getElementById("hrFin").value = arregloCad[3];
            document.getElementById("Aula").value = arregloCad[4];
          }
        });
      }

      function GuardarModificacion(){
            var NuevaMateria = document.getElementById("Materia").value;
            var NuevoDia = document.getElementById("dia").value;
            var NuevahrInicio = document.getElementById("hrInicio").value;
            var NuevahrFin = document.getElementById("hrFin").value;
            var NuevaAula = document.getElementById("Aula").value;
            var Bandera = 0;
            document.getElementById('Guardar').disabled=true;
            document.getElementById('Guardar').style.cursor = "progress";

            if(NuevaMateria=="" || NuevoDia=="default" || NuevahrInicio=="default" || NuevahrFin=="default" || NuevaAula==""){
              $('#msg').html('Parece que al menos uno de los campos de modificación está vacío o con valor por default.<br>Por favor completa todos los campos para guardar la información.');
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
              document.getElementById('Guardar').disabled=false;
              document.getElementById('Guardar').style.cursor = "pointer";
              return 0;
            }

            $.ajax({
              type: "POST",
              async: false,
              url: "../PHP/ValidarMateria.php",
              data: {"postUser": usernamee, "postDia": NuevoDia, "postMateria": NuevaMateria},
              success: function(result){
                if(result==1){;
                  Bandera=1;
                  $('#msg').html('Parece que esta materia ya ha sido registrada para el día '+NuevoDia+'.<br>Por favor revisa que coincida con tu horario establecido.');
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
                else{
                  Bandera=0;
                }
              }
            });

            if(Bandera==1){
              document.getElementById('Guardar').disabled=false;
              document.getElementById('Guardar').style.cursor = "pointer";
              return 0;
            }

            if(NuevahrFin-NuevahrInicio<1){
              $('#msg').html('Parece que el horario ingresado no es valido.<br>Por favor revisa que coincida con tu horario establecido.');
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
              document.getElementById('Guardar').disabled=false;
              document.getElementById('Guardar').style.cursor = "pointer";
              return 0;
            }

            $.ajax({
              type: "POST",
              async: false,
              url: "../PHP/ValidarHoras.php",
              data: {"postUser": usernamee, "postDia": NuevoDia, "posthrInicio": NuevahrInicio, "posthrFin": NuevahrFin},
              success: function(result){
                if(result==1){;
                  Bandera = 1;
                  var fin = NuevahrFin-1;
                  if(fin<10){
                    $('#msg').html('Parece que el horario ('+NuevahrInicio+':00 - 0'+fin+':59) en el que deseas cambiar esta materia ya está cubierto por otra.<br>Por favor revisa que coincida con tu horario establecido.');
                  }else{
                    $('#msg').html('Parece que el horario ('+NuevahrFin+':00 - '+fin+':59) en el que deseas cambiar esta materia ya está cubierto por otra.<br>Por favor revisa que coincida con tu horario establecido.');
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
                else{
                  Bandera=0;
                }
              }
            });

            if(Bandera==1){
              document.getElementById('Guardar').disabled=false;
              document.getElementById('Guardar').style.cursor = "pointer";
              return 0;
            }

          $.ajax({
            type: "POST",
            url: "../PHP/GuardarModificacionMateria.php",
            data: {"postUser": usernamee, "postMateria": materia, "postDia": dia, "NuevaMateria": NuevaMateria, "NuevoDia": NuevoDia, "NuevahrInicio": NuevahrInicio, "NuevahrFin": NuevahrFin, "NuevaAula": NuevaAula},
            success: function(result){
              if(result==1){
                location.href='AddMateria.php';
              }
            }
          });
        }

      function Eliminar(NombreUser, Materia, Dia){
        $.ajax({
          type: "POST",
          url: "../PHP/EliminarMateria.php",
          data: {"postUser": NombreUser, "postMateria": Materia, "postDia": Dia},
          success: function(result){
            if(result==1){
              location.href='AddMateria.php';
            }
          }
        });
      }

      function Cancelar(){
        $('#lgn').html('Registrar Materia');
        document.getElementById('Guardar').disabled=true;
        document.getElementById('Registrar').disabled=false;

        document.getElementById("Materia").value = "";
        document.getElementById("dia").value = "default";
        document.getElementById("hrInicio").value = "default";
        document.getElementById("hrFin").value = "default";
        document.getElementById("Aula").value = "";
      }
    </script>
    
  </body> 
</html>
