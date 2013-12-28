@extends('layouts.scaffold')

@section('main')
<h1>Crear Usuario Entrega</h1>
<div class="col-md-6">
{{Form::open(array('route' => 'entrega.store'))}}
	
				{{Form::label('Usuario')}}
				{{Form::text('usuario','', array('id' => 'usuario', 'class' => 'form-control'))}}
			
				{{Form::label('Contraseña')}}
				{{Form::password('pass', array('id' => 'pass', 'class' => 'form-control'))}}
		
				{{Form::label('Contraseña Nuevamente')}}
				{{Form::password('repass', array('id' => 'repass', 'class' => 'form-control'))}}
	
				{{Form::label('Nombre Completo')}}
				{{Form::text('nombre','', array('id' => 'nombre', 'class' => 'form-control'))}}
		
				{{Form::label('E-mail')}}
				{{Form::text('email','', array('id' => 'email', 'class' => 'form-control'))}}
		
				<br />
				<button id="btn_guardar" type="submit" class="btn btn-primary">Guardar</button>
				<a href="{{ URL::route('entrega.index') }}" class="btn btn-default">Cancelar</a>
		
{{Form::close()}}
</div>
@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop