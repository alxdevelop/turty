@extends('layouts.scaffold')

@section('main')

<h1>Vigencia</h1>

<p>{{ link_to_route('vigencia.index', 'Regresar a todas las vigencias') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Dias</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $vigencium->dias }}}</td>
      <td>{{ link_to_route('vigencia.edit', 'Edit', array($vigencium->id), array('class' => 'btn btn-info')) }}</td>
      <td>
          {{ Form::open(array('method' => 'DELETE', 'route' => array('vigencia.destroy', $vigencium->id))) }}
              {{ Form::button('Eliminar', array('class' => 'btn btn-danger delete-tipo', 'data-id' => $vigencium->id)) }}
          {{ Form::close() }}
      </td>
		</tr>
	</tbody>
</table>

@stop

@section('add_script')
	{{ HTML::script('js/vigencia/vigencia.js') }}
@stop