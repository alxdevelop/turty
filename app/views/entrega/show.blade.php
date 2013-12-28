@extends('layouts.scaffold')

@section('main')

<h1>Actual Usuario Entrega</h1>
<p>{{ link_to_route('entrega.index', 'Ver todos los usuarios de Entregas') }}</p>

<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Username</th>
				<th>Nombre</th>
				<th>Active</th>
				<th>Acciones</th>
				<th>Eliminar</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($entrega as $Entrega)
				<tr>
					<td>{{{ $Entrega->id }}}</td>
					<td>{{{ $Entrega->usuario }}}</td>
					<td>{{{ $Entrega->nombre }}}</td>
					<td>{{{ $Entrega->active }}}</td>
          <td>
          	<a href="{{ URL::route('entrega.edit', $Entrega->id) }}" class="btn btn-info">Editar</a>
          	<a href="{{ URL::route('entrega.editPassword', $Entrega->id) }}" class="btn btn-info">Editar Password</a>
          <td>
              {{ Form::open(array('method' => 'DELETE', 'url' => 'entrega/drop/'.$Entrega->usuario_id)) }}

                  {{ Form::button('Eliminar', array('class' => 'btn btn-danger delete_entrega')) }}
              {{ Form::close() }}
          </td>
				</tr>
			@endforeach
		</tbody>
	</table>

@stop