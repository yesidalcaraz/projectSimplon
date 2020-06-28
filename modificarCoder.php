<?php session_start()?>
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
      if ($_SESSION['tipo']=='a') { ?>
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
          <a class="btn btn-outline-danger border-0" href="formador.php" >FORMADOR</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-outline-danger border-0" href="nuevoUsuario.php" >NUEVO USUARIO</a>
        </li>
      </ul> 
      <ul class="nav justify-content-end align-self-center">
        <li class="nav-item">
          <a class="btn btn-outline-danger border-0 text-capitalize disabled" href="#" > Admin: <?php echo $_SESSION['name']; ?> </a>
        </li>
        <li class="nav-item">
          <a class="btn btn-outline-danger border-0" href="cerrar.php" >Cerrar Sesión</a>
        </li>
      </ul>               
    </nav>          
  </header>  
  <br>
  <section class="container-fluid row">
    <div class="card card card w-50 mod">
      <h4 class="card-header text-danger">
        MODIFICAR CODER
      </h4>
    <div class="card-body">
      <?php
      $mod3 = $_GET['modCoder'];
      $sqlcon3="select nombre, apellido1, apellido2, dni, nacimiento, nacionalidad, fk_promocion from coder where id_coders = '$mod3' ";
      include 'conex.php';
      $r3= mysqli_query($link,$sqlcon3);
      $a3 = mysqli_fetch_array($r3);
      ?> 
      <form method="post">
            <div class="form-group">
              <label for="formGroupExampleInput">Nombre</label>
              <input type="text" name="nomc" class="form-control v24" id="nombreCoder" value="<?php echo $a3[0];?>">
              <span id="mensajenombrecoder"></span>
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">1º Apellido</label>
              <input type="text" name="apec1" class="form-control v50" id="apellidoCoder1" required value="<?php echo $a3[1];?>">
              <span id="mensajeapellidocoder1"></span>
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">2º Apellido</label>
              <input type="text" name="apec2" class="form-control v50"   id="apellidoCoder2" required  value="<?php echo $a3[2];?>">
              <span id="mensajeapellidocoder2">
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput">Fecha de nacimiento</label>
              <input type="text" name="anac" class="form-control vdate" id="nacimientoCoder"  required value="<?php echo $a3[4];?>">
              <span id="mensajenacimientocoder"></span>
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">DNI</label>
              <input type="text" name="dni" class="form-control v10" id="dniCoder" required value="<?php echo $a3[3];?>">
              <span id="mensajednicoder"></span>
            </div>
            <div class="form-row">
              <div class="col">
              <label for="formGroupExampleInput2">Nacionalidad</label>
              <select required name="nac" id="nac" class="form-control">
              <?php 
                  include 'conex.php';
                  $consulta3 = "select id_pais, nacionalidad from pais";
                  $resultado3 = mysqli_query($link, $consulta3);
                  while ($arr3 = mysqli_fetch_array($resultado3)) { ?>
                      <option value="<?php echo $arr3[0];?>"                    
                        <?php if ($a3[5]== $arr3[0]) 
                          {echo 'selected="selected"';} ?> >
                        <?php echo $arr3[1]; ?>
                      </option>
                  <?php      }  ?>
              </select>
              </div>
              <div class="col">
              <label for="formGroupExampleInput2">Promoción</label>
              <select name="fknazi" id="fknazi" class="form-control">
              <?php 
                  include 'conex.php';
                  $consulta3 = "select id_promocion, promocion from promocion where statusPromocion = 1";
                  $resultado3 = mysqli_query($link, $consulta3);
                  echo $consulta3;
                  while ($arr3 = mysqli_fetch_array($resultado3)) { ?>
                      <option value="<?php echo $arr3[0];?>"                    
                        <?php if ($a3[6]== $arr3[0]) 
                          {echo 'selected="selected"';} ?> >
                        <?php echo $arr3[1]; ?>
                      </option>
                  <?php      }  ?>
              </select>
              </div>
              
            </div>  
            
            <div class="col-xs-12 col-md-12 col-lg-12 ">
                        <div class="modal-footer border-0">
                            <a href="fabrica.php" class="btn btn-secondary">Cancelar</a>
                            <button class="btn btn-danger" id="enviarf" type="submit">Enviar</button>
                        </div>   
                    </div> 
          </form>
      
          <?php
          if(isset($_POST['nomc'])){ 
          $nomc  =$_POST['nomc'];
          $apec1  =$_POST['apec1'];
          $apec2  =$_POST['apec2'];
          $dni  =$_POST['dni'];
          $anac =$_POST['anac'];
          $nac  =$_POST['nac'];
          $fknazi= $_POST['fknazi'];
          
          $update3 ="update coder set 
          nombre ='$nomc', apellido1='$apec1', apellido2='$apec2', dni='$dni', nacimiento='$anac', nacionalidad='$nac', fk_promocion='$fknazi' where id_coders = '$mod3'";
      
          mysqli_query($link,$update3);         
          if (mysqli_error($link)){ ?>
            <script>document.location.href="coder.php";</script>
        <?php    
        }
        else{?>
            <script>document.location.href="coder.php";</script>
        <?php    
        }
    
        }
        echo mysqli_error($link);
          
      ?>
      </div>
    </div>
  </section>
  <!--Fin Modal Agregar-->
      <?php
      }elseif($_SESSION['tipo']=='p'){ ?>
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
          <a class="btn btn-outline-danger border-0" href="formador.php" >FORMADOR</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-outline-danger border-0" href="nuevoUsuario.php" >NUEVO USUARIO</a>
        </li>
      </ul> 
      <ul class="nav justify-content-end align-self-center">
        <li class="nav-item">
          <a class="btn btn-outline-danger border-0 text-capitalize disabled" href="#" > Admin: <?php echo $_SESSION['name']; ?> </a>
        </li>
        <li class="nav-item">
          <a class="btn btn-outline-danger border-0" href="cerrar.php" >Cerrar Sesión</a>
        </li>
      </ul>               
    </nav>          
  </header> 
  <br> 
  <section class="container-fluid row">
    <div class="card card card w-50 mod">
      <h4 class="card-header text-danger">
        MODIFICAR CODER
      </h4>
    <div class="card-body">
      <?php
      $mod3 = $_GET['modCoder'];
      $sqlcon3="select nombre, apellido1, apellido2, dni, nacimiento, nacionalidad, fk_promocion from coder where id_coders = '$mod3' ";
      include 'conex.php';
      $r3= mysqli_query($link,$sqlcon3);
      $a3 = mysqli_fetch_array($r3);
      ?> 
      <form method="post">
            <div class="form-group">
              <label for="formGroupExampleInput">Nombre</label>
              <input type="text" name="nomc" class="form-control v24" id="nombreCoder" value="<?php echo $a3[0];?>">
              <span id="mensajenombrecoder"></span>
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">1º Apellido</label>
              <input type="text" name="apec1" class="form-control v50" id="apellidoCoder1" required value="<?php echo $a3[1];?>">
              <span id="mensajeapellidocoder1"></span>
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">2º Apellido</label>
              <input type="text" name="apec2" class="form-control v50"   id="apellidoCoder2" required  value="<?php echo $a3[2];?>">
              <span id="mensajeapellidocoder2">
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput">Fecha de nacimiento</label>
              <input type="text" name="anac" class="form-control vdate" id="nacimientoCoder"  required value="<?php echo $a3[4];?>">
              <span id="mensajenacimientocoder"></span>
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">DNI</label>
              <input type="text" name="dni" class="form-control v10" id="dniCoder" required value="<?php echo $a3[3];?>">
              <span id="mensajednicoder"></span>
            </div>
            <div class="form-row">
              <div class="col">
              <label for="formGroupExampleInput2">Nacionalidad</label>
              <select required name="nac" id="nac" class="form-control">
              <?php 
                  include 'conex.php';
                  $consulta3 = "select id_pais, nacionalidad from pais";
                  $resultado3 = mysqli_query($link, $consulta3);
                  while ($arr3 = mysqli_fetch_array($resultado3)) { ?>
                      <option value="<?php echo $arr3[0];?>"                    
                        <?php if ($a3[5]== $arr3[0]) 
                          {echo 'selected="selected"';} ?> >
                        <?php echo $arr3[1]; ?>
                      </option>
                  <?php      }  ?>
              </select>
              </div>
              <div class="col">
              <label for="formGroupExampleInput2">Promoción</label>
              <select name="fknazi" id="fknazi" class="form-control">
              <?php 
                  include 'conex.php';
                  $consulta3 = "select id_promocion, promocion from promocion where statusPromocion = 1";
                  $resultado3 = mysqli_query($link, $consulta3);
                  echo $consulta3;
                  while ($arr3 = mysqli_fetch_array($resultado3)) { ?>
                      <option value="<?php echo $arr3[0];?>"                    
                        <?php if ($a3[6]== $arr3[0]) 
                          {echo 'selected="selected"';} ?> >
                        <?php echo $arr3[1]; ?>
                      </option>
                  <?php      }  ?>
              </select>
              </div>
              
            </div>  
            
            <div class="col-xs-12 col-md-12 col-lg-12 ">
                        <div class="modal-footer border-0">
                            <a href="fabrica.php" class="btn btn-secondary">Cancelar</a>
                            <button class="btn btn-danger" id="enviarf" type="submit">Enviar</button>
                        </div>   
                    </div> 
          </form>
      
          <?php
          if(isset($_POST['nomc'])){ 
          $nomc  =$_POST['nomc'];
          $apec1  =$_POST['apec1'];
          $apec2  =$_POST['apec2'];
          $dni  =$_POST['dni'];
          $anac =$_POST['anac'];
          $nac  =$_POST['nac'];
          $fknazi= $_POST['fknazi'];
          
          $update3 ="update coder set 
          nombre ='$nomc', apellido1='$apec1', apellido2='$apec2', dni='$dni', nacimiento='$anac', nacionalidad='$nac', fk_promocion='$fknazi' where id_coders = '$mod3'";
      
          mysqli_query($link,$update3);         
          if (mysqli_error($link)){ ?>
            <script>document.location.href="coder.php";</script>
        <?php    
        }
        else{?>
            <script>document.location.href="coder.php";</script>
        <?php    
        }
    
        }
        echo mysqli_error($link);
          
      ?>
      </div>
    </div>
  </section>
      <!--Fin Modal Agregar-->      

    <?php
      }    
    }
  
  ?>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/script.js"></script>
  <script type="text/javascript" src="js/fancy.js"></script>

</body>
</html>