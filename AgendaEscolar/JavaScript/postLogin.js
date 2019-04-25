/* var btncerrar = document.getElementById("boxclose");
 btncerrar.onclick = cerrar;*/

function validarCuenta(){
  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;

  $.post('PHP/ValidarCuenta.php', {postUser: username, postPass: password},
    function(data){
      if(data==1){
        
      }
      else{
        document.getElementById("overlay").fadeIn('fast', function(){
          document.getElementById("box").animate({'top':'160px'}, 500);
        });
      }
    }
    );
}

/*
function cerrar(){
  document.getElementById("box").animate({'top':'-200px'}, 500, function(){
    document.getElementById("overlay").fadeOut('fast');
  });
}*/