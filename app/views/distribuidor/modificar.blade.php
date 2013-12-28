@extends('layouts.scaffold')

@section('main')
<div class="col-lg-6">
<h1>Modificar Distribuidor</h1>
	{{Form::open(array('url' => 'distribuidor/update', 'method' => 'POST'))}}

			{{Form::label('Nombre Completo')}}
			{{Form::hidden('distribuidor_id', $distribuidor->id)}}
			{{Form::text('nombre',$distribuidor->nombre, array('id' => 'nombre', 'class' => 'form-control'))}}
			{{Form::label('Apellidos')}}
			{{Form::text('apellidos',$distribuidor->apellidos, array('id' => 'apellidos', 'class' => 'form-control'))}}
			{{Form::label('Telefono')}}
			{{Form::text('telefono',$distribuidor->telefono, array('id' => 'telefono', 'class' => 'form-control'))}}
			{{Form::label('E-mail')}}
			{{Form::text('email',$distribuidor->email, array('id' => 'email', 'class' => 'form-control'))}}
			{{Form::label('Celular')}}
			{{Form::text('celular',$distribuidor->celular, array('id' => 'celular', 'class' => 'form-control'))}}
			{{Form::label('Domicilio Personal')}}
			{{Form::text('domicilio_personal',$distribuidor->domicilio_personal, array('domicilio_personal' => 'celular', 'class' => 'form-control'))}}
			{{Form::label('Domicilio de Entrega')}}
			{{Form::text('domicilio_entrega',$distribuidor->domicilio_entrega, array('domicilio_entrega' => 'celular', 'class' => 'form-control'))}}
			{{Form::label('Limite de Credito Otorgado')}}
			{{Form::text('limite_credito',$distribuidor->limite_credito, array('limite_credito' => 'celular', 'class' => 'form-control'))}}
			<br /><br />
			<button id="btn_guardar" type="submit" class="btn btn-primary">Guardar</button>
			<a href="{{ URL::to('distribuidor') }}" class="btn btn-default">Cancelar</a>
{{Form::close()}}
@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif
</div>
@stop


@section('add_script')
	{{ HTML::script('js/distribuidor/nuevo.js') }}
@stop	  
