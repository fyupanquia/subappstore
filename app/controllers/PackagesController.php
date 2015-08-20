<?php 
use Symfony\Component\HttpFoundation\File\UploadedFile ;
class PackagesController extends BaseController{
	public function __construct(){
				$this->beforeFilter('auth');
		}

		public function getIndex(){
				$my_id = Auth::user()->id;
				$level = Auth::user()->level;

				if($level==1){
					//$saldos =  DB::table('saldo')->orderBy('id','DESC')->get();

					$saldos = DB::table('saldo')->join('usuarios', 'saldo.idusuario', '=', 'usuarios.id')->select('usuarios.usuario', 'saldo.oro', 'saldo.plata','saldo.bronce','usuarios.created_at')->orderBy('saldo.oro','DESC')->get();

					$salas = DB::table('salas')->join('productos', 'salas.idproducto', '=', 'productos.id')->join('usuarios', 'salas.iduserganador', '=', 'usuarios.id')->select('productos.nombre','salas.trestante', 'usuarios.usuario', 'salas.precio','salas.grupo','salas.created_at')->orderBy('salas.id','DESC')->get();

					$administradores =  DB::table('usuarios')->where('level','=','1')->orderBy('id','DESC')->get();

					$descripciones =  DB::table('descripciones')->where('id','=','1')->get();

					$categorias =  DB::table('categorias')->get();

					return View::make('packages.index')->with('saldos',$saldos)
														->with('salas',$salas)
														->with('administradores',$administradores)
														->with('descripciones',$descripciones)
														->with('categorias',$categorias);
				}else{
					return View::make('packages.index');
				}
		}
}