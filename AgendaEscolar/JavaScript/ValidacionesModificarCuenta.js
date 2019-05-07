function validarNombre(){
  var simbolos = "|°></!'$%&/()=?¡*+´¨´{}¿[]-.@,;:0123456789";
  var texto = document.getElementById("name").value;

  for(i=0; i<texto.length; i++){
    if (simbolos.indexOf(texto.charAt(i),0)!=-1){
      return 1;
    }
  }
  return 0;
}

function validarLastN(){
  var simbolos = "|°></!'$%&/()=?¡*+´¨´{}¿[]-.@,;:0123456789";
  var texto = document.getElementById("lastname").value;

  for(i=0; i<texto.length; i++){
    if (simbolos.indexOf(texto.charAt(i),0)!=-1){
      return 1;
    }
  }
  return 0;
}

function validarUserName(){
  var simbolos = "|°> </#!'$%&/()=?¡*+´¨´{}¿[]-.@,;:";
  var texto = document.getElementById("user").value;

  for(i=0; i<texto.length; i++){
      return 1;
  }
  return 0;
}

function validarPassword(){
  var simbolos = "|°></!'$%&/()=?¡*+´¨´{}¿[]-.@,;:";
  var texto = document.getElementById("pass").value;

  if(texto.length<8){
    return 1;
  }

  for(i=0; i<texto.length; i++){
    if (simbolos.indexOf(texto.charAt(i),0)!=-1){
      return 2;
    }
  }
  return 0;
}

function validarTelefono(){
  var simbolos = "|°></!'$%&/()=?¡*+´¨´{}¿[]-.@,;:abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
  var texto = document.getElementById("tel").value;

  for(i=0; i<texto.length; i++){
    if (simbolos.indexOf(texto.charAt(i),0)!=-1){
      return 1;
    }
  }
  return 0;
}

function validarEmail(){
  var simbolos = "|°></!'$%&/ ()=?¡*+´¨´{}¿[],;:";
  var texto = document.getElementById("email").value;
  var cont=0;
  var indecs;

  for(i=0; i<texto.length; i++){
    if(texto.charAt(i)=='@'){
      indecs = i+1;
      cont=cont+1;
    }
    if (simbolos.indexOf(texto.charAt(i),0)!=-1){
      return 1;
    }
  }

  if(cont!=1){ 
    return 1;
  }

  if(texto.charAt(indecs)=="."){
    return 1;
  }
  return 0;
}

function validarCarrera(){
  var simbolos = "|°></!'$%&/()=?¡*+´¨´{}¿[]-.@,;:0123456789";
  var texto = document.getElementById("carrera").value;

  for(i=0; i<texto.length; i++){
    if (simbolos.indexOf(texto.charAt(i),0)!=-1){
      return 1;
    }
  }
  return 0;
}

function validarInst(){
  var simbolos = "|°></!'$%&/()=?¡*+´¨´{}¿[]-.@,;:0123456789";
  var texto = document.getElementById("inst").value;

  for(i=0; i<texto.length; i++){
    if (simbolos.indexOf(texto.charAt(i),0)!=-1){
      return 1;
    }
  }
  return 0;
}