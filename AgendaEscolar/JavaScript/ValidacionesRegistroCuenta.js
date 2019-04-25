function postUserName(){
  if(1==validarUserName()){
    document.getElementById("mensajeUserName").innerHTML = "";
    return null;
  }

  var userN = document.getElementById("user").value;
  if(userN==1){
    document.getElementById("formul").style.margin = "0px 0px 0px 0px";
    document.getElementById("inpt").style.margin = "initial";
    document.getElementById("mensajeUserName").style.display = "none";
    document.getElementById("mensajeUserName").innerHTML = "";
  }

  $.post('PHP/ValidaUserName.php', {postUserName:userN},
    function(data){
      if(data==1){
        document.getElementById("formul").style.margin = "0px 0px 20px 0px";
        document.getElementById("inpt").style.margin = "0px 0px 0px 0px"; 
        document.getElementById("mensajeUserName").style.display = "initial";
        document.getElementById("mensajeUserName").innerHTML = "*Este nombre de usuario ya esta registrado.";
      }
      else{
        document.getElementById("formul").style.margin = "0px 0px 0px 0px";
        document.getElementById("inpt").style.margin = "initial";
        document.getElementById("mensajeUserName").style.display = "none";
        document.getElementById("mensajeUserName").innerHTML = "";
      }
    });
}

function validarUserName(){
  var simbolos = "|°> </#!'$%&/()=?¡*+´¨´{}¿[]-.@,;:";
  var texto = document.getElementById("user").value;

  if(texto==1){
    document.getElementById("formul").style.margin = "0px 0px 0px 0px";
    document.getElementById("inpt").style.margin = "0px 0px 16px 0px";
    document.getElementById("mensajeUserName2").style.display = "none";
    document.getElementById("mensajeUserName2").innerHTML = "";
  }

  for(i=0; i<texto.length; i++){
    if (simbolos.indexOf(texto.charAt(i),0)!=-1){
      document.getElementById("formul").style.margin = "0px 0px 20px 0px";
      document.getElementById("inpt").style.margin = "0px 0px 0px 0px"; 
      document.getElementById("mensajeUserName2").style.display = "initial";
      document.getElementById("mensajeUserName2").innerHTML = "*El nombre de usuario solo debe contener valores alfanumericos (sin espacios).";
      return 1;
    }
  }
  document.getElementById("formul").style.margin = "0px 0px 0px 0px";
  document.getElementById("inpt").style.margin = "0px 0px 16px 0px";
  document.getElementById("mensajeUserName2").style.display = "none";
  document.getElementById("mensajeUserName2").innerHTML = "";
  return 0;
}

function validarNombre(){
  var simbolos = "|°></!'$%&/()=?¡*+´¨´{}¿[]-.@,;:0123456789";
  var texto = document.getElementById("name").value;

  if(texto==1){
    document.getElementById("formul").style.margin = "0px 0px 0px 0px";
    document.getElementById("inpt1").style.margin = "0px 0px 16px 0px";
    document.getElementById("mensajeName").style.display = "none";
    document.getElementById("mensajeName").innerHTML = "";
  }

  for(i=0; i<texto.length; i++){
    if (simbolos.indexOf(texto.charAt(i),0)!=-1){
      document.getElementById("formul").style.margin = "0px 0px 20px 0px";
      document.getElementById("inpt1").style.margin = "0px 0px 0px 0px"; 
      document.getElementById("mensajeName").style.display = "initial";
      document.getElementById("mensajeName").innerHTML = "*El nombre solo deben contener valores alfabeticos.";
      return 1;
    }
  }
  document.getElementById("formul").style.margin = "0px 0px 0px 0px";
  document.getElementById("inpt1").style.margin = "0px 0px 16px 0px";
  document.getElementById("mensajeName").style.display = "none";
  document.getElementById("mensajeName").innerHTML = "";
  return 0;
}

function validarLastN(){
  var simbolos = "|°></!'$%&/()=?¡*+´¨´{}¿[]-.@,;:0123456789";
  var texto = document.getElementById("lastname").value;

  if(texto==1){
    document.getElementById("formul").style.margin = "0px 0px 0px 0px";
    document.getElementById("inpt2").style.margin = "0px 0px 16px 0px";
    document.getElementById("mensajeLastName").style.display = "none";
    document.getElementById("mensajeLastName").innerHTML = "";
  }

  for(i=0; i<texto.length; i++){
    if (simbolos.indexOf(texto.charAt(i),0)!=-1){
      document.getElementById("formul").style.margin = "0px 0px 20px 0px";
      document.getElementById("inpt2").style.margin = "0px 0px 0px 0px";
      document.getElementById("mensajeLastName").style.display = "initial";
      document.getElementById("mensajeLastName").innerHTML = "*Los apellidos solo deben contener valores alfabeticos.";
      return 1;
    }
  }
  document.getElementById("formul").style.margin = "0px 0px 0px 0px";
  document.getElementById("inpt2").style.margin = "0px 0px 16px 0px";
  document.getElementById("mensajeLastName").style.display = "none";
  document.getElementById("mensajeLastName").innerHTML = "";
  return 0;
}

