@if(Auth::check())

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>SubAppStore v1.0 | Juega subastando tus productos | Equipo</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Aplicación web de administración para la App Android Subappstore.apk">
    <meta name="author" content="Mundopccmb">
    @include('includes.styles2')
   
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/site.js" type="text/javascript"></script>
    <script type="text/javascript" src="lib/DataTables-1.9.4/media/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="lib/DataTables-1.9.4/media/js/jquery.dataTables.bootstrap.js"></script>
    


<script type="text/javascript">
    $(function(){
       $('table.data-table.sort').dataTable( {
            "bPaginate": false,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": true,
            "bInfo": false,
            "bAutoWidth": false 
        });
       $('table.data-table.full').dataTable( {
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": true,
            "sPaginationType": "full_numbers",
            "sDom": '<""f>t<"F"lp>',
            "sPaginationType": "bootstrap"
        });
    });
</script>


<script>
$(document).ready (function () {
  
   $('#userhide').hide("slow");

  $('#optionsRadios2').click (function () {
    
  // alert("hola mundo");
   $('#userhide').show("slow");
   //$('#exampleInputEmail').hide("slow");
  
  }) ; 

  $('#optionsRadios1').click (function () {
    
  // alert("hola mundo");
   $('#userhide').hide("slow");
   $('#exampleInputEmail2').val('');
   //$('#exampleInputEmail1').hide("slow");
  
  }) ;
  
}) ;
</script>

    <link rel="stylesheet" type="text/css" href="css/theme.css">


    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  </head>

  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> 
  <body class=""> 
  <!--<![endif]-->
    
<div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-reorder"></span>
          </button>
          
          
          <a class="navbar-brand" href="admin"> <img src="{{ asset('img/silver_box.png') }}" alt=""> SubAppStore</a>
        </div>
        
        <div class="hidden-xs">
                <ul class="nav navbar-nav pull-right">
                    
                   
                    <li id="fat-menu" class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user"></i> {{ Auth::user()->usuario }}
                            <i class="icon-caret-down"></i>
                        </a>

                        <ul class="dropdown-menu">
                            <li>{{ HTML::link('users/profile/'.Auth::user()->id, 'My Account', array('class' => '', 'title' => Auth::user()->usuario)) }}</li>
                            <li class="divider"></li>
                            <li><a tabindex="-1" class="visible-phone" href="#">Opciones</a></li>
                            <li class="divider visible-phone"></li>
                            
                            <li><a tabindex="-1" href="logout"><i class="icon-off"></i> Logout</a></li>
                        </ul>
                    </li>
                    
                </ul>
        </div><!--/.navbar-collapse -->
    </div>
    </div>


    <div class="navbar-collapse collapse">
        <div id="main-menu">
            

            <div id="phone-navigation" class="visible-xs">
                <ul id="dashboard-menu" class="nav nav-list">
                    
                    <li class="active "><a rel="tooltip" data-placement="right" data-original-title="Dashboard" href="admin"><i class="fa fa-home"></i>  <span class="caption">Administración</span></a></li>
                    
                    
                    <li class=" "><a rel="tooltip" data-placement="right" data-original-title="Reports" href="<?=URL::to('reports'); ?>"  ><i class="icon-bar-chart"></i> <span class="caption">Reportes</span></a></li>
                    
                    
                    <li class=" "><a rel="tooltip" data-placement="right" data-original-title="UI Features" href="products"><i class="icon-briefcase"></i> <span class="caption">Productos</span></a></li>


                    <li class=" "><a rel="tooltip" data-placement="right" data-original-title="Media" href="<?=URL::to('users'); ?>"><i class="icon-film"></i> <span class="caption">Usuarios</span></a></li>
                    
                    
                    <li class=" "><a rel="tooltip" data-placement="right" data-original-title="Blog" href="messages"><i class="icon-beaker"></i> <span class="caption">Mensajes</span></a></li>


                    <li class=" "><a rel="tooltip" data-placement="right" data-original-title="Help" href="ayuda"><i class="icon-question-sign"></i>Ayuda</a></li>
                    
                    

                    
                    
                </ul>
            </div>

            <ul class="nav nav-tabs hidden-xs">
                <li class="active"><a href="admin"><i class="fa fa-home"></i> <span>Administración</span></a></li>
                <li ><a href="#"   style="cursor:not-allowed;"><i class="fa fa-lock"></i> <span>Nuevo</span></a></li>
                <!-- <li ><a href="components.html" ><i class="icon-archive"></i><span>Paquetes</span></a></li>
                <li ><a href="pricing.html"><i class="fa fa-money"></i> <span>Precios</span></a></li>-->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-align-justify"></i> Redes Sociales<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="https://www.facebook.com/pages/Subappstore/1468178013472477" target="_blank"><i class="fa fa-facebook-official"></i><span> Facebook</span></a></li>
                        <li><a href="https://twitter.com/SubAppStore" target="_blank"><i class="fa fa-twitter"></i><span> Twitter</span></a></li>
                        <li><a href="https://plus.google.com/u/0/117385217717680913687/" target="_blank"><i class="fa fa-google-plus-square"></i><span> Google +</span></a></li>
                        <li><a href="https://www.youtube.com/channel/UCMpawUhLaO-6SEnc3ERsE1w" target="_blank"><i class="fa fa-youtube-play"></i><span> Youtube</span></a></li>
                    </ul> 
                </li>
            </ul>
        </div>
    </div>
    
    
    <div id="sidebar-nav" class="hidden-xs">
        
        <ul id="dashboard-menu" class="nav nav-list">
            
            <li class="active "><a rel="tooltip" data-placement="right" data-original-title="Dashboard" href="admin"><i class="fa fa-home"></i>  <span class="caption">Administración</span></a></li>
            
            
            <li class=" "><a rel="tooltip" data-placement="right" data-original-title="Reports" href="reports"><i class="fa fa-bar-chart"></i> <span class="caption">Reportes</span></a></li>
            
            
            <li class=" "><a rel="tooltip" data-placement="right" data-original-title="UI Features" href="<?=URL::to('products'); ?>"><i class="fa fa-truck"></i> <span class="caption">Productos</span></a></li>


            <li class=" "><a rel="tooltip" data-placement="right" data-original-title="Media" href="<?=URL::to('users'); ?>"><i class="fa fa-users"></i> <span class="caption">Usuarios</span></a></li>
            
            
            <li class=" "><a rel="tooltip" data-placement="right" data-original-title="Blog" href="messages"><i class="fa fa-envelope-o"></i> <span class="caption">Mensajes</span></a></li>
            
                                   
            <li class=" "><a rel="tooltip" data-placement="right" data-original-title="Help" href="ayuda"><i class="fa fa-question-circle"></i> <span class="caption">Ayuda</span></a></li>
            
            
        </ul>
    </div>


    
    <div class="content">
      

