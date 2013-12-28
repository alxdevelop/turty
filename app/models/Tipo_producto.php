<?php

class Tipo_producto extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'tipo' => 'required',
		'descripcion' => 'required'
	);
}
