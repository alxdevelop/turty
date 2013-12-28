<?php

class OrdenProductoController extends BaseController {

	public function detalle($id)
	{
		//query
    $pedido = OrdenProducto::find($id);

    /*$pedido = DB::table('orden_producto')
              ->join('orden_compra','orden_producto.orden_compra_id','=','orden_producto.id')
							->where('orden_producto.id','=',$id)
              ->get();*/

		$status_pedido = DB::table('fecha_status')
											->join('statuses', 'fecha_status.status_id','=','statuses.id')
											->where('fecha_status.orden_producto_id','=', $id)
											->orderBy('fecha_status.id','desc')
											->get();
		

		$status = Status::all();

		$variables = array(
												'status_pedido' => $status_pedido,
												'status' => $status
											);

		//var_dump($pedido);
		return View::make('ordenproducto.detalle', compact('pedido'))->with($variables);
	}

	public function saveStatus()
	{
		$input = Input::all();

		$validacion = array('status_id' => 'required');

		$validation = Validator::make($input,$validacion);

		if($validation->passes())
			{
				//echo "correcto";
				$status = new FechaStatus;
				$status->orden_producto_id = $input['orden_producto_id'];
				$status->status_id =$input['status_id'];
				$status->fecha = date("y/m/d");
				$status->save();

				return Redirect::to('orden-producto/detalle/'.$input['orden_producto_id']);
			}
			


			return Redirect::to('orden-producto/detalle/'.$input['orden_producto_id'])
				->withInput()
				->withErrors($validacion)
				->with('message','No se pudo guardar el status'); 		
	}

}
