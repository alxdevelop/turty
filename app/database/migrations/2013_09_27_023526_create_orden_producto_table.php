<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdenProductoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orden_producto', function(Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('orden_compra_id');
			$table->foreign('orden_compra_id')->references('id')->on('orden_compra');
			$table->string('descripcion');
			$table->string('precio');
			$table->timestamps();
		});

Schema::create('fecha_status', function(Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('orden_producto_id');
			$table->foreign('orden_producto_id')->references('id')->on('orden_producto');
			$table->unsignedInteger('status_id');
			$table->foreign('status_id')->references('id')->on('statuses');
			$table->unsignedInteger('usuario_id');
			$table->foreign('usuario_id')->references('id')->on('usuario');
			$table->string('fecha');
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
		Schema::drop('orden_producto');
	}

}
