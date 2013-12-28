@extends('layouts.scaffold')

@section('main')

<h1>Todas las Ordenes de Compra</h1>

<p>{{ link_to_route('orden-compra.index', 'Volver a las ordenes de Compra') }}</p>
@if(!empty($pedidos))
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Codigo</th>
				<th>Descripcion</th>
				<th>Status</th>
				<th>Vencimiento</th>
				<th>Precio</th>
			<!--	<th>Acciones</th>-->
			</tr>
		</thead>

			@foreach ($pedidos as $Entrega)
				<?php 
					//$split = explode('-', $Entrega->fecha_colocacion);
					//var_dump($split);
					//$fecha_lista = str_replace('-','',$Entrega->fecha_colocacion);
					?>
				<tr>
					<td><a href="{{ URL::to('orden-producto/detalle/'.$Entrega->id) }}">{{{ $Entrega->distribuidor_id.'-'.$Entrega->id }}}</a></td>
					<td>{{{ $Entrega->descripcion }}}</td>
					<td>{{{ $Entrega->status }}}</td>
					<td>{{{ $orden_compra->fecha_vencimiento }}}</td>
					<td>{{{ $Entrega->precio }}}</td>
         <!-- <td>
          	<select>
          		<option value="0">Cambiar el Status</option>
          		@foreach($status as $Status)
          			<option value="{{$Status->id}}">{{$Status->title}}</option>
          		@endforeach
          	</select>
          	<button class="btn btn-info">Guardar</button>
          </td>-->
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
