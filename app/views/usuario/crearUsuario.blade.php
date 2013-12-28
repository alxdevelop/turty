@extends('main')


@section('add_css')

@stop
  
@section('content')
  <h2>Estas Logeado</h2>
  <div class="col-md-5">
	  {{Form::open(array('action' => 'UsuarioController@guardarUsuario', 'method' => 'POST'))}}
	  {{Form::label('Username:')}}
	  {{Form::text('username','',array('class' => 'form-control'))}}
	  {{Form::label('Password:')}}
	  {{Form::password('pass', array('class' => 'form-control'))}}
	  {{Form::label('Again Password:')}}
	  {{Form::password('repass', array('class' => 'form-control'))}}
	  <br />
	  {{Form::button('Guardar', array('class' => 'btn btn-primary'))}}
	  <a href="#" class="btn btn-default">Cancelar</a>
	  {{Form::close()}}
  </div>

	<form action="<?php echo URL::to('usuario/guardar-usuario') ?>" method="POST">
		<input type="text" name="username" />
		<input type="password" name="pass" />
		<button type="submit">Guardar</button>		
	</form>
@stop

@section('add_script')

@stop
