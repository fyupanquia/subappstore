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
    @include('includes.stylesprofile')
    <link rel="shortcut icon" href="../../favicon.ico">
    <script src="../../js/jquery.js" type="text/javascript"></script>
    <script src="../../js/site.js" type="text/javascript"></script>
    <script type="text/javascript" src="../../lib/DataTables-1.9.4/media/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../../lib/DataTables-1.9.4/media/js/jquery.dataTables.bootstrap.js"></script>



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
    
        $('.delete').click (function () {
        
    if (confirm("¿ Está seguro de que desea eliminar ?")) {
    var id = $(this).attr ("title");   
    document.location.href='products/delete/'+id;   
    }else{
             var id = $('#iduserglobal').val();
             $(this).attr("href","../../users/profile/"+id);
    }
    
    }) ; 
    
}) ;
</script>

    <link rel="stylesheet" type="text/css" href="../../css/theme.css">


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
          
          
          <a class="navbar-brand" href="<?=URL::to('admin'); ?>"> <img src="{{ asset('img/silver_box.png') }}" alt=""> SubAppStore</a>
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
                    
                    <li class="active "><a rel="tooltip" data-placement="right" data-original-title="Dashboard" href="<?=URL::to('admin'); ?>" ><i class="fa fa-home"></i>  <span class="caption">Administración</span></a></li>
                    
                    
                    <li class=" "><a rel="tooltip" data-placement="right" data-original-title="Reports" href=""  ><i class="icon-bar-chart"></i> <span class="caption">Reportes</span></a></li>
                    
                    
                    <li class=" "><a rel="tooltip" data-placement="right" data-original-title="UI Features" href="products"><i class="icon-briefcase"></i> <span class="caption">Productos</span></a></li>
                    
                    <li class=" "><a rel="tooltip" data-placement="right" data-original-title="Media" href="<?=URL::to('users'); ?>"><i class="icon-film"></i> <span class="caption">Usuarios</span></a></li>
                    
                    
                    <li class=" "><a rel="tooltip" data-placement="right" data-original-title="Blog" href="../../messages"><i class="icon-beaker"></i> <span class="caption">Mensajes</span></a></li>                
                    
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
                        <li><a href="https://www.facebook.com/pages/Subappstore/1468178013472477"><i class="fa fa-facebook-official"></i><span> Facebook</span></a></li>
                        <li><a href="https://twitter.com/SubAppStore"><i class="fa fa-twitter"></i><span> Twitter</span></a></li>
                        <li><a href="https://plus.google.com/u/0/117385217717680913687/"><i class="fa fa-google-plus-square"></i><span> Google +</span></a></li>
                        <li><a href="https://www.youtube.com/channel/UCMpawUhLaO-6SEnc3ERsE1w"><i class="fa fa-youtube-play"></i><span> Youtube</span></a></li>
                    </ul> 
                </li>
            </ul>
        </div>
    </div>
    
    
    <div id="sidebar-nav" class="hidden-xs">
        
        <ul id="dashboard-menu" class="nav nav-list">
            
            <li class="active "><a rel="tooltip" data-placement="right" data-original-title="Dashboard" href="<?=URL::to('admin'); ?>" ><i class="fa fa-home"></i>  <span class="caption">Administración</span></a></li>
            
            
            <li class=" "><a rel="tooltip" data-placement="right" data-original-title="Reports" href="<?=URL::to('reports'); ?>"><i class="fa fa-bar-chart"></i> <span class="caption">Reportes</span></a></li>
            
            
            <li class=" "><a rel="tooltip" data-placement="right" data-original-title="UI Features" href="<?=URL::to('products'); ?>"><i class="fa fa-truck"></i> <span class="caption">Productos</span></a></li>
            
            
            <li class=" "><a rel="tooltip" data-placement="right" data-original-title="Media" href="<?=URL::to('users'); ?>"><i class="fa fa-users"></i> <span class="caption">Usuarios</span></a></li>
            
            
            <li class=" "><a rel="tooltip" data-placement="right" data-original-title="Blog" href="../../messages"><i class="fa fa-envelope-o"></i> <span class="caption">Mensajes</span></a></li>
            
                                   
            <li class=" "><a rel="tooltip" data-placement="right" data-original-title="Help" href="ayuda"><i class="fa fa-question-circle"></i> <span class="caption">Ayuda</span></a></li>
            
            
        </ul>
    </div>






