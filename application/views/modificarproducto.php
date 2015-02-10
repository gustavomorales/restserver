<!DOCTYPE html>
<html>
<head>
	<title>Modificar Producto</title>
	<?php $this->load->view('headers/librerias');?>

</head>
<body>
<?php $this->load->view('headers/menu');?>

<h1 class="h1">Modificar Producto</h1>

<div class="row">
	<div id="contenedor" class="col-md-4 col-md-offset-4">

	<form class="form2" role="form" method="POST" action="<?php echo base_url('index.php/productos/agregarproducto')?>">

  	    <div class="form-group">
    <label for="Producto">Producto</label>
    <input type="text" class="form-control" id="producto" name="producto"
           placeholder="Nombre del Producto" required value="<?php if(isset($producto)){echo $producto;}?>">
  	</div>


  <div class="form-group">

    <label for="Precio">Precio</label>
    <input type="text" class="form-control" id="precio" name="precio"
           placeholder="Precio del Producto" required="" value="<?php if(isset($precio)){echo $precio;}?>">
  </div>
  <div class="form-group">
    <label for="Cantidad">Cantidad</label>
    <input type="text" class="form-control" id="cantidad" name="cantidad"
           placeholder="Ingrese la cantidad" required="" value="<?php if(isset($cantidad)){echo $cantidad;}?>">
  </div>
    <div class="form-group">
    <label for="Unidad">Unidad</label>
    <input type="text" class="form-control" id="unidad" name="unidad"
           placeholder="Ingrese la unidad" value="<?php if(isset($unidad)){echo $unidad;}?>" >
  </div>

    <!--<input type="email" class="form-control" id="idioma" name="idioma"
           placeholder="Seleccione un idioma" required="">-->
  </div>
    <button type="submit" class="btn btn-success btn1"> Guardar </button>
    </form>
</div>
</div>

</body>
</html>