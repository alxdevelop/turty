@extends('layouts.scaffold')

@section('main')

<h1>Entregas</h1>

<p>{{ link_to_route('entrega.create', 'Crear nuevo Entrega') }}</p>
@if(!empty($entrega))
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
@else
	<p>No existe registro alguno.</p>
@endif
@stop

@section('add_script')
	{{ HTML::script('js/entrega/entrega.js') }}
@stop	  