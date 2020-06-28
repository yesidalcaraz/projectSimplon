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
              <a class="btn btn-outline-danger border-0 active" href="fabrica.php">FABRICA</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-outline-danger border-0" href="promocion.php">PROMOCIÓN</a>
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
              <a class="btn btn-outline-danger border-0 text-capitalize disabled" href="#"> admin: <?php echo $_SESSION['name']; ?> </a>
            </li>
            <li class="nav-item">
              <a class="btn btn-outline-danger border-0" href="cerrar.php">Cerrar Sesión</a>
            </li>
          </ul>
        </nav>
      </header>
      <br>
      <section class="container">
        <div class="row" id="tablafabrica">
          <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="col-md-12">
              <br>
              <div class="btn btn-outline-danger pull-right color-art">
                <a href="agregarFab.php" class="text-reset"><i class="fa fa-plus-circle fa-lg"></i> Nueva Fabrica</a>
              </div>
              <h1 class="text-danger pull-left">FABRICAS</h1>
              <br>
            </div>
            <br>
            <div class="col-md-12 d-flex justify-content-start">
              <form class="form-inline" method="post">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="buscar">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" id="inlineRadio1" value="radio_nombre" name="option">
                  <label class="form-check-label" for="inlineRadio1">Fabrica</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" id="inlineRadio2" value="radio_ciudad" name="option">
                  <label class="form-check-label" for="inlineRadio2">Ciudad</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" id="inlineRadio3" value="radio_pais" name="option">
                  <label class="form-check-label" for="inlineRadio3">País</label>
                </div>
                <button class="btn btn-outline-danger my-2 my-sm-0 busqueda" type="submit">Search</button>
              </form>
            </div>
            <br>
            <table id="tablafabrica" class="table table-striped table-bordered table-hover">
              <thead>
                <form method="post">
                  <tr class="text-white tituloTabla">
                    <th>Fabrica
                      <a href="fabrica.php?order=<?php echo 'fab_asc'; ?>" class="text-reset"><i class="fa fa-sort-alpha-asc" aria-hidden="true"></i></a>
                      <a href="fabrica.php?order=<?php echo 'fab_dsc'; ?>" class="text-reset"><i class="fa fa-sort-alpha-desc" aria-hidden="true"></i></a>
                    </th>
                    <th>Ciudad
                      <a href="fabrica.php?order=<?php echo 'ciu_asc'; ?>" class="text-reset"><i class="fa fa-sort-alpha-asc" aria-hidden="true"></i></a>
                      <a href="fabrica.php?order=<?php echo 'ciu_dsc'; ?>" class="text-reset"><i class="fa fa-sort-alpha-desc" aria-hidden="true"></i></a></th>
                    <th>País
                      <a href="fabrica.php?order=<?php echo 'pais_asc'; ?>" class="text-reset"><i class="fa fa-sort-alpha-asc" aria-hidden="true"></i></a>
                      <a href="fabrica.php?order=<?php echo 'pais_dsc'; ?>" class="text-reset"><i class="fa fa-sort-alpha-desc" aria-hidden="true"></i></a></th>
                    <th>Status
                      <a href="fabrica.php?order=<?php echo 'sta_asc'; ?>" class="text-reset"><i class="fa fa-sort-alpha-asc" aria-hidden="true"></i></a>
                      <a href="fabrica.php?order=<?php echo 'sta_dsc'; ?>" class="text-reset"><i class="fa fa-sort-alpha-desc" aria-hidden="true"></i></a></th>
                    <th class="text-center">Acción</th>
                  </tr>
                </form>
              </thead>
              <tbody>
                <?php
                include 'conex.php';
                if (isset($_POST['option'])) {
                  $bus = $_POST['buscar'];
                  $op = $_POST['option'];

                  switch ($op) {
                    case 'radio_nombre':
                      $con = "and fabrica.fabrica like '%$bus%'";
                      break;
                    case 'radio_ciudad':
                      $con = "and ciudad.ciudad like '%$bus%'";
                      break;
                    case 'radio_pais':
                      $con = "and pais.pais like '%$bus%'";
                      break;
                    default:
                      $con = "";
                      break;
                  }
                } else {
                  $con = "";
                }
                if (isset($_GET['order'])) {
                  $order = $_GET['order'];
                  switch ($order) {
                    case 'fab_asc':
                      $ord = "ORDER BY fabrica.fabrica ASC";
                      break;
                    case 'fab_dsc':
                      $ord = "ORDER BY fabrica.fabrica DESC";
                      break;
                    case 'ciu_asc':
                      $ord = "ORDER BY ciudad.ciudad ASC";
                      break;
                    case 'ciu_dsc':
                      $ord = "ORDER BY ciudad.ciudad DESC";
                      break;
                    case 'pais_asc':
                      $ord = "ORDER BY pais.pais ASC";
                      break;
                    case 'pais_dsc':
                      $ord = "ORDER BY pais.pais DESC";
                      break;
                    case 'sta_asc':
                      $ord = "ORDER BY fabrica.fabricaStatus ASC";
                      break;
                    case 'sta_dsc':
                      $ord = "ORDER BY fabrica.fabricaStatus DESC";
                      break;
                    default:
                      $ord = "";
                      break;
                  }
                } else {
                  $ord = "";
                }
                $con_fab = "SELECT fabrica.fabrica,ciudad.ciudad,pais.pais, fabrica.fabricaStatus,fabrica.id_fabrica 
                FROM fabrica,ciudad,pais  where fabrica.fk_ciudad=ciudad.id_ciudad and ciudad.fk_pais=pais.id_pais $con $ord";
                $r = mysqli_query($link, $con_fab);
                while ($a = mysqli_fetch_array($r)) { ?>
                  <tr>
                    <td><?php echo $a[0]; ?> </td>
                    <td><?php echo $a[1]; ?> </td>
                    <td><?php echo $a[2]; ?> </td>
                    <td><?php if (($a[3]) == 1) {
                          echo "Activo";
                        } else {
                          echo "Inactivo";
                        }; ?></td>
                    <td>
                      <a href="modificarFab.php?modFab=<?php echo $a[4]; ?>"><i class="fa fa-pencil-square-o fa-2x bg-transparent text-danger" aria-hidden="true"></i></a>
                      <a data-toggle="modal" data-target="#modalElimFab<?php echo $a[4]; ?>"><i class="fa fa-trash-o fa-2x bg-transparent text-danger" aria-hidden="true"></i></a>
                      <!-- Modal Eliminar-->
                      <div class="modal fade" id="modalElimFab<?php echo $a[4]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered w-25" role="document">
                          <div class="modal-content">
                            <div class="modal-header border-bottom border-danger">
                              <h5 class="modal-title text-uppercase text-left text-danger" id="exampleModalCenterTitle">Desea Eliminar Fabrica</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-footer border-0">
                              <br>
                              <button class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                              <a href="delete.php?simpDeleteFab=<?php echo $a[4]; ?>" class="btn btn-danger" id="enviarf" type="submit">Eliminar</a>
                            </div>
                          </div>
                          </form>
                        </div>
                      </div>
          </div>
        </div>
        <!--Fin Modal Eliminar-->
        </td>
        </tr>
        </div>
      <?php
                }
      ?>
      </table>
      </div>
      </div>
      </section>      
    <?php
    } elseif ($_SESSION['tipo'] == 'p') { ?>
      <header>
        <nav class="nav d-inline-flex p-2 d-flex justify-content-between nav-tabs border-bottom border-danger cabecera container-fluid">
          <a class="justify-content-start" href="index.php"><img src="img/logo3.png" class="logo3"></a>
          <ul class="nav justify-content-center align-self-center">
            <li class="nav-item">
              <a class="btn btn-outline-danger border-0" href="index.php">INICIO</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-outline-danger border-0 active" href="fabrica.php">FABRICA</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-outline-danger border-0" href="promocion.php">PROMOCIÓN</a>
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
              <a class="btn btn-outline-danger border-0 text-capitalize disabled" href="#"> Responsable: <?php echo $_SESSION['name']; ?> </a>
            </li>
            <li class="nav-item">
              <a class="btn btn-outline-danger border-0" href="cerrar.php">Cerrar Sesión</a>
            </li>
          </ul>
        </nav>
      </header>
      <br>
      <section class="container">
        <div class="row" id="tablafabrica">
          <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="col-md-12">
              <br>
              <h1 class="text-danger pull-left">FABRICAS</h1>
              <br>
            </div>
            <br>
            <div class="col-md-12 d-flex justify-content-start">
              <form class="form-inline" method="post">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="buscar">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" id="inlineRadio1" value="radio_nombre" name="option">
                  <label class="form-check-label" for="inlineRadio1">Fabrica</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" id="inlineRadio2" value="radio_ciudad" name="option">
                  <label class="form-check-label" for="inlineRadio2">Ciudad</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" id="inlineRadio3" value="radio_pais" name="option">
                  <label class="form-check-label" for="inlineRadio3">País</label>
                </div>
                <button class="btn btn-outline-danger my-2 my-sm-0 busqueda" type="submit">Search</button>
              </form>
            </div>
            <br>
            <table id="tablafabrica" class="table table-striped table-bordered">
              <thead>
                <tr class="text-white tituloTabla">
                  <th>Fabrica
                    <a href="fabrica.php?order=<?php echo 'fab_asc'; ?>" class="text-reset"><i class="fa fa-sort-alpha-asc" aria-hidden="true"></i></a>
                    <a href="fabrica.php?order=<?php echo 'fab_dsc'; ?>" class="text-reset"><i class="fa fa-sort-alpha-desc" aria-hidden="true"></i></a>
                  </th>
                  <th>Ciudad
                    <a href="fabrica.php?order=<?php echo 'ciu_asc'; ?>" class="text-reset"><i class="fa fa-sort-alpha-asc" aria-hidden="true"></i></a>
                    <a href="fabrica.php?order=<?php echo 'ciu_dsc'; ?>" class="text-reset"><i class="fa fa-sort-alpha-desc" aria-hidden="true"></i></a>
                  </th>
                  <th>País
                    <a href="fabrica.php?order=<?php echo 'pais_asc'; ?>" class="text-reset"><i class="fa fa-sort-alpha-asc" aria-hidden="true"></i></a>
                    <a href="fabrica.php?order=<?php echo 'pais_dsc'; ?>" class="text-reset"><i class="fa fa-sort-alpha-desc" aria-hidden="true"></i></a>
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php
                include 'conex.php';
                if (isset($_POST['option'])) {
                  $bus = $_POST['buscar'];
                  $op = $_POST['option'];

                  switch ($op) {
                    case 'radio_nombre':
                      $con = "and fabrica.fabrica like '%$bus%'";
                      break;
                    case 'radio_ciudad':
                      $con = "and ciudad.ciudad like '%$bus%'";
                      break;
                    case 'radio_pais':
                      $con = "and pais.pais like '%$bus%'";
                      break;
                    default:
                      $con = "";
                      break;
                  }
                } else {
                  $con = "";
                }
                if (isset($_GET['order'])) {
                  $order = $_GET['order'];
                  switch ($order) {
                    case 'fab_asc':
                      $ord = "ORDER BY fabrica.fabrica ASC";
                      break;
                    case 'fab_dsc':
                      $ord = "ORDER BY fabrica.fabrica DESC";
                      break;
                    case 'ciu_asc':
                      $ord = "ORDER BY ciudad.ciudad ASC";
                      break;
                    case 'ciu_dsc':
                      $ord = "ORDER BY ciudad.ciudad DESC";
                      break;
                    case 'pais_asc':
                      $ord = "ORDER BY pais.pais ASC";
                      break;
                    case 'pais_dsc':
                      $ord = "ORDER BY pais.pais DESC";
                      break;
                    case 'sta_asc':
                      $ord = "ORDER BY fabrica.fabricaStatus ASC";
                      break;
                    case 'sta_dsc':
                      $ord = "ORDER BY fabrica.fabricaStatus DESC";
                      break;
                    default:
                      $ord = "";
                      break;
                  }
                } else {
                  $ord = "";
                }
                $con_fab = "SELECT fabrica.fabrica,ciudad.ciudad,pais.pais, fabrica.fabricaStatus,fabrica.id_fabrica 
                FROM fabrica,ciudad,pais  where fabrica.fk_ciudad=ciudad.id_ciudad and ciudad.fk_pais=pais.id_pais and fabricaStatus='1' $con $ord";
                $r = mysqli_query($link, $con_fab);
                while ($a = mysqli_fetch_array($r)) { ?>
                  <tr>
                    <td><?php echo $a[0]; ?> </td>
                    <td><?php echo $a[1]; ?> </td>
                    <td><?php echo $a[2]; ?> </td>
                    </td>
                  </tr>
          </div>
        <?php
                }
        ?>
        </table>
        </div>
        </div>
      </section>
    <?php
    } elseif ($_SESSION['tipo'] == 'f') { ?>
      <header>
        <nav class="nav d-inline-flex p-2 d-flex justify-content-between nav-tabs border-bottom border-danger cabecera container-fluid">
          <a class="justify-content-start" href="index.php"><img src="img/logo3.png" class="logo3"></a>
          <ul class="nav justify-content-center align-self-center">
            <li class="nav-item">
              <a class="btn btn-outline-danger border-0" href="index.php">INICIO</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-outline-danger border-0 active" href="fabrica.php">FABRICA</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-outline-danger border-0" href="promocion.php">PROMOCIÓN</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-outline-danger border-0" href="coder.php">CODER</a>
            </li>
          </ul>
          <ul class="nav justify-content-end align-self-center">
            <li class="nav-item">
              <a class="btn btn-outline-danger border-0 text-capitalize disabled" href="#"> Formador: <?php echo $_SESSION['name']; ?> </a>
            </li>
            <li class="nav-item">
              <a class="btn btn-outline-danger border-0" href="cerrar.php">Cerrar Sesión</a>
            </li>
          </ul>
        </nav>
      </header>
      <br>
      <section class="container">
        <div class="row" id="tablafabrica">
          <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="col-md-12">
              <br>
              <h1 class="text-danger pull-left">FABRICAS</h1>
              <br>
            </div>
            <br>
            <div class="col-md-12 d-flex justify-content-start">
              <form class="form-inline" method="post">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="buscar">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" id="inlineRadio1" value="radio_nombre" name="option">
                  <label class="form-check-label" for="inlineRadio1">Fabrica</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" id="inlineRadio2" value="radio_ciudad" name="option">
                  <label class="form-check-label" for="inlineRadio2">Ciudad</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" id="inlineRadio3" value="radio_pais" name="option">
                  <label class="form-check-label" for="inlineRadio3">País</label>
                </div>
                <button class="btn btn-outline-danger my-2 my-sm-0 busqueda" type="submit">Search</button>
              </form>
            </div>
            <br>
            <table id="tablafabrica" class="table table-striped table-bordered">
              <thead>
                <tr class="text-white tituloTabla">
                  <th>Fabrica
                    <a href="fabrica.php?order=<?php echo 'fab_asc'; ?>" class="text-reset"><i class="fa fa-sort-alpha-asc" aria-hidden="true"></i></a>
                    <a href="fabrica.php?order=<?php echo 'fab_dsc'; ?>" class="text-reset"><i class="fa fa-sort-alpha-desc" aria-hidden="true"></i></a>
                  </th>
                  <th>Ciudad
                    <a href="fabrica.php?order=<?php echo 'ciu_asc'; ?>" class="text-reset"><i class="fa fa-sort-alpha-asc" aria-hidden="true"></i></a>
                    <a href="fabrica.php?order=<?php echo 'ciu_dsc'; ?>" class="text-reset"><i class="fa fa-sort-alpha-desc" aria-hidden="true"></i></a>
                  </th>
                  <th>País
                    <a href="fabrica.php?order=<?php echo 'pais_asc'; ?>" class="text-reset"><i class="fa fa-sort-alpha-asc" aria-hidden="true"></i></a>
                    <a href="fabrica.php?order=<?php echo 'pais_dsc'; ?>" class="text-reset"><i class="fa fa-sort-alpha-desc" aria-hidden="true"></i></a>
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php
                include 'conex.php';
                if (isset($_POST['option'])) {
                  $bus = $_POST['buscar'];
                  $op = $_POST['option'];

                  switch ($op) {
                    case 'radio_nombre':
                      $con = "and fabrica.fabrica like '%$bus%'";
                      break;
                    case 'radio_ciudad':
                      $con = "and ciudad.ciudad like '%$bus%'";
                      break;
                    case 'radio_pais':
                      $con = "and pais.pais like '%$bus%'";
                      break;
                    default:
                      $con = "";
                      break;
                  }
                } else {
                  $con = "";
                }
                if (isset($_GET['order'])) {
                  $order = $_GET['order'];
                  switch ($order) {
                    case 'fab_asc':
                      $ord = "ORDER BY fabrica.fabrica ASC";
                      break;
                    case 'fab_dsc':
                      $ord = "ORDER BY fabrica.fabrica DESC";
                      break;
                    case 'ciu_asc':
                      $ord = "ORDER BY ciudad.ciudad ASC";
                      break;
                    case 'ciu_dsc':
                      $ord = "ORDER BY ciudad.ciudad DESC";
                      break;
                    case 'pais_asc':
                      $ord = "ORDER BY pais.pais ASC";
                      break;
                    case 'pais_dsc':
                      $ord = "ORDER BY pais.pais DESC";
                      break;
                    default:
                      $ord = "";
                      break;
                  }
                } else {
                  $ord = "";
                }
                $con_fab = "SELECT fabrica.fabrica,ciudad.ciudad,pais.pais, fabrica.fabricaStatus,fabrica.id_fabrica, promocion.fk_fabrica, promocion.id_promocion
                FROM fabrica INNER JOIN ciudad
                ON fabrica.fk_ciudad=ciudad.id_ciudad
                INNER JOIN pais
                ON ciudad.fk_pais=pais.id_pais
                INNER JOIN promocion
                ON promocion.fk_fabrica=fabrica.id_fabrica
                WHERE fabricaStatus='1' and promocion.id_promocion IN(SELECT userhist.fk_promo FROM userhist
                WHERE userhist.fk_usuario = '$_SESSION[id]') $con $ord";
                $r = mysqli_query($link, $con_fab);
                while ($a = mysqli_fetch_array($r)) { ?>
                  <tr>
                    <td><?php echo $a[0]; ?> </td>
                    <td><?php echo $a[1]; ?> </td>
                    <td><?php echo $a[2]; ?> </td>
                  </tr>
                  <?php
                  if (isset($_GET['msj'])) {
                    if ($_GET['msj'] == 'Error') {
                      echo '<script type="text/javascript">;
            alert("No se pudo realizar esta acción");
            window.location.replace ("http://localhost/fasefinal/fabrica.php");
            </script>';
                    } else { ?>
                      echo '<script type="text/javascript">
                        ;
                        alert("Status actualizado con éxito");
                        window.location.replace("http://localhost/fasefinal/fabrica.php");
                      </script> ';
                  <?php
                    }
                  }
                  ?>
          </div>
        <?php
                }
        ?>
        </table>
        </div>
        </div>
      </section>
  <?php

    }
  }

  ?>


  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/script.js"></script>
  <script type="text/javascript" src="js/validarfab.js"></script>
</body>

</html>