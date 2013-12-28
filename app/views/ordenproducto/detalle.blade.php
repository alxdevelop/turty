@extends('layouts.scaffold')

@section('main')

<h1>Detalle del Pedido</h1>

<p><a href="{{ URL::to('orden-compra/detalle/'.$pedido->orden_compra_id)}}">Volver a la orden de compra</a></p>
@if(!empty($pedido))

	<h2>Pedido:</h2>
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<td>Codigo</td>
				<th>Descripcion</th>
				<th>Precio</th>
			</tr>
		</thead>
		<tr>
			<td>{{$pedido->id}}</td>
			<td>{{$pedido->descripcion}}</td>
			<td>{{$pedido->precio}}</td>
		</tr>
	</table>
	<h2>Registro de Status</h2>
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Status</th>
				<th>Fecha</th>
			</tr>
		</thead>

			@foreach ($status_pedido as $Entrega)
				
				<tr>
					<td>{{$Entrega->title}}</td>
          <td>{{$Entrega->fecha}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<h2>Cambiar Status</h2>
	{{Form::open(array('url'=>'orden-producto/save-status', 'method' => 'post'))}}
		{{Form::label('Status')}}
		{{Form::hidden('orden_producto_id', $pedido->id)}}
		<select name="status_id">
			<option value="">Seleccionen una opcion</option>
				@foreach($status as $Status)
					<option value="{{$Status->id}}">{{$Status->title}}</option>
				@endforeach
		</select>
		{{Form::submit('Guardar', array('class' => 'btn btn-info'))}}
	{{Form::close()}}
@else
	<p>No existe registro alguno.</p>
@endif
@stop

@section('add_script')
	{{ HTML::script('js/entrega/entrega.js') }}
@stop	  