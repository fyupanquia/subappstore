<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>Signin Template for Bootstrap</title>
    @include('includes.styles')
    
  
    <!-- Custom styles for this template -->
   <?php echo HTML::style('estilos/css/signin.css'); ?>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="acciones/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <form class="form-signin" action="encrypt/encryption" method="post">
      
        <h2 class="form-signin-heading"><center>SUBAPPSTORE WEB</center></h2><br/>
       <center> <img src="{{ asset('favicon/photo.jpg') }}" alt="" /></center><br/>
        <label for="inputEmail" class="sr-only">Email address</label>

          @if (Session::has('login_errors'))
          <center><p style="color:#FB1D1D">El nombre de usuario o la contraseña no son correctos.</p></center>
          @else
              <center><p>Introduzca su clave para encriptar</p></center>
          @endif

        <label for="inputPassword" class="sr-only">Password</label>

        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
           <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" required>
        </div><br/>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->
<span style="color:#000"><center> @include('includes.footer') {{ HTML::link('http://subappstore.pe:8084/','Grupo SUBAPPSOTRE')}}</center></span>

<?php echo HTML::script('js/jquery-2.1.3.min.js'); ?>
<?php echo HTML::script('js/jquery-ui.js'); ?>
<?php echo HTML::script('js/login.js'); ?>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="acciones/js/ie10-viewport-bug-workaround.js"></script>
          </body>
</html>
