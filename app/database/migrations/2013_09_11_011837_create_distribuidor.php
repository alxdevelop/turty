<?php

use Illuminate\Database\Migrations\Migration;

class CreateDistribuidor extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuario', function($table){
			$table->increments('id');
			$table->string('usuario',25);
			$table->string('password', 64);
			$table->integer('active');
			$table->timestamps();
		});

		Schema::create('administrador', function($table){
			$table->increments('id');
			$table->unsignedInteger('usuario_id');
			$table->foreign('usuario_id')->references('id')->on('usuario');
			$table->string('nombre',100);
			$table->string('email', 25);
			$table->timestamps();

		});

		Schema::create('distribuidor', function($table)
		{
			$table->increments('id');
			$table->string('nombre', 100);
			$table->string('telefono',25);
			$table->string('email',25);
			$table->string('celular',25);
			$table->string('domicilio_personal',50);
			$table->string('domicilio_entrega',50);
			$table->integer('nivel');
			$table->string('limite_credito',25);
			$table->timestamps();
		});

		Schema::create('referencias_personales', function($table)
		{
			$table->increments('id');
			$table->unsignedInteger('distribuidor_id');
			$table->foreign('distribuidor_id')->references('id')->on('distribuidor');
			$table->string('nombre', 100);
			$table->string('telefono', 25);
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