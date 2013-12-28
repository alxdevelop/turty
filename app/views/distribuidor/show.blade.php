@extends('layouts.scaffold')

@section('main')
	<h1>Informacion del Distribuidor</h1>

			<p><b>Nombre Completo:</b></p>
			<p>{{ $distribuidor->nombre }}</p>
			<p><b>Telefono:</b></p>
			<p>{{ $distribuidor->telefono }}</p>
			<p><b>E-mail:</b></p>
			<p>{{ $distribuidor->email }}</p>
			<p><b>Celular:</b></p>
			<p>{{ $distribuidor->celular }}</p>
			<p><b>Domicilio Personal:</b></p>
			<p>{{ $distribuidor->domicilio_personal }}</p>
			<p><b>Domicilio de Entrega:</b></p>
			<p>{{ $distribuidor->domicilio_entrega }}</p>
			<p><b>Limite de Credito:</b></p>
			<p>${{ $distribuidor->limite_credito }}</p>
		<a href="{{ URL::to('distribuidor') }}" class="btn btn-default">Atras</a>
			<a href="{{ URL::to('distribuidor/modificar/'.$distribuidor->id) }}" class="btn btn-info">Modificar</a>

<br /><br />
@foreach($referencias as $Ref => $val)
	<h4>Referencia Personal</h4>
			<p><b>Nombre completo:</b></p>
			<p>{{ $val['nombre'] }}</p>
			<p><b>Telefono:</b></p>
			<p>{{ $val['telefono'] }}</p>
			{{Form::open(array('method' => 'DELETE', 'route' => array('distribuidor.dropReferencia', $val['id'])))}}
			<a href="{{ URL::route('distribuidor.modificarReferencia', $val['id']) }}" class="btn btn-info">Modificar</a>
			<button type="submit" class="btn btn-danger drop_ref">Eliminar</button>
			{{Form::close()}}
			<br /><br />
		@endforeach

@stop

@section('add_script')
	{{ HTML::script('js/distribuidor/show.js') }}
@stop	  
