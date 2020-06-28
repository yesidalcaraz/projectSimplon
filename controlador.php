<?php
    session_start();

    include 'conex.php';
    include 'funcion.php';

    $oculto=$_POST['oculto'];

    switch($oculto){
        case 0:
            login($link);
        break;
    }
?>