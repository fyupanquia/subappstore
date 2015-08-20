<?php 

class DescripcionController extends BaseController{


	public function __construct(){
				$this->beforeFilter('auth');
		}

			public function postUpdate(){

				$rules = array(
				'idform'=>'required|numeric',
				'mision'=>'required|max:400',
				'vision'=>'required|max:400',
				'observaciones'=>'required|max:400',
				);

				

			$validation = Validator::make(Input::all(),$rules);

			if($validation->fails()){
		        return Redirect::to('admin')->with('status','bad_update_validation')->with('msg',' Error en validaciones :  *');
			}else{
					$idform = Input::get('idform');
			 		$descripcion = Descripcion::find($idform);
			 		$descripcion->mision = Input::get('mision');
					$descripcion->vision       = Input::get('vision');
					$descripcion->observaciones  = Input::get('observaciones');	
					$descripcion->save();

					return Redirect::to('admin')->with('status','ok_update');

			}

			

		}

					public function postUpdatee(){

				$rules = array(
				'idform'=>'required|numeric',
				'descripcion'=>'required|max:400',
				);

				

			$validation = Validator::make(Input::all(),$rules);

			if($validation->fails()){
		        return Redirect::to('admin')->with('status','bad_update_validation')->with('msg',' Error en validaciones :  *');
			}else{
					$idform = Input::get('idform');
			 		$descripcion = Descripcion::find($idform);
			 		$descripcion->descripcion = Input::get('descripcion');
					$descripcion->save();

					return Redirect::to('admin')->with('status','ok_update');

			}

			

		}

					public function postUpdateee(){

				$rules = array(
				'idform'=>'required|numeric',
				'funcion'=>'required|max:400',
				);

				

			$validation = Validator::make(Input::all(),$rules);

			if($validation->fails()){
		        return Redirect::to('admin')->with('status','bad_update_validation')->with('msg',' Error en validaciones :  *');
			}else{
					$idform = Input::get('idform');
			 		$descripcion = Descripcion::find($idform);
			 		$descripcion->funcionamiento = Input::get('funcion');
					$descripcion->save();

					return Redirect::to('admin')->with('status','ok_update');

			}

			

		}

}

 ?>