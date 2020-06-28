<?php session_start()?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
          <a class="justify-content-start" href="index.php"><img src="img/logo3.png" class="logo3"></a>
          <ul class="nav justify-content-center align-self-center">
            <li class="nav-item">
              <a class="btn btn-outline-danger border-0" href="index.php">INICIO</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-outline-danger border-0" href="fabrica.php">FABRICA</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-outline-danger border-0 active" href="promocion.php">PROMOCION</a>
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
              <a class="btn btn-outline-danger border-0 text-capitalize disabled" href="#"> Admin: <?php echo $_SESSION['name']; ?> </a>
            </li>
            <li class="nav-item">
              <a class="btn btn-outline-danger border-0" href="cerrar.php">Cerrar Sesión</a>
            </li>
          </ul>
        </nav>
      </header>
<br>
<section class="container-fluid">
    <div class="card card w-50 mod">
        <h4 class="card-header text-danger">
        MODIFICAR PROMOCIÓN
        </h4>
    <div class="card-body">
    <?php
        $mod2 = $_GET['modPromo'];
        $sqlcon2="select promocion, id_promocion, fk_fabrica, fk_promoyear from promocion where id_promocion = '$mod2' ";
        include 'conex.php';
        $r2= mysqli_query($link,$sqlcon2);
        $a2 = mysqli_fetch_array($r2);
    ?> 
        <form method="post">
            <div class="form-group">
                <label for="formGroupExampleInput">Promoción</label>
                <input type="text" name="promo" class="form-control v24" id="nombrePromocion" value="<?php echo $a2[0];?>">
                <span id="mensajepromo"></span>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Periodo</label>
                        <select class="form-control" name="promoy" id="periodo" placeholder="Periodo">
                                <?php 
                        include 'conex.php';
                        $consulta_p = "SELECT promoyear.id_promoyear, promoyear.promocion FROM promoyear";
                        $resultado_p = mysqli_query($link, $consulta_p);
                        while ($arr_p = mysqli_fetch_array($resultado_p)) { ?>
                            <option value="<?php echo $arr_p[0];?>"                    
                                <?php if ($a2[3]== $arr_p[0]) 
                                {echo 'selected="selected"';} ?> >
                                <?php echo $arr_p[1]; ?>
                            </option>
                        <?php      }  ?>
                        </select>
                    </div>
                </div>        
                <div class="col">
                <label for="formGroupExampleInput2">Fábrica</label>
                <select name="fabpromo" id="fabpromo" class="form-control">
                <?php 
                    $consulta2 = "select id_fabrica, fabrica from fabrica where fabricaStatus = 1";
                    $resultado2 = mysqli_query($link, $consulta2);
                    while ($arr2 = mysqli_fetch_array($resultado2)) { ?>
                        <option value="<?php echo $arr2[0];?>"
                        <?php if ($a2[2]== $arr2[0]) 
                                {echo 'selected="selected"';} ?> >
                            <?php echo $arr2[1];?>                                       
                        </option>
                    <?php      }  ?>
                </select>
                </div>
                
            </div>  
            <div class="col-xs-12 col-md-12 col-lg-12 ">
                        <div class="modal-footer border-0">
                            <a href="fabrica.php" class="btn btn-secondary">Cancelar</a>
                            <button class="btn btn-danger" id="enviarp" type="submit">Enviar</button>
                        </div>   
                    </div> 
        </form>
        
            <?php
            if(isset($_POST['promo'])){ 
            $promo  =$_POST['promo'];
            $per  =$_POST['promoy'];
            $fabpromo  =$_POST['fabpromo'];
            
            $update2 ="UPDATE promocion INNER JOIN promoyear
            ON promoyear.id_promoyear=promocion.fk_promoyear
            set promocion.promocion ='$promo', promocion.fk_promoyear='$per', promocion.fk_fabrica='$fabpromo' 
            where id_promocion = '$mod2'";
            
            mysqli_query($link,$update2);               
            if (mysqli_error($link)){ ?>
                <script>document.location.href="promocion.php";</script>
            <?php    
            }
            else{?>
                <script>document.location.href="promocion.php";</script>
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
    else if ($_SESSION['tipo'] == 'p') { ?>
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
              <a class="btn btn-outline-danger border-0 active" href="promocion.php">PROMOCION</a>
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
<section class="container-fluid">
    <div class="card card w-50 mod">
        <h4 class="card-header text-danger">
        MODIFICAR PROMOCIÓN
        </h4>
    <div class="card-body">
    <?php
        $mod2 = $_GET['modPromo'];
        $sqlcon2="select promocion, id_promocion, fk_fabrica, fk_promoyear from promocion where id_promocion = '$mod2' ";
        include 'conex.php';
        $r2= mysqli_query($link,$sqlcon2);
        $a2 = mysqli_fetch_array($r2);
    ?> 
        <form method="post">
            <div class="form-group">
                <label for="formGroupExampleInput">Promoción</label>
                <input type="text" name="promo" class="form-control v24" id="nombrePromocion" value="<?php echo $a2[0];?>">
                <span id="mensajepromo"></span>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Periodo</label>
                        <select class="form-control" name="periodo" id="periodo" placeholder="Periodo">
                                <?php 
                        include 'conex.php';
                        $consulta_p = "SELECT promoyear.id_promoyear, promoyear.promocion FROM promoyear";
                        $resultado_p = mysqli_query($link, $consulta_p);
                        while ($arr_p = mysqli_fetch_array($resultado_p)) { ?>
                            <option value="<?php echo $arr_p[0];?>"                    
                                <?php if ($a2[3]== $arr_p[0]) 
                                {echo 'selected="selected"';} ?> >
                                <?php echo $arr_p[1]; ?>
                            </option>
                        <?php      }  ?>
                        </select>
                    </div>
                </div>        
                <div class="col">
                <label for="formGroupExampleInput2">Fábrica</label>
                <select name="fabpromo" id="fabpromo" class="form-control">
                <?php 
                     $consulta2 = "select id_fabrica, fabrica from fabrica where fabricaStatus = 1";
                     $resultado2 = mysqli_query($link, $consulta2);
                     while ($arr2 = mysqli_fetch_array($resultado2)) { ?>
                         <option value="<?php echo $arr2[0];?>"
                         <?php if ($a2[2]== $arr2[0]) 
                                 {echo 'selected="selected"';} ?> >
                             <?php echo $arr2[1];?>                                        
                        </option>
                    <?php      }  ?>
                </select>
                </div>
                
            </div>  
            <div class="col-xs-12 col-md-12 col-lg-12 ">
                        <div class="modal-footer border-0">
                            <a href="fabrica.php" class="btn btn-secondary">Cancelar</a>
                            <button class="btn btn-danger" id="enviarp" type="submit">Enviar</button>
                        </div>   
                    </div> 
        </form>
        
            <?php
            if(isset($_POST['promo'])){ 
            $promo  =$_POST['promo'];
            $per  =$_POST['promoy'];
            $fabpromo  =$_POST['fabpromo'];
            
            $update2 ="UPDATE promocion INNER JOIN promoyear
            ON promoyear.id_promoyear=promocion.fk_promoyear
            set promocion.promocion ='$promo', promocion.fk_promoyear='$per', promocion.fk_fabrica='$fabpromo' 
            where id_promocion = '$mod2'";

            mysqli_query($link,$update2);               
            if (mysqli_error($link)){ ?>
                <script>document.location.href="promocion.php";</script>
            <?php    
            }
            else{?>
                <script>document.location.href="promocion.php";</script>
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

<script type="text/javascript" src="js/validarpromo.js"></script>

</body>


