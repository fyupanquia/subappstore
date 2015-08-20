<?php 

class UsuariosController extends BaseController{

	public function getIndex(){
		return 'Aqui podemos listar a los usuarios de la BD';
	}


	public function getRegistrar(){

		echo 'Aquí podemos registar a los usuarios: <br/>';
		echo Form::open(array('url'=>'usuarios/crear','method'=>'post'));
		echo Form::label('name','Nombre : ');
		echo Form::text('nombre');
		echo Form::submit('Registrar');
		echo Form::close();

	}

	public function postCrear(){
				$nombre = Input::get('nombre');
				return 'Usuario Registado '.$nombre;
	}

	public function getPerfil(){
		return 'Aqui podemos mostar el perfil del usuario: ';
	}


}


 ?>