function validarEmail(){
  var simbolos = "|°></!'$%&/ ()=?¡*+´¨´{}¿[],;:";
  var texto = document.getElementById("email").value;
  var cont=0;
  var indecs;

  if(texto==""){
    document.getElementById("formul").style.margin = "0px 0px 0px 0px";
    document.getElementById("inpt3").style.margin = "0px 0px 16px 0px";
    document.getElementById("mensajeEmail").style.display = "none";
    document.getElementById("mensajeEmail").innerHTML = "";
    return 1;
  }

  for(i=0; i<texto.length; i++){
    if(texto.charAt(i)=='@'){
      indecs = i+1;
      cont=cont+1;
    }
    if (simbolos.indexOf(texto.charAt(i),0)!=-1){
      document.getElementById("formul").style.margin = "0px 0px 20px 0px";
      document.getElementById("inpt3").style.margin = "0px 0px 0px 0px"; 
      document.getElementById("mensajeEmail").style.display = "initial";
      document.getElementById("mensajeEmail").innerHTML = "*Ingresa una dirección de correo valida.";
      return 1;
    }
  }

  if(cont!=1){
    document.getElementById("formul").style.margin = "0px 0px 20px 0px";
    document.getElementById("inpt3").style.margin = "0px 0px 0px 0px"; 
    document.getElementById("mensajeEmail").style.display = "initial";
    document.getElementById("mensajeEmail").innerHTML = "*Ingresa una dirección de correo valida.";
    return 1;
  }

  if(texto.charAt(indecs)=="."){
    document.getElementById("formul").style.margin = "0px 0px 20px 0px";
    document.getElementById("inpt3").style.margin = "0px 0px 0px 0px"; 
    document.getElementById("mensajeEmail").style.display = "initial";
    document.getElementById("mensajeEmail").innerHTML = "*Ingresa una dirección de correo valida.";
    return 1;
  }

  document.getElementById("formul").style.margin = "0px 0px 0px 0px";
  document.getElementById("inpt3").style.margin = "0px 0px 16px 0px";
  document.getElementById("mensajeEmail").style.display = "none";
  document.getElementById("mensajeEmail").innerHTML = "";
  return 0;
}

function validarPassword(){
  var simbolos = "|°></!'$%&/()=?¡*+´¨´{}¿[]-.@,;:";
  var texto = document.getElementById("pass").value;
  var pass2 = document.getElementById("pass2").value;

  if(texto==""){
    document.getElementById("formul").style.margin = "0px 0px 0px 0px";
    document.getElementById("inpt4").style.margin = "0px 0px 16px 0px";
    document.getElementById("mensajePass").style.display = "none";
    document.getElementById("mensajePass").innerHTML = "";
    return 1;
  }

  if(pass2!=""){
    confirmarPassword();
  }

  if(texto.length<8){
    document.getElementById("formul").style.margin = "0px 0px 20px 0px";
    document.getElementById("inpt4").style.margin = "0px 0px 0px 0px";
    document.getElementById("mensajePass").style.display = "initial"
    document.getElementById("mensajePass").innerHTML = "*La contraseña debe contener al menos 8 caracteres.";
    return 1;
  }

  for(i=0; i<texto.length; i++){
    if (simbolos.indexOf(texto.charAt(i),0)!=-1){
      document.getElementById("formul").style.margin = "0px 0px 20px 0px";
      document.getElementById("inpt4").style.margin = "0px 0px 0px 0px";
      document.getElementById("mensajePass").style.display = "initial"
      document.getElementById("mensajePass").innerHTML = "*La contraseña solo debe contener valores alfanumericos.";
      return 1;
    }
  }
  document.getElementById("formul").style.margin = "0px 0px 0px 0px";
  document.getElementById("inpt4").style.margin = "0px 0px 16px 0px";
  document.getElementById("mensajePass").style.display = "none";
  document.getElementById("mensajePass").innerHTML = "";
  return 0;
}

function confirmarPassword(){
  var simbolos = "|°></!'$%&/()=?¡*+´¨´{}¿[]-.@,;:";
  var texto = document.getElementById("pass2").value;

  if(texto==""){
    document.getElementById("formul").style.margin = "0px 0px 0px 0px";
    document.getElementById("inpt5").style.margin = "0px 0px 16px 0px";
    document.getElementById("mensajePass2").style.display = "none";
    document.getElementById("mensajePass2").innerHTML = "";
    return 1;
  }

  if(texto.length<8){
    document.getElementById("formul").style.margin = "0px 0px 20px 0px";
    document.getElementById("inpt5").style.margin = "0px 0px 0px 0px";
    document.getElementById("mensajePass2").style.display = "initial"
    document.getElementById("mensajePass2").innerHTML = "*La contraseña debe contener al menos 8 caracteres.";
    return 1;
  }

  for(i=0; i<texto.length; i++){
    if (simbolos.indexOf(texto.charAt(i),0)!=-1){
      document.getElementById("formul").style.margin = "0px 0px 20px 0px";
      document.getElementById("inpt5").style.margin = "0px 0px 0px 0px";
      document.getElementById("mensajePass2").style.display = "initial"
      document.getElementById("mensajePass2").innerHTML = "*La contraseña solo debe contener valores alfanumericos.";
      return 1;
    }
  }


  var pass  = document.getElementById("pass").value;
  var pass2 = document.getElementById("pass2").value;

  if(pass!=pass2){
    document.getElementById("formul").style.margin = "0px 0px 20px 0px";
    document.getElementById("inpt5").style.margin = "0px 0px 0px 0px";
    document.getElementById("mensajePass2").style.display = "initial"
    document.getElementById("mensajePass2").innerHTML = "*Las contraseñas no coinciden.";
    return 2;
  }
  else{
    document.getElementById("formul").style.margin = "0px 0px 0px 0px";
    document.getElementById("inpt5").style.margin = "0px 0px 16px 0px";
    document.getElementById("mensajePass2").style.display = "none";
    document.getElementById("mensajePass2").innerHTML = "";
    return 0;
  }
}

