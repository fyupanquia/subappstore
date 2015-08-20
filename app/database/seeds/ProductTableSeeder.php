<?php 


class ProductTableSeeder extends Seeder  {


		public function run(){
			
				//DB::table('usuarios')->delete();

				Product::create(array(
							'nombre'=>'Samsung S5',
							'descripcion'=>'El Samsung Galaxy S5 es la quinta generación del Galaxy S, esta vez conservando bastantes aspectos de diseño y hardware del Galaxy S4, pero agregando funcionalidades como monitor de ritmo cardíaco, sensor dactilar, y resistencia al agua. El Galaxy S5 posee una pantalla Super AMOLED 1080p de 5.1 pulgadas, cámara de 16 megapixels con flash LED y captura de video Ultra HD, 2GB de RAM, 16GB o 32GB de almacenamiento interno, ranura microSD, procesador quad-core a 2.5GHz, batería de 2800mAh, y corre Android 4.4 KitKat con la interfaz de Samsung, utilizando mejores materiales para su parte posterior en lugar del plástico brillante característico de las generaciones anteriores.',
							'cantidad'=>'1',
							'precio'=>'1500',
					));

				Product::create(array(
							'nombre'=>'Iphone 4',
							'descripcion'=>'El nuevo Apple iPhone 4 ahora es mas cuadrado, con una parte posterior plana en lugar de redondeada. Aún conserva la pantalla de 3.5 pulgadas, pero cuadriplica la cantidad de pixels a 640x960, convirtiéndose en el smartphone con mayor resolución del mercado. Apple llama a esta nueva pantalla Retina, ya que es capaz de mostrar 326 pixels por pulgada, mientras que el ojo humano distingue alrededor de 300ppi. Además, la pantalla utiliza la tecnología LCD IPS, la misma utilizada por el iPad. Otras funcionalidades incluyen cámara frontal para video llamadas, cámara principal de 5 megapixels con flash LED y grabación de video a 720p, ranura micro-SIM, micrófono secundario para cancelación de sonido y otras avanzadas características.',
							'cantidad'=>'1',
							'precio'=>'900',
					));
				
				Product::create(array(
							'nombre'=>'Play Station 4',
							'descripcion'=>'Por su impresionante rendimiento gráfico, que te ofrece juegos hiperrealistas. Por unas experiencias sociales inolvidables en solitario y online. Por juegos listos al instante gracias a las actualizaciones automáticas en segundo plano y que puedes disfrutar incluso mientras se están descargando.

								Porque PS4 es el sistema de entretenimiento más potente del mundo.',
							'cantidad'=>'1',
							'precio'=>'1800',
					));
		}


}
	


 ?>