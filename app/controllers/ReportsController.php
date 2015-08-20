<?php 

class ReportsController extends BaseController{
		public function __construct(){
				$this->beforeFilter('auth');
		}

		public function getIndex(){
				$my_id = Auth::user()->id;
				$level = Auth::user()->level;

				if($level==1){
					return View::make('reports.index');
				}else{
					return View::make('errors.access_denied_ad');
				}
		}
}

 ?>