<?php $status=Session::get('status'); ?>
@if($status=='ok_send')
<div class="alert alert-success fade in"><button class="close" data-dismiss="alert" type="button">×</button>
<i class="fa fa-check-square"></i> Mensaje enviado correctamente ... </div>
@endif
@if($status=='err_send')
<div class="alert alert-error fade in"><button class="close" data-dismiss="alert" type="button">×</button>
<i class="fa fa-check-square"></i> En mensaje no pudo ser enviado</div>
@endif


            <div class="row">
    <div class="col-sm-12">
    <br/><br/>
<h4 class="modal-title" id="myModalLabel">Envíe un mensajes a los dispositivos registrados en la aplicación</h4>
      <br/>
  <form role="form" action="lib/slimrest/envio.php" method="post">

      <div class="form-group">
        <label for="exampleInputEmail1">Mensaje : </label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Ingrese su Mensaje" name="msm">
      </div>

    
      <div class="radio">
        <label>
          <input type="radio" name="level" id="optionsRadios1" value="0" checked="">
          Todos
        </label>
        <label>
          <input type="radio" name="level" id="optionsRadios2" value="1">
          Personalizado
        </label>
      </div>

      <div class="form-group" id="userhide">
        <label for="exampleInputEmail2">Usuario : </label>
        <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Ingrese nombre de Usuario" name="name">
        
      </div>


      <div class="modal-footer">
       <button type="submit" class="btn btn-inverse">Enviar</button>
       </div>
  </form> 


       <footer>
            <hr>
            <p class="pull-right">Design by <a href="#" target="_blank">SubAppStore</a></p>
            <p>&copy; 2015 <a href="http://subappstore.pe:8084/users">www.subappstore.zz.mu</a></p>
        </footer>
        
    </div>


    </div>

    <input id="val" type="hidden" name="user" class="input-block-level" value="" >


    <script src="lib/bootstrap3/dist/js/bootstrap.js"></script>
    <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">
   	<link href="css/charisma-app.css" rel="stylesheet">
  </body>
</html>

@endif