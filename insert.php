<?php
session_start();
$ocu = $_POST['oculto'];

if($ocu == 1){
    $fab =$_POST['fab'];
    $ciu = $_POST['ciudadf'];
    $fabt ="insert into fabrica (fabrica, fk_ciudad, fabricaStatus) value ('$fab', '$ciu', '1')";
    include 'conex.php';
    mysqli_query($link,$fabt);
    header("location:fabrica.php");
    

}elseif($ocu == 2){
    $promo =$_POST['promo'];
    $promoy =$_POST['promoy'];
    $fkfab =$_POST['fabpromo'];
    $promot ="insert into promocion (promocion,fk_promoyear,fk_fabrica, statusPromocion) value ('$promo','$promoy','$fkfab', 1)";
    include 'conex.php';
    mysqli_query($link,$promot);
    header("location:promocion.php");

}elseif($ocu == 3){
    $nomc  =$_POST['nomc'];
    $apec1  =$_POST['apec1'];
    $apec2  =$_POST['apec2'];
    $dni  =$_POST['dni'];
    $anac =$_POST['anac'];
    $nac  =$_POST['nac'];
    $fknazi= $_POST['fknazi'];
    $codert ="insert into coder (nombre,apellido1,apellido2,dni,nacimiento,nacionalidad,fk_promocion, status) value ('$nomc','$apec1','$apec2','$dni','$anac','$nac','$fknazi', 1)";
    include 'conex.php';
    mysqli_query($link,$codert);
    header("location:coder.php");

}elseif($ocu == 4){
    $nomc  =$_POST['nomc'];
    $apec1  =$_POST['apec1'];
    $apec2  =$_POST['apec2'];
    $promocion  =$_POST['promo'];
    $periodo= $_POST['periodo'];
    $respon ="INSERT into usuario (nombre,apellido1,apellido2) value ('$nomc','$apec1','$apec2')";
    include 'conex.php';
    mysqli_query($link,$respon);

    $usuid ="SELECT id_usuario FROM usuario WHERE email = '$_POST[email]'";
    $r = mysqli_query($link,$usuid);
    $arre = mysqli_fetch_array($r);
    $userhist ="INSERT into userhist (fk_usuario, fk_promo) value ('$arre[0]','$_POST[promocion]')";
    mysqli_query($link,$userhist);
    header("location:index.php");   

}elseif($ocu == 5){
    $nomc  =$_POST['nomc'];
    $apec1  =$_POST['apec1'];
    $apec2  =$_POST['apec2'];
    $dni  =$_POST['dni'];
    $anac =$_POST['anac'];
    $nac  =$_POST['nac'];
    $fknazi= $_POST['fknazi'];
    $codert ="insert into coder (nombre,apellido1,apellido2,dni,nacimiento,nacionalidad,fk_promocion, status) value ('$nomc','$apec1','$apec2','$dni','$anac','$nac','$fknazi', 1)";
    include 'conex.php';
    mysqli_query($link,$codert);
    header("location:index.php");

}elseif($ocu == 6){
    $nombre  =$_POST['nombre'];
    $apellido1  =$_POST['apellido1'];
    $apellido2  =$_POST['apellido2'];
    $email  =$_POST['email'];
    $pass =$_POST['password'];
    $cargo  =$_POST['cargo'];
    $promo =$_POST['promocion'];
    $periodo =$_POST['periodo'];
    include 'conex.php';
    $num_email="select * from usuario where email='$email'";
    $resp=mysqli_query($link,$num_email);  
    
       
    if(mysqli_num_rows($resp)!=0){
        header("location:nuevoUsuario.php?error=Email");
        
    }
    
    else{
        
        $cap = 'notEq';
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Verificamos si el captcha es correcto
            if ($_POST['captcha'] == $_SESSION['cap_code']) {
                
                $hash=password_hash($pass,PASSWORD_DEFAULT);
                $usuariot ="insert into usuario (nombre,apellido1,apellido2,email,password,cargo) value ('$nombre','$apellido1','$apellido2','$email','$hash','$cargo')";
                mysqli_query($link,$usuariot);
                $usuid ="SELECT id_usuario FROM usuario WHERE email = '$_POST[email]'";
                $r = mysqli_query($link,$usuid);
                $arre = mysqli_fetch_array($r);
                $userhist ="INSERT into userhist (fk_usuario, fk_promo,statusUserhist) value ('$arre[0]','$_POST[promocion]','1')";
                mysqli_query($link,$userhist);
                header("location:nuevoUsuario.php?msj=Usuario registrado con éxito");
                $cap = 'Eq';
            } else {
                header("location:nuevoUsuario.php?msj=Código erróneo");
                $cap = '';
            }
        }
       
    }

}
  
echo mysqli_error($link);
?>

