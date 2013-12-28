@extends('layouts.scaffold')

@section('main')
	<h1>Editar Usuario Entrega</h1>
<?php //var_dump($entrega); ?>
<div class="col-md-6">
{{Form::open(array('method' => 'PATCH','route' => array('entrega.update', $entrega[0]->id)))}}
		{{Form::label('Usuario')}}
		{{ $entrega[0]->usuario }}<br /><br />
		{{ Form::hidden('entrega_id',$entrega[0]->id) }}
		{{ Form::hidden('usuario_id',$entrega[0]->usuario_id) }}
		{{Form::label('Nombre Completo')}}
		{{Form::text('nombre', $entrega[0]->nombre, array('id' => 'nombre', 'class' => 'form-control'))}}
		{{Form::label('E-mail')}}
		{{Form::text('email', $entrega[0]->email, array('id' => 'email', 'class' => 'form-control'))}}
		{{Form::label('Status')}}
		<select id="status" name="status">
			<option value="{{ $entrega[0]->active }}">
				@if($entrega[0]->active == 1) 
					Activo
				@else 
					Deshabilitado
				@endif
				</option>
			<option value="1">Activo</option>
			<option value="0">Deshabilitado</option>
		</select>
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