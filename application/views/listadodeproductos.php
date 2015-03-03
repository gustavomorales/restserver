<!DOCTYPE html>
<html>
<head>
	<title>Listado de Productos</title>
	<?php $this->load->view('headers/librerias')?>;
</head>
<body>
<?php $this->load->view('headers/menu') ?>;




<div class="container" style="visibility:<?php if(isset($productos)){echo 'visible';}else{echo 'hidden';} ?>;">
  
  <div class="table-responsive div1">
  <table class="table table-hover" >
  <div class="alert alert-success" style="visibility:<?php if(isset($exito)){echo 'visible';}else{echo 'hidden';} ?>;"role="alert" ><?php if(isset($exito)){echo $exito;}?></div>
  <thead>
  <tr>
  <th>Id_producto</th>
  <th>Producto</th>
  <th>precio</th>
  <th>cantidad</th>
  <th>Unidad</th>
  <th>Fabricante</th>
  <th>Categoria</th>
  <th>Marca</th>
  <th></th>
  <th></th>

  </tr>
  </thead>
  <tbody>

  <?php

   if(isset($productos)){

    foreach ($productos->result() as $datos) {
    
    echo '<tr>';
    echo '<td style="vertical-align:middle">'.$datos->producto_id.'</td>';
    echo '<td style="vertical-align:middle">'.$datos->producto.'</td>';
    echo '<td style="vertical-align:middle">'.$datos->precio.'</td>';
    echo '<td style="vertical-align:middle">'.$datos->cantidad.'</td>';
    echo '<td style="vertical-align:middle">'.$datos->unidad.'</td>';
    echo '<td style="vertical-align:middle">'.$datos->fabricante.'</td>';
    echo '<td style="vertical-align:middle">'.$datos->categoria.'</td>';
    echo '<td style="vertical-align:middle">'.$datos->marca.'</td>';
    echo '<td> <a href="buscar?id='.$datos->producto_id.'" class="btn btn-warning "><i class="glyphicon glyphicon-pencil"></i></a>'."".'</td>';
    #echo '<td> <a href="eliminar?id='.$datos->producto_id.'" class="btn btn-danger"'." onclick='return confirm()'" .  '><i class="glyphicon glyphicon-trash"></i></a> '."".'</td>';
    echo  '<td>';
    echo anchor("productos/eliminar/?id={$datos->producto_id}", '<i class="glyphicon glyphicon-trash"></i>', array('onclick'=>"return confirm('¿Está seguro que desea eliminar {$datos->producto}?')", 'class' => 'btn btn-danger'));
    echo '</td>';
    echo '</tr>';
    }
  }





  ?>
  </tbody>  
</table>
</div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modificar Producto</h4>
      </div>
      <div class="modal-body">
<div class="row">
  <div id="contenedor" class="col-md-4 col-md-offset-4">

  <form class="form" role="form" method="POST" action="<?php echo base_url('index.php/productos/update')?>">
    
    <div class="form-group" style="display:none;">
    <label for="Producto_id">Producto_id</label>
    <input type="text" class="form-control" id="producto_id" name="producto_id"
           placeholder="Id Producto" required value="<?php if(isset($producto_id)){echo $producto_id;}?>">
    </div>
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
    <!--<input type="text" class="form-control" id="unidad" name="unidad"
           placeholder="Ingrese la unidad" value="<?php if(isset($unidad)){echo $unidad;}?>" >-->
        <select class="form-control" name="unidad" id="unidad">
        <option value= "<?php if(isset($unidad_id)){echo $unidad_id;}?>"><?php if(isset($unidad)){echo $unidad;}?></option>
        <?php
        foreach ($unidades->result() as $data) { ?>
        <option value= "<?= $data->id_unidad;?>"><?= $data->unidad;?> </option>  
       <?php  } 
        ?>
      </select>
  </div>
      <div class="form-group">
    <label for="Marca">Marca</label>
    <!--<input type="text" class="form-control" id="unidad" name="unidad"
           placeholder="Ingrese la unidad" value="<?php if(isset($unidad)){echo $unidad;}?>" >-->
        <select class="form-control" name="marca" id="marca">
        <option value= "<?php if(isset($marca_id)){echo $marca_id;}?>"><?php if(isset($marca)){echo $marca;}?></option>
        <?php
        foreach ($marcas->result() as $data) { ?>
        <option value= "<?= $data->id_marca;?>"><?= $data->marca;?> </option>  
       <?php  } 
        ?>
      </select>
  </div>

      <div class="form-group">
    <label for="Fabricante">Fabricante</label>
    <!--<input type="text" class="form-control" id="unidad" name="unidad"
           placeholder="Ingrese la unidad" value="<?php if(isset($unidad)){echo $unidad;}?>" >-->
        <select class="form-control" name="fabricante" id="fabricante">
        <option value= "<?php if(isset($fabricante_id)){echo $fabricante_id;}?>"><?php if(isset($fabricante)){echo $fabricante;}?></option>
        <?php
        foreach ($fabricantes->result() as $data) { ?>
        <option value= "<?= $data->id_fabricante;?>"><?= $data->fabricante;?> </option>  
       <?php  } 
        ?>
      </select>
  </div>

      <div class="form-group">
    <label for="Categoria">Categoria</label>
    <!--<input type="text" class="form-control" id="unidad" name="unidad"
           placeholder="Ingrese la unidad" value="<?php if(isset($unidad)){echo $unidad;}?>" >-->
        <select class="form-control" name="categoria" id="categoria">
        <option value= "<?php if(isset($categoria_id)){echo $categoria_id;}?>"><?php if(isset($categoria)){echo $categoria;}?></option>
        <?php
        foreach ($categorias->result() as $data) { ?>
        <option value= "<?= $data->id_categoria;?>"><?= $data->categoria;?> </option>  
       <?php  } 
        ?>
      </select>
  </div>

  </div>
  <button type="submit" class="btn btn-success "> Guardar </button>
  </form>


    <!--<input type="email" class="form-control" id="idioma" name="idioma"
           placeholder="Seleccione un idioma" required="">-->
  </div>
    
</div>
</div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-warning" data-dismiss="modal">Volver al Formulario</button>

      </div>
    </div>
  </div>
</div>



    <?php if(isset($success) == 'fail'){ ?>
    <script type="text/javascript">
         $(window).on('load', function(){
          $('#myModal').modal('show');
         })
    </script>
    <?php } ?>

      <div class="alert alert-info" style="visibility:<?php if(isset($success)){echo 'visible';}else{echo 'hidden';} ?>;"><?php if(isset($mensaje)) echo $mensaje; ?>
<?=validation_errors();?></div>
</div>
</body>
</html>
	
