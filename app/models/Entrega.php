<?php

class Entrega extends Eloquent {
	protected $guarded = array();

	protected $table = 'entrega';

	public static $rules = array(
			'usuario' => 'required|min:5',
			'pass' => 'required|min:6',
			'nombre'	=>	'required',
			'email'		=>	'required' 
		);

	public static $rulesSimple = array(
			'nombre' => 'required|min:5',
			'email'	 => 'required'
		);
}
