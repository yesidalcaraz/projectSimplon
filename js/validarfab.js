function validarNombre(){
    var name= document.getElementById('nombreFabrica').value;
    name= name.trim();
    var patron= /[`~!@#$%^&*()_°¬|+\-=?;:'",.<>\{\}\[\]\\\/]/;
    
    if( name.length < 2 ||  name.length >= 32 || patron.test(name)){
    document.getElementById('mensaje').classList.add("error")
    document.getElementById('mensaje').innerHTML = "Minimo 2 Maximo 32 caracteres sin espacios"
    document.getElementById('enviarf').disabled=true;
    }
    else{
       document.getElementById('mensaje').classList.remove("error")
       document.getElementById('mensaje').innerHTML = " "
       document.getElementById('enviarf').disabled=false;
    }
    }
    document.getElementById('nombreFabrica').onblur = validarNombre;
  
    