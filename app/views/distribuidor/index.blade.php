@extends('layouts.scaffold')

@section('main')

<h1>Distribuidores</h1>
<p><a href="{{ URL::to('distribuidor/nuevo') }}">Agregar nuevo Distribuidor</a></p>
<?php //var_dump($dist[0]) ?>
@if ($distribuidor->count())

	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Telefono</th>
				<th>Credito</th>
				<th>Opciones</th>
			</tr>
		</thead>
		@foreach($distribuidor as $Dist)
			<tr>
				<td>{{ $Dist->codigo }}</td>
				<td><a href="{{ URL::to('distribuidor/show/'.$Dist->id) }}">{{ $Dist->nombre }} {{ $Dist->apellidos }}</a></td>
				<td>{{ $Dist->telefono }}</td>
				<td>{{ $Dist->limite_credito }}</td>
				<td>
					{{Form::open(array('method' => 'POST', 'route' => array('distribuidor.drop', $Dist->id)))}}
					<a href="{{ URL::to('distribuidor/modificar/'.$Dist->id) }}" class="btn btn-info btn-sm">Modificar</a> - 
					<a href="{{ URL::to('distribuidor/create-referencia/'.$Dist->id) }}" class=" btn btn-primary btn-sm">+ Referencia</a> -
					<button type="button" class="eliminar_dist btn btn-danger btn-sm" data-id="{{ $Dist->id }}" data-usuario="{{ $Dist->usuario_id }}">Eliminar</button>
					{{Form::close()}}
				</td>
			</tr>
		@endforeach
	</table>
@else
	No existe ningun distribuidor
@endif

@stop


@section('add_script')
	{{ HTML::script('js/distribuidor/distribuidor.js') }}
@stop	  
