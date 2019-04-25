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

        <legend>Registrar Materia</legend>

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
              <option value="Miercoles">Miercoles</option>
              <option value="Jueves">Jueves</option>
              <option value="Viernes">Viernes</option>
              <option value="Sabado">Sabado</option>
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
            <button id="Guardar" name="" class="btn btn-success">Guardar</button>
          </div>
          <div class="col-md-4">
            <button id="Cancelar" name="" class="btn btn-default">Cancelar</button>
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

          <table class="table">
            <thead>
              <tr class="filters">
                <th>Materia</th>
                <th>Día</th>
                <th>Hora Inicio</th>
                <th>Hora Fin</th>
                <th>Aula</th>
                <th colspan="2">Opciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $query = 'SELECT * FROM Horario WHERE NombreUsuario="'.$username.'"';
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
                <td><button type='button' class='btn btn-success btn-sm'>Modificar</button></td>
                <td><button type='button' class='btn btn-danger btn-sm'>Eliminar</button></td>
                </tr>";
              };
              ?>
            </tbody>
          </table>
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
          return 0;
        }

        $.post('../PHP/ValidarMateria.php', {postUser: UserName, postDia: Dia, postMateria: NameMateria},
          function(data){
            if(data==1){
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
              return 0;
            }
          }
        );

       
      }
    </script>
    
  </body> 
</html>
