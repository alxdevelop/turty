@extends('layouts.scaffold')

@section('main')

<h1>Actual Orden de Compra</h1>
<p>{{ link_to_route('orden-compra.index', 'Ver todas las Orden de Compra') }}</p>

<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Codigo</th>
				<th>Distribuidor</th>
				<th>Usuario</th>
				<th>Fecha</th>
				<th>Vencimiento</th>
				<th>Actions</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($OrdenCompra as $Entrega)
				<?php 
					$split = explode('-', $Entrega->fecha_colocacion);
					?>
				<tr>
					<td><a href="{{ URL::to('orden-compra/detalle/'.$Entrega->id) }}">{{{ $Entrega->usuario_id.'-'.$split[2].$split[1].'-'.$Entrega->id }}}</a></td>
					<td>{{{ $Entrega->nombre }}}</td>
					<td>{{{ $Entrega->usuario }}}</td>
					<td>{{{ $Entrega->fecha_colocacion }}}</td>
					<td>{{{ $Entrega->fecha_vencimiento }}}</td>
          <td>
          	<a href="{{ URL::route('entrega.edit', $Entrega->id) }}" class="btn btn-info">Edit</a>
          	<a href="{{ URL::route('entrega.editPassword', $Entrega->id) }}" class="btn btn-info">Edit Password</a>
          <td>
              {{ Form::open(array('method' => 'DELETE', 'url' => 'entrega/drop/'.$Entrega->usuario_id)) }}

                  {{ Form::button('Delete', array('class' => 'btn btn-danger delete_entrega')) }}
              {{ Form::close() }}
          </td>
				</tr>
		@endforeach	
		</tbody>
	</table>

@stop
