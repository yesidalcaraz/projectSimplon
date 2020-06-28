// JavaScript Document



function validarNombre(){
    var nombre = document.getElementById("nombre").value;// se usa el .value para la validacion del elemento
    if (nombre.length < 2 ){
        document.getElementById("nameInfo").classList.add("error")
        document.getElementById("nameInfo").innerHTML = "Agrega más caracteres al campo"
    }else{
        document.getElementById("nameInfo").classList.remove("error")
        document.getElementById("nameInfo").innerHTML = ""
    }
   
}



// funcion para el largo de la clave ( sin caracter especial)

function passcar() {
    //que tenga numeros, letras y un caracter especial
    var valpass = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/; // esta funcion cubre el largo de los  caracteres, con esta choca con la del largo de los caractes.
    var password = document.getElementById("clave").value
    
 /*if (password == null){
     
    document.getElementById("passwordInfo").classList.add("error")
    document.getElementById("passwordInfo").innerHTML = "Demasiados caracteres";
            return false;
    }else {
        document.getElementById("passwordInfo").classList.remove("error")
        document.getElementById("passwordInfo").innerHTML = ""
            return true;
    }*/
    
    if(!valpass.test(password)){ // se usa la funcion .test para hacer la verificacion del patron para que se cumpla la variable. con el signo de admiracion le decimos que si no es valido que entre al if y el else para que de correcto.
        document.getElementById("passwordInfo").classList.add("error")
        document.getElementById('passwordInfo').innerHTML = "error";
    }else{
       document.getElementById('passwordInfo').innerHTML = "correcto"; 
        document.getElementById("passwordInfo").innerHTML = ""
    }
    
}

// funcion para hacer las claves que coincidan

function igualdad(){
    
    var clave = document.getElementById("clave").value;
    var cclave = document.getElementById("cclave").value;
    
    
  if (clave != cclave) {
    document.getElementById('passwordInfo').classList.add ("error")
    document.getElementById('passwordInfo').innerHTML = 'La clave no es igual';
     
  } else {
    document.getElementById('passwordInfo').classList.remove ("error")
    document.getElementById('passwordInfo').innerHTML = "";
  }
    
    
    


}

function validaremail(){
    var patron = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
    var vemail = document.getElementById("email").value;
    
    if(!patron.test(vemail)){ // se usa la funcion .test para hacer la verificacion del patron para que se cumpla la variable. con el signo de admiracion le decimos que si no es valido que entre al if y el else para que de correcto.
        document.getElementById('emailInfo').innerHTML = "error";
    }else{
       document.getElementById('emailInfo').innerHTML = "correcto"; 
    }
    
    
    
}






document.getElementById("nombre").onblur = validarNombre;
document.getElementById("clave").onblur = passcar;
document.getElementById("cclave").onblur = igualdad;
document.getElementById("email").onblur = validaremail;