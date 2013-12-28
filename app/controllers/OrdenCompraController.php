<?php

class OrdenCompraController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        //$ordenes = OrdenCompra::all();
				$ordenes = DB::table('orden_compra')
					->join('distribuidor','orden_compra.distribuidor_id', '=', 'distribuidor.id')
					->join('usuario', 'usuario.id','=','orden_compra.usuario_id')
					->select('orden_compra.*','distribuidor.nombre','distribuidor.codigo', 'usuario.usuario')
					->orderBy('orden_compra.id', 'desc')
					->get();

        return View::make('ordencompra.index', compact('ordenes'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $distribuidor = Distribuidor::all();
        $status = Status::all();
        $vigencia = Vigencium::orderBy('id','DESC')->take(1)->get();
        
        return View::make(
        	'ordencompra.create', 
        	compact('distribuidor'))
        		->with(array(
        			'status'		=> $status,
        			'vigencia'	=> $vigencia
        			));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//echo Auth::User()->id;
		$input = Input::all();

		//var_dump($input);

		$ordencompra = new OrdenCompra;
		$ordencompra->usuario_id = Auth::User()->id;
		$ordencompra->distribuidor_id = $input['distribuidor_id'];
		$ordencompra->fecha_colocacion = date("y/m/d");
		$ordencompra->dias_vigencia = $input['dias_vigencia'];
		$ordencompra->fecha_vencimiento = $this->fechaToMysql($input['fecha_vencimiento']);
		$ordencompra->save();
		
	
		foreach ($input['descripcion_pedido'] as $key => $value) {
			
			$pedido = new OrdenProducto;
			$pedido->orden_compra_id = $ordencompra->id;
			$pedido->descripcion = $value;
			$pedido->precio = $input['precio'][$key];
			$pedido->save();

			$status = new FechaStatus;
			$status->orden_producto_id = $pedido->id;
			$status->status_id =$input['status_id'][$key];
			$status->fecha = date("y/m/d");
			$status->save();
		}

		return Redirect::route('ordencompra.show', $ordencompra->id);

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        //$OrdenCompra = OrdenCompra::find($id);
				$OrdenCompra = DB::table('orden_compra')
					->join('distribuidor','orden_compra.distribuidor_id', '=', 'distribuidor.id')
					->join('usuario', 'usuario.id','=','orden_compra.usuario_id')
					->select('orden_compra.*','distribuidor.nombre', 'usuario.usuario')
          ->where('orden_compra.id','=',$id)
					->orderBy('orden_compra.id', 'desc')
					->get();

        return View::make('ordencompra.show', compact('OrdenCompra'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('ordencompra.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function fechaToMysql($fecha)
	{
		list($mes,$dia,$ano)=explode("/",$fecha);
		$fecha="$ano/$mes/$dia";
		return $fecha;
	}


	public function detalle($id)
	{
		
		$orden_compra = OrdenCompra::find($id);
    /*$orden_compra = DB::table('orden_compra')
      ->where('id', '=', $id)
      ->get();*/

		//$pedidos = OrdenProducto::where('orden_compra_id','=',$id)->get();

    $pedidos = DB::table('orden_producto')
      ->join('orden_compra','orden_compra.id','=','orden_producto.orden_compra_id')
                ->select('orden_producto.*','orden_compra.distribuidor_id')
								->where('orden_producto.orden_compra_id','=',$id)
								->get();



		//definimos una bandera para saber en que iteracion va
		$i = 0;
		//recorremos cada pedido
		foreach($pedidos as $Pedidos)
		{
			
			//realizamos la consulta para obtener el ultimo status
			$status_pedido = DB::table('fecha_status')
										->join('statuses', 'statuses.id','=','fecha_status.status_id')
										->where('fecha_status.orden_producto_id','=',$Pedidos->id)
										->orderBy('fecha_status.id','desc')
										->first();
			

			//agregamos el status al resultado de los pedidos anteriores
			$pedidos[$i]->status = $status_pedido->title;
			
			//bandera que se auto incrementa que sirve para agregar el valor de status
			//al resultado indicado.
			$i++;
		}

		$status = Status::all();

		$variables = array('orden_compra' => $orden_compra, 'status' => $status);

		//var_dump($pedidos);
		return View::make('ordencompra.detalle', compact('pedidos'))->with($variables);
	}

}
