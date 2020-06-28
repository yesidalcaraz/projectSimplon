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
              <a class="btn btn-outline-danger border-0" href="fabrica.php">FABRICA</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-outline-danger border-0" href="promocion.php">PROMOCIÓN</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-outline-danger border-0" href="coder.php">CODER</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-outline-danger border-0 active" href="responsable.php">RESPONSABLE</a>
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
      <section class="container">
        <div class="row" id="tablafabrica">
          <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="col-md-12">
              <br>
              <h1 class="text-danger pull-left">RESPONSABLE</h1>
              <br>
            </div>
            <br>
            <div class="col-md-12 d-flex justify-content-start">
              <form class="form-inline" method="post">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="buscar">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" id="inlineRadio1" value="radio_nombre" name="option">
                  <label class="form-check-label" for="inlineRadio1">Nombre</label>
                  <span id="mensajeres"></span>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" id="inlineRadio2" value="radio_ap1" name="option">
                  <label class="form-check-label" for="inlineRadio2">1ºApellido</label>
                  <span id="mensajeaperes1"></span>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" id="inlineRadio2" value="radio_ap2" name="option">
                  <label class="form-check-label" for="inlineRadio2">2ºApellido</label>
                  <span id="mensajeaperes2"></span>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" id="inlineRadio2" value="radio_promo" name="option">
                  <label class="form-check-label" for="inlineRadio2">Promoción</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" id="inlineRadio2" value="radio_periodo" name="option">
                  <label class="form-check-label" for="inlineRadio2">Periodo</label>
                </div>
                <button class="btn btn-outline-danger my-2 my-sm-0 busqueda" type="submit">Search</button>
              </form>
            </div>
            <br>
            <table id="tablarespons" class="table table-striped table-bordered">
              <thead>
                <tr class="bg-primary text-white tituloTabla">
                  <th>Nombre
                    <a href="responsable.php?order=<?php echo 'nom_asc'; ?>" class="text-reset"><i class="fa fa-sort-alpha-asc" aria-hidden="true"></i></a>
                    <a href="responsable.php?order=<?php echo 'nom_dsc'; ?>" class="text-reset"><i class="fa fa-sort-alpha-desc" aria-hidden="true"></i></a>
                  </th>
                  <th>1ºApellido
                    <a href="responsable.php?order=<?php echo 'ap1_asc'; ?>" class="text-reset"><i class="fa fa-sort-alpha-asc" aria-hidden="true"></i></a>
                    <a href="responsable.php?order=<?php echo 'ap1_dsc'; ?>" class="text-reset"><i class="fa fa-sort-alpha-desc" aria-hidden="true"></i></a>
                  </th>
                  <th>2ºApellido
                    <a href="responsable.php?order=<?php echo 'ap2_asc'; ?>" class="text-reset"><i class="fa fa-sort-alpha-asc" aria-hidden="true"></i></a>
                    <a href="responsable.php?order=<?php echo 'ap2_dsc'; ?>" class="text-reset"><i class="fa fa-sort-alpha-desc" aria-hidden="true"></i></a>
                  </th>
                  <th>Promoción
                    <a href="responsable.php?order=<?php echo 'prom_asc'; ?>" class="text-reset"><i class="fa fa-sort-alpha-asc" aria-hidden="true"></i></a>
                    <a href="responsable.php?order=<?php echo 'prom_dsc'; ?>" class="text-reset"><i class="fa fa-sort-alpha-desc" aria-hidden="true"></i></a>
                  </th>
                  <th>Periodo
                    <a href="responsable.php?order=<?php echo 'per_asc'; ?>" class="text-reset"><i class="fa fa-sort-alpha-asc" aria-hidden="true"></i></a>
                    <a href="responsable.php?order=<?php echo 'per_dsc'; ?>" class="text-reset"><i class="fa fa-sort-alpha-desc" aria-hidden="true"></i></a>
                  </th>
                  <th>Status
                    <a href="responsable.php?order=<?php echo 'sta_asc'; ?>" class="text-reset"><i class="fa fa-sort-alpha-asc" aria-hidden="true"></i></a>
                    <a href="responsable.php?order=<?php echo 'sta_dsc'; ?>" class="text-reset"><i class="fa fa-sort-alpha-desc" aria-hidden="true"></i></a>
                  </th>
                  <th class="text-center">Acción</th>
                </tr>
              </thead>
              <?php
              include 'conex.php';
              if (isset($_POST['option'])) {
                $bus = $_POST['buscar'];
                $op = $_POST['option'];

                switch ($op) {
                  case 'radio_nombre':
                    $con = "and usuario.nombre like '%$bus%'";
                    break;
                  case 'radio_ap1':
                    $con = "and usuario.apellido1 like '%$bus%'";
                    break;
                  case 'radio_ap2':
                    $con = "and usuario.apellido2 like '%$bus%'";
                    break;
                  case 'radio_promo':
                    $con = "and promocion.promocion like '%$bus%'";
                    break;
                  case 'radio_periodo':
                    $con = "and promoyear.promocion like '%$bus%'";
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
                  case 'nom_asc':
                    $ord = "ORDER BY usuario.nombre ASC";
                    break;
                  case 'nom_dsc':
                    $ord = "ORDER BY usuario.nombre DESC";
                    break;
                  case 'ap1_asc':
                    $ord = "ORDER BY usuario.apellido1 ASC";
                    break;
                  case 'ap1_dsc':
                    $ord = "ORDER BY usuario.apellido1 DESC";
                    break;
                  case 'ap2_asc':
                    $ord = "ORDER BY usuario.apellido2 ASC";
                    break;
                  case 'ap2_dsc':
                    $ord = "ORDER BY usuario.apellido2 DESC";
                    break;
                  case 'prom_asc':
                    $ord = "ORDER BY promocion.promocion ASC";
                    break;
                  case 'prom_dsc':
                    $ord = "ORDER BY promocion.promocion DESC";
                    break;
                  case 'per_asc':
                    $ord = "ORDER BY promoyear.promocion ASC";
                    break;
                  case 'per_asc':
                    $ord = "ORDER BY promoyear.promocion DESC";
                    break;
                  case 'sta_asc':
                    $ord = "ORDER BY userhist.statusUserhist ASC";
                    break;
                  case 'sta_dsc':
                    $ord = "ORDER BY userhist.statusUserhist DESC";
                    break;
                  default:
                    $ord = "";
                    break;
                }
              } else {
                $ord = "";
              }
              $con_res = "SELECT usuario.nombre,usuario.apellido1,usuario.apellido2, promocion.promocion, promoyear.promocion,usuario.id_usuario,userhist.statusUserhist 
                FROM usuario
                LEFT JOIN userhist ON userhist.fk_usuario = usuario.id_usuario 
                LEFT JOIN promocion ON userhist.fk_promo = promocion.id_promocion
                INNER JOIN promoyear
                ON promoyear.id_promoyear = promocion.fk_promoyear
                WHERE usuario.cargo='p' $con $ord";

              $r = mysqli_query($link, $con_res);
              while ($a = mysqli_fetch_array($r)) { ?>
                <tr>
                  <td><?php echo $a[0]; ?> </td>
                  <td><?php echo $a[1]; ?> </td>
                  <td><?php echo $a[2]; ?> </td>
                  <td><?php echo $a[3]; ?> </td>
                  <td><?php echo $a[4]; ?> </td>
                  <td><?php if (($a[6]) == 1) {
                        echo "Activo";
                      } else {
                        echo "Inactivo";
                      }; ?>
                  </td>
                  <td>
                    <a href="modificarResponsable.php?modRes=<?php echo $a[5]; ?>"><i class="fa fa-pencil-square-o fa-2x bg-transparent text-danger" aria-hidden="true"></i></a>
                    <a data-toggle="modal" data-target="#modalElimFab<?php echo $a[5]; ?>"><i class="fa fa-trash-o fa-2x bg-transparent text-danger" aria-hidden="true"></i></a>
                    <!-- Modal Eliminar-->
                    <div class="modal fade" id="modalElimFab<?php echo $a[5]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                            <a href="delete.php?simpDeleteRes=<?php echo $a[5]; ?>" class="btn btn-danger" id="enviarf" type="submit">Eliminar</a>
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
              <a class="btn btn-outline-danger border-0" href="fabrica.php">FABRICA</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-outline-danger border-0" href="promocion.php">PROMOCIÓN</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-outline-danger border-0" href="coder.php">CODER</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-outline-danger border-0 active" href="responsable.php">RESPONSABLE</a>
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
              <a class="btn btn-outline-danger border-0 text-capitalize disabled" href="#"> responsable: <?php echo $_SESSION['name']; ?> </a>
            </li>
            <li class="nav-item">
              <a class="btn btn-outline-danger border-0" href="cerrar.php">Cerrar Sesión</a>
            </li>
          </ul>
        </nav>
      </header>

      <section class="container">
        <div class="row" id="tablafabrica">
          <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="col-md-12">
              <br>
              <h1 class="text-danger pull-left">RESPONSABLE</h1>
              <br>
            </div>
            <br>
            <div class="col-md-12 d-flex justify-content-start">
              <form class="form-inline" method="post">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="buscar">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" id="inlineRadio2" value="radio_promo" name="option">
                  <label class="form-check-label" for="inlineRadio2">Promoción</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" id="inlineRadio2" value="radio_periodo" name="option">
                  <label class="form-check-label" for="inlineRadio2">Periodo</label>
                </div>
                <button class="btn btn-outline-danger my-2 my-sm-0 busqueda" type="submit">Search</button>
              </form>
            </div>
            <br>
            <table id="tablarespons" class="table table-striped table-bordered">
              <thead>
                <tr class="bg-primary text-white tituloTabla">
                  <th>Promoción
                    <a href="responsable.php?order=<?php echo 'prom_asc'; ?>" class="text-reset"><i class="fa fa-sort-alpha-asc" aria-hidden="true"></i></a>
                    <a href="responsable.php?order=<?php echo 'prom_dsc'; ?>" class="text-reset"><i class="fa fa-sort-alpha-desc" aria-hidden="true"></i></a>
                  </th>
                  <th>Periodo
                    <a href="responsable.php?order=<?php echo 'per_asc'; ?>" class="text-reset"><i class="fa fa-sort-alpha-asc" aria-hidden="true"></i></a>
                    <a href="responsable.php?order=<?php echo 'per_dsc'; ?>" class="text-reset"><i class="fa fa-sort-alpha-desc" aria-hidden="true"></i></a>
                  </th>
                  <th>Status
                    <a href="responsable.php?order=<?php echo 'sta_asc'; ?>" class="text-reset"><i class="fa fa-sort-alpha-asc" aria-hidden="true"></i></a>
                    <a href="responsable.php?order=<?php echo 'sta_dsc'; ?>" class="text-reset"><i class="fa fa-sort-alpha-desc" aria-hidden="true"></i></a>
                  </th>
                  <th class="text-center">Acción</th>
                </tr>
              </thead>
              <?php
              include 'conex.php';
              if (isset($_POST['option'])) {
                $bus = $_POST['buscar'];
                $op = $_POST['option'];

                switch ($op) {
                  case 'radio_promo':
                    $con = "and promocion.promocion like '%$bus%'";
                    break;
                  case 'radio_periodo':
                    $con = "and promoyear.promocion like '%$bus%'";
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
                  case 'per_asc':
                    $ord = "ORDER BY promoyear.promocion ASC";
                    break;
                  case 'per_asc':
                    $ord = "ORDER BY promoyear.promocion DESC";
                    break;
                  case 'sta_asc':
                    $ord = "ORDER BY userhist.statusUserhist ASC";
                    break;
                  case 'sta_dsc':
                    $ord = "ORDER BY userhist.statusUserhist DESC";
                    break;
                  default:
                    $ord = "";
                    break;
                }
              } else {
                $ord = "";
              }
              $con_res = "SELECT usuario.nombre,usuario.apellido1,usuario.apellido2, promocion.promocion, promoyear.promocion,usuario.id_usuario,userhist.statusUserhist 
                FROM usuario LEFT JOIN userhist ON userhist.fk_usuario = usuario.id_usuario 
                LEFT JOIN promocion ON userhist.fk_promo = promocion.id_promocion 
                INNER JOIN promoyear
                ON promoyear.id_promoyear = promocion.fk_promoyear
                WHERE usuario.cargo='p' and userhist.fk_usuario = '$_SESSION[id]' $con $ord";

              $r = mysqli_query($link, $con_res);
              while ($a = mysqli_fetch_array($r)) { ?>
                <tr>
                  <td><?php echo $a[3]; ?> </td>
                  <td><?php echo $a[4]; ?> </td>
                  <td><?php if (($a[6]) == 1) {
                        echo "Activo";
                      } else {
                        echo "Inactivo";
                      }; ?>
                  </td>
                  <td>
                    <a href="modificarResponsable.php?modRes=<?php echo $a[5]; ?>"><i class="fa fa-pencil-square-o fa-2x bg-transparent text-danger" aria-hidden="true"></i></a>
                    <a data-toggle="modal" data-target="#modalElimFab<?php echo $a[5]; ?>"><i class="fa fa-trash-o fa-2x bg-transparent text-danger" aria-hidden="true"></i></a>
                    <!-- Modal Eliminar-->
                    <div class="modal fade" id="modalElimFab<?php echo $a[5]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                            <a href="delete.php?simpDeleteRes=<?php echo $a[5]; ?>" class="btn btn-danger" id="enviarf" type="submit">Eliminar</a>
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
    }
  }
  ?>


  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/script.js"></script>

</body>

</html>