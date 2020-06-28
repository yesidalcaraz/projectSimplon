    //////////////////////////////////////////////////////////////////////

    function validarNombreUsu(){
      var nameusu= document.getElementById('nombre').value;
      nameusu= nameusu.trim();
      var patronnum= /^[0-9,$]*$/;
      var patroncar= /[`~!@#$%^&*()_°¬|+\-=?;:'",.<>\{\}\[\]\\\/]/;
      var apellidoUno= document.getElementById('apellido1').value;
      apellidoUno= apellidoUno.trim();

      var apellidoDos= document.getElementById('apellido2').value;
      apellidoDos= apellidoDos.trim();

      var email= document.getElementById('email').value;
      email= email.trim();
      var patron1= /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;

      var contraseina= document.getElementById('password').value;
      contraseina= contraseina.trim();
      var patron2= /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/;
      
      if( nameusu.length < 2 || nameusu.length >= 20 || patronnum.test(nameusu) || patroncar.test(nameusu) ){
      document.getElementById('mensaje').classList.add("error")
      document.getElementById('mensaje').innerHTML = "Minimo 2 y maximo 20 caracteres"
      document.getElementById('enviarf').disabled=true;
      }
      else{
         document.getElementById('mensaje').classList.remove("error")
         document.getElementById('mensaje').innerHTML = " "
         document.getElementById('enviarf').disabled=false;
      }
      /// EMPIEZA apellido1
      if( apellidoUno.length < 2 || apellidoUno.length >= 20 || patronnum.test(apellidoUno) || patroncar.test(apellidoUno)){
        document.getElementById('mensajeape1').classList.add("error")
        document.getElementById('mensajeape1').innerHTML = "Minimo 2 y maximo 20 caracteres"
        document.getElementById('enviarf').disabled=true;
      }
        else{
           document.getElementById('mensajeape1').classList.remove("error")
           document.getElementById('mensajeape1').innerHTML = " "
           document.getElementById('enviarf').disabled=false;
        }
      
      /// EMPIEZA apellido2
      if( apellidoDos.length < 2 || apellidoDos.length >= 20 || patronnum.test(apellidoDos) || patroncar.test(apellidoDos) ){
        document.getElementById('mensajeape2').classList.add("error")
        document.getElementById('mensajeape2').innerHTML = "Minimo 2 y maximo 20 caracteres"
        document.getElementById('enviarf').disabled=true;
      }
        else{
           document.getElementById('mensajeape2').classList.remove("error")
           document.getElementById('mensajeape2').innerHTML = " "
           document.getElementById('enviarf').disabled=false;
        }
      
       /// EMPIEZA nacimiento email 
      
     if(!patron1.test(email)){
        document.getElementById('mensajeemailusu').classList.add("error")
        document.getElementById('mensajeemailusu').innerHTML = "No puede contener caracteres especiales, ingresa un mail valido"
        document.getElementById('enviarf').disabled=true;
      }
      else{
           document.getElementById('mensajeemailusu').classList.remove("error")
           document.getElementById('mensajeemailusu').innerHTML = " "
           document.getElementById('enviarf').disabled=false;
        }
        /// EMPIEZA contraseña
      if(!patron2.test(contraseina))  {
        document.getElementById('mensajepassusu').classList.add("error")
        document.getElementById('mensajepassusu').innerHTML = "Debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula- NO puede tener otros símbolos."
        document.getElementById('enviarf').disabled=true;
      }
        else{
           document.getElementById('mensajepassusu').classList.remove("error")
           document.getElementById('mensajepassusu').innerHTML = " "
           document.getElementById('enviarf').disabled=false;
        } 
     
  }

  document.getElementById('nombre').onblur = validarNombreUsu;
  document.getElementById('apellido1').onblur = validarNombreUsu;
  document.getElementById('apellido2').onblur = validarNombreUsu;
  document.getElementById('email').onblur = validarNombreUsu;
  document.getElementById('password').onblur = validarNombreUsu;