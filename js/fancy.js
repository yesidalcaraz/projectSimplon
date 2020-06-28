// JavaScript Document

	
// VALIDACION NUEVO USUARIO

 
    //validar coders
    
    function validarCoders(){
      var namecoder= document.getElementById('nombreCoder').value;
      namecoder= namecoder.trim();
      var patroncar= /[`~!@#$%^&*()_°¬|+\-=?;:'",.<>\{\}\[\]\\\/]/;
      var patronnum= /^[0-9,$]*$/;

      var apellidocoderUno= document.getElementById('apellidoCoder1').value;
      apellidocoderUno= apellidocoderUno.trim();
     

      var apellidocoderDos= document.getElementById('apellidoCoder2').value;
      apellidocoderDos= apellidocoderDos.trim();
     

      var nacimientocoder= document.getElementById('nacimientoCoder').value;
      nacimientocoder= nacimientocoder.trim();
      

      var dnicoder= document.getElementById('dniCoder').value;
      dnicoder= dnicoder.trim();
      var patron = /([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/;
      var patron3= /([a-z]|[A-Z]|[0-9])[0-9]{7}([a-z]|[A-Z]|[0-9])/;
     
      
      if( namecoder.length < 2 || namecoder.length >= 25 || patroncar.test(namecoder) || patronnum.test(namecoder) ){
      document.getElementById('mensajenombrecoder').classList.add("error")
      document.getElementById('mensajenombrecoder').innerHTML = "Minimo 2 y maximo 24 caracteres"
      document.getElementById('enviarf').disabled=true;
      }
      else{
         document.getElementById('mensajenombrecoder').classList.remove("error")
         document.getElementById('mensajenombrecoder').innerHTML = " "
         document.getElementById('enviarf').disabled=false;
        
      }
      /// EMPIEZA apellidocoder1
      if( apellidocoderUno.length < 2 || apellidocoderUno.length >= 25 || patroncar.test(apellidocoderUno) || patronnum.test(apellidocoderUno) ){
        document.getElementById('mensajeapellidocoder1').classList.add("error")
        document.getElementById('mensajeapellidocoder1').innerHTML = "Minimo 2 y maximo 24 caracteres"
        document.getElementById('enviarf').disabled=true;
        
      }
        else{
           document.getElementById('mensajeapellidocoder1').classList.remove("error")
           document.getElementById('mensajeapellidocoder1').innerHTML = " "
           document.getElementById('enviarf').disabled=false;
         
        }
      
      /// EMPIEZA apellidocoder2
      if( apellidocoderDos.length < 2 || apellidocoderDos.length >= 25 || patroncar.test(apellidocoderDos) || patronnum.test(apellidocoderDos) ){
        document.getElementById('mensajeapellidocoder2').classList.add("error")
        document.getElementById('mensajeapellidocoder2').innerHTML = "Minimo 2 y maximo 24 caracteres"
        document.getElementById('enviarf').disabled=true;
        
      }
        else{
           document.getElementById('mensajeapellidocoder2').classList.remove("error")
           document.getElementById('mensajeapellidocoder2').innerHTML = " "
           document.getElementById('enviarf').disabled=false;
          
        }
      
       /// EMPIEZA nacimiento coder 
      
     if(nacimientocoder.length != 10 ||!patron.test(nacimientocoder)){
        document.getElementById('mensajenacimientocoder').classList.add("error")
        document.getElementById('mensajenacimientocoder').innerHTML = "Debe tener formato aaaa-mm-dd"
        document.getElementById("enviarf").disabled = true;
        
      }
      else{
           document.getElementById('mensajenacimientocoder').classList.remove("error")
           document.getElementById('mensajenacimientocoder').innerHTML = " "
           document.getElementById("enviarf").disabled = false;
           
        }
        /// EMPIEZA dni coder
      if(!patron3.test(dnicoder))  {
        document.getElementById('mensajednicoder').classList.add("error")
        document.getElementById('mensajednicoder').innerHTML = "Debe contener un DNI o NIE valido"
        document.getElementById('enviarf').disabled=true;
      }
        else{
           document.getElementById('mensajednicoder').classList.remove("error")
           document.getElementById('mensajednicoder').innerHTML = " "
           document.getElementById('enviarf').disabled=false;
      } 
     
  }

  document.getElementById('nombreCoder').onblur = validarCoders;
  document.getElementById('apellidoCoder1').onblur = validarCoders;
  document.getElementById('apellidoCoder2').onblur = validarCoders;
  document.getElementById('nacimientoCoder').onblur = validarCoders;
  document.getElementById('dniCoder').onblur = validarCoders;
  
//restringe al usuario de entrar caracteres especiales

  





  
