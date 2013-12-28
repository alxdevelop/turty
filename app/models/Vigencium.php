<?php

class Vigencium extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'dias' => 'required'
	);
}
