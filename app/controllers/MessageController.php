<?php 

class MessageController extends BaseController{

		public function __construct(){
				$this->beforeFilter('auth');
		}

		public function getIndex(){
				$my_id = Auth::user()->id;
				$level = Auth::user()->level;

				if($level==1){
					//$users =  DB::table('usuarios')->where('level','<>','1')->orderBy('id','DESC')->get();
					//$users =  User::orderBy('id', 'DESC')->where('level','<>','1')->orderBy('id', 'DESC')->get();
					return View::make('messages.index');
				}else{
					return View::make('errors.access_denied_ad');
				}
		}

		public function getMsgok(){
		   return Redirect::to('messages')->with('status','ok_send');

		}

		public function getMsgerr(){
		   return Redirect::to('messages')->with('status','err_send');

		}


}

 ?>