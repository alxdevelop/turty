<?php

use Illuminate\Database\Migrations\Migration;

class CreateEntregaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('entrega', function($table){
			$table->increments('id');
			$table->unsignedInteger('usuario_id');
			$table->foreign('usuario_id')->references('id')->on('usuario');
			$table->string('nombre',100);
			$table->string('email',25);
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
		//
	}

}