<?php 

class FunctionController extends BaseController {

		public function getEncryption($clave){
		$reponse['encryptpass'] = Hash::make($clave);
			return json_encode($reponse) ;
		}

		public function postLogin(){
		$usuario = Input::get('usuario');
		$clave = Input::get('password');


		$userdata = array(
				'usuario'=>$usuario,
				'password'=>$clave
			);



			if(Auth::attempt($userdata)){
				$reponse[]=array("status"=>"1");

			}else{
				$reponse[]=array("status"=>"0");
			}


		
			return json_encode($reponse) ;
		}

		public function getLogin(){
		$usuario = Input::get('usuario');
		$clave = Input::get('password');


		$userdata = array(
				'usuario'=>$usuario,
				'password'=>$clave
			);



			if(Auth::attempt($userdata)){
				$reponse[]=array("status"=>"1");

			}else{
				$reponse[]=array("status"=>"0");
			}


		
			return json_encode($reponse) ;
		}

		public function postVerificar(){

			$password = Input::get('password');
			$user = Input::get('user');
			$email = Input::get('email');

						$b = Input::get('bandera');

			if($b!=0){

					$usuarios =  DB::table('usuarios')->where('usuario','=',$user)->get();
					$emails =  DB::table('usuarios')->where('email','=',$email)->get();

					if($usuarios==null && $emails==null){
						$reponse[]=array( "status" => 1,"passEncrypt" => Hash::make($password));
					}else{
						$reponse[]=array( "status" => 0);
					}

			}else{
				$reponse[]=array( "status" => 1,"passEncrypt" => Hash::make($password));
			}	
			

			return json_encode($reponse) ;
		}

		public function getIndex(){
			return View::make('encriptacion');
		}
}