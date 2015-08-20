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
                    
                    <li class="active "><a rel="tooltip" data-placement="right" data-original-title="Dashboard" href="admin"><i class="fa fa-home"></i> <span class="caption">Administración</span></a></li>
                    
                    
                    <li class=" "><a rel="tooltip" data-placement="right" data-original-title="Reports" href=""  ><i class="icon-bar-chart"></i> <span class="caption">Reportes</span></a></li>
                    
                    
                    <li class=" "><a rel="tooltip" data-placement="right" data-original-title="UI Features" href="products"><i class="icon-briefcase"></i> <span class="caption">Productos</span></a></li>
                    
                    
                    <li class=" "><a rel="tooltip" data-placement="right" data-original-title="Pricing" href="pricing.html"><i class="icon-magic"></i> <span class="caption">Precios</span></a></li>
                    
                    
                    <li class=" "><a rel="tooltip" data-placement="right" data-original-title="Media" href="<?=URL::to('users'); ?>"><i class="icon-film"></i> <span class="caption">Usuarios</span></a></li>
                    
                    
                    <li class=" "><a rel="tooltip" data-placement="right" data-original-title="Blog" href="messages"><i class="icon-beaker"></i> <span class="caption">Mensajes</span></a></li>
                    
                    
                    
                    <li class=" "><a rel="tooltip" data-placement="right" data-original-title="Help" href="help.html"><i class="icon-question-sign"></i>Ayuda</a></li>
                    
                    
                    
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
            
            <li class="active "><a rel="tooltip" data-placement="right" data-original-title="Dashboard" href="admin"><i class="fa fa-home"></i> <span class="caption">Administración</span></a></li>
            
            
            <li class=" "><a rel="tooltip" data-placement="right" data-original-title="Reports" href="<?=URL::to('reports'); ?>"><i class="fa fa-bar-chart"></i> <span class="caption">Reportes</span></a></li>
            
            
            <li class=" "><a rel="tooltip" data-placement="right" data-original-title="UI Features" href="<?=URL::to('products'); ?>"><i class="fa fa-truck"></i> <span class="caption">Productos</span></a></li>
            
            
            
            <li class=" "><a rel="tooltip" data-placement="right" data-original-title="Media" href="<?=URL::to('users'); ?>"><i class="fa fa-users"></i> <span class="caption">Usuarios</span></a></li>
            
            
            <li class=" "><a rel="tooltip" data-placement="right" data-original-title="Blog" href="messages"><i class="fa fa-envelope-o"></i> <span class="caption">Mensajes</span></a></li>
            
                                   
            <li class=" "><a rel="tooltip" data-placement="right" data-original-title="Help" href="ayuda"><i class="fa fa-question-circle"></i></i> <span class="caption">Ayuda</span></a></li>
                      
            
        </ul>
    </div>


    
    <div class="content">
        
          <div class="row">
                  <div class="col-sm-12">
                  

              <!-- INICIO ZONA DE MENSAJES -->
              <!-- FIN ZONA DE MENSAJES -->

                  
               <!-- $users es la variable enviada de controles with()-->

                      <h2 style="margin-bottom: -1em;">REPORTES</h2><br/><br/><br/>
 @include('includes.reportsstyles2')

  <div class="ch-container">
    <div class="row">   
        <div id="content" class="col-lg-10 col-sm-10">
                                                <div class="row">

                                                            <!-- INICIO CHART TORTA-->
                                                                <div class="box col-md-4">
                                                                    <div class="box-inner">
                                                                        <div class="box-header well" data-original-title="">
                                                                            <h2><i class="glyphicon glyphicon-list-alt"></i> Mejores precios</h2>

                                                                            <div class="box-icon">
                                                                              
                                                                                <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                                                                        class="glyphicon glyphicon-chevron-up"></i></a>
                                                                                <a href="#" class="btn btn-close btn-round btn-default"><i
                                                                                        class="glyphicon glyphicon-remove"></i></a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="box-content">
                                                                            <div id="piechart" style="height:300px"></div>
                                                                            <a href="#"  data-toggle="popover" data-content="En este gráfico podemos ver , en tiempo real , los rangos de precios de todos los productos registrados ..." title="¿Qué es esto?">¿Qué es esto?</a>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                 

                                                            <!-- FIN CHART TORTA-->

                                                            <!-- INICIO CHART REALTIME-->
                                                                <div class="box col-md-4">
                                                                    <div class="box-inner">
                                                                        <div class="box-header well" data-original-title="">
                                                                            <h2><i class="glyphicon glyphicon-list-alt"></i> Conectados Online</h2>

                                                                            <div class="box-icon">
                                                                                
                                                                                <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                                                                        class="glyphicon glyphicon-chevron-up"></i></a>
                                                                                <a href="#" class="btn btn-close btn-round btn-default"><i
                                                                                        class="glyphicon glyphicon-remove"></i></a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="box-content">
                                                                            <div id="realtimechart" style="height:190px;"></div>
                                                                         
                                                                            <p>Tiempo de Actualización : <input id="updateInterval" type="text" value=""
                                                                                                            style="text-align: right; width:5em"> milliseconds</p>
                                                                             <p>Cantidad Total : <input id="updateInterval2" type="text" value=""
                                                                                                            style="text-align: right; width:5em"> Conectados</p>

                                                                            <a href="#"  data-toggle="popover" data-content="En este gráfico apreciamos, en tiempo real  ,las estadísticas de usuarios conectados a la aplicación ..." title="¿Qué es esto?">¿Qué es esto?</a>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                
                                                            <!-- FIN CHART REALTIME-->

                                                        <!-- INICIO CHART TORTA DONA-->
                                                                    <div class="box col-md-4">
                                                                        <div class="box-inner">
                                                                            <div class="box-header well" data-original-title="">
                                                                                <h2><i class="glyphicon glyphicon-list-alt"></i> Mejores Subastores</h2>

                                                                                <div class="box-icon">
                                                                                    
                                                                                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                                                                            class="glyphicon glyphicon-chevron-up"></i></a>
                                                                                    <a href="#" class="btn btn-close btn-round btn-default"><i
                                                                                            class="glyphicon glyphicon-remove"></i></a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="box-content">
                                                                                <div id="donutchart" style="height: 300px;">
                                                                                </div>

                                                                                <a href="#"  data-toggle="popover" data-content="En este gráfico observaremos, en tiempo real  ,el top 5 de los usuarios con mayor cantidad de productos por subastar ..." title="¿Qué es esto?">¿Qué es esto?</a>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                        <!-- FIN CHART TORTA DONA-->

                                            <!-- FIN CHART ESTADISTICA-->
                                               <div class="box col-md-12">
                                        <div class="box-inner">
                                            <div class="box-header well">
                                                <h2><i class="glyphicon glyphicon-list-alt"></i> Cuadro Comparativo (Ayer - Hoy)</h2>

                                                <div class="box-icon">
                                                    <a href="#" class="btn btn-setting btn-round btn-default"><i
                                                            class="glyphicon glyphicon-cog"></i></a>
                                                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                                            class="glyphicon glyphicon-chevron-up"></i></a>
                                                    <a href="#" class="btn btn-close btn-round btn-default"><i
                                                            class="glyphicon glyphicon-remove"></i></a>
                                                </div>
                                            </div>
                                            <div class="box-content">
                                                <div id="sincos" class="center" style="height:300px"></div>
                                                <p id="hoverdata">Posición del Mouse (<span id="x">0</span>, <span id="y">0</span>). <span
                                                        id="clickdata"></span></p>
                                            </div>
                                            <a href="#"  data-toggle="popover" data-content="Este gráfico presenta los reportes de registro de productos de los días de ayer y hoy ... En un comparación por horas ..." title="¿Qué es esto?">¿Qué es esto?</a>
                                        </div>
                                    </div>

                                        <!-- FIN CHART ESTADISTICA-->


                                                </div>
                                                <!-- chart libraries start -->
                      @include('includes.reportsstyles1')  
        </div>
    </div>
</div>



                                  
 @include('includes.reportsstyles')
 


                       
                     <footer>
                          <hr>
                          <p class="pull-right">Design by <a href="#" target="_blank">Subappstore</a></p>
                          <p>&copy; 2015 <a href="http://www.subappstore.zz.mu/">www.subappstore.zz.mu</a></p>
                      </footer>
                      
                  </div>


          </div>
    </div>

    <input id="val" type="hidden" name="product_id" class="input-block-level" value="" >


    <script src="lib/bootstrap3/dist/js/bootstrap.js"></script>
    
  </body>
</html>

@endif