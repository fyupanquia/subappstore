<?php 

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Room extends Eloquent implements UserInterface, RemindableInterface{

	use UserTrait, RemindableTrait;


	protected $table = 'salas';
	//public $timestamps = false;
	//protected $hidden = array('password', 'remember_token');
}


 ?>