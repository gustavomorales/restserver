<!DOCTYPE html>
<html>
<head>
	<title>Agregar Usuarios</title>
	<?php $this->load->view('headers/librerias')?>;
</head>
<body>
<?php $this->load->view('headers/menu')?>;
<div class="container container2">
<h1>Registro de Usuarios</h1>
<div class="row">
	<div id="contenedor" class="col-md-4 col-md-offset-4">

	<form class="form2" role="form" method="POST" action="<?php echo base_url('index.php/users/agregar')?>">
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
      <button type="submit" class="btn btn-success btn1 btn-block">Registrar</button>
  </div>

    </form>
</div>

<div class="alert alert-info" style="visibility:<?php if(isset($mensaje)){echo 'visible';}else{echo 'hidden';} ?>;">
  <?php echo $mensaje;?>
  <?=validation_errors();?></div>

<div class="container" style="visibility:<?php if(isset($getusuario)){echo 'visible';}else{echo 'hidden';} ?>;">
  <div class="table-responsive div1">
  <table class="table table-hover" >
  <thead>
  <tr>
  <th>Usuario</th>
  <th>Nombre</th>
  <th>Email</th>

  </tr>
  </thead>
  <tbody>

  <?php

   if(isset($getusuario)){

    foreach ($getusuario->result() as $datos) {
    
    echo '<tr>';
    echo '<td>'.$datos->usuario.'</td>';
    echo '<td>'.$datos->nombre.'</td>';
    echo '<td>'.$datos->email.'</td>';
   
    echo '</tr>';
    }
  }


  ?>
  </tbody>  
</table>
</div>

</div>


</body>
</html>