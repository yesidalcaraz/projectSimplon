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
                    <a class="btn btn-outline-danger border-0" href="promocion.php">PROMOCIÓN</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-danger border-0 active" href="coder.php">CODER</a>
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
                    <a class="btn btn-outline-danger border-0 text-capitalize disabled" href="#"> Admin: <?php echo $_SESSION['name']; ?> </a>
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
            <h4 class="card-header text-danger">AGREGAR CODER</h4>
            <div class="card-body">
            <form action="insert.php" method="post" id="formCoders">
                <div class="form-group">
                  <label for="formGroupExampleInput">Nombre</label>
                  <input type="text" name="nomc" class="form-control v24" id="nombreCoder" placeholder="Nombre de coder" required>
                  <span id="mensajenombrecoder"></span>
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2">1er Apellido</label>
                  <input type="text" name="apec1" class="form-control v50" id="apellidoCoder1" placeholder="Apellido del coder" required>
                  <span id="mensajeapellidocoder1"></span>
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2">2do Apellido</label>
                  <input type="text" name="apec2" class="form-control v50" id="apellidoCoder2" placeholder="Apellido del coder" required>
                  <span id="mensajeapellidocoder2"></span>
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput">Fecha de nacimiento</label>
                  <input type="text" name="anac" class="form-control vdate" id="nacimientoCoder" placeholder="aaaa-mm-dd" required>
                  <span id="mensajenacimientocoder"></span>
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2">DNI/NIE</label>
                  <input type="text" name="dni" class="form-control v10" id="dniCoder" placeholder="No. Identificación" required>
                  <span id="mensajednicoder"></span>
                </div>
                <div class="form-row">
                  <div class="col">
                    <label for="formGroupExampleInput2">Nacionalidad</label>
                    <select name="nac" id="nac" class="form-control">
                      <?php
                      include 'conex.php';
                      $consulta = "select id_pais, nacionalidad from pais";
                      $resultado = mysqli_query($link, $consulta);
                      while ($arr = mysqli_fetch_array($resultado)) { ?>
                        <option value="<?php echo $arr[0]; ?>">
                          <?php echo $arr[1]; ?>
                        </option>
                      <?php      }  ?>
                    </select>
                  </div>
                  <div class="col">
                    <label for="formGroupExampleInput2">Promoción</label>
                    <select name="fknazi" id="fknazi" class="form-control">
                      <?php
                      include 'conex.php';
                      $consulta = "select id_promocion, promocion from promocion where statusPromocion = 1";
                      $resultado = mysqli_query($link, $consulta);
                      while ($arr = mysqli_fetch_array($resultado)) { ?>
                        <option value="<?php echo $arr[0]; ?>">
                          <?php echo $arr[1]; ?>
                        </option>
                      <?php      }  ?>
                    </select>
                  </div>
                  <input type="hidden" name="oculto" value="3">
                </div>
                <div class="col-xs-12 col-md-12 col-lg-12 ">
                  <div class="modal-footer border-0">
                    <br>
                    <a class="btn btn-secondary" href="coder.php">Cancelar</a>
                    <button class="btn btn-danger" id="enviarf" type="submit">Enviar</button>
                  </div>
                </div>
              </form>        
            </div>    
        </div>        
    </section>    


    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/fancy.js"></script>

</body>
</html>