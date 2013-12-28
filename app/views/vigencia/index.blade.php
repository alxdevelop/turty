@extends('layouts.scaffold')

@section('main')

<h1>Vigencia</h1>

<p>{{ link_to_route('vigencia.create', 'Agregar vigencia') }}</p>

<p>El sistema siempre tomara la ultima vigencia como predeterminada</p>

@if ($vigencia->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Dias</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($vigencia as $vigencium)
				<tr>
					<td>{{{ $vigencium->dias }}}</td>
                    <td>{{ link_to_route('vigencia.edit', 'Editar', array($vigencium->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'id' => 'form-delete-'.$vigencium->id, 'route' => array('vigencia.destroy', $vigencium->id))) }}
                            {{ Form::button('Eliminar', array('class' => 'btn btn-danger delete-tipo', 'data-id' => $vigencium->id)) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	No hay Vigencia
@endif

@stop

@section('add_script')
	{{ HTML::script('js/vigencia/vigencia.js') }}
@stop
