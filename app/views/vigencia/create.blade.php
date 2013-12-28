@extends('layouts.scaffold')

@section('main')

<h1>Create Vigencium</h1>
<div class="row">
    <div class="col-md-4">
{{ Form::open(array('route' => 'vigencia.store')) }}
	
            {{ Form::label('dias', 'Dias:') }}
            {{ Form::input('number', 'dias') }}
    
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


