@extends('layouts.scaffold')

@section('main')

<h1>Distribuidor Actual</h1>

<p>{{ link_to_route('distribuidor.index', 'Regresar a todos los distribuidores') }}</p>

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

	<tbody>
		<tr>
			<td>{{{ $distribuidor->codigo }}}</td>
			<td><a href="{{ URL::to('distribuidor/show/'.$distribuidor->id) }}">{{ $distribuidor->nombre }}{{ $distribuidor->apellidos }}</a></td>
			<td>{{{ $distribuidor->telefono }}}</td>
			<td>{{{ $distribuidor->limite_credito }}}</td>
      <td>
					<a href="{{ URL::to('distribuidor/modificar/'.$distribuidor->id) }}" class="btn btn-info btn-sm">Modificar</a> - 
					<a href="{{ URL::to('distribuidor/create-referencia/'.$distribuidor->id) }}" class=" btn btn-primary btn-sm">+ Referencia</a> -
					<a href="javascript:void(0);" class="eliminar_admin btn btn-danger btn-sm" data-id="{{ $distribuidor->id }}" data-usuario="{{ $distribuidor->usuario_id }}">Eliminar</a></td>
      </td>        
		</tr>
	</tbody>
</table>

@stop