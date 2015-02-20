<!DOCTYPE html>
<html>
<head>
	<title>Agregar Usuarios</title>
	<?php $this->load->view('headers/librerias')?>;
</head>
<body>
<?php $this->load->view('headers/menu')?>;
<div class="container container2">
<div class="row">
	<div id="contenedor" class="col-md-4 col-md-offset-4">

	<form class="form2" role="form" method="POST" action="<?php echo base_url('index.php/usuarios/agregar')?>">
    <div class="form-group">
    <label for="Usuario">Usuario</label>
    <input type="text" class="form-control" id="usuario" name="usuario"
           placeholder="Ingrese un Usuario" required >
  	</div>
   <div class="form-group">
    <label for="pass">Contraseña</label>
    <input type="password" class="form-control" id="pass" name="pass"
           placeholder="Ingrese contraseña" required="">
  </div>
     <div class="form-group">
    <label for="repass">Re-Contraseña</label>
    <input type="password" class="form-control" id="repass" name="repass"
           placeholder="Repita contraseña" required="">
  </div>
  <div class="form-group">

    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre"
           placeholder="Ingresa tu nombre" required="">
  </div>
  <div class="form-group">
    <label for="apellido">Email</label>
    <input type="email" class="form-control" id="email" name="email"
           placeholder="Ingresa tu email" required="">
  </div>

  </div>
    <button type="submit" class="btn btn-success">Registrar</button>
    </form>
</div>

<div class="alert alert-info" style="visibility:<?php if(isset($mensaje)){echo 'visible';}else{echo 'hidden';} ?>;">
  <?=validation_errors();?></div>
</body>
</html>