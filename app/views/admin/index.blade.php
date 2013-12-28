@extends('layouts.scaffold')

@section('main')
<h1>Administradores</h1>
<p><a href="{{ URL::to('admin/nuevo') }}">Agregar nuevo Administrador</a></p>

@if(!empty($admin))
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>usuario</th>
				<th>Nombre</th>
				<th>Activo</th>
				<th>Acciones</th>
				<th>Eliminar</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($admin as $Admin)
				<tr>
					<td>{{{ $Admin->id }}}</td>
					<td>{{{ $Admin->usuario }}}</td>
					<td>{{{ $Admin->nombre }}}</td>
					<td>{{{ $Admin->active }}}</td>
          <td>
          	<a href="{{ URL::to('admin/edit/'.$Admin->id) }}" class="btn btn-info">Editar</a>
          	<a href="{{ URL::to('admin/modificar-pass/'.$Admin->usuario_id) }}" class="btn btn-info">Editar Password</a>
          <td>
              {{ Form::open(array('method' => 'DELETE', 'url' => 'admin/eliminar/'.$Admin->id.'/'.$Admin->usuario_id)) }}

                  {{ Form::button('Eliminar', array('class' => 'btn btn-danger delete_admin')) }}
              {{ Form::close() }}
          </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no admin's
@endif

@stop

@section('add_script')
 {{ HTML::script('js/admin/admin.js') }}
@stop
