<!DOCTYPE html>
<html>
<head>
	<title>Crear Categorias, Marcas, Fabricantes, unidades</title>
	<?php $this->load->view('headers/librerias')?>;
</head>
<body>
<?php $this->load->view('headers/menu') ?>;
<div class="container container2">
<div class="row">
	<div id="contenedor" align="center" class="col-md-4 col-md-offset-4">

	<form class="form2" role="form" method="POST" action="<?php echo base_url('index.php/productos/agregarcategoria')?>">
    <div class="form-group">
    <label for="Categoria">Categoria</label>
    <input type="text" class="form-control" id="categoria" name="categoria"
           placeholder="Nombre de la Categoria" required value="<?php if(isset($user)){echo $user;}?>">
  	</div>

    <button type="submit" class="btn btn-success btn1 btn-block"> Guardar </button>
  </form>
  </div>
  </div>

  <div class="row">
	<div id="contenedor" align="center" class="col-md-4 col-md-offset-4">

	<form class="form2" role="form" method="POST" action="<?php echo base_url('index.php/productos/agregarfabricante')?>">
    <div class="form-group">
    <label for="Fabricante">Fabricante</label>
    <input type="text" class="form-control" id="fabricante" name="fabricante"
           placeholder="Nombre del fabricante" required value="<?php if(isset($user)){echo $user;}?>">
  	</div>

    <button type="submit" class="btn btn-success btn1 btn-block"> Guardar </button>
  </form>
  </div>
  </div>

  <div class="row">
	<div id="contenedor" align="center" class="col-md-4 col-md-offset-4">

	<form class="form2" role="form" method="POST" action="<?php echo base_url('index.php/productos/agregarmarca')?>">
    <div class="form-group">
    <label for="Marca">Marca</label>
    <input type="text" class="form-control" id="marca" name="marca"
           placeholder="Nombre de la Marca" required value="<?php if(isset($user)){echo $user;}?>">
  	</div>

    <button type="submit" class="btn btn-success btn1 btn-block"> Guardar </button>
  </form>
  </div>
  </div>
  <div class="row">
	<div id="contenedor" align="center" class="col-md-4 col-md-offset-4">

	<form class="form2" role="form" method="POST" action="<?php echo base_url('index.php/productos/agregarunidad')?>">
    <div class="form-group">
    <label for="Unidad">Unidad</label>
    <input type="text" class="form-control" id="unidad" name="unidad"
           placeholder="Tipo de Unidad" required value="<?php if(isset($user)){echo $user;}?>">
  	</div>

    <button type="submit" class="btn btn-success btn1 btn-block"> Guardar </button>
  </form>
  </div>
  </div>
  </div>
  <div class="alert alert-info" style="visibility:<?php if(isset($success)){echo 'visible';}else{echo 'hidden';} ?>;">
<?=validation_errors();?></div>
</body>
</html>