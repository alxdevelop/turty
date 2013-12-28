@extends('main')

@section('content')
	<div class="page-header">
  <h1>Distribuidor</h1>
	</div>

	<div class="col-md-5">
		<div class="panel panel-default">
			<div class="panel-heading">Cambiar Password</div>
			<div class="panel-body">
		{{Form::open(array('url' => 'distribuidor/modificar-pass', 'method' => 'POST'))}}
			{{Form::label('Usuario')}}
			{{ $usuario['usuario'] }}<br /><br />
			{{ Form::hidden('usuario_id', $usuario['id']) }}
			{{Form::label('Contraseña')}}
			{{Form::password('pass', array('id' => 'pass', 'class' => 'form-control'))}}
			{{Form::label('Contraseña Nuevamente')}}
			{{Form::password('repass', array('id' => 'repass', 'class' => 'form-control'))}}
			<br /><br />
			<button id="btn_guardar" type="button" class="btn btn-primary">Guardar</button>
			<a href="{{ URL::to('admin') }}" class="btn btn-default">Cancelar</a>
		{{Form::close()}}
			</div><!-- .panel-body -->
		</div><!-- .panel -->
	</div>
@stop

@section('add_script')
	{{ HTML::script('js/admin/mod-pass.js') }}
@stop	  
