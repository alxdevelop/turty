@extends('layouts.scaffold')

@section('main')

<h1>Todas las Ordenes de Compra</h1>

<p>{{ link_to_route('orden-compra.create', 'Crear nueva Orden de Compra') }}</p>
@if(!empty($ordenes))
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
			@foreach ($ordenes as $Entrega)
				<?php 
					$split = explode('-', $Entrega->fecha_colocacion);
					//var_dump($split);
					//$fecha_lista = str_replace('-','',$Entrega->fecha_colocacion);
					?>
				<tr>
					<td><a href="{{ URL::to('orden-compra/detalle/'.$Entrega->id) }}">{{{ $Entrega->codigo.'-'.$split[2].$split[1].'-'.$Entrega->id }}}</a></td>
					<td>{{{ $Entrega->nombre }}}</td>
					<td>{{{ $Entrega->usuario }}}</td>
					<td>{{{ $Entrega->fecha_colocacion }}}</td>
					<td>{{{ $Entrega->fecha_vencimiento }}}</td>
          <td>
          	<!--<a href="{{ URL::route('entrega.edit', $Entrega->id) }}" class="btn btn-info">Edit</a>-->
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
