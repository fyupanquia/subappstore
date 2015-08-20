<?php 

	class getCategoriaController extends BaseController {

			public function postData(){
				$idcategoriapost = Input::get('idcategoriapost');
				$categoria = Categoria::find($idcategoriapost);

				$data = array(
					'success'=>true,
					'categoria'=>$categoria->categoria,
					'descripcion'=>$categoria->descripcion,
					);

				return Response::json($data);
			}

			
	}

 ?>