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

  <br>
  <section class="container-fluid row">
    <div class="card card w-50 mod">
      <h4 class="card-header text-danger">
        MODIFICAR RESPONSABLE
      </h4>
    <div class="card-body">
      <?php
      $mod3 = $_GET['modRes'];
      $sqlcon3= "SELECT usuario.nombre, usuario.apellido1, usuario.apellido2, usuario.id_usuario, usuario.cargo, promocion.id_promocion,promocion.fk_promoyear
      FROM promocion INNER JOIN userhist ON promocion.id_promocion=userhist.fk_promo INNER JOIN usuario ON usuario.id_usuario=userhist.fk_usuario 
      WHERE usuario.cargo = 'p'";
      include 'conex.php';
      $r3= mysqli_query($link,$sqlcon3);
      $a3 = mysqli_fetch_array($r3);
      ?> 
      <form method="post">
            <div class="form-group">
              <label for="formGroupExampleInput">Nombre</label>
              <input type="text" name="nomc" class="form-control v24" id="nombreres"  value="<?php echo $a3[0];?>">
              <span id="mensajeres"></span>
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">1º Apellido</label>
              <input type="text" name="apec1" class="form-control v50" id="aperes1"  value="<?php echo $a3[1];?>">
              <span id="mensajeaperes1"></span>
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">2º Apellido</label>
              <input type="text" name="apec2" class="form-control v50" id="aperes2" value="<?php echo $a3[2];?>">
              <span id="mensajeaperes2"></span>
            </div>
            <div class="form-row">
              <div class="col">
              <label for="formGroupExampleInput2">Promoción</label>
              <select name="promo" id="promo" class="form-control">
              <?php 
                  include 'conex.php';
                  $consulta3 = "select id_promocion, promocion from promocion where statusPromocion = 1";
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
              <label for="formGroupExampleInput2">Periodo</label>
              <select name="promoy" id="promoy" class="form-control">
              <?php 
                  include 'conex.php';
                  $consulta3 = "SELECT promoyear.id_promoyear, promoyear.promocion FROM promoyear";
                  $resultado3 = mysqli_query($link, $consulta3);
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
                <a href="responsable.php" class="btn btn-secondary">Cancelar</a>
                <button class="btn btn-danger" id="enviarR" type="submit" >Enviar</button>
              </div>   
            </div>
          </form>    
      
          <?php
          if(isset($_POST['nomc'])){ 
            $nomc  =$_POST['nomc'];
            $apec1  =$_POST['apec1'];
            $apec2  =$_POST['apec2'];
            $promocion  =$_POST['promo'];
            $periodo= $_POST['promoy'];
          
          
          $update1 ="UPDATE usuario SET 
          nombre ='$nomc', apellido1='$apec1', apellido2='$apec2' where id_usuario = '$mod3'";
          mysqli_query($link,$update1);
          $update2 ="UPDATE userhist SET statusUserhist = '0' WHERE fk_usuario = '$mod3'";
          mysqli_query($link,$update2);
          $insert1 ="INSERT into userhist (fk_usuario, fk_promo, statusUserhist) value ('$mod3','$promocion', '1')";
          mysqli_query($link,$insert1);

          
          if (mysqli_error($link)){ ?>
           <script>document.location.href="responsable.php";</script>
          <?php    
          }
          else{?>
             <script>document.location.href="responsable.php";</script>
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
              <a class="btn btn-outline-danger border-0 text-capitalize disabled" href="#"> Responsable: <?php echo $_SESSION['name']; ?> </a>
            </li>
            <li class="nav-item">
              <a class="btn btn-outline-danger border-0" href="cerrar.php">Cerrar Sesión</a>
            </li>
          </ul>
        </nav>
      </header>

  <br>
  <section class="container-fluid row">
    <div class="card card w-50 mod">
      <h4 class="card-header text-danger">
        MODIFICAR RESPONSABLE
      </h4>
    <div class="card-body">
      <?php
      $mod3 = $_GET['modRes'];
      $sqlcon3= "SELECT usuario.nombre, usuario.apellido1, usuario.apellido2, usuario.id_usuario, usuario.cargo, promocion.id_promocion,promocion.fk_promoyear
      FROM promocion INNER JOIN userhist ON promocion.id_promocion=userhist.fk_promo INNER JOIN usuario ON usuario.id_usuario=userhist.fk_usuario 
      WHERE usuario.cargo = 'p'";
      include 'conex.php';
      $r3= mysqli_query($link,$sqlcon3);
      $a3 = mysqli_fetch_array($r3);
      ?> 
      <form method="post">
            <div class="form-group">
              <label for="formGroupExampleInput">Nombre</label>
              <input type="text" name="nomc" class="form-control v24" id="nombreres"  value="<?php echo $a3[0];?>">
              <span id="mensajeres"></span>
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">1º Apellido</label>
              <input type="text" name="apec1" class="form-control v50" id="aperes1"  value="<?php echo $a3[1];?>">
              <span id="mensajeaperes1"></span>
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">2º Apellido</label>
              <input type="text" name="apec2" class="form-control v50" id="aperes2" value="<?php echo $a3[2];?>">
              <span id="mensajeaperes2"></span>
            </div>
            <div class="form-row">
              <div class="col">
              <label for="formGroupExampleInput2">Promoción</label>
              <select name="promo" id="promo" class="form-control">
              <?php 
                  include 'conex.php';
                  $consulta3 = "select id_promocion, promocion from promocion where statusPromocion = 1";
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
              <label for="formGroupExampleInput2">Periodo</label>
              <select name="promoy" id="promoy" class="form-control">
              <?php 
                  include 'conex.php';
                  $consulta3 = "SELECT promoyear.id_promoyear, promoyear.promocion FROM promoyear";
                  $resultado3 = mysqli_query($link, $consulta3);
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
                <a href="responsable.php" class="btn btn-secondary">Cancelar</a>
                <button class="btn btn-danger" id="enviarR" type="submit">Enviar</button>
              </div>   
            </div>
          </form>    
      
          <?php
          if(isset($_POST['nomc'])){ 
            $nomc  =$_POST['nomc'];
            $apec1  =$_POST['apec1'];
            $apec2  =$_POST['apec2'];
            $promocion  =$_POST['promo'];
            $periodo= $_POST['promoy'];
          
          
          $update1 ="UPDATE usuario SET 
          nombre ='$nomc', apellido1='$apec1', apellido2='$apec2' where id_usuario = '$mod3'";
          mysqli_query($link,$update1);
          $update2 ="UPDATE userhist SET statusUserhist = '0' WHERE fk_usuario = '$mod3'";
          mysqli_query($link,$update2);
          $insert1 ="INSERT into userhist (fk_usuario, fk_promo, statusUserhist) value ('$mod3','$promocion', '1')";
          mysqli_query($link,$insert1);

          
          if (mysqli_error($link)){ ?>
           <script>document.location.href="responsable.php";</script>
          <?php    
          }
          else{?>
             <script>document.location.href="responsable.php";</script>
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
    <script type="text/javascript" src="js/validarresponsable.js"></script>
</body>
</html>