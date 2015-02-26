<html>
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<?php $this->load->view('headers/librerias') ?>;
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Inicia Sesion</h1>
            <div class="account-wall">
                <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                    alt="">
                <form class="form-signin" le="form" method="POST" action="<?php echo base_url('index.php/login/loguear')?>">
                <input type="text" class="form-control" placeholder="Usuario" required autofocus id="usuario" name ="usuario">
                <input type="password" class="form-control" placeholder="Password" required id="pass" name="pass">
                <button class="btn btn-lg btn-primary btn-block btn3" type="submit">
                    Entrar</button>
                <label class="checkbox pull-left">
                    <input type="checkbox" value="remember-me">
                    Remember me
                </label>
                <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
                </form>
            </div>
            <a href="#" class="text-center new-account">Create an account </a>
        </div>
    </div>
</div>
  <div class="alert alert-info" style="visibility:<?php if(isset($mensaje)){echo "visible";}else {echo "hidden";}?>"><?php if(isset($mensaje)) echo $mensaje; ?>
<?=validation_errors();?></div>
</form>
	</div>
</div>

</body>
</html>