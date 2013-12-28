@extends('layouts.scaffold')

@section('main')

<h1>Tipo producto actual</h1>

<p>{{ link_to_route('tipo_productos.index', 'Ver todos los tipos de productos') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Id</th>
				<th>Tipo</th>
				<th>Descripcion</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $tipo_producto->id }}}</td>
					<td>{{{ $tipo_producto->tipo }}}</td>
					<td>{{{ $tipo_producto->descripcion }}}</td>
                    <td>{{ link_to_route('tipo_productos.edit', 'Editar', array($tipo_producto->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'id' => 'form-delete-'.$tipo_producto->id,'route' => array('tipo_productos.destroy', $tipo_producto->id))) }}
                            {{ Form::button('Eliminar', array('class' => 'btn btn-danger delete-tipo', 'data-id' => $tipo_producto->id)) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop

@section('add_script')
	{{ HTML::script('js/tipo_productos/tipo.js') }}
@stop