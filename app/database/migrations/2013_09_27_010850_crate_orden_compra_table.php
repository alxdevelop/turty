<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CrateOrdenCompraTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orden_compra', function(Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('usuario_id');
			$table->foreign('usuario_id')->references('id')->on('usuario');
			$table->unsignedInteger('distribuidor_id');
			$table->foreign('distribuidor_id')->references('id')->on('distribuidor');
			$table->date('fecha_colocacion');
			$table->integer('dias_vigencia');
			$table->date('fecha_vencimiento');
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
		Schema::drop('orden_compra');
	}

}
