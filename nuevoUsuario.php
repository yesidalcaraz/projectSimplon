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
    <?php
    if (isset($_SESSION['tipo'])) {
        if ($_SESSION['tipo'] == 'a') { ?>
            <header>
                <nav class="nav d-inline-flex p-2 d-flex justify-content-between nav-tabs border-bottom border-danger cabecera container-fluid">
                    <a class="justify-content-start" href="index.php"><img src="img/logo3.png" class="logo3"></a>
                    <ul class="nav justify-content-center align-self-center">
                        <li class="nav-item">
                            <a class="btn btn-outline-danger border-0" href="index.php">INICIO</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-danger border-0 " href="fabrica.php">FABRICA</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-danger border-0" href="promocion.php">PROMOCION</a>
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
                            <a class="btn btn-outline-danger border-0 active" href="nuevoUsuario.php">NUEVO USUARIO</a>
                        </li>
                    </ul>
                    <ul class="nav justify-content-end align-self-center">
                        <li class="nav-item">
                            <a class="btn btn-outline-danger border-0 text-capitalize disabled" href="#">
                                admin: <?php echo $_SESSION['name']; ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-danger border-0" href="cerrar.php">Cerrar Sesión</a>
                        </li>
                    </ul>
                </nav>
            </header>
            <br>
            <div class="container-fluid">
                <div class="card card w-50 mod">
                    <h4 class="card-header text-danger">Nuevo Usuario</h4>
                    <div class="card-body">
                        <form action="insert.php" method="post" id="formNuevoUsuario">
                            <div class="form-group">
                                <div class="col">
                                    <label for="formGroupExampleInput" class="my-1 mr-2">Nombre</label>
                                    <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre" required>
                                    <span id="mensaje"></span>
                                </div>
                                <br>
                                <div class="col">
                                    <label for="formGroupExampleInput">1º Apellido</label>
                                    <input type="text" name="apellido1" class="form-control" id="apellido1" placeholder="1º Apellido" required>
                                    <span id="mensajeape1"></span>
                                </div>
                                <br>
                                <div class="col">
                                    <label for="formGroupExampleInput">2º Apellido</label>
                                    <input type="text" name="apellido2" class="form-control" id="apellido2" placeholder="2º Apellido" >
                                    <span id="mensajeape2"></span>
                                </div>
                                <br>
                                <div class="col">
                                    <label for="formGroupExampleInput">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                                    <span id="mensajeemailusu"></span>
                                </div>
                                <br>
                                <div class="col">
                                    <label for="formGroupExampleInput">Contraseña</label>
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Contraseña" required>
                                    <span id="mensajepassusu"></span>
                                </div>
                                <br>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Rol</label>
                                        <select class="form-control" name="cargo" id="tipo" placeholder="Cargo">
                                            <option value="p">Responsable</option>
                                            <option value="f">Formador</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Promoción</label>
                                        <select class="form-control" name="promocion" id="promocion" placeholder="Promoción">
                                            <?php
                                            include 'conex.php';
                                            $consulta = "SELECT promocion.id_promocion, promocion.promocion, promoyear.promocion from promocion 
                            INNER JOIN promoyear
                            ON promoyear.id_promoyear=promocion.fk_promoyear
                            where statusPromocion = 1";
                                            $resultado = mysqli_query($link, $consulta);
                                            while ($arr = mysqli_fetch_array($resultado)) { ?>
                                                <option value="<?php echo $arr[0]; ?>" selected>
                                                    <?php echo $arr[1] . " // " . $arr[2]; ?>
                                                </option>
                                            <?php      }  ?>
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" name="oculto" value="6">
                                <div class="col">
                                    <div class="form-control d-flex justify-content-center">
                                        <tr>
                                            <td colspan="2"><label>Ingrese el contenido de la imagen</label><label class="mandat"> *</label></td>
                                        </tr>

                                        <tr>
                                            <td width="60px">
                                                <input type="text" name="captcha" id="captcha" maxlength="6" size="6" required /></td>
                                            <td><img src="captcha.php" /></td>
                                            <span class="error"><?php if (isset($_GET["msj"])) {
                                                                    echo $_GET["msj"];
                                                                }  ?></span>
                                        </tr>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-12 col-lg-12 ">
                                <div class="modal-footer">
                                    <br>
                                    <a href="" class="btn btn-secondary">Cancelar</a>
                                    <button class="btn btn-danger" id="enviarf" type="submit">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                <?php
            } else if ($_SESSION['tipo'] == 'p') { ?>
                    <header>
                        <nav class="nav d-inline-flex p-2 d-flex justify-content-between nav-tabs border-bottom border-danger cabecera container-fluid">
                            <a class="justify-content-start" href="index.php"><img src="img/logo3.png" class="logo3"></a>
                            <ul class="nav justify-content-center align-self-center">
                                <li class="nav-item">
                                    <a class="btn btn-outline-danger border-0" href="index.php">INICIO</a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn btn-outline-danger border-0 " href="fabrica.php">FABRICA</a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn btn-outline-danger border-0" href="promocion.php">PROMOCION</a>
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
                                    <a class="btn btn-outline-danger border-0 active" href="nuevoUsuario.php">NUEVO USUARIO</a>
                                </li>
                            </ul>
                            <ul class="nav justify-content-end align-self-center">
                                <li class="nav-item">
                                    <a class="btn btn-outline-danger border-0 text-capitalize disabled" href="#">
                                        responsable: <?php echo $_SESSION['name']; ?>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn btn-outline-danger border-0" href="cerrar.php">Cerrar Sesión</a>
                                </li>
                            </ul>
                        </nav>
                    </header>
                    <br>
                    <div class="container-fluid">
                        <div class="card card w-50 mod">
                            <h4 class="card-header text-danger">Nuevo Usuario</h4>
                            <div class="card-body">
                                <form action="insert.php" method="post" id="formNuevoUsuario">
                                    <div class="form-group">
                                        <div class="col">
                                            <label for="formGroupExampleInput" class="my-1 mr-2">Nombre</label>
                                            <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre" required>
                                        </div>
                                        <br>
                                        <div class="col">
                                            <label for="formGroupExampleInput">1º Apellido</label>
                                            <input type="text" name="apellido1" class="form-control" id="apellido1" placeholder="1º Apellido" required>
                                        </div>
                                        <br>
                                        <div class="col">
                                            <label for="formGroupExampleInput">2º Apellido</label>
                                            <input type="text" name="apellido2" class="form-control" id="apellido2" placeholder="2º Apellido" required>
                                        </div>
                                        <br>
                                        <div class="col">
                                            <label for="formGroupExampleInput">Email</label>
                                            <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                                        </div>
                                        <br>
                                        <div class="col">
                                            <label for="formGroupExampleInput">Contraseña</label>
                                            <input type="password" name="password" class="form-control" id="password" placeholder="Contraseña" required>
                                        </div>
                                        <br>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="formGroupExampleInput">Rol</label>
                                                <select class="form-control" name="cargo" id="tipo" placeholder="Cargo" disabled>
                                                    <option value="f">Formador</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="formGroupExampleInput">Promoción</label>
                                                <select class="form-control" name="promocion" id="promocion" placeholder="Promoción">
                                                    <?php
                                                    include 'conex.php';
                                                    $consulta = "SELECT promocion.id_promocion, promocion.promocion, promoyear.promocion from promocion 
                            INNER JOIN promoyear
                            ON promoyear.id_promoyear=promocion.fk_promoyear
                            where statusPromocion = 1
                            AND promocion.id_promocion IN(SELECT userhist.fk_promo FROM userhist
                            WHERE userhist.fk_usuario = '$_SESSION[id]' and userhist.statusUserhist = 1)";
                                                    $resultado = mysqli_query($link, $consulta);
                                                    while ($arr = mysqli_fetch_array($resultado)) { ?>
                                                        <option value="<?php echo $arr[0]; ?>" selected>
                                                            <?php echo $arr[1] . " // " . $arr[2]; ?>
                                                        </option>
                                                    <?php      }  ?>
                                                </select>
                                            </div>
                                        </div>
                                        <input type="hidden" name="oculto" value="6">

                                        <div class="col">
                                            <div class="form-control d-flex justify-content-center">
                                                <tr>
                                                    <td colspan="2"><label>Ingrese el contenido de la imagen</label><label class="mandat"> *</label></td>
                                                </tr>

                                                <tr>
                                                    <td width="60px">
                                                        <input class="captcha" type="text" name="captcha" id="captcha" maxlength="6" size="6" required /></td>
                                                    <td><img src="captcha.php" /></td>
                                                    <span class="error"><?php if (isset($_GET["msj"])) {
                                                                            echo $_GET["msj"];
                                                                        }  ?></span>
                                                </tr>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-12 col-lg-12 ">
                                        <div class="modal-footer">
                                            <br>
                                            <a href="" class="btn btn-secondary">Cancelar</a>
                                            <button class="btn btn-danger" id="enviarf" type="submit" disabled>Enviar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                    <?php
                }
            }
                    ?>

                    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
                    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
                    <script type="text/javascript" src="js/script.js"></script>
                    <script type="text/javascript" src="js/valnuevousuario.js"></script>
</body>

</html>