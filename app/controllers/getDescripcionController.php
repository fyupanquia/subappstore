<?php 

	class getDescripcionController extends BaseController {

			public function postData(){
				$iddescripcion = Input::get('iddescripcion');
				$descripcion = Descripcion::find($iddescripcion);

				$data = array(
					'success'=>true,
					'mision'=>$descripcion->mision,
					'vision'=>$descripcion->vision,
					'observacion'=>$descripcion->observaciones,

					);

				return Response::json($data);
			}

			public function postDataa(){
				$iddescripcion = Input::get('iddescripcion');
				$descripcion = Descripcion::find($iddescripcion);

				$data = array(
					'success'=>true,
					'descripcion'=>$descripcion->descripcion,
					);

				return Response::json($data);
			}

			public function postDataaa(){
				$iddescripcion = Input::get('iddescripcion');
				$descripcion = Descripcion::find($iddescripcion);

				$data = array(
					'success'=>true,
					'funcionamiento'=>$descripcion->funcionamiento,
					);

				return Response::json($data);
			}
	}

 ?>