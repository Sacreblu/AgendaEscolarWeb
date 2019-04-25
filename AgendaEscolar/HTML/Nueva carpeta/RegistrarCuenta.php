<?php
    include("../PHP/ValidarCerrarSesion.php");
?>
<!DOCTYPE html>

<html>
  <head>
    <link rel="shortcut icon" href="../Complementos/Imagenes/students.png">
    <meta charset="utf-8">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>

    <title>Registrar Cuenta</title>
    <link rel="stylesheet" href="../CSS/Registro.css">
    <script type="text/javascript" src="../JavaScript/jquery.js"></script>
  </head>
  <body>
      
      <div class="divLogin">

        <img src="../Complementos/Imagenes/students.png"  class="logo">
        <h1>Registra tu cuenta</h1>
      
        <div class="form">
          <label>Nombre(s)</label>
          <input type="text" id="name" name="nombre" onblur="validarNombre()" placeholder="Ingresa tu(s) Nombre(s)">
          <p class="advertencias" id="mensajeName"></p>

          <label>Apellidos</label>
          <input type="text" id="lastname" name="apellidos" onblur="validarLastN()" placeholder="Ingresa tus Apellidos">
          <p class="advertencias" id="mensajeLastName"></p>

          <label>Nombre de Usuario</label>
          <input type="text" id="username" name="username" onblur="postUserName()" placeholder="Ingresa tu Usuario">
          <p class="advertencias" id="mensajeUserName"></p>
          <p class="advertencias" id="mensajeUserName2"></p>

          <label for="password">Contraseña</label>
          <input type="password" id="pass" name="pass" onblur="validarPassword()" placeholder="Ingresa tu Contraseña">
          <p class="advertencias" id="mensajePass"></p>

          <label for="password">Confirmar Contraseña</label>
          <input type="password" id="pass2" name="pass2" onblur="confirmarPassword()" placeholder="Reescribe tu Contraseña">
          <p class="advertencias" id="mensajePass2"></p><br>

          <input type="submit" onclick="registrarCuenta()" value="Registrar">
        </div>

      </div>
        <a class="hover" href="../"><img src="../Complementos/Imagenes/back.png"  class="back"></a>


  <script type="text/javascript">
    /*function postUserName(){
      var US = $('#username').val();
      validarUserName();
      $.post('../php/Validaciones.php', {postUserName:US},
        function(data){
          if(data==1){
            $('#mensajeUserName').html('*Este Nombre de Usuario ya esta registrado');
          }
          else{
            $('#mensajeUserName').html('');
          }
      });
    }*/

    /*function validarPassword(){
      var simbolos = "|°></!'$%&/()=?¡*+´¨´{}¿[]-.@,;:";
      var texto = $('#pass').val();
      confirmarPassword();
      for(i=0; i<texto.length; i++){
        if (simbolos.indexOf(texto.charAt(i),0)!=-1){
          $('#mensajePass').html('*La contraseña solo debe contener valores alfanumericos');
          return 1;
        }
      }
      $('#mensajePass').html('');
      return 0;
    }*/

    /*function confirmarPassword(){
      var pass = $('#pass').val();
      var pass2 = $('#pass2').val();

      if(pass==pass2){
        $('#mensajePass2').html('');
      }
      else{
        $('#mensajePass2').html('*Las contraseñas no coinciden');
      }
    }*/

    /*function validarUserName(){
      var simbolos = "|°></!'$%&/()=?¡*+´¨´{}¿[]-.@,;:";
      var texto = $('#username').val();

      for(i=0; i<texto.length; i++){
        if (simbolos.indexOf(texto.charAt(i),0)!=-1){
          $('#mensajeUserName2').html('*El nombre de usuario solo debe contener valores alfanumericos');
          return 1;
        }
      }
      $('#mensajeUserName2').html('');
      return 0;
    }*/

    /*function validarNombre(){
      var simbolos = "|°></!'$%&/()=?¡*+´¨´{}¿[]-.@,;:0123456789";
      var texto = $('#name').val();

      for(i=0; i<texto.length; i++){
        if (simbolos.indexOf(texto.charAt(i),0)!=-1){
          $('#mensajeName').html('*El nombre solo debe contener valores alfabeticos');
          return 1;
        }
      }
      $('#mensajeName').html('');
      return 0;
    }*/

    /*function validarLastN(){
      var simbolos = "|°></!'$%&/()=?¡*+´¨´{}¿[]-.@,;:0123456789";
      var texto = $('#lastname').val();

      for(i=0; i<texto.length; i++){
        if (simbolos.indexOf(texto.charAt(i),0)!=-1){
          $('#mensajeLastName').html('*Los apellidos solo deben contener valores alfabeticos');
          return 1;
        }
      }
      $('#mensajeLastName').html('');
      return 0;
    }*/

    function registrarCuenta(){

      var b = validarNombre();
      if(b==1){
        alert('Formato de Nombre incorrecto')
        return 0;
      }

      var c = validarLastN();
      if(c==1){
        alert('Formato de Apellidos incorrecto')
        return 0;
      }

      var a = validarUserName();
      if(a==1){
        alert('Formato de Nombre de Usuario incorrecto')
        return 0;
      }

      var x = validarPassword();
      if(x==1){
        alert('Formato de Contraseña incorrecto')
        return 0;
      }


      var nombre = $('#name').val();
      var apellido = $('#lastname').val();
      var username = $('#username').val();
      var pass = $('#pass').val();
      var pass2 = $('#pass2').val();

      $.post('../php/NuevaCuenta.php', {postName: nombre, postLast: apellido, postUser: username, postPass: pass, postPass2: pass2},
        function(data){
          if(data==1){
            alert('Cuenta registrada, ahora puedes iniciar sesión.');
            location.href='../';
          }
          if(data==2){
            alert('Las contraseñas no coinciden.');
          }
          if(data==3){
            alert('El nombre de usuario ya esta registrado.')
          }
        }
      );
    }

  </script>
  </body> 
</html>
