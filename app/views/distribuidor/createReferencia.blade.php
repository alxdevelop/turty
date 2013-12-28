@extends('layouts.scaffold')

@section('main')

<h1>Crear Referencia Personal</h1>

	{{Form::open(array('route' => 'distribuidor.saveReferencia'))}}
			
			<h4>Referencia Personal</h4>
			
			{{Form::label('Nombre Completo')}}
			{{Form::hidden('distribuidor_id', $id)}}
			{{Form::text('nombre_ref','', array('id' => 'nombre_ref', 'class' => 'form-control'))}}
			{{Form::label('Telefono')}}
			{{Form::text('telefono_ref','', array('id' => 'telefono_ref', 'class' => 'form-control'))}}
		
			<br /><br />
			<button id="btn_guardar" type="submit" class="btn btn-primary">Guardar</button>
			<a href="{{ URL::to('distribuidor') }}" class="btn btn-default">Cancelar</a>
	

{{Form::close()}}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif



@stop


@section('add_script')
	{{ HTML::script('js/distribuidor/nuevo.js') }}
@stop