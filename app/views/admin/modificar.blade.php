@extends('layouts.scaffold')

@section('main')
<div class="col-md-6">
<h1>Edit Admin</h1>
	{{Form::open(array('url' => 'admin/modificar-single', 'method' => 'POST'))}}
		{{Form::label('Usuario')}}
		{{ $admin[0]->usuario }}<br /><br />
		{{ Form::hidden('admin_id',$admin[0]->id) }}
		{{ Form::hidden('usuario_id',$admin[0]->usuario_id) }}
		{{Form::label('Nombre Completo')}}
		{{Form::text('nombre', $admin[0]->nombre, array('id' => 'nombre', 'class' => 'form-control'))}}
		{{Form::label('E-mail')}}
		{{Form::text('email', $admin[0]->email, array('id' => 'email', 'class' => 'form-control'))}}
		{{Form::label('Status')}}
		<select id="status" name="status">
			<option value="{{ $admin[0]->active }}">
				@if($admin[0]->active == 1) 
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
		<a href="{{ URL::to('admin') }}" class="btn btn-default">Cancelar</a>
	{{Form::close()}}
</div>
@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop

