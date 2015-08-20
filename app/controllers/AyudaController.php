<?php 

class AyudaController extends BaseController{

		public function __construct(){
				$this->beforeFilter('auth');
		}

		public function getIndex(){
				$my_id = Auth::user()->id;
				$level = Auth::user()->level;

				if($level==1){
					$helps =  DB::table('ayuda')->where('id','=','1')->get();
					return View::make('help.index')->with('helps',$helps);
				}else{
					return View::make('errors.access_denied_ad');
				}
		}

		


}

 ?>