<html>
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<?php $this->load->view('headers/librerias') ?>;
</head>
<body>
	<div class="row">
	<div id="contenedor" class="col-md-4 col-md-offset-4">
	<h1>Iniciar Sesion</h1>
		<form  class="form1" role="form" method="POST" action="<?php echo base_url('index.php/login/loguear')?>">
  <div class="form-group">
    <label for="usuario">Usuario</label>
    <input type="text" class="form-control" id="usuario" name="usuario"
           placeholder="Introduce tu Usuario" required="">
  </div>
  <div class="form-group">
    <label for="pass">Contraseña</label>
    <input type="password" class="form-control" id="pass" name="pass"
           placeholder="Contraseña" required="">
  </div>
  
  <button type="submit" class="btn btn-success">Iniciar</button>
  <div class="alert alert-info"><?php if(isset($mensaje)) echo $mensaje; ?>
<?=validation_errors();?></div>
</form>
	</div>
</div>

</body>
</html>