<?php 
use Symfony\Component\HttpFoundation\File\UploadedFile ;
class UsersController extends BaseController{
		public function __construct(){
				$this->beforeFilter('auth');
		}

		public function getIndex(){
				$my_id = Auth::user()->id;
				$level = Auth::user()->level;

				if($level==1){
					$users =  DB::table('usuarios')->where('level','<>','1')->orderBy('id','DESC')->get();
					//$users =  User::orderBy('id', 'DESC')->where('level','<>','1')->orderBy('id', 'DESC')->get();
					return View::make('users.index')->with('users',$users);
				}else{
					return View::make('errors.access_denied_ad');
				}
		}


		public function postCreate(){
			
			$rules = array(
				'nombres'=>'required|max:50',
				'apellidos'=>'required|max:50',
				'email'=>'required|email|unique:usuarios',
				'direccion'=>'required|max:50',
				'telefono'=>'required|numeric',
				'usuario'=>'required|max:50',
				'clave'=>'required|min:8',
				'clave2'=>'required|min:8',
				);

			$validation = Validator::make(Input::all(),$rules);

			if($validation->fails()){
				/*return Redirect::back()
		        ->withInput(Input::except('password'))
		        ->withErrors($validation);*/
		        return Redirect::to('users')->with('status','bad_create');
		        //return $validation->messages();
			}

			$password = Input::get('clave');
			$passwordR = Input::get('clave2');



			if($password==$passwordR){
				$user = new user;
				$user->nombres = Input::get('nombres');
				$user->apellidos = Input::get('apellidos');
				$user->email = Input::get('email');
				$user->direccion = Input::get('direccion');
				$user->telefono = Input::get('telefono');
				$user->usuario = Input::get('usuario');
				$user->level = Input::get('level');
				$user->password = Hash::make($password);
				$user->save();

				$image     = Input::file('image');
			    $nameimage = Input::get('usuario').'.png';

			    $directory = 'lib/slimrest/uploads/perfiles/'.Input::get('usuario');
                

                	if (Input::file('image')->isValid())
					{		

							if (file_exists($directory.'/'.$nameimage)) {
								return Redirect::to('users')->with('status','bad_move_image')->with('msg','archivo duplicado');
							}else{	

									$result    = File::makeDirectory($directory, 0777, true, true);
								    $upload = $image->move($directory,$nameimage);

				                	//if(!$upload){
							    	//return Redirect::to('users')->with('status','bad_move_image')->with('msg','no se pudo subir la imagen');
							   	  //	}

							}
							
					}else{
						return Redirect::to('users')->with('status','bad_move_image')->with('msg','imagen no válida');
					}

                	
                
			    
			}else{
				return Redirect::to('users')->with('status','bad_create')->with('msg','las claves no coinciden');
			}
			

			return Redirect::to('users')->with('status','ok_create');

		}


		public function getDelete($users_id){
			$user = User::find($users_id);
			
			$base_path = 'lib/slimrest/uploads/perfiles/';

			

			try {
				//File::delete($base_path.$user->usuario.'/'.$user->usuario.'.png');
				File::deleteDirectory($base_path.$user->usuario.'/'.'productos/'.$product->imagen.'/');;

			} catch (Exception $e) {
				return Redirect::to('users')->with('status','bad_delete')->with('msg','error al eliminar archivos ...');
			}

			$user->delete();
			return Redirect::to('users')->with('status','ok_delete');
		}

		public function getProfile($users_id){
			$user = User::find($users_id);

			$productos =  DB::table('productos')->where('idusuario','=',$users_id)->get();

			return View::make('users.profile')->with('productos',$productos)->with('user',$user);
		}

		public function postUpdate(){

			$password = Input::get('claveu');
			if($password!='' || $password!=null){
				$rules = array(
				'user_id'=>'required|numeric',
				'nombresu'=>'required|max:50',
				'apellidosu'=>'required|max:50',
				'email'=>'required|email',
				'direccionu'=>'required|max:50',
				'telefonou'=>'required|min:5|numeric',
				'usernameu'=>'required|max:50',
				'claveu'=>'min:8',
				);
				$b=0;
			}else{
				$rules = array(
				'user_id'=>'required|numeric',
				'nombresu'=>'required|max:50',
				'apellidosu'=>'required|max:50',
				'email'=>'required|email',
				'direccionu'=>'required|max:50',
				'telefonou'=>'required|min:5|numeric',
				'usernameu'=>'required|max:50',
				);
				$b=1;
			}
				

			$validation = Validator::make(Input::all(),$rules);

			if($validation->fails()){
		        return Redirect::to('users')->with('status','bad_create')->with('msg',$b);
			}else{
					$user_id = Input::get('user_id');
			 		$user = User::find($user_id);

			 		
			 		$user->usuario = Input::get('usernameu');
					$user->nombres       = Input::get('nombresu');
					$user->apellidos  = Input::get('apellidosu');
					$user->email      = Input::get('email');
					$user->direccion    = Input::get('direccionu');
					$user->telefono      = Input::get('telefonou');
					$user->level      = Input::get('levelu');
					if($password!='' || $password!=null){
					$user->password = Hash::make($password);	
					}
					
					$user->save();

					return Redirect::to('users')->with('status','ok_update');

			}

			

		}
}

 ?>