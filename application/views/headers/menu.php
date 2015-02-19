<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">CodeIgniter</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo base_url()?>index.php/productos">
            <span class="glyphicon glyphicon-plus "></span> Agregar</a></li>
            <li><a href="<?php echo base_url()?>index.php/productos/agregarvarios"> <span class="glyphicon glyphicon-pencil "></span>Agregar Varios</a></li>
            <li><a href="<?php echo base_url()?>index.php/usuarios"> <span class="glyphicon glyphicon-plus "></span>Usuarios</a></li>
            <li><a href="<?php echo base_url()?>index.php/productos/mostrarproductos"> <span class="glyphicon glyphicon-trash "></span>Listado de Productos</a></li>
            <li><a href="<?php echo base_url()?>index.php/login/logout"> <span class="glyphicon glyphicon-off fa-spin"></span>Salir</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>