//// validar promocion
  
function validarPromocion(){
    var namedos= document.getElementById('nombrePromocion').value;
    namedos= namedos.trim();
    var patronNew= /[`~!@#$%^&*()_°¬|+\-=?;:'",.<>\{\}\[\]\\\/]/;
  
    if( namedos.length < 2 || namedos.length >= 32 || patronNew.test(namedos)){
    document.getElementById('mensajepromo').classList.add("error")
    document.getElementById('mensajepromo').innerHTML = "Minimo 2 Maximo 32 caracteres sin espacios"
    document.getElementById('enviarp').disabled=true;
    }
    else{
       document.getElementById('mensajep').classList.remove("error")
       document.getElementById('mensajep').innerHTML = " "
       document.getElementById('enviarp').disabled=false;
    }
    }
    document.getElementById('nombrePromocion').onblur = validarPromocion;