<!-- ################################ MI MODAL EDIT ###################################### -->
<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plu-quare"></i>Editar Producto <span id="load">
          <img src="{{asset('img/loading-icons/loading2.gif')}}"/>Cargando...
        </span></h4>
      </div>
      <div class="modal-body">
       


    <!-- START CONTENIDO-->
    
    <form role="form" action="/products/update" method="post" id="formEdit">
    <input type="hidden" name="form_product_id" value="">
        <div class="form-group">
    <label for="exampleInputEmail1">Nombre</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Ingrese el Nombre" name="nombre">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Descripción</label>
    <TEXTAREA COLS=20 ROWS=4 class="form-control" id="exampleInputEmail1" placeholder="Ingrese Descripción" name="descripcion" > </TEXTAREA>
      </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Cantidad</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Ingrese Cantidad" name="cantidad">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Precio</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Ingrese Precio" name="precio">
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
<!-- ################################## MI MODAL EDIT ################################## -->

    
    <div class="content">
        
            <div class="row">
    <div class="col-sm-12">
    
<?php $status=Session::get('status'); ?>

@if($status=='ok_delete')
<div class="alert alert-success fade in"><button class="close" data-dismiss="alert" type="button">×</button>
<i class="fa fa-check-square"></i> El Producto fue eliminado con éxito</div>
@endif
@if($status=='ok_update')
<div class="alert alert-success fade in"><button class="close" data-dismiss="alert" type="button">×</button>
<i class="fa fa-check-square"></i> El Producto fue actualizado con éxito</div>
@endif


    <br/>
    @if($user)
        <h2 style="margin-bottom: -1em;text-transform:uppercase;">{{ $user->nombres .' '. $user->apellidos }}</h2><br/>
        <input id="iduserglobal" type="hidden" name="iduserglobal" class="input-block-level" value="{{$user->id}}" >

@include('includes.stylesprofile2')

<script>
  $(function() {
    $( "#tabsss" ).tabs();
  });
  </script>

<div id="tabsss">
  <ul>
    <li><a href="#tabs-1"><i class="fa fa-user"></i> DATOS PERSONALES</a></li>
    <li><a href="#tabs-2"><i class="fa fa-truck"></i> PRODUCTOS</a></li>
    <li><a href="#tabs-3"><i class="fa fa-user-secret"></i> OTROS</a></li>
  </ul>
  <div id="tabs-1">

  <div id="contenttab1">
    
    <div id="contentimg">
        @if($user)
          <img src="{{ asset('lib/slimrest/uploads/perfiles/'.$user->usuario.'/'. $user->usuario .'.png' ) }}" width="349px" height="349px" alt="">
        @else
          <img src="{{ asset('lib/slimrest/uploads/perfiles/default/varon.png') }}" width="349px" height="349px" alt="">
        @endif
    </div>

    <div id="contentdescription">
    @if($user)
        <i class="fa fa-user"></i><b> USUARIO :</b> {{ $user->usuario .'<br/>' }}
        <i class="fa fa-envelope"></i><b> EMAIL :</b> {{ $user->email .'<br/>'}}
        <i class="fa fa-home"></i><b> DIRECCION :</b> {{ $user->direccion .'<br/>' }} 
        <i class="fa fa-phone-square"></i><b> TELEFONO:</b>{{ $user->telefono .'<br/>' }} 
        <i class="fa fa-phone-square"></i><b> FECHA DE REGISTRO :</b>{{ $user->created_at .'<br/>' }} 
        
    @else
          <div class="alert alert-error fade in"><button class="close" data-dismiss="alert" type="button">×</button>
        <i class="fa fa-check-square"></i>Datos Personales no encontrados ...</div>
    @endif
    </div>
  </div>
  
    


  </div>
  <div id="tabs-2">

        <table class="table table-first-column-number data-table display full">
          <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Creación</th>
            <th>Operaciones</th>
        </tr>
    </thead>
          <tbody>
          @if($productos) 
                @foreach($productos as $producto) 
                      <tr>
                          
                                <!-- $users es la variable enviada de controles with()-->
                                <!--asignamos a un bucle de array $users a $user-->
                              
                              <td>{{ $producto->id }}</td>
                              <td>{{ $producto->nombre }}</td>
                              <td>{{ $producto->descripcion }}</td>
                              <td>{{ $producto->cantidad }}</td>
                              <td>{{ $producto->precio }}</td>
                              <td>{{ $producto->created_at }}</td>
                             <td><span class="label label-success">{{ HTML::link('products/profile/'.$producto->id, 'Ver Producto', array('class' => 'view', 'title' => $producto->nombre)) }}</span>
                             <span class="label label-danger">{{ HTML::link('products/delete/'.$producto->id, 'Eliminar', array('class' => 'delete', 'title' => $producto->id)) }}</span></td>
                           
                           </td>
                      </tr>  
                @endforeach 
            @else
                      <div class="alert alert-danger fade in">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <strong>Advertencia</strong> Todavia no hay productos registrados por este usuario.
                      </div>

            @endif           
    </tbody>
    
