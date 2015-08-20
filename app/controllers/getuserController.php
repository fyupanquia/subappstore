<?php 

	class getuserController extends BaseController {

			public function postData(){
				$user_id = Input::get('user');
				$user = User::find($user_id);

				$data = array(
					'success'=>true,
					'id'=>$user->id,
					'nombres'=>$user->nombres,
					'apellidos'=>$user->apellidos,
					'email'=>$user->email,
					'direccion'=>$user->direccion,
					'telefono'=>$user->telefono,
					'usuario'=>$user->usuario,
					'level'=>$user->level
					);

				return Response::json($data);
			}
	}

 ?>