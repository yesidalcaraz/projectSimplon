<?php
    function login($link){
        $sql="SELECT * FROM usuario WHERE email='$_POST[user]'";
        $r_sql=mysqli_query($link,$sql);
        $num_sql=mysqli_num_rows($r_sql);
        if($num_sql==1){
            $arr=mysqli_fetch_array($r_sql);
            if(password_verify($_POST['pass'],$arr['password'])){
                $_SESSION['tipo']=$arr['cargo'];
                $_SESSION['name']=$arr['nombre'];
                $_SESSION['id']=$arr['id_usuario'];
                header('location:index.php');
            }else{
                header('location:index.php?msj=0');
            }
        }else{
            header('location:index.php?msj=1');
        }
    }
?>