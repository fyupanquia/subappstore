<?php 

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Descripcion extends Eloquent implements UserInterface, RemindableInterface{

	use UserTrait, RemindableTrait;


	protected $table = 'descripciones';
	//public $timestamps = false;
	//protected $hidden = array('password', 'remember_token');
}


 ?>