@extends('layouts.scaffold')

@section('add_css')
{{ HTML::style('css/jquery-ui.css') }}
@stop

@section('main')

<h1>Crear Orden de Compra</h1>

{{ Form::open(array('route' => 'orden-compra.store')) }}
	<div class="row">
	<div class="col-md-4">
       		{{ Form::label('distribuidor', 'Distribuidor:') }}<br />
       		<select name="distribuidor_id">
       			<option value="0">Seleccione un Distribuidor</option>
       			@foreach($distribuidor as $Dist)
       				<option value="{{$Dist->id}}">{{$Dist->codigo}} - {{$Dist->nombre}} {{$Dist->apellidos}}</option>
       			@endforeach
       		</select>
          <br /><br />
            
            {{ Form::label('fecha_creacion', 'Fecha de Creacion:') }}
            <input type="text" name="fecha_colocacion" disabled class="form-control" value="<?php echo date("m/d/y"); ?>" />
            {{ Form::label('Vigencia del Pedido: (dias)') }}
            {{ Form::text('dias_vigencia',$vigencia[0]->dias, array('class' => 'form-control', 'id' => 'dias_vigencia', 'disabled' => 'disabled')) }}
            {{ Form::label('fecha_vencimiento', 'Fecha de Vencimiento:') }}
            {{ Form::text('fecha_vencimiento','', array('class' => 'form-control calendar', 'id' => 'fecha_vencimiento')) }}
  </div>
</div>
<div class="row">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Pedidos</h3>
  </div>
  <div id='content-pedidos' class="panel-body">
  	<div class="row">
  		<div class="col-md-5">Descripcion</div>
  		<div class="col-md-3">Precio</div>
  		<div class="col-md-3">Status</div>
  	</div>
  	<div id="form-pedido">
			<div id="form-pedido" class="row">

    		<div class="col-md-5">
    			<textarea name="descripcion_pedido[]" class="form-control" placeholder="Descripcion del pedido"></textarea>
	    	</div>
	    	<div class="col-md-3">
	    		<input type="text" name="precio[]" class="form-control" placeholder="precio" />
	    	</div>
	    	<div class="col-md-3">
	    		<select name="status_id[]">
	    			@foreach($status as $Status)
       				<option value="{{$Status->id}}">{{$Status->title}}</option>
       			@endforeach
	    		</select>
	    		</div>
	    	</div>
  	</div>
    	<div id="mas_pedidos"></div>
    	<button type="button" class="btn btn-info new_pedido">Agregar nuevo pedido</button>
    </div>
    
	    		
  </div>
</div>
			{{ Form::submit('Guardar Orden de Compra', array('class' => 'btn btn-info')) }}
</div>


       
		
		
	
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop

@section('add_script')
	{{ HTML::script('js/jquery-ui.js') }}
	{{ HTML::script('js/orden-compra/create.js') }}
@stop	  
