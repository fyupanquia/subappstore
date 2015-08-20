<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('productos', function(Blueprint $table)
		{
			//
			$table->create();
			$table->increments('id');
			$table->string('nombre')->unique();
			$table->string('descripcion');
			$table->string('cantidad');
			$table->string('precio');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('productos', function(Blueprint $table)
		{
			//
		});
	}

}
