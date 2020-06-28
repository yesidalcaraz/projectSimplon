  function validarFormador() {
      var name = document.getElementById('nombrefor').value;
      name = name.trim();
      var patroncar = /[`~!@#$%^&*()_°¬|+\-=?;:'",.<>\{\}\[\]\\\/]/;
      var patronnum = /^[0-9,$]*$/;

      var apellidoUno = document.getElementById('apellidofor1').value;
      apellidoUno = apellidoUno.trim();


      var apellidoDos = document.getElementById('apellidofor2').value;
      apellidoDos = apellidoDos.trim();
      var error = false;

      if (name.length < 2 || name.length >= 25 || patroncar.test(name) || patronnum.test(name)) {

          document.getElementById('mensajenomfor').classList.add("error")
          document.getElementById('mensajenomfor').innerHTML = "Minimo 2 y maximo 24 caracteres"
          error = true;

      } else {
          document.getElementById('mensajenomfor').classList.remove("error")
          document.getElementById('mensajenomfor').innerHTML = " "

      }
      /// EMPIEZA apellido1
      if (apellidoUno.length < 2 || apellidoUno.length >= 25 || patroncar.test(apellidoUno) || patronnum.test(apellidoUno)) {
          document.getElementById('mensajapefor1').classList.add("error")
          document.getElementById('mensajapefor1').innerHTML = "Minimo 2 y maximo 24 caracteres"
          error = true;
      } else {
          document.getElementById('mensajapefor1').classList.remove("error")
          document.getElementById('mensajapefor1').innerHTML = " "


      }

      /// EMPIEZA apellido2
      if (apellidoDos.length < 2 || apellidoDos.length >= 25 || patroncar.test(apellidoDos) || patronnum.test(apellidoDos)) {
          document.getElementById('mensajapefor2').classList.add("error")
          document.getElementById('mensajapefor2').innerHTML = "Minimo 2 y maximo 24 caracteres"
          error = true;

      } else {
          document.getElementById('mensajapefor2').classList.remove("error")
          document.getElementById('mensajapefor2').innerHTML = " "


      }
      if (error == false)
          document.getElementById('enviarf').disabled = false;
      else {
          document.getElementById('enviarf').disabled = true;
      }
  }

  document.getElementById('nombrefor').onblur = validarFormador;
  document.getElementById('apellidofor1').onblur = validarFormador;
  document.getElementById('apellidofor2').onblur = validarFormador;