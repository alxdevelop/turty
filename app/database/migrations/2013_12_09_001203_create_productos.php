<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
    Schema::create('tipo_producto', function(Blueprint $table)
  {
    $table->increments('id');
    $table->string('tipo');
    $table->string('descripcion', 99);
    $table->timestamps();
  }
    
    );	
    Schema::create('producto', function(Blueprint $table)
    {
      $table->increments('id');
      $table->unsignedInteger('tipo_producto_id');
      $table->foreign('tipo_producto_id')->references('id')->on('tipo_producto'); 
      $table->unsignedInteger('orden_id');
      $table->foreign('orden_id')->references('id')->on('orden_compra'); 
      $table->string('codigo');
      $table->string('descripcion',255);
      $table->string('precio',10);
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
    Schema::drop('producto');
	}

}
