<!DOCTYPE html>
<html>
<head>
	<title>Agregar Producto</title>
	<?php $this->load->view('headers/librerias')?>;
</head>
<body>

<?php $this->load->view('headers/menu') ?>;

<div class="container container2">
<h1 class="h1">Agregar Producto</h1>

<div class="row">
	<div id="contenedor" align="center" class="col-md-4 col-md-offset-4">

	<form class="form2" role="form" method="POST" action="<?php echo base_url('index.php/productos/agregarproducto')?>">
    <div class="form-group">
    <label for="Producto">Producto</label>
    <input type="text" class="form-control" id="producto" name="producto"
           placeholder="Nombre del Producto" required value="<?php if(isset($user)){echo $user;}?>">
  	</div>

  <div class="form-group">

    <label for="Precio">Precio</label>
    <input type="text" class="form-control" id="precio" name="precio"
           placeholder="Precio del Producto" required="" value="<?php if(isset($nom)){echo $nom;}?>">
  </div>
  <div class="form-group">
    <label for="Cantidad">Cantidad</label>
    <input type="text" class="form-control" id="cantidad" name="cantidad"
           placeholder="Ingrese la cantidad" required="" value="<?php if(isset($ape)){echo $ape;}?>">
  </div>
    <div class="form-group">
    <label for="Unidad">Unidad</label>
            <select class="form-control" name="unidad" id="unidad">
        <?php
        foreach ($unidad->result() as $data) { ?>
        <option value= "<?= $data->id_unidad;?>"><?= $data->unidad;?> </option>  
       <?php  } 
        ?>


</select>
  </div>
      <div class="form-group">
    <label for="Marca">Marca</label>
        <select class="form-control" name="marca" id="marca">
        <?php
        foreach ($marcas->result() as $data) { ?>
        <option value= "<?= $data->id_marca;?>"><?= $data->marca;?> </option>  
       <?php  } 
        ?>


</select>
  </div>
      <div class="form-group">
    <label for="Fabricante">Fabricante</label>
    <select class="form-control" name="fabricante" id="fabricante">
        <?php
        foreach ($fabricantes->result() as $data) { ?>
        <option value= "<?= $data->id_fabricante;?>"><?= $data->fabricante;?> </option>  
       <?php  } 
        ?>

</select>
  </div>
      <div class="form-group">
    <label for="Categoria">Categoria</label>
    <select class="form-control" name="categoria" id="categoria">
         <?php
        foreach ($categorias->result() as $data) { ?>
        <option value= "<?= $data->id_categoria;?>"><?= $data->categoria;?> </option>  
       <?php  } 
        ?>


</select>
  </div>

    <!--<input type="email" class="form-control" id="idioma" name="idioma"
           placeholder="Seleccione un idioma" required="">-->
  
    <button type="submit" class="btn btn-success btn1 btn-block"> Guardar </button>
  </form>
  </div>
  </div>

  <div class="container" style="visibility:<?php if(isset($getproducto)){echo 'visible';}else{echo 'hidden';} ?>;">
  <div class="table-responsive div1">
  <table class="table table-hover" >
  <thead>
  <tr>
  <th>Id_producto</th>
  <th>Producto</th>
  <th>precio</th>
  <th>cantidad</th>
  <th>Unidad</th>

  </tr>
  </thead>
  <tbody>

  <?php

   if(isset($getproducto)){

    foreach ($getproducto as $datos) {
    
    echo '<tr>';
    echo '<td>'.$datos->producto_id.'</td>';
    echo '<td>'.$datos->producto.'</td>';
    echo '<td>'.$datos->precio.'</td>';
    echo '<td>'.$datos->cantidad.'</td>';
    echo '<td>'.$datos->unidad.'</td>';
   
    echo '</tr>';
    }
  }


  ?>
  </tbody>  
</table>
</div>

</div>
    <div class="alert alert-info" style="visibility:<?php if(isset($success)){echo 'visible';}else{echo 'hidden';} ?>;">
  <?=validation_errors();?></div>
</div>
</body>
</html>