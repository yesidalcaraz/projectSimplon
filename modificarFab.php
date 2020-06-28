<?php session_start()?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    
    <title>Simplon CRUD</title>
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
    <section class="container-fluid row">
        <div class="card card w-25 mod">
            <h4 class="card-header text-danger">
            MODIFICAR FABRICA
            </h4>
        <div class="card-body">
        <?php
            $mod1 = $_GET['modFab'];
            $sqlcon1="select fabrica, fk_ciudad from fabrica where id_fabrica = '$mod1' ";
            include 'conex.php';
            $r1= mysqli_query($link,$sqlcon1);
            $a1 = mysqli_fetch_array($r1);
            ?> 
            <form method="post">
                <div class="form-group">
                    <label for="formGroupExampleInput">Nombre</label>
                    <input type="text" name="fab" class="form-control" id="nombreFabrica"  value="<?php echo $a1[0];?>">
                    <span id="mensaje"></span>
                </div>

                <div class="form-group">
                <label for="formGroupExampleInput">Ciudad</label>
                    <select name="ciudadf" id="fabciudad" class="form-control">
                    <?php 
                        include 'conex.php';
                        $consulta1 = "select id_ciudad, ciudad from ciudad";
                        $resultado1 = mysqli_query($link, $consulta1);
                        while ($arr1 = mysqli_fetch_array($resultado1)) { ?>
                            <option value="<?php echo $arr1[0];?>"                    
                                <?php if ($a1[1]== $arr1[0]) 
                                {echo 'selected="selected"';} ?> >
                                <?php echo $arr1[1]; ?>
                            </option>
                        <?php      }  ?>
                    </select>
                    <input type="hidden" name="oculto" value="1">
                    </div>                   
                    
                    <div class="col-xs-12 col-md-12 col-lg-12 ">
                        <div class="modal-footer border-0">
                            <a href="fabrica.php" class="btn btn-secondary">Cancelar</a>
                            <button class="btn btn-danger" id="enviarf" type="submit">Enviar</button>
                        </div>   
                    </div> 
                </form>

                <?php
                    if(isset($_POST['fab'])){ 
                    $fab  =$_POST['fab'];
                    $ciudadf  =$_POST['ciudadf'];
    
                    
                    $update1 ="UPDATE fabrica SET 
                    fabrica ='$fab', fk_ciudad='$ciudadf' WHERE id_fabrica = '$mod1'";
    
                    mysqli_query($link,$update1);
                    
                    if (mysqli_error($link)){ ?>
                        <script>document.location.href="fabrica.php";</script>
                    <?php    
                    }
                    else{?>
                        <script>document.location.href="fabrica.php";</script>
                    <?php    
                    }
                
                    }
                    echo mysqli_error($link);
                    
                ?>
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