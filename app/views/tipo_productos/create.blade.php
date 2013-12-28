@extends('layouts.scaffold')

@section('main')

<h1>Crear tipo de producto</h1>
<div class="row">
    <div class="col-md-4">
{{ Form::open(array('route' => 'tipo_productos.store')) }}

            {{ Form::label('tipo', 'Tipo:') }}
            {{ Form::text('tipo','',array('class' => 'form-control')) }}

            {{ Form::label('descripcion', 'Descripcion:') }}
            {{ Form::text('descripcion','',array('class' => 'form-control')) }}

			{{ Form::submit('Guardar', array('class' => 'btn btn-info')) }}
{{ Form::close() }}
 </div>
</div>
@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


