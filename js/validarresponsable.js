function validarResponsable() {
    var name = document.getElementById('nombreres').value;
    name = name.trim();
    var patroncar = /[`~!@#$%^&*()_°¬|+\-=?;:'",.<>\{\}\[\]\\\/]/;
    var patronnum = /^[0-9,$]*$/;

    var apellidoUno = document.getElementById('aperes1').value;
    apellidoUno = apellidoUno.trim();


    var apellidoDos = document.getElementById('aperes2').value;
    apellidoDos = apellidoDos.trim();
    var error = false;

    if (name.length < 2 || name.length >= 25 || patroncar.test(name) || patronnum.test(name)) {

        document.getElementById('mensajeres').classList.add("error")
        document.getElementById('mensajeres').innerHTML = "Minimo 2 y maximo 24 caracteres"
        error = true;

    } else {
        document.getElementById('mensajeres').classList.remove("error")
        document.getElementById('mensajeres').innerHTML = " "

    }
    /// EMPIEZA apellido1
    if (apellidoUno.length < 2 || apellidoUno.length >= 25 || patroncar.test(apellidoUno) || patronnum.test(apellidoUno)) {
        document.getElementById('mensajeaperes1').classList.add("error")
        document.getElementById('mensajeaperes1').innerHTML = "Minimo 2 y maximo 24 caracteres"
        error = true;
    } else {
        document.getElementById('mensajeaperes1').classList.remove("error")
        document.getElementById('mensajeaperes1').innerHTML = " "


    }

    /// EMPIEZA apellido2
    if (apellidoDos.length < 2 || apellidoDos.length >= 25 || patroncar.test(apellidoDos) || patronnum.test(apellidoDos)) {
        document.getElementById('mensajeaperes2').classList.add("error")
        document.getElementById('mensajeaperes2').innerHTML = "Minimo 2 y maximo 24 caracteres"
        error = true;

    } else {
        document.getElementById('mensajeaperes2').classList.remove("error")
        document.getElementById('mensajeaperes2').innerHTML = " "


    }
    if (error == false)
        document.getElementById('enviarR').disabled = false;
    else {
        document.getElementById('enviarR').disabled = true;
    }
}

document.getElementById('nombreres').onblur = validarResponsable;
document.getElementById('aperes1').onblur = validarResponsable;
document.getElementById('aperes2').onblur = validarResponsable;