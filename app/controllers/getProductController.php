<?php 

	class getProductController extends BaseController {

			public function postData(){
				$product_id = Input::get('product_id');
				$producto = Product::find($product_id);

				$data = array(
					'success'=>true,
					'id'=>$producto->id,
					'nombre'=>$producto->nombre,
					'descripcion'=>$producto->descripcion,
					'cantidad'=>$producto->cantidad,
					'precio'=>$producto->precio,
					'categoria'=>$producto->idcategoria,
					);

				return Response::json($data);
			}

			
	}

 ?>