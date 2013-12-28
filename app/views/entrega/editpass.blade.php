@extends('layouts.scaffold')

@section('main')
<div class="col-md-6">
<h1>Edit Password</h1>
	{{Form::open(array('method' => 'PATCH', 'route' => array('entrega.updatePass', $entrega[0]->id)))}}
		<b>Usuario:</b><br />
		{{ $entrega[0]->usuario }}<br /><br />
		{{ Form::hidden('usuario_id', $entrega[0]->usuario_id) }}
		{{ Form::hidden('entrega_id', $entrega[0]->id) }}
		{{Form::label('Contraseña')}}
		{{Form::password('pass', array('id' => 'pass', 'class' => 'form-control'))}}
		{{Form::label('Contraseña Nuevamente')}}
		{{Form::password('repass', array('id' => 'repass', 'class' => 'form-control'))}}
		<br /><br />
		<button id="btn_guardar" type="submit" class="btn btn-primary">Guardar</button>
		<a href="{{ URL::to('admin') }}" class="btn btn-default">Cancelar</a>
	{{Form::close()}}
</div>
@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop