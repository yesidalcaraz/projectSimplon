
<?php 


//ESTATUS FABRICA
    include 'conex.php';
    if(isset($_GET['simpDeleteFab'])){
        $estado = $_GET['simpDeleteFab'];
        $delete = "UPDATE fabrica SET fabricaStatus= 0 WHERE id_fabrica = '$estado'";
        mysqli_query($link, $delete);
        if (mysqli_error($link)){ ?>
            <script>document.location.href="fabrica.php";</script>
        <?php    
        }
        else{?>
            <script>document.location.href="fabrica.php";</script>
        <?php    
        }

        echo mysqli_error($link);
    }  
    // ESTATUS PROMOCION
    else if(isset($_GET['simpDeletePromo'])){
        $estado = $_GET['simpDeletePromo'];
        $delete = "UPDATE promocion SET statusPromocion= 0 WHERE id_promocion = '$estado'";
        mysqli_query($link, $delete);

        if (mysqli_error($link)){ ?>
            <script>document.location.href="promocion.php";</script>
        <?php    
        }
        else{?>
            <script>document.location.href="promocion.php";</script>
        <?php    
        }

        echo mysqli_error($link);
    }

    // ESTATUS CODER
    else if(isset($_GET['simpDeleteCoder'])){
        $estado = $_GET['simpDeleteCoder'];
        $delete = "UPDATE coder SET status= 0 WHERE id_coders = '$estado'";
        mysqli_query($link, $delete);
    
        if (mysqli_error($link)){ ?>
            <script>document.location.href="coder.php";</script>
        <?php    
        }
        else{?>
            <script>document.location.href="coder.php";</script>
        <?php    
        }

        echo mysqli_error($link);
    }

// ESTATUS RESPONSABLE
    else if(isset($_GET['simpDeleteRes'])){
        $estado = $_GET['simpDeleteRes'];
        $delete = "UPDATE userhist 
        INNER JOIN usuario
        ON userhist.fk_usuario=usuario.id_usuario
        SET statusUserhist= 0 WHERE id_usuario = '$estado'";
        mysqli_query($link, $delete);
        echo mysqli_error($link);

        if (mysqli_error($link)){ ?>
            <script>document.location.href="responsable.php";</script>
        <?php    
        }
        else{?>
            <script>document.location.href="responsable.php";</script>
        <?php    
        }

        echo mysqli_error($link);
    }

// ESTATUS FORMADOR
    else if(isset($_GET['simpDeleteForm'])){
        $estado = $_GET['simpDeleteForm'];
        $delete = "UPDATE userhist 
        INNER JOIN usuario
        ON userhist.fk_usuario=usuario.id_usuario
        SET statusUserhist= 0 WHERE id_usuario = '$estado'";
        mysqli_query($link, $delete);
        echo mysqli_error($link);

        if (mysqli_error($link)){ ?>
            <script>document.location.href="formador.php";</script>
        <?php    
        }
        else{?>
            <script>document.location.href="formador.php";</script>
        <?php    
        }

        echo mysqli_error($link);
    }



?>