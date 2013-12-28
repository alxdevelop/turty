@extends('layouts.scaffold')

@section('main')

<h1>Editar Tipo producto</h1>
<div class="row">
    <div class="col-md-4">
{{ Form::model($tipo_producto, array('method' => 'PATCH', 'route' => array('tipo_productos.update', $tipo_producto->id))) }}
	
            {{ Form::label('tipo', 'Tipo:') }}
            {{ Form::text('tipo', $tipo_producto->tipo ,array('class' => 'form-control')) }}
       
            {{ Form::label('descripcion', 'Descripcion:') }}
            {{ Form::text('descripcion', $tipo_producto->descripcion, array('class' => 'form-control')) }}
       
			{{ Form::submit('Guardar', array('class' => 'btn btn-info')) }}
			{{ link_to_route('tipo_productos.show', 'Cancelar', $tipo_producto->id, array('class' => 'btn')) }}
		
{{ Form::close() }}
</div>
</div>
@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
