<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="css/style.css" rel="stylesheet" type="text/css">

</head>

<body>    
    <header>
        <nav class="nav d-inline-flex p-2 d-flex justify-content-between nav-tabs border-bottom border-danger cabecera container-fluid">
            <a class="justify-content-start" href="index.php"><img src="img/logo3.png" class="logo3"></a>
            <ul class="nav justify-content-center align-self-center">
                <li class="nav-item">
                    <a class="btn btn-outline-danger border-0" href="index.php">INICIO</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-danger border-0" href="fabrica.php">FABRICA</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-danger border-0 active" href="promocion.php">PROMOCIÓN</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-danger border-0" href="coder.php">CODER</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-danger border-0" href="responsable.php">RESPONSABLE</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-danger border-0" href="formador.php">FORMADOR</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-danger border-0" href="nuevoUsuario.php">NUEVO USUARIO</a>
                </li>
            </ul>
            <ul class="nav justify-content-end align-self-center">
                <li class="nav-item">
                    <a class="btn btn-outline-danger border-0 text-capitalize disabled" href="#" >
                        <?php
                            if(isset($_SESSION['tipo'])){
                                if ($_SESSION['tipo']=='a') {
                                    echo 'admin: '.$_SESSION['name']; 
                                }elseif ($_SESSION['tipo']=='p') {
                                            echo 'responsable: '.$_SESSION['name'];
                                }
                            }?>                 
                    </a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-danger border-0" href="cerrar.php">Cerrar Sesión</a>
                </li>
            </ul>
        </nav>
    </header>
    <br>
    <section class="container">
                <div class="card card w-50 mod">
                    <h4 class="card-header text-danger">
                        AGREGAR PROMOCIÓN
                    </h4>
                    <div class="card-body">
                    <form action="insert.php" method="post" id="formPromocion">
                <div class="form-group">
                    <label for="formGroupExampleInput">Nombre</label>
                    <input type="text" name="promo" class="form-control v32" id="nombrePromocion" placeholder="Nombre de promoción" required>
                    <span id="mensajepromo"></span>
                </div>
                <div class="form-row">
                    <div class="col">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Periodo</label>
                        <select class="form-control" name="promoy" id="periodo" placeholder="Periodo">
                            <?php
                            include 'conex.php';
                            $consulta = "SELECT id_promoyear, promoyear.promocion from promoyear";
                            $resultado = mysqli_query($link, $consulta);
                            while ($arr = mysqli_fetch_array($resultado)) { ?>
                                <option value="<?php echo $arr[0]; ?>" selected>
                                <?php echo $arr[1]; ?>
                                </option>
                            <?php      }  ?>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <label for="formGroupExampleInput2">Fábrica</label>
                    <select name="fabpromo" id="fabpromo" class="form-control v32">
                        <?php
                        include 'conex.php';
                        $consulta = "select id_fabrica, fabrica from fabrica where fabricaStatus = 1";
                        $resultado = mysqli_query($link, $consulta);
                        while ($arr = mysqli_fetch_array($resultado)) { ?>
                            <option value="<?php echo $arr[0]; ?>" selected>
                                <?php echo $arr[1]; ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                    </div>
                    <input type="hidden" name="oculto" value="2">
                </div>
                <div class="col-xs-12 col-md-12 col-lg-12 ">
                    <div class="modal-footer border-0">
                        <br>
                        <a href="promocion.php" class="btn btn-secondary" >Cancelar</a>
                        <button class="btn btn-danger" id="enviarp" type="submit" >Enviar</button>
                    </div>
                </div>
            </form>
                    </div>    
                </div>        
            </section>



    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/validarpromo.js"></script>

</body>

</html>