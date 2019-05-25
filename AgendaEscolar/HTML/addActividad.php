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
    <link rel="stylesheet" href="../CSS/addActividad.css">
    <script src='../JavaScript/moment.min.js'></script>
    <link rel='stylesheet' href='../CSS/fullcalendar.min.css'>
    <script src='../JavaScript/fullcalendar.min.js'></script>
    <script src='../JavaScript/es.js'></script>
    <link href="../CSS/Calendario.css" rel="stylesheet">

  </head>
  <body>
    <?php
    include("../PHP/Menu.php");
    ?>

    <div id="contenedor" class="row">
      <div id="formulario" class="col-sm-12 col-md-4">
        <div id="formReg">
        <fieldset>

        <legend id="lgn">Registrar Actividad</legend>

        <!-- Text input-->
        <div class="form-group">
          <label class="control-label" for="Materia">Titulo</label><br>  
          <div class="col-md-12">
            <input id="Titulo" name="Titulo" type="text" placeholder="" maxlength="40" class="form-control input-md" required=""> 
          </div>
        </div>
        <br><br>

        <div class="form-group">
          <label class="control-label" for="Tipo">Tipo de Actividad</label><br>
          <div class="col-md-6">
            <select id="actividad" name="actividad" class="form-control">
              <option value="default">Elige un tipo</option>
              <option value="Tarea">Tarea</option>
              <option value="Proyecto">Proyecto</option>
            </select>
          </div>
          <div class="col-md-6">
            <select id="tipo" name="tipo" class="form-control">
              <option value="default">Elige un tipo</option>
              <option value="Individual">Individual</option>
              <option value="Grupal">Grupal</option>
            </select>
          </div>
        </div>
        <br><br>
        <div class="x">
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
              <option value="08">7:59</option>
              <option value="09">8:59</option>
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
        </div>
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

      <div id="calendario" class="col-sm-12 col-md-8">
        <div class="col"></div>
        <div class="col-7"><div id='calendarioWeb'></div></div>
        <div class="col"></div>
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
    $(document).ready(function(){  
      $('#calendarioWeb').fullCalendar({
          header:{
            left:'prev,today,next',
            center: 'title',
            right: 'month'
          },

          dayClick:function(date, jsEvent, view){
            /*$("#divFechaFin").css("display", "none");
            $('#txt_fecha').val(date.format());
            $("#modalEventos").modal();
            $('#tituloEvento').html("Agrega un evento");
            $("#Agregar").css("display", "block");
            $("#Modificar").css("display", "none");
            $("#Eliminar").css("display", "none");*/
          },

          events:'../PHP/eventos.php',

          eventClick:function(calEvent,jsEvent,view)
          {
            /*
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
            $("#modalEventos").modal();*/
          }
        });
      });
      $(document).ready(function() {
        function ajustar(){
          $(".fc-day-grid-container").removeAttr("style");
          $(".fc-widget-header").removeAttr("style");
        }
        setInterval(ajustar, 500);
      })
    </script>
    
  </body> 
</html>
