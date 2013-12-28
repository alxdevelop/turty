<?php

class Tipo_productosController extends BaseController {

	/**
	 * Tipo_producto Repository
	 *
	 * @var Tipo_producto
	 */
	protected $tipo_producto;

	public function __construct(Tipo_producto $tipo_producto)
	{
		$this->tipo_producto = $tipo_producto;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tipo_productos = $this->tipo_producto->all();

		return View::make('tipo_productos.index', compact('tipo_productos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('tipo_productos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Tipo_producto::$rules);

		if ($validation->passes())
		{
			$this->tipo_producto->create($input);

			return Redirect::route('tipo_productos.index');
		}

		return Redirect::route('tipo_productos.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$tipo_producto = $this->tipo_producto->findOrFail($id);

		return View::make('tipo_productos.show', compact('tipo_producto'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tipo_producto = $this->tipo_producto->find($id);

		if (is_null($tipo_producto))
		{
			return Redirect::route('tipo_productos.index');
		}

		return View::make('tipo_productos.edit', compact('tipo_producto'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Tipo_producto::$rules);

		if ($validation->passes())
		{
			$tipo_producto = $this->tipo_producto->find($id);
			$tipo_producto->update($input);

			return Redirect::route('tipo_productos.show', $id);
		}

		return Redirect::route('tipo_productos.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->tipo_producto->find($id)->delete();

		return Redirect::route('tipo_productos.index');
	}

}
