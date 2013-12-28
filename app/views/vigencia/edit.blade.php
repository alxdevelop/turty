@extends('layouts.scaffold')

@section('main')

<h1>Editar Vigencia</h1>
{{ Form::model($vigencium, array('method' => 'PATCH', 'route' => array('vigencia.update', $vigencium->id))) }}
	
            {{ Form::label('dias', 'Dias:') }}
            {{ Form::input('number', 'dias') }}
      
			{{ Form::submit('Guardar', array('class' => 'btn btn-info')) }}
			{{ link_to_route('vigencia.show', 'Cancelar', $vigencium->id, array('class' => 'btn')) }}
		
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