</table>
<br/><br/><br/>
  </div>
  <div id="tabs-3">
    OTROS
  </div>
</div>
@else
</table>
<br/><br/><br/>
  </div>
  <div id="tabs-3">
    OTROS
  </div>
</div>
                      <div class="alert alert-danger fade in">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <strong>Error</strong> Usuario no registrado.
                      </div>
@endif




         
       <footer>
            <hr>
            <p class="pull-right">Design by <a href="#" target="_blank">SubAppStore</a></p>
            <p>&copy; 2015 <a href="http://subappstore.zz.mu/">www.subappstore.zz.mu</a></p>
        </footer>
        
    </div>


    </div>

    <input id="val" type="hidden" name="product_id" class="input-block-level" value="" >

    <script>
$(document).ready(function() {
  
  $('.edit').click(function() {

    $('[name=product_id]').val($(this).attr('id'));
    //$('[name=user_id]').val($(this).attr('id'));

    var faction = "<?php echo URL::to('/product/getproduct/data'); ?>";
  
    var fdata = $('#val').serialize();
     $('#load').show();

    $.post(faction, fdata, function(json) {
      
        if (json.success) {
          
            $('#formEdit input[name="form_product_id"]').val(json.id);
            $('#formEdit input[name="nombre"]').val(json.nombre);
            $('#formEdit textarea[name="descripcion"]').val(json.descripcion);
            $('#formEdit input[name="cantidad"]').val(json.cantidad);
            $('#formEdit input[name="precio"]').val(json.precio);
            
                      
            $('#load').hide();
            
        } else {
            $('#errorMessage').html(json.message);
            $('#errorMessage').show();
        }
    });

    
  });


      var cont = 0;
    function readURL(input) {

        if(input.files){
          
                if(input.files.length <=5){
                  
                      for (var i = 0; i < input.files.length; i++) {
                                   if (input.files && input.files[i]) {


                                   var ftype = input.files[i].type;
                                   var fielArray = ["image/png", "image/jpeg", "image/gif", "image/jpg"];
                                   var fileTrue = fielArray.indexOf(ftype);

                                   if(fileTrue>=0){
                                      var reader = new FileReader();
                                          var fname = input.files[i].name;
                                              reader.onload = function (e) {

                                             //$( "#thumb" ).empty();
                                             $( "#thumb" ).append( "<img class='thumb' src='" +
                                              e.target.result + "' width='100px' height='100px' " +
                                             "title='" + fname + "'/>" );

                                              }

                                          reader.readAsDataURL(input.files[i]);

                                   }else{
                                     document.getElementById("thumb").innerHTML = "Incorrect file format, Please select an image file format..";
                                    }
                                          
                                    } 
                          }

                }

          
        }
    }

    $("#filename").change(function(){
        readURL(this);
    });
 
});
</script>
    <script src="../../lib/bootstrap3/dist/js/bootstrap.js"></script>
    <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">
<link href="css/charisma-app.css" rel="stylesheet">
  </body>
</html>

@endif