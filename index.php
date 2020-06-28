<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link href="css/style.css" rel="stylesheet" type="text/css">

  <title>Simplon CRUD</title>
</head>

<body>
  <?php
  if (isset($_SESSION['tipo'])) {
    if ($_SESSION['tipo'] == 'a') { ?>
      <header>
        <nav class="nav d-inline-flex p-2 d-flex justify-content-between nav-tabs border-bottom border-danger cabecera container-fluid">
          <a class="justify-content-start border-right border-danger" href="index.php"><img src="img/logo3.png" class="logo3"></a>
          <ul class="nav flex-column justify-content-end align-self-center border-left border-danger">
            <li class="nav-item">
              <a class="btn btn-outline-danger border-0 text-capitalize disabled" href="#"> Bienvenido: <?php echo $_SESSION['name']; ?> </a>
            </li>
            <li class="nav-item">
              <a class="btn btn-outline-danger border-0" href="cerrar.php">Cerrar Sesión</a>
            </li>
          </ul>
        </nav>
      </header>
      <br>
      <section class="container w-50">
        <!-- PERFIL ADMINISTRADOR -->
        <div class="row">
          <div class="col-xs-12 col-md-12 col-lg-12">
            <a class="text-white text-decoration-none btn btn-lg btn-block tituloTabla" href="fabrica.php">FÁBRICAS</a>
            <br>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-md-12 col-lg-12">
            <a class="text-white text-decoration-none btn btn-lg btn-block tituloTabla" href="promocion.php">PROMOCIONES</a>
            <br>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-md-12 col-lg-12 ">
            <a class="text-white text-decoration-none btn btn-lg btn-block tituloTabla" href="coder.php">CODERS</a>
            <br>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-md-12 col-lg-12 ">
            <a class="text-white text-decoration-none btn btn-lg btn-block tituloTabla" href="responsable.php">RESPONSABLES</a>
            <br>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-md-12 col-lg-12 ">
            <a class="text-white text-decoration-none btn btn-lg btn-block tituloTabla" href="formador.php">FORMADORES</a>
            <br>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-md-12 col-lg-12 ">
            <a class="text-white text-decoration-none btn btn-lg btn-block tituloTabla" href="nuevoUsuario.php">CREAR NUEVO USUARIO</a>
            <br>
          </div>
        </div>
      </section>
    <?php
    } elseif ($_SESSION['tipo'] == 'p') { ?>
      <header>
        <nav class="nav d-inline-flex p-2 d-flex justify-content-between nav-tabs border-bottom border-danger cabecera container-fluid">
          <a class="justify-content-start border-right border-danger" href="index.php"><img src="img/logo3.png" class="logo3"></a>
          <ul class="nav flex-column justify-content-end align-self-center border-left border-danger">
            <li class="nav-item">
              <a class="btn btn-outline-danger border-0 text-capitalize disabled" href="#"> Bienvenido: <?php echo $_SESSION['name']; ?> </a>
            </li>
            <li class="nav-item">
              <a class="btn btn-outline-danger border-0" href="cerrar.php">Cerrar Sesión</a>
            </li>
          </ul>
        </nav>
      </header>
      <br>
      <section class="container w-50">
        <!-- PERFIL RESPONSABLE -->
        <div class="row">
          <div class="col-xs-12 col-md-12 col-lg-12">
            <a class="text-white text-decoration-none btn btn-lg btn-block tituloTabla" href="fabrica.php">FÁBRICAS</a>
            <br>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-md-12 col-lg-12">
            <a class="text-white text-decoration-none btn btn-lg btn-block tituloTabla" href="promocion.php">PROMOCIONES</a>
            <br>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-md-12 col-lg-12 ">
            <a class="text-white text-decoration-none btn btn-lg btn-block tituloTabla" href="coder.php">CODERS</a>
            <br>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-md-12 col-lg-12 ">
            <a class="text-white text-decoration-none btn btn-lg btn-block tituloTabla" href="responsable.php">RESPONSABLES</a>
            <br>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-md-12 col-lg-12 ">
            <a class="text-white text-decoration-none btn btn-lg btn-block tituloTabla" href="formador.php">FORMADORES</a>
            <br>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-md-12 col-lg-12 ">
            <a class="text-white text-decoration-none btn btn-lg btn-block tituloTabla" href="nuevoUsuario.php">CREAR NUEVO USUARIO</a>
            <br>
          </div>
        </div>
      </section>
    <?php
    } elseif ($_SESSION['tipo'] == 'f') { ?>
      <header>
        <nav class="nav d-inline-flex p-2 d-flex justify-content-between nav-tabs border-bottom border-danger cabecera container-fluid">
          <a class="justify-content-start border-right border-danger" href="index.php"><img src="img/logo3.png" class="logo3"></a>
          <ul class="nav flex-column justify-content-end align-self-center border-left border-danger">
            <li class="nav-item">
              <a class="btn btn-outline-danger border-0 text-capitalize disabled" href="#"> Bienvenido: <?php echo $_SESSION['name']; ?> </a>
            </li>
            <li class="nav-item">
              <a class="btn btn-outline-danger border-0" href="cerrar.php">Cerrar Sesión</a>
            </li>
          </ul>
        </nav>
      </header>
      <br>
      <section class="container w-50">
        <!-- PERFIL FORMADOR -->
        <div class="row">
          <div class="col-xs-12 col-md-12 col-lg-12">
            <a class="text-white text-decoration-none btn btn-lg btn-block tituloTabla" href="fabrica.php">FÁBRICAS</a>
            <br>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-md-12 col-lg-12">
            <a class="text-white text-decoration-none btn btn-lg btn-block tituloTabla" href="promocion.php">PROMOCIONES</a>
            <br>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-md-12 col-lg-12 ">
            <a class="text-white text-decoration-none btn btn-lg btn-block tituloTabla" href="coder.php">CODERS</a>
            <br>
          </div>
        </div>
      </section>
    <?php
    }
  } else { ?>
    <!--Login-->
    <header>
      <nav class="nav d-inline-flex p-2 d-flex justify-content-between nav-tabs border-bottom border-danger cabecera container-fluid">
        <a class="justify-content-start" href="index.php"><img src="img/logo3.png" class="logoPrincipal"></a>
        <div class="col-xs-4 col-md-4 col-lg-4 loginarea">
          <form action="controlador.php" method="post">
            <h5 class="text-danger">Inicia Sesión</h5>
            <div class="form-group row">
              <div class="col-xs-8 col-md-8 col-lg-8">
                <div class="form-group row">
                  <div class="col-xs-12 col-md-12 col-lg-12 uplogincol">
                    <input type="text" class="form-control" name="user" id="user" placeholder="Usuario">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-12 col-md-12 col-lg-12 ">
                    <input type="password" class="form-control" name="pass" id="password" placeholder="Contraseña">
                  </div>
                </div>
              </div>
              <div class="col-xs-4 col-md-4 col-lg-4 submitbtn">
                <div class="form-group row ">
                  <br>
                  <input type="hidden" value="0" name="oculto">
                  <input type="submit" name="submit" class="col-xs-12 col-md-12 col-lg-12 form-control submitbutton btn btn-danger" value="Submit">
                </div>
              </div>
            </div>
            <span class="aviso">
              <?php 
                if (isset($_GET['msj'])) {
                    if ($_GET['msj']==0) {
                        echo "Clave Invalida";
                    }elseif($_GET['msj']==1){
                        echo "Email no existe";
                    }else{
                      echo "";
                    }
                }
              ?>
            </span>
          </form>
        </div>
      </nav>
    </header>
    <br>
    <section>
  <div class="container slider">
    <div id="carouselExampleIndicators" class="carousel" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
      </ol>
      <div class="carousel-inner">
      
        <div class="carousel-item active">
          <img class="d-block w-100" src="img/logo2.jpg" alt="Logo slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="img/img1.jpg" alt="First slide">
        </div>

        <div class="carousel-item">
          <img class="d-block w-100" src="img/img2.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="img/img3.jpg" alt="Third slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="img/img4.jpg" alt="Fourth slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="img/img5.jpg" alt="Fifth slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="img/img6.jpg" alt="Sixth slide">
        </div>
      </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon bg-danger" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon bg-danger" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    </div>
  </div>
  
</section>
  <?php }
  ?>
  

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <script type="text/javascript" src="js/script.js"></script>

</body>

</html>