<?php 


class UserTableSeeder extends Seeder  {


		public function run(){
			
				//DB::table('usuarios')->delete();

				User::create(array(
							'nombres'=>'Juan',
							'apellidos'=>'Torres',
							'email'=>'juantorres@hotmail.com',
							'direccion'=>'Calle los ovidados pitneados malparipits',
							'telefono'=>947545270,
							'usuario'=>'juant',
							'level'=>0,
							'password'=>Hash::make('123')
					));

		}


}
	


 ?>