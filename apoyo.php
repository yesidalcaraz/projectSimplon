<div class="row"> 
    <div class="col-xs-12 col-md-12 col-lg-12">
    <button class="btn btn-danger" id="bagregar" href="#formularios, #tablafabrica" type="button" data-toggle="collapse" data-target="#formularios, #tablafabrica" aria-expanded="false" aria-controls="formularios">
    Fabrica
    </button> 
</div>
</div>
    
 
    <!-- tabla de fabrica-->

<div class="row collapse" id="tablafabrica">
      
     
        <div class="col-xs-12 col-md-12 col-lg-12 tablaconsulta">
       
        <table id="tablafabrica" class="table table-striped table-bordered">
				<thead>
					<tr class="bg-primary text-white tituloTabla">
						<th>Fabrica</th>
						<th>Status</th>
						<th class="text-center">Acción</th>
					</tr>
				</thead>
          <?php
    include 'conex.php';
        $con = "select fabrica.fabrica, fabrica.fabricaStatus, fabrica.id_fabrica
        FROM fabrica;";
        $r = mysqli_query($link, $con);
    while ($a = mysqli_fetch_array($r)){?>
    <tr>
        <td><?php echo $a[0];?> </td>
        <td><?php if (($a[1]) == 1){
                echo "Activo";
                }
                else{ echo "Inactivo";
                };?> </td>
        <td><a href="modificarFab.php?modFab=<?php echo $a[2];?>">Editar</a> / 
            <a href="delete.php?simpDeleteFab=<?php echo $a[2];?>">Eliminar</a>
        </td>
    </tr>
    <div class="cajamensaje">

<?php

if(isset($_GET['msj'])){
    if($_GET['msj'] == 'Error'){
      echo '<script type="text/javascript">;
      alert("No se pudo realizar esta acción");
      window.location.replace ("index.php");
      </script>';

    }else{
      echo  '<script type="text/javascript">;
      alert("Éxito!");
      window.location.replace ("index.php");
      </script> ';
        
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
    <!--fin tabla fabrica-->     
    
    
    
    
    
<div class="collapse" id="formularios">   

      <!-- row fabrica-->
<div id="fabrica">   
    <h1>Fábrica</h1>
    <form action="insert.php" method="post" id="formFabrica">
      <div class="form-row">
        <div class="col">
        <label for="formGroupExampleInput">Nombre</label>
        <input type="text" name="fab" class="form-control v32" id="nombreFabrica"  placeholder="Nombre de fabrica">
        <span id="mensaje"></span>
        </div>
        <div class="col">
        <label for="formGroupExampleInput">Ciudad</label>
        <select name="ciudadf" id="fabciudad" class="form-control">
        <?php 
            include 'conex.php';
            $consulta = "select id_ciudad, ciudad from ciudad";
            $resultado = mysqli_query($link,$consulta);
            while ($arr = mysqli_fetch_array($resultado)) { ?>
                <option value="<?php echo $arr[0];?>">
                    <?php echo $arr[1];?>
                               
                </option>
         <?php      
         } 
          ?>
        </select>
        </div>
        <input type="hidden" name="oculto" value="1">
      </div> 

      <div class="row">
    <div class="col-xs-12 col-md-12 col-lg-12">
    <button class="btn btn-danger" id="enviarf" type="submit">Enviar</button>
    </div>   
</div> 
     
    </form>
</div>

  
    
    
    
</div>   
      <!--fin row fabrica-->
      
      <!--comienzo row promo-->
    
 <div class="row"> 
    <div class="col-xs-12 col-md-12 col-lg-12">
    <button class="btn btn-danger" id="bagregar2" href="#formularios2, #tablapromo" type="button" data-toggle="collapse" data-target="#formularios2, #tablapromo" aria-expanded="false" aria-controls="formularios2">
    Promoción
    </button> 
</div>
</div>   
    
    
 
 <div class="row collapse" id="tablapromo"><!-- tabla de promo-->
      
      <div class="col-xs-12 col-md-12 col-lg-12 tablaconsulta">
        
       
        <table id="tabla" class="table table-striped table-bordered">
				<thead>
					<tr class="bg-primary text-white tituloTabla">
						<th>Promoción</th>
						<th>Fábrica</th>
						<th>Status</th>
						<th class="text-center">Acción</th>
					</tr>
				</thead>
          <?php
    include 'conex.php';
        $con = "select promocion.promocion, promocion.fk_fabrica, promocion.statusPromocion, promocion.id_promocion
        FROM promocion 
        INNER JOIN fabrica 
        ON fabrica.id_fabrica = promocion.fk_fabrica;";
        $r = mysqli_query($link, $con);
    while ($a = mysqli_fetch_array($r)){?>
    <tr>
        <td><?php echo $a[0];?> </td>
        <td><?php echo $a[1];?> </td>
        <td><?php if (($a[2]) == 1){
                echo "Activo";
                }
                else{ echo "Inactivo";
                };?> </td>
        <td><a href="modificarPromo.php?modPromo=<?php echo $a[3];?>">Editar</a> / 
            <a href="delete.php?simpDeletePromo=<?php echo $a[3];?>">Eliminar</a>
        </td>
    </tr>
    <div class="cajamensaje">

<?php

if(isset($_GET['msj'])){
    if($_GET['msj'] == 'Error'){
      echo '<script type="text/javascript">;
      alert("No se pudo realizar esa acción");
      window.location.replace ("index.php");
      </script>';

    }else{
      echo  '<script type="text/javascript">;
      alert("Éxito");
      window.location.replace ("index.php");
      </script> ';
        
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
    
    <!-- fin tabla de promo-->
    
    
    
    
<div class="collapse" id="formularios2">     
<div id="promo">   
    <h1>Promo</h1>
    <form action="insert.php" method="post" id="formPromocion">
      <div class="form-group">
        <label for="formGroupExampleInput">Nombre</label>
        <input type="text" name="promo" class="form-control v32"  id="nombrePromocion" placeholder="Nombre de promoción">
        <span id="mensajepromo"></span>
      </div>
      <div class="form-row">
        <div class="col">
        <label for="formGroupExampleInput2">Año</label>
        <select name="promoy" id="promoyear" class="form-control">
        <?php 
            include 'conex.php';
            $consulta = "select id_promoyear, promoyear from promoyear";
            $resultado = mysqli_query($link, $consulta);
            while ($arr = mysqli_fetch_array($resultado)) { ?>
                <option value="<?php echo $arr[0];?>"selected>
                    <?php echo $arr[1];?>
                               
                </option>
         <?php      
         } 
          ?>
        </select>
        </div>
        <div class="col">
        <label for="formGroupExampleInput2">Fábrica</label>
        <select name="fabpromo" id="fabpromo" class="form-control v32">
        <?php 
            include 'conex.php';
            $consulta = "select id_fabrica, fabrica from fabrica where fabricaStatus = 1";
            $resultado = mysqli_query($link, $consulta);
            while ($arr = mysqli_fetch_array($resultado)) { ?>
                <option value="<?php echo $arr[0];?>"selected>
                    <?php echo $arr[1];?>
                               
                </option>
            <?php     
             }  
            ?>
        </select>
        </div>
        <input type="hidden" name="oculto" value="2">
      </div>

      <div class="row">
    <div class="col-xs-12 col-md-12 col-lg-12">
    <button class="btn btn-danger" id="enviarp" type="submit">Enviar</button>
    </div>   
</div> 
    </form>
</div>     
    
</div> 
      <!--fin row promo-->
      
      <!--comiezo row coders-->
    
<div class="row"> 
    <div class="col-xs-12 col-md-12 col-lg-12 ">
    <button class="btn btn-danger" id="bagregar3" href="#formularios3, #tablacoders" type="button" data-toggle="collapse" data-target="#formularios3, #tablacoders" aria-expanded="false" aria-controls="formularios3">
    Coders
    </button> 
</div>
</div>    
    
    
 <div class="row collapse" id="tablacoders"><!-- tabla de coders-->
      
      <div class="col-xs-12 col-md-12 col-lg-12 tablaconsulta">
        
       
        <table id="tabla" class="table table-striped table-bordered">
				<thead>
					<tr class="bg-primary text-white tituloTabla">
						<th>Nombre</th>
						<th>1º Apellido</th>
                        <th>2º Apellido</th>
						<th>Promoción</th>
						<th>Fábrica</th>
                        <th>Status</th>
						<th class="text-center">Acción</th>
					</tr>
				</thead>
          <?php
    include 'conex.php';
        $con = "select coder.nombre, coder.apellido1, coder.apellido2, promocion.promocion, fabrica.fabrica, status, coder.id_coders
        FROM coder INNER JOIN promocion
        ON promocion.id_promocion = coder.fk_promocion
        INNER JOIN fabrica 
        ON fabrica.id_fabrica = promocion.fk_fabrica;";
        $r = mysqli_query($link, $con);
    while ($a = mysqli_fetch_array($r)){?>
    <tr>
        <td><?php echo $a[0];?> </td>
        <td><?php echo $a[1];?> </td>
        <td><?php echo $a[2];?> </td>
        <td><?php echo $a[3];?> </td>
        <td><?php echo $a[4];?> </td>
        <td><?php if (($a[5]) == 1){
                echo "Activo";
                }
                else{ echo "Inactivo";
                };?> </td>
        <td><a href="modificarCoder.php?modCoder=<?php echo $a[6];?>">Editar</a> / 
            <a href="delete.php?simpDeleteCoder=<?php echo $a[6];?>">Eliminar</a>
        </td>
    </tr>
    <div class="cajamensaje">

<?php

if(isset($_GET['msj'])){
  if($_GET['msj'] == 'Error'){
    echo '<script type="text/javascript">;
    alert("No se pudo realizar esa acción");
    window.location.replace ("index.php");
    </script>';

  }else{
    echo  '<script type="text/javascript">;
    alert("Éxito");
    window.location.replace ("index.php");
    </script> ';
      
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
    
      <!-- fin tabla de coder-->   
      
    
    
<div class="collapse" id="formularios3"> 
 <div id="coders"> 
     <h1>Coders</h1>
    <form action="insert.php" method="post" id="formCoders">
      <div class="form-group">
        <label for="formGroupExampleInput">Nombre</label>
        <input type="text" name="nomc" class="form-control v24"  id="nombreCoder" placeholder="Nombre de coder">
        <span id="mensajenombrecoder"></span>
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput2">1er Apellido</label>
        <input type="text" name="apec1" class="form-control v50"  id="apellidoCoder1" placeholder="Apellido del coder">
        <span id="mensajeapellidocoder1"></span>
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput2">2do Apellido</label>
        <input type="text" name="apec2" class="form-control v50"  id="apellidoCoder2" placeholder="Apellido del coder">
        <span id="mensajeapellidocoder2"></span>
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput">Fecha de nacimiento</label>
        <input type="text" name="anac" class="form-control vdate" id="nacimientoCoder"  placeholder="Fecha de nacimiento aaaa-mm-dd">
        <span id="mensajenacimientocoder"></span>
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput2">DNI</label>
        <input type="text" name="dni" class="form-control v10" id="dniCoder"  placeholder="No. Identificación">
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
                <option value="<?php echo $arr[0];?>"selected>
                    <?php echo $arr[1];?>
                               
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
                <option value="<?php echo $arr[0];?>"selected>
                    <?php echo $arr[1];?>
                               
                </option>
            <?php      }  ?>
        </select>
        </div>
        <input type="hidden" name="oculto" value="3">
      </div>  
      <div class="row">
    <div class="col-xs-12 col-md-12 col-lg-12">
    <button class="btn btn-danger" id="enviarc" type="submit">Enviar</button>
    </div>   
</div> 
    </form>
    
</div>     
    
</div> 
    <!--fin row coders-->  
    
    
    

    <!--fin formulario-->  
      
    <div class="mensaje"> 
      
   
      
      
      
      </section>