@if(Auth::check())

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>SubAppStore</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Aplicación web de administración para la App Android Subappstore.apk">
    <meta name="author" content="Mundopccmb">
    @include('includes.styles2')

    
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/site.js" type="text/javascript"></script>
    <script type="text/javascript" src="lib/DataTables-1.9.4/media/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="lib/DataTables-1.9.4/media/js/jquery.dataTables.bootstrap.js"></script>
    @include('includes.segundero')

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
    
    $('.deletecategoria').click (function () {
        
    if (confirm("¿ Está seguro de que desea eliminar esta categoria ?")) {
    var id = $(this).attr ("title");   
    document.location.href='categoria/delete/'+id;   
    }else{
             $(this).attr("href","admin");
    }
    
    }) ; 
    
}) ;
</script>

<link rel="stylesheet" type="text/css" href="css/theme.css">
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
                            
                            <li><a tabindex="-1" href="logout"><i class="icon-off"></i>Logout</a></li>
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
                    
                    
                    <li class=" "><a rel="tooltip" data-placement="right" data-original-title="Reports" href=""  ><i class="fa fa-bar-chart"></i> <span class="caption">Reportes</span></a></li>
                    
                    
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
            
            <li class="active "><a rel="tooltip" data-placement="right" data-original-title="Dashboard" href="admin"><i class="fa fa-home"></i> <span class="caption">Administración</span></a></li>
            
            
            <li class=" "><a rel="tooltip" data-placement="right" data-original-title="Reports" href="<?=URL::to('reports'); ?>"><i class="fa fa-bar-chart"></i> <span class="caption">Reportes</span></a></li>
            
            
            <li class=" "><a rel="tooltip" data-placement="right" data-original-title="UI Features" href="products"><i class="fa fa-truck"></i> <span class="caption">Productos</span></a></li>
            
            
            <li class=" "><a rel="tooltip" data-placement="right" data-original-title="Media" href="<?=URL::to('users'); ?>"><i class="fa fa-users"></i> <span class="caption">Usuarios</span></a></li>
            
            
            <li class=" "><a rel="tooltip" data-placement="right" data-original-title="Blog" href="messages"><i class="fa fa-envelope-o"></i> <span class="caption">Mensajes</span></a></li>
                      
            
            <li class=" "><a rel="tooltip" data-placement="right" data-original-title="Help" href="ayuda"><i class="fa fa-question-circle"></i> <span class="caption">Ayuda</span></a></li> 
        </ul>
    </div>


<!-- ################################ MI MODAL EDIT OBJETIVOS ###################################### -->
<div class="modal fade" id="eobjetivos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plu-quare"></i>EDITA OBJETIVOS<span id="load">
          <img src="{{asset('img/loading-icons/loading2.gif')}}"/>Cargando...
        </span></h4>
      </div>
      <div class="modal-body">
       
    <!-- START CONTENIDO-->
    
    <form role="form" action="descripcion/update" method="post" id="formEdit">
    <input type="hidden" id="idform" name="idform" value="1">
        <div class="form-group">
    <label for="exampleInputEmail0">MISION</label>

    <textarea rows="4"class="form-control" style="resize: none;" id="exampleInputEmail0" placeholder="Ingrese el misión" name="mision" cols="40">
    </textarea>


  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">VISION</label>


    <textarea rows="4" cols="40" class="form-control" style="resize: none;" id="exampleInputEmail1" placeholder="Ingrese visión" name="vision" > 
</textarea>

  </div>
  <div class="form-group">
    <label for="exampleInputEmail2">OBSERVACIONES</label>

    <textarea rows="4" cols="40" class="form-control" style="resize: none;" id="exampleInputEmail2" placeholder="Ingrese observaciones" name="observaciones" >
  </textarea>

  </div>

<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
       <button type="submit" class="btn btn-inverse">Guardar</button>
       
      </div>

    </form>

    <!-- END CONTENIDO-->

      </div>
      
    </div>
  </div>
</div>
<!-- ################################## FIN MODAL EDIT ################################## -->

<!-- ################################ MI MODAL EDIT DESCRIPCION ###################################### -->
<div class="modal fade" id="edescripcion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plu-quare"></i>EDITA DESCRIPCION<span id="load2">
          <img src="{{asset('img/loading-icons/loading2.gif')}}"/>Cargando...
        </span></h4>
      </div>
      <div class="modal-body">
       
    <!-- START CONTENIDO-->
    
    <form role="form" action="descripcion/updatee" method="post" id="formEdit">
    <input type="hidden" id="idform" name="idform" value="1">
        <div class="form-group">
    <label for="exampleInputEmail0">DESCRIPCION</label>

        <textarea rows="8" cols="40" class="form-control" id="exampleInputEmail0" placeholder="Ingrese el descripción" name="descripcion"> 
</textarea>


        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
           <button type="submit" class="btn btn-inverse">Guardar</button>
           
        </div>

    </form>

    <!-- END CONTENIDO-->

      </div>
      
    </div>
  </div>
</div>
<!-- ################################## FIN MODAL EDIT DESCRIPCION ################################## -->


<!-- ################################ MI MODAL EDIT FUNCIONES ###################################### -->
<div class="modal fade" id="efunciones" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plu-quare"></i>EDITA FUNCIONAMIENTO<span id="load3">
          <img src="{{asset('img/loading-icons/loading2.gif')}}"/>Cargando...
        </span></h4>
      </div>
      <div class="modal-body">
       
    <!-- START CONTENIDO-->
    
    <form role="form" action="descripcion/updateee" method="post" id="formEdit">
    <input type="hidden" id="idform" name="idform" value="1">
     <div class="form-group">
        <label for="exampleInputEmail0">FUNCION</label>

<textarea rows="8" cols="40" class="form-control" id="exampleInputEmail0" placeholder="Ingrese el función" name="funcion"> 
</textarea>


    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
       <button type="submit" class="btn btn-inverse" id="idfunc" >Guardar</button>
       
      </div>

    </form>

    <!-- END CONTENIDO-->

      </div>
      
    </div>
  </div>
</div>
<!-- ################################## FIN MODAL EDIT  FUNCIONES ################################## -->



<!-- ################################ MI MODAL EDIT CATEGORIA ###################################### -->
<div class="modal fade" id="modaleditcategoria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plu-quare"></i>EDITA CATEGORIAS<span id="load4">
          <img src="{{asset('img/loading-icons/loading2.gif')}}"/>Cargando...
        </span></h4>
      </div>
      <div class="modal-body">
       
    <!-- START CONTENIDO-->
    
    <form role="form" action="categoria/update" method="post" id="formEdit">

     <div class="form-group">

    <input type="hidden" id="idformcategoria" name="idformcategoria" value="">
  


          <div class="form-group">
          <label for="exampleInputEmail0">CATEGORIA</label>
          <input type="text" class="form-control" id="exampleInputEmail0" placeholder="Ingrese su categoria" name="categoriacate">
          </div> 

            <div class="form-group">
            <label for="exampleInputEmail1">DESCRIPCION</label>
            <textarea rows="8" cols="40" class="form-control" id="exampleInputEmail1" placeholder="Ingrese la descripción" name="descripcioncate"> 
            </textarea>
            </div> 

    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
       <button type="submit" class="btn btn-inverse" id="idfunc" >Guardar</button>
       
      </div>

    </form>

    <!-- END CONTENIDO-->

      </div>
      
    </div>
  </div>
</div>
<!-- ################################## FIN MODAL EDIT  CATEGORIA ################################## -->


        <!-- ###################################### MI MODAL CREAR CATEGORIA ###################################### -->
<div class="modal fade" id="newcategoria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuevo Categoria</h4>
      </div>
      <div class="modal-body">
       


    <!-- START CONTENIDO-->
    
    <form role="form" action="categoria/create" method="post"  >

        <div class="form-group">
    <label for="exampleInputEmail1">CATEGORIA</label>
    <input type="text" class="form-control" id="exampleInputEmail11" placeholder="Ingrese el categoria" name="categoria" >
  </div>
  <div class="form-group">
    <label for="exampleInputEmail0">DESCRIPCION</label>
    <textarea rows="8" cols="40" class="form-control" id="exampleInputEmail00" placeholder="Ingrese descripción" name="descripcion" ></textarea>
  </div>

<div id="thumb"></div>

<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
       <button type="submit" class="btn btn-inverse">Guardar</button>
      </div>

    </form>

    <!-- END CONTENIDO-->

      </div>
      
    </div>
  </div>
</div>
    <!-- ###################################### FIN MI MODAL CREAR CATEGORIA ######################################-->



    <div class="content">
        <?php $status=Session::get('status');$msg=Session::get('msg'); ?>
          @if($status=='ok')
          <div class="alert alert-success fade in"><button class="close" data-dismiss="alert" type="button">×</button>
          <i class="fa fa-check-square"></i> {{$msg}} ... !!</div>
          @endif
          @if($status=='err_denied')
          <div class="alert alert-error fade in"><button class="close" data-dismiss="alert" type="button">×</button>
          <i class="fa fa-check-square"></i> {{$msg}} ...!! </div>
          @endif
          @if($status=='ok_update')
            <div class="alert alert-success fade in"><button class="close" data-dismiss="alert" type="button">×</button>
            <i class="fa fa-check-square"></i>Sus objetivos fueron actualizados con exito ... !!</div>
          @endif

          @if($status=='bad_update_validation')
            <div class="alert alert-error fade in"><button class="close" data-dismiss="alert" type="button">×</button>
            <i class="fa fa-check-square"></i>Se presentaron errores al actualizan sus objetivos : {{$msg}}  </div>
          @endif

          @if($status=='ok_delete_categoria')
            <div class="alert alert-success fade in"><button class="close" data-dismiss="alert" type="button">×</button>
            <i class="fa fa-check-square"></i>Categoria Eliminada correctamente ...  </div>
          @endif
          

           @if($status=='bad_create_categoria_validacion')
            <div class="alert alert-error fade in"><button class="close" data-dismiss="alert" type="button">×</button>
            <i class="fa fa-check-square"></i>No se logró crear la nueva categoria {{$msg}} ...  </div>
          @endif


           @if($status=='ok_create_categoria')
            <div class="alert alert-success fade in"><button class="close" data-dismiss="alert" type="button">×</button>
            <i class="fa fa-check-square"></i>Categoria creada correctamente ...  </div>
          @endif


          @if($status=='ok_update_categoria')
            <div class="alert alert-success fade in"><button class="close" data-dismiss="alert" type="button">×</button>
            <i class="fa fa-check-square"></i>Categoria actualizada correctamente ...  </div>
          @endif


          @if($status=='bad_update_categoria_validacion')
            <div class="alert alert-error fade in"><button class="close" data-dismiss="alert" type="button">×</button>
            <i class="fa fa-check-square"></i>No se logró actualizar la categoria {{$msg}} ...  </div>
          @endif

          @if($status=='ok_unknown_categoria')
            <div class="alert alert-error fade in"><button class="close" data-dismiss="alert" type="button">×</button>
            <i class="fa fa-check-square"></i>categoria no encontrada ...{{$msg}}  </div>
          @endif



          


          




            

<div class="row">

    <div class="col-sm-8 main-content">

            <h2>Minutero
                <span class="info">Inicia el minutero para comenzar con el temporizador</span>
            </h2>
            <button id="btnStart" class="btn btn-primary pull-right" style="margin:1em 0em;float:left;margin:5px;background:-webkit-gradient(linear, left bottom, left top, color-stop(0, #26AE17), color-stop(1, #F5FFF2));border-color:rgb(176, 220, 174);"  >INICIAR MINUTERO</button>
            <button id="btnStop" class="btn btn-primary pull-right" style="margin:1em 0em;float:left;margin:5px;background:-webkit-gradient(linear, left bottom, left top, color-stop(0, #26AE17), color-stop(1, #F5FFF2));border-color:rgb(176, 220, 174);">DETENER MINUTERO</button>

            <input type="text" class="form-control" id="segundos" placeholder="0:00" style="text-align:center;font-size:24px" disabled >

            <div id="three-summaries" class="row">

            </div>



                    <h2>Salas</h2>
                     <table class="table table-first-column-number data-table display full">
                          <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Segundos</th>
                            <th>Ganador</th>
                            <th>Precio</th>
                            <th>Grupo</th>
                            <th>Registro</th>
                        
                        </tr>
                    </thead>
                          <tbody>
                @if($salas)
                      
                      @foreach($salas as $sala)         
                            <tr>
                        <!--asignamos a un bucle de array $users a $user-->
                              <td>{{ $sala->nombre }}</td>
                              <td>{{ $sala->trestante }}</td>
                              <td>{{ $sala->usuario }}</td>
                              <td>{{ $sala->precio }}</td>
                              <td>{{ $sala->grupo }}</td>
                              <td>{{ $sala->created_at }}</td></tr>
                         @endforeach             
                    </tbody>
                    
                </table>
                @else
                    <div class="alert alert-danger fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Advertencia</strong> No se encontraron registros de saldo.
                    </div>
                </tbody>
                    
                </table>
                @endif

                    <br/><br/><br/>
                    <h2>Top Saldo</h2>
                        <table class="table table-first-column-number data-table display full">
                          <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Oro</th>
                            <th>Plata</th>
                            <th>Bronce</th>
                            <th>Registro</th>
                        </tr>
                    </thead>
                          <tbody>
                @if($saldos)
                      
                      @foreach($saldos as $saldo)         
                            <tr>
                        <!--asignamos a un bucle de array $users a $user-->
                              <td>{{ $saldo->usuario }}</td>
                              <td>{{ $saldo->oro }}</td>
                              <td>{{ $saldo->plata }}</td>
                              <td>{{ $saldo->bronce }}</td>
                              <td>{{ $saldo->created_at }}</td></tr>
                         @endforeach             
                    </tbody>
                    
                </table>
                @else
                    <div class="alert alert-danger fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Advertencia</strong> No se encontraron registros de saldo.
                    </div>
                </tbody>
                    
                </table>
                @endif


        </div>

    <div class="col-sm-4 sidebar">
        



                @if($administradores)
                <div class="widget">
                            <h2>Administradores</h2>
                                  <ul class="cards list-group">

                      @foreach($administradores as $administrador)         
                                     <li class="list-group-item">
                                            <p class="title">{{$administrador->nombres}} {{$administrador->apellidos}}</p>
                                            <div class="img">
                                                <img src="lib/slimrest/uploads/perfiles/{{$administrador->usuario}}/{{$administrador->usuario}}.png">
                                                <div class="label label-info">{{$administrador->usuario}}</div>
                                            </div>
                                            <p class="info-text">{{$administrador->direccion}}</p>
                                            <div class="stats">
                                                <p class="time">{{$administrador->email}}</p>
                                                <span>{{$administrador->telefono}} <i class="icon-pushpin"></i></span>
                                            </div>
                                     </li>
                         @endforeach   


            </ul>          
        </div>
                @else

                @endif



        <div class="widget">
            <ul id="myTab" class="nav nav-tabs three-tabs fancy">
              <li class="active"><a href="#home" data-toggle="tab">Objetivos</a></li>
              <li><a href="#promotions" data-toggle="tab">Descripcion</a></li>
              <li class="dropdown">
                <a href="#deals" data-toggle="tab">Funciones</a>
              </li>
            </ul>

            <div class="tab-content">
               @if($administradores)


                 @foreach($descripciones as $descripcion) 
                        <div class="tab-pane fade in active" id="home">
                        <ul class="list-group cards">
                          <li class="list-group-item">
                              <p class="pull-right text-error">
                              <p class="title">MISION</p>
                              <p class="info">{{$descripcion->mision}}</p>
                          </li>
                          <li class="list-group-item">
                              <p class="pull-right text-info">
                              <p class="title">VISION</p></a>
                              <p class="info">{{$descripcion->vision}}</p>
                          </li>
                          <li class="list-group-item">
                              <p class="pull-right text-success">
                              <p class="title">OBSERVACIONES</p>
                              <p class="info">{{$descripcion->observaciones}}</p>
                          </li>
                          <li class="list-group-item">
                          <a class="btn btn-default btn-sm" href="#eobjetivos" id="editobserv" data-target="#eobjetivos" data-toggle="modal" >Actualizar</a>
                          </li>

                      </ul>
                        </div>

                        <div class="tab-pane fade" id="promotions">
                          
                          <ul class="cards">
                              <li style="padding: 0em 1em;"><h3>Supappstore</h3></li>
                              <li>{{$descripcion->descripcion}}</li>
                             
                              <li class="list-group-item">
                              <a class="btn btn-default btn-sm"  data-target="#edescripcion" id="editdescript"  data-toggle="modal" href="#edescripcion">Actualizar</a>
                              </li>
                          </ul>
                        </div>

                        <div class="tab-pane fade" id="deals">
                          <ul class="cards">
                              <li><p>{{$descripcion->funcionamiento}}</p>
                              </li>

                              <li class="list-group-item">
                              <a class="btn btn-default btn-sm"  data-target="#efunciones" id="editfunc" data-toggle="modal" href="#efunciones">Actualizar</a></p>
                              </li>
                          </ul>
                        </div>
                  @endforeach         

                @else 

                @endif
            </div>




        </div>

        <div class="widget">
            <ul class="nav nav-tabs two-tabs fancy">
              <li class="active"><a href="#upgrade" data-toggle="tab">Categorias</a></li>
              <li><a href="#why-upgrade" data-toggle="tab">Why Upgrade?</a></li>
            </ul>


            <div class="tab-content">
              <div class="tab-pane fade in active" id="upgrade">
                  


                                <br/>
                      <table class="table table-first-column-number data-table display full">
                        <thead>
                      <tr>
                          <th>CATEGORIA</th>
                          <th>OPCIONES</th>
                      </tr>
                  </thead>
                        <tbody>
              @if($categorias)
                    
                    @foreach($categorias as $categoria)         
                          <tr>
                      <!--asignamos a un bucle de array $users a $user-->
                         

                            <td>{{ $categoria->categoria }}</td>

                            <td><span class="label label-info">{{ HTML::link('#modaleditcategoria', 'Editar', array('class' => 'editcategoria','data-target'=>"#modaleditcategoria",'id' => $categoria->id, 'data-toggle' => 'modal', 'title' => $categoria->categoria) )}}</span>
                            <span class="label label-danger">{{ HTML::link('categoria/delete/'.$categoria->id, 'Eliminar', array('class' => 'deletecategoria', 'title' => $categoria->id)) }}</span>
                            </td
                            >
                            </tr>  
                       @endforeach             
                  </tbody>
                  
              </table>
              @else
                  </tbody>
              </table>

              <div class="alert alert-danger fade in">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <strong>Advertencia</strong> Todavía no hay ningún usuario registrado Por favor registre algunos.
              </div>
              @endif


                <button class="btn btn-primary pull-right" style="margin:1em 0em;"  data-target="#newcategoria"  data-toggle="modal" href="#newcategoria">Nueva Categoria</button>
              </div>


              <div class="tab-pane fade" id="why-upgrade">
                <h3>This is something interesting.</h3>
                <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation labore velit, blog sartorial PBR leggings next level wes anderson artisan.</p>
                <button class="btn btn-primary pull-right" style="margin-bottom: 1em;">Upgrade Now</button>
              </div>
            </div>
        </div>
    </div>
</div>

        
        <footer>
            <hr>
            <p class="pull-right">Design by <a href="#" target="_blank">SubAppStore</a></p>
            <p>&copy; 2015 <a href="http://subappstore.zz.mu">www.subappstore.zz.mu</a></p>
        </footer>
        
    </div>

    <input id="val" type="hidden" name="iddescripcion" class="input-block-level" value="1" >
    <input id="valcategoria" type="hidden" name="idcategoriapost" class="input-block-level" value="" >

        <script>
$(document).ready(function() {
  
  $('#editobserv').click(function() {

    var faction = "<?php echo URL::to('descripcion/getdescripcion/data'); ?>";
  
    var fdata = $('#val').serialize();
    
    var valor = $('#val').val();

    $('#idform').val(valor);
    
  

     $('#load').show();

    $.post(faction, fdata, function(json) {
      
        if (json.success) {
          
            $('#eobjetivos textarea[name="mision"]').val(json.mision);
            $('#eobjetivos textarea[name="vision"]').val(json.vision);
            $('#eobjetivos textarea[name="observaciones"]').val(json.observacion);
            
            
            $('#load').hide();
            
        } else {
            $('#errorMessage').html(json.message);
            $('#errorMessage').show();
        }
    });
    
  });


$('#editdescript').click(function(){
      
  
    var faction = "<?php echo URL::to('descripcion/getdescripcion/dataa'); ?>";
  
    var fdata = $('#val').serialize();
    
    var valor = $('#val').val();
  
    $('#idform').val(valor);
    
  

     $('#load2').show();

    $.post(faction, fdata, function(json) {
      
        if (json.success) {
          
            $('#edescripcion textarea[name="descripcion"]').val(json.descripcion);
            
            $('#load2').hide();
            
        } else {
            $('#errorMessage').html(json.message);
            $('#errorMessage').show();
        }
    });
});


$('.editcategoria').click(function(){
   $('#valcategoria').val($(this).attr('id'));


    var faction = "<?php echo URL::to('categoria/getcategoria/data'); ?>";
  
    var fdata = $('#valcategoria').serialize();
    
  
    $('#idformcategoria').val($(this).attr('id'));
    console.log('edit categoria '+$(this).attr('id'));
  

     $('#load4').show();

    $.post(faction, fdata, function(json) {
      
        if (json.success) {
            $('#modaleditcategoria input[name="categoriacate"]').val(json.categoria);
            $('#modaleditcategoria textarea[name="descripcioncate"]').val(json.descripcion);
            
            $('#load4').hide();
            
        } else {
            $('#errorMessage').html(json.message);
            $('#errorMessage').show();
        }
    });
});



      $('#editfunc').click(function() {
  
    var faction = "<?php echo URL::to('descripcion/getdescripcion/dataaa'); ?>";
  
    var fdata = $('#val').serialize();
    
    var valor = $('#val').val();
  
    $('#idform').val(valor);
    
  

     $('#load3').show();

    $.post(faction, fdata, function(json) {
    
        if (json.success) {
        
            $('#efunciones textarea[name="funcion"]').val(json.funcionamiento);
            
            
            $('#load3').hide();
            
        } else {
            $('#errorMessage').html(json.message);
            $('#errorMessage').show();
        }
    });
    
  });

 
});
</script>

    
    <script src="lib/bootstrap3/dist/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip({animation:false});
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">
    <link href="css/charisma-app.css" rel="stylesheet">
    
  </body>
</html>

@endif