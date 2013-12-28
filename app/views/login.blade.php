@extends('layouts.scaffold')

@section('main')
<div class="col-md-4">
<h1>Acceso</h1>
	{{Form::open(array('method' => 'post', 'url'=> 'usuario/login'))}}
		{{Form::label('Usuario')}}
		{{Form::text('username','',array('class' => 'form-control'))}}
		{{Form::label('Contraseña')}}
		{{Form::password('pass',array('class' => 'form-control'))}}
		{{Form::submit('Entrar',array('class' => 'btn btn-primary'))}}
	{{Form::close()}}
</div>
@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="text-danger">:message</li>')) }}
	</ul>
@endif

@stop