<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


/* NECESARIOS PARA SUBAPPSTORE*/



// ruta home que redirecciona al login
Route::get('/', function()
{
  return View::make('login');
});

Route::get('logout',function(){
  Auth::logout();
  Return Redirect::to('/');
});

// action post del formulario login
Route::post('login','UserLogin@user');

// redireccion a panel de control
//Route::get('admin',array('before'=>'auth',function(){
//  return View::make('packages.index');
//}));

Route::controller('admin','PackagesController');

// capturar datos de usuario/producto a editar
Route::controller('user/getuser','getuserController');
Route::controller('descripcion/getdescripcion','getDescripcionController');
Route::controller('product/getproduct','getProductController');
Route::controller('categoria/getcategoria','getCategoriaController');


// CRUD users
Route::controller('users','UsersController');
Route::controller('products','ProductsController');
Route::controller('reports','ReportsController');
Route::controller('funtions','FunctionController');
Route::controller('messages','MessageController');
Route::controller('descripcion','DescripcionController');
Route::controller('categoria','CategoriaController');
Route::controller('ayuda','AyudaController');



/* FIN NECESARIOS PARA SUBAPPSTORE*/

/*
Route::get('password', function()
{
    var_dump(Hash::make('secret'));  // Gives a bcrypt string output
    var_dump(Hash::check('secret', Hash::make('secret'))); // Output true
});

Route::get('holamundo', function()
{
  return "! Hola Mundo !";
});

Route::get('start', function()
{
  return "<html>
    <head><title>Esta es la Página de Inicio</title></head>
    <body bgcolor='cyan'>
    <center><h1><hr color='white'><br/>CONTENIDO DE LA PAGINA DE INICIO</h1></center>
    </body>
  </html>";
});

Route::any('hola',function(){
   return "Hello World";
});

Route::get('user/{id}',function($id){
  return 'User '.$id;
});

Route::get('miusuario/{name?}',function($name = null){
  return $name;
});

Route::get('tuusuario/{name?}',function($name = 'John'){
  return $name;
});

Route::get('nuestrousuario/{name}',function($name){
  return $name;
})->where('name','[A-Za-z]+');

Route::get('vuestrousuario/{id}',function($id){
  return $id;
})->where('id','[0-9]+');

Route::get('registro',function(){
  echo Form::open(array('url'=>'nombre','method'=>'post'));
  echo Form::label('nombre','Tu nombre: ');
  echo Form::text('nom');
  echo Form::submit('Enviar');
  echo Form::close();
});

Route::post('nombre',function(){
$nombre = Input::get('nom');
return 'Tu nombre es : '.$nombre;
});

Route::get('hoy',array(
  'before'=>'cumpleanios',
function()
{
  return View::make('hello');
}
));


Route::get('index','EjemploControlador@mostrarIndex');
Route::get('mensaje','EjemploControlador@mostrarMensaje');
Route::get('nombre/{nombre}','EjemploControlador@mostrarNombre');

Route::controller('usuarios','UsuariosController');



Route::get('creartablausers',function(){

  Schema::create('users',function($tabla){
    $tabla->increments('id');
    $tabla->string('name');
    $tabla->string('last_name');
    $tabla->string('email')->unique();
    $tabla->string('address');
    $tabla->integer('phone');
    $tabla->string('username')->unique();
    $tabla->boolean('level');
    $tabla->string('password');
    $tabla->timestamps();

  });
  echo " la tabla fue creado correctamente... ";

});

Route::get('creartablaproducts',function(){

  Schema::create('products',function($tabla){
    $tabla->increments('id');
    $tabla->string('nombre');
    $tabla->string('descripcion');
    $tabla->string('cantidad');
    $tabla->string('precio');
    $tabla->timestamps();

  });

  return " la tabla fue creado correctamente... ";

});

Route::get('registrarusers',function(){
  $user = new User;
  $user->name = "Carlos";
  $user->last_name = "Peña";
  $user->email = "carlosp@gmail.com";
  $user->address = "Av. Siempreviva 156";
  $user->phone = 978654345;
  $user->username = "rpena";
  $user->level = 0 ;
  $user->password = Hash::make('123');
  $user->save();
  return "El usuario fue agregado...";
});


Route::get('registrarproducts',function(){
  $user = new Product;
  $user->nombre = "smartphone";
  $user->descripcion = "Samsung Galaxy s4";
  $user->cantidad = "50";
  $user->precio = "500UDS";
  $user->save();
  return "El producto fue agregado...";
});


Route::get('buscar',function(){
  $producto = Product::where('nombre','=','smartphone')->get();
  return 'La cantidad de productos es: '.$producto[0]['cantidad'];
});

Route::get('actualizar',function(){
  $producto = Product::find(1);
  $producto->cantidad = "30";
  $producto->precio = "230UDS";
  $producto->save();
  return " Producto actualizado ... ";
});

Route::get('eliminar',function(){
  $producto = Product::find(1);
  $producto->delete();
  return " Producto eliminado ... ";
});



Route::get('login2',array('before'=>'auth.basic',function(){
  return View::make('hello');
}));




Route::controller('package','PackageController');








Route::get('pdf',function(){
   $html = '<html><body>'
            . '<p>Put your html here, or generate it with your favourite '
            . 'templating system.</p>'
            . '</body></html>';
    return PDF::load($html, 'A4', 'portrait')->show();
});

*/