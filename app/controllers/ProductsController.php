<?php 

class ProductsController extends BaseController{

	
		public function __construct(){
				$this->beforeFilter('auth');
		}

		public function getIndex(){
				$my_id = Auth::user()->id;
				$level = Auth::user()->level;

				if($level==1){
					$productos =  DB::table('productos')->get();
					$categorias =  DB::table('categorias')->get();
					return View::make('products.index')->with('productos',$productos)->with('categorias',$categorias);
				}else{
					return View::make('errors.access_denied_ad');
				}
		}

		public function getProfile($product_id){
			$product = Product::find($product_id);

			$imagenes =  DB::table('imagenes')->where('grupo','=',$product->imagen)->get();
			
			$b=0;
			foreach ($imagenes as $imagen) {
				if($b>0){
					$user = User::find($product->idusuario);
					return View::make('products.profile')->with('product',$product)->with('user',$user)->with('imagenes',$imagenes);
					break;
				}
				$b++;
			}

			$user = User::find($product->idusuario);
			return View::make('products.profile')->with('product',$product)->with('user',$user)->with('imagenes',null);;
		}



		public function postCreate(){
			
			$rules = array(
				'nombre'=>'required|max:255',
				'descripcion'=>'required|max:255',
				'cantidad'=>'required|numeric',
				'precio'=>'required|numeric',
				'image'=>'required'
				);

			$validation = Validator::make(Input::all(),$rules);

			if($validation->fails()){
				/*return Redirect::back()
		        ->withInput(Input::except('password'))
		        ->withErrors($validation);*/
		        return Redirect::to('products')->with('status','bad_create')->with('msg',$validation->messages());
		        //return $validation->messages();
			}

				
				$usuario =  Auth::user()->usuario;

				$directory = 'lib/slimrest/uploads/perfiles/'.$usuario.'/productos'.'/';
                $grupo = Auth::user()->id ;
                $grupo .= Input::get('nombre') ; 
                $grupo =  str_replace(' ', '', $grupo);

                if (!file_exists($directory)) {
                	$result    = File::makeDirectory($directory, 0777, true, true);

                	if($result){
                		$directory = 'lib/slimrest/uploads/perfiles/'.$usuario.'/productos'.'/'.$grupo.'/';
                		if (!file_exists($directory)) {
		                			$result    = File::makeDirectory($directory, 0777, true, true);
		                		if($result ){
								                		

														$b=0;
														foreach(Input::file('image') as $image) {

															if ($image->isValid()){		

																if($b==0){
																		$nameimage = $grupo.'.png';
																	}else{
																		$nameimage = $grupo.$b.'.png';
																	}

																	if(file_exists($directory.$nameimage)){
																		return Redirect::to('products')->with('status','bad_createimage')->with('msg','imagen duplicada');
																	}

																	$upload = $image->move($directory,$nameimage);
												                	//if(!$upload){
															    	//	return Redirect::to('products')->with('status','bad_move_image')->with('msg','not upload multiple '.$b);
															   		//}else{
															   			
															   			$imagen = new Image;
																		$imagen->grupo = $grupo;
																		$imagen->imagen = $nameimage;
																		$imagen->estado = 1 ;
																		$imagen->save();

																		if($b==0){
																					$product = new Product;
																	   			$product->idusuario = Auth::user()->id ;
																				$product->nombre = Input::get('nombre');
																				$product->descripcion = Input::get('descripcion');
																				$product->cantidad = Input::get('cantidad');
																				$product->precio = Input::get('precio');
																				$product->imagen = $grupo;
																				$product->save();

																				 $products =  DB::table('productos')->where('imagen','=',$grupo)->get();
																				foreach ($products as $productt) {
																				    $room = new Room;
																					$room->idproducto =$productt->id ; 
																					$room->grupo = $grupo ;
																					$room->iduserganador = Auth::user()->id ;
																					$room->precio = Input::get('precio');
																					$room->save();
																					break;
																				}
																		}
															   			
																		
																		
															   		//}

															}else{
																	return Redirect::to('products')->with('status','bad_move_image')->with('msg','archivo no válido');
																}


															$b++;

														}
															

													
		                		}
		               	}else{
		               		return Redirect::to('products')->with('status','bad_createfolder')->with('msg','producto duplicado');
		                	}
                		
                	}

                }else{
                	$directory = 'lib/slimrest/uploads/perfiles/'.$usuario.'/productos'.'/'.$grupo.'/';

                	if (!file_exists($directory)) {

		                		$result    = File::makeDirectory($directory, 0777, true, true);

		                	if($result){
		                					

														$b=0;
														foreach(Input::file('image') as $image) {

													if ($image->isValid()){	

														if($b==0){
																$nameimage = $grupo.'.png';
															}else{
																$nameimage = $grupo.$b.'.png';
															}
															
															if(file_exists($directory.$nameimage)){
																		return Redirect::to('products')->with('status','bad_createimage')->with('msg','imagen duplicada');
															}

														    $upload = $image->move($directory,$nameimage);
										                	//if(!$upload){
													    //	return Redirect::to('products')->with('status','bad_move_image')->with('msg','not upload multiple '.$b);
													   	//	}else{
													   			
													   			$imagen = new Image;
																$imagen->grupo = $grupo;
																$imagen->imagen = $nameimage;
																$imagen->estado = 1 ;
																$imagen->save();

																if($b==0){
																   			$product = new Product;
																   			$product->idusuario = Auth::user()->id ;
																			$product->nombre = Input::get('nombre');
																			$product->descripcion = Input::get('descripcion');
																			$product->cantidad = Input::get('cantidad');
																			$product->precio = Input::get('precio');
																			$product->idcategoria = Input::get('categoria');
																			$product->imagen = $grupo;
																			$product->save();

																			$products =  DB::table('productos')->where('imagen','=',$grupo)->get();

																			foreach ($products as $productt) {
																			    $room = new Room;
																				$room->idproducto = $productt->id ; 
																				$room->grupo = $grupo ;
																				$room->iduserganador = Auth::user()->id ;
																				$room->precio = Input::get('precio');
																				$room->save();
																				break;
																			}
																}

													   		//}


													}else{
														return Redirect::to('products')->with('status','bad_move_image')->with('msg','archivo no válido');
													}


															$b++;

														}



													
		                	}

                	}else{
		              		return Redirect::to('products')->with('status','bad_createfolder')->with('msg','producto duplicado');
		                	}
                	
                }
				
			

			return Redirect::to('products')->with('status','ok_create');

		}

		public function postUpdate(){
			$product_id = Input::get('form_product_id');
			$product = Product::find($product_id);

			$product->nombre       = Input::get('nombre');
			$product->descripcion  = Input::get('descripcion');
			$product->cantidad     = Input::get('cantidad');
			$product->precio       = Input::get('precio');
			$product->idcategoria       = Input::get('categoria');
			$product->save();

			return Redirect::to('products')->with('status','ok_update');

		}

		public function getDelete($products_id){

			$product = Product::find($products_id);
			$user = User::find($product->idusuario);
			$salas =  DB::table('salas')->where('idproducto','=',$product->id)->get();
			$imagenes =  DB::table('imagenes')->where('grupo','=',$product->imagen)->get();
			$base_path = 'lib/slimrest/uploads/perfiles/';

		
			try {
					File::deleteDirectory($base_path.$user->usuario.'/'.'productos/'.$product->imagen.'/');

					try {
						foreach ($imagenes as $imagen) {
								$temp_imagen = Image::find($imagen->id);
								//File::delete($base_path.$user->usuario.'/'.'productos/'.$product->imagen.'/'.$imagen->imagen);
								$temp_imagen->Delete();
						}


							try {
							foreach ($salas as $sala) {
								$temp_sala = Room::find($sala->id);
								$temp_sala->Delete();
							}

								
								$product->delete();
								return Redirect::to('products')->with('status','ok_delete');
							} catch (Exception $e) {
									return Redirect::to('products')->with('status','bad_delete')->with('msg','error al eliminar sala ...');
							}


					} catch (Exception $e) {
						return Redirect::to('products')->with('status','bad_delete')->with('msg','error al eliminar imagenes ...');
					}



			} catch (Exception $e) {
				return Redirect::to('products')->with('status','bad_delete')->with('msg','error al eliminar carpeta ...');
			}

			
		}

}

 ?>