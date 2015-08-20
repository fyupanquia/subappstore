<?php 
use Symfony\Component\HttpFoundation\File\UploadedFile ;
class CategoriaController extends BaseController{
		

		public function __construct(){
				$this->beforeFilter('auth');
		}




		public function getDelete($categoria_id){
			$categoria = Categoria::find($categoria_id);
			$categoria->delete();
			return Redirect::to('admin')->with('status','ok_delete_categoria');
		}

		public function postCreate(){
			
			$rules = array(
				'categoria'=>'required|max:100',
				'descripcion'=>'max:100',
				);

			$validation = Validator::make(Input::all(),$rules);

			if($validation->fails()){
		        return Redirect::to('admin')->with('status','bad_create_categoria_validacion')->with('msg','ERROR EN VALIDACIONES');
			}

				$categoria = new Categoria;
				$categoria->categoria = Input::get('categoria');
				$categoria->descripcion = Input::get('descripcion');
				$categoria->save();
			
			return Redirect::to('admin')->with('status','ok_create_categoria');

		}

		public function postUpdate(){
			$categoria_id = Input::get('idformcategoria');
			$categoria    = Categoria::find($categoria_id);

			if($categoria){
								$rules = array(
								'categoriacate'=>'required|max:100',
								'descripcioncate'=>'max:100',
								);

							$validation = Validator::make(Input::all(),$rules);

							if($validation->fails()){
						        return Redirect::to('admin')->with('status','bad_update_categoria_validacion')->with('msg','ERROR EN VALIDACIONES');
							}

							$categoria->categoria    = Input::get('categoriacate');
							$categoria->descripcion  = Input::get('descripcioncate');
							$categoria->save();

							return Redirect::to('admin')->with('status','ok_update_categoria');
			}else{
				return Redirect::to('admin')->with('status','ok_unknown_categoria')->with('msg',' -- - --  -'.$categoria_id);
			}


		}





}