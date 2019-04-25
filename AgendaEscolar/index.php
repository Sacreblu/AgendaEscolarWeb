<?php
    include("PHP/ValidarCerrarSesion.php");
?>

<!DOCTYPE html>
<html>
    
<head>
  <title>Login</title>
  <link rel="shortcut icon" href="../Complementos/Imagenes/students.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

<!-- Enlace a archivos JavaScript -->
  <script type="text/javascript" src="JavaScript/jquery.js"></script>
  <script src="JavaScript/bootstrap.min.js"></script>
  <script src="JavaScript/postLogin.js"></script>
  <script type="text/javascript" src="JavaScript/ValidacionesRegistroCuenta.js"></script>

<!-- Enlace a archivos CSS -->
  <link rel="stylesheet" href="CSS/bootstrap.min.css" crossorigin="anonymous">
  <link rel="stylesheet" href="CSS/bootstrap.css" crossorigin="anonymous">
  <link href="CSS/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" href="CSS/Login.css">
</head>

<body>

<!-- Aqui comienza el div del Login -->
  <div id="scrol" class="container h-100">
    <div class="d-flex justify-content-center h-100">
      <div class="user_card">
        <div class="d-flex justify-content-center">
          <div class="brand_logo_container">
            <img src="Complementos/Imagenes/logo.png" class="brand_logo" alt="Logo">
          </div>
        </div>
        <div class="d-flex justify-content-center">
          <div class="titulo">
            <label>Ingresa</label>
          </div>
        </div>
        <div class="d-flex justify-content-center form_container">
          <form class=log>
            <div class="input-group mb-3">
              <div class="input-group-append">
                <span id="us" class="input-group-text"><img src="Complementos/Imagenes/user.png" width="20px" height="20px"></span>
              </div>
              <input type="text" id="username" name="" class="form-control input_user" value="" placeholder="Usuario">
            </div>
            <br>
            <div class="input-group mb-2">
              <div class="input-group-append">
                <span id="ky" class="input-group-text"><img src="Complementos/Imagenes/key.png" width="20px" height="20px"></span>
              </div>
              <input type="password" id="password" name="" class="form-control input_pass" value="" placeholder="Contraseña">
            </div>
          </form>
        </div>
        <div id="bt" class="d-flex justify-content-center mt-3 login_container">
          <button type="button" onclick="validarCuentas()" name="button" class="btn login_btn">Iniciar Sesión</button>
        </div>
        <div id="ft" class="mt-4">
          <div class="d-flex justify-content-center links">
            ¿No tienes una cuenta? <a onclick="abrirReg()" id="link" class="ml-2">Registrarse</a>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- Aqui termina el div del Login -->

<!-- Div de advertencia "Cuenta Erronea" -->
  <div class="overlay" id="overlay" style="display:none;"></div>
  <div class="box" id="box">
    <a class="boxclose" id="boxclose"></a>
    <h3>¡Mensaje Importante!</h3>
    <p> Parece que tu nombre de usuario y/o contraseña son incorrestos.
      Por favor intenta de nuevo.
    </p>
  </div>

<!-- Div de "Registrar Nueva Cuenta" -->
  <div class="overlay2" id="overlay2" style="display:none;"></div>
  <div class="box2" id="box2">
    <div class="container">
      <a class="boxclose2" id="boxclose2"></a>
      <header class="card-header">
        <h4 id="titul" class="card-title mt-2">Registrate</h4>
        <img class="imagn" src="Complementos/Imagenes/students.png" width="40px" height="40px">
      </header>
      <article id="articulo" class="card-body">
        <div class="row justify-content-center">
          <div id="formul" class="col-md-12">
            <div class="card">
              <form>
                <div class="form-row">
                  <div id="inpt" class="col-ms-12 col-md-6 form-group">
                    <label>Nombre de Usuario </label>   
                    <input type="text" class="form-control" id="user" name="user" onblur="postUserName()" pattern="[A-Za-z0-9ñ]{0,20}" maxlength="20">
                    <p class="advertencias" id="mensajeUserName"></p>
                    <p class="advertencias" id="mensajeUserName2"></p>
                  </div> <!-- form-group end.// -->
                  <div id="inpt1" class="col-ms-12 col-md-6 form-group">
                    <label>Nombre (s)</label>
                    <input type="text" class="form-control" id="name" name="nombre" onblur="validarNombre()" pattern="[A-Za-z ñÑ]{0,30}" maxlength="30">
                    <p class="advertencias" id="mensajeName"></p>
                  </div> <!-- form-group end.// -->
                </div> <!-- form-row end.// -->
                <div class="form-row">
                  <div id="inpt2" class="col-md-12 form-group">
                    <label>Apellidos</label>
                    <input type="text" class="form-control" id="lastname" name="apellidos" onblur="validarLastN()" pattern="[A-Za-z ñ]{0,30}" maxlength="30">
                    <p class="advertencias" id="mensajeLastName"></p>
                  </div> <!-- form-group end.// -->
                </div>
                <div class="form-row">
                  <div id="inpt3" class="col-md-12 form-group">
                    <label>Correo Electronico</label>
                    <input type="email" class="form-control" id="email" name="correo" onblur="validarEmail()">
                    <p class="advertencias" id="mensajeEmail"></p>
                  </div> <!-- form-group end.// -->
                </div>
                <div class="form-row">
                  <div id="inpt4" class="col-ms-12 col-md-6 form-group">
                    <label>Contraseña </label>   
                    <input type="password" class="form-control" id="pass" name="pass" onblur="validarPassword()" pattern="[A-Za-z0-9 ñ]{8,16}" maxlength="16">
                    <p class="advertencias" id="mensajePass"></p>
                  </div> <!-- form-group end.// -->
                  <div id="inpt5" class="col-ms-12 col-md-6 form-group">
                    <label>Confirmar contraseña</label>
                    <input type="password" class="form-control" id="pass2" name="pass2" pattern="[A-Za-z0-9 ñ]{8,16}" maxlength="16">
                    <p class="advertencias" id="mensajePass2"></p>
                  </div> <!-- form-group end.// -->
                </div> <!-- form-row end.// --> 
              </form>
              <div class="form-row">
                <div class="col-md-12 form-group">
                  <button id="btn-reg" type="submit" onclick="registrarCuenta()" class="btn btn-primary btn-block">
                    Registrar  
                  </button>
                </div> <!-- form-group// -->                                          
              </div>
              <div id="pie" class="border-top card-body text-center">
                <p>¿Ya tienes una cuenta?</p> 
                <a id="linkdos" onclick="cerrarReg()">Inicia Sesión</a>
              </div>
            </div> <!-- card.// -->
          </div> <!-- col.//-->
        </div>
      </article> <!-- card-body end .// -->
    </div> <!-- container.//-->
  </div>
<!-- Aqui termina el Div "Registrar Nueva Cuenta" -->


<!-- Div de advertencia de formulario de Registro" -->
  <div class="overlay3" id="overlay3" style="display:none;"></div>
  <div class="box3" id="box3">
    <a class="boxclose3" id="boxclose3"></a>
    <h4>¡Mensaje Importante!</h4>
    <p id="msg"> 
    </p>
  </div>

<!-- Div de Registro Exitoso" -->
  <div class="overlay4" id="overlay4" style="display:none;"></div>
  <div class="box4" id="box4">
    <a class="boxclose4" id="boxclose4"></a>
    <h4>¡Bienvenido!</h4>
    <p id="msg2"> 
    </p>
  </div>


<!-- Scripts -->
  <script type="text/javascript">

/*  Valida que la contraseña y cuenta ingresados esten registrados en la BD.
    Si esta registrado, redirige al inicio, si no, muestra un mensaje de advertencia.*/
    function validarCuentas(){
      var username = document.getElementById("username").value;
      var password = document.getElementById("password").value;

      $.post('PHP/ValidarCuenta.php', {postUser: username, postPass: password},
        function(data){
          if(data==1){
            location.href='HTML/Inicio.php'
          }
          else{
            $(function(){
              $('#overlay').fadeIn('fast',function(){
                $('#box').animate({'top':'160px'},500);
              });
              $('#boxclose').click(function(){
                $('#box').animate({'top':'-400px'},500,function(){
                  $('#overlay').fadeOut('fast');
                });
              });
            });
          }
        }
      );
    }

/*  Abre el formulario de Registro de cuenta, tambien desde esta funcion se puede
    cerrar el formulario.*/
    function abrirReg(){
      $(function(){
        $('#overlay2').fadeIn('fast',function(){
          $('#box2').animate({'top':'15px'},500);
        });
        $('#boxclose2').click(function(){
          $('#box2').animate({'top':'-900px'},500,function(){
            $('#overlay2').fadeOut('fast');
            $('#user').val(null);
            $('#name').val(null);
            $('#lastname').val(null);
            $('#email').val(null);
            $('#pass').val(null);
            $('#pass2').val(null);
            postUserName();
            validarUserName();
            validarNombre();
            validarLastN();
            validarEmail();
            validarPassword();
            confirmarPassword();
          });
        });
      });
    }

//  Cierra el formulario de Registro de cuenta.
    function cerrarReg(){
      $(function(){
        $('#box2').animate({'top':'-900px'},500,function(){
            $('#overlay2').fadeOut('fast');
            $('#user').val(null);
            $('#name').val(null);
            $('#lastname').val(null);
            $('#email').val(null);
            $('#pass').val(null);
            $('#pass2').val(null);
            postUserName();
            validarUserName();
            validarNombre();
            validarLastN();
            validarEmail();
            validarPassword();
            confirmarPassword();
          });
      });
    }

// Valida los campos de texto y luego registra una cuenta nueva
    function registrarCuenta(){
      var user = document.getElementById("user").value;
      var name = document.getElementById("name").value;
      var lastn = document.getElementById("lastname").value;
      var email = document.getElementById("email").value;
      var pass = document.getElementById("pass").value;
      var pass2 = document.getElementById("pass2").value;

      if(user=="" || name == "" || lastn == "" || email == "" || pass == "" || pass2 == ""){
        notifCamposVacios();
        return 0;
      }

      if(validarUserName()==1){
        notifUserName2();
        return 0;
      }

      if(validarNombre()==1){
        notifName();
        return 0;
      }

      if(validarLastN()==1){
        notifApellidos();
        return 0;
      }

      if(validarEmail()==1){
        notifEmail();
        return 0;
      }

      if(validarPassword()==1){
        notifPass();
        return 0;
      }

      if(confirmarPassword()==2){
        $('#msg').html('Parece que las contraseña que ingresaste no coinciden.<br>Por favor asegúrate que las contraseñas sean iguales.');
        notifPass2();
        return 0;
      }
      if(confirmarPassword()==1){
        $('#msg').html('Parece que la contraseña que ingresaste no cumple con el formato adecuado<br>Por favor escribe una contraseña válida.');
        notifPass2();
        return 0;
      }

      $.post('PHP/NuevaCuenta.php', {postName: name, postLast: lastn, postUser: user, postEmail:email, postPass: pass, postPass2: pass2},
        function(data){
          if(data==1){
            $('#msg').html('Parece que el nombre de usuario que ingresaste ya está ocupado por otro usuario.<br>Por favor elige otro nombre de usuario.');
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
            $('#msg2').html('Tu cuenta ha sido registrada. Ahora puedes iniciar sesión.');
            $(function(){
              $('#overlay4').fadeIn('fast',function(){
                $('#box4').animate({'top':'160px'},500);
              });
              $('#boxclose4').click(function(){
                $('#box4').animate({'top':'-400px'},500,function(){
                  $('#overlay4').fadeOut('fast');
                  $(function(){
                    $('#box2').animate({'top':'-900px'},500,function(){
                      $('#overlay2').fadeOut('fast');
                      $('#user').val(null);
                      $('#name').val(null);
                      $('#lastname').val(null);
                      $('#email').val(null);
                      $('#pass').val(null);
                      $('#pass2').val(null);
                      postUserName();
                      validarUserName();
                      validarNombre();
                      validarLastN();
                      validarEmail();
                      validarPassword();
                      confirmarPassword();
                    });
                  });
                });
              });
            });
          }
        }
      );



    }






    function notifCamposVacios(){
      $('#msg').html('Parece que al menos uno de los campos de registro está vacío.<br>Por favor completa todos los campos para el registro.');
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

    function notifUserName(){
      $('#msg').html('Parece que el nombre de usuario que ingresaste ya está ocupado por otro usuario.<br>Por favor elige otro nombre de usuario.');
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

    function notifUserName2(){
      $('#msg').html('Parece que el nombre de usuario que ingresaste no cumple con el formato adecuado.<br>Por favor elige otro nombre de usuario.');
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

    function notifName(){
      $('#msg').html('Parece que el nombre que ingresaste no cumple con el formato adecuado.<br>Por favor reescribe tu nombre de manera correcta.');
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

    function notifApellidos(){
      $('#msg').html('Parece que los apellidos que ingresaste no cumplen con el formato adecuado.<br>Por favor reescribe tus apellidos de manera correcta.');
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

    function notifEmail(){
      $('#msg').html('Parece que la direccion de correo que ingresaste no cumple con el formato adecuado<br>Por favor escribe una direccion de correo válida.');
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

    function notifPass(){
      $('#msg').html('Parece que la contraseña que ingresaste no cumple con el formato adecuado<br>Por favor escribe una contraseña válida.');
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

    function notifPass2(){
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

  </script>

</body>
</html>
