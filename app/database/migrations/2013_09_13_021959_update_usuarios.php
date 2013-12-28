<?php

use Illuminate\Database\Migrations\Migration;

class UpdateUsuarios extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('usuario',function($table){
			$table->integer('nivel');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('usuario',function($table){
			$table->dropColumn('nivel');
		});
	}

}