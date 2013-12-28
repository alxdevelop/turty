@extends('layouts.scaffold')

@section('main')

<h1>Crear Distribuidor</h1>

	{{Form::open(array('url' => 'distribuidor/guardar', 'method' => 'POST'))}}
			{{Form::label('Nombre')}}
			{{Form::text('nombre','', array('id' => 'nombre', 'class' => 'form-control'))}}
			{{Form::label('Apellidos')}}
			{{Form::text('apellidos','', array('id' => 'apellidos', 'class' => 'form-control'))}}
			{{Form::label('Telefono')}}
			{{Form::text('telefono','', array('id' => 'telefono', 'class' => 'form-control'))}}
			{{Form::label('E-mail')}}
			{{Form::text('email','', array('id' => 'email', 'class' => 'form-control'))}}
			{{Form::label('Celular')}}
			{{Form::text('celular','', array('id' => 'celular', 'class' => 'form-control'))}}
			{{Form::label('Domicilio Personal')}}
			{{Form::text('domicilio_personal','', array('domicilio_personal' => 'celular', 'class' => 'form-control'))}}
			{{Form::label('Domicilio de Entrega')}}
			{{Form::text('domicilio_entrega','', array('domicilio_entrega' => 'celular', 'class' => 'form-control'))}}
			{{Form::label('Limite de Credito Otorgado')}}
			{{Form::text('limite_credito','', array('limite_credito' => 'celular', 'class' => 'form-control'))}}
	
		
			<br /><br />
			<button id="btn_guardar" type="submit" class="btn btn-primary">Guardar</button>
			<a href="{{ URL::to('distribuidor') }}" class="btn btn-default">Cancelar</a>
	

{{Form::close()}}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif



@stop


@section('add_script')
	{{ HTML::script('js/distribuidor/nuevo.js') }}
@stop	  
