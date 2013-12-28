@extends('layouts.scaffold')

@section('main')
<div class="col-md-6">
<h1>Create Admin</h1>

{{Form::open(array('url' => 'admin/guardar', 'method' => 'POST'))}}
	
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
		
				{{Form::label('Status')}}
				<select id="status" name="status">
					<option value="1">Activo</option>
					<option value="0">Deshabilitado</option>
				</select>
			
				<br />
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
