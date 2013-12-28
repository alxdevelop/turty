<?php

class VigenciaController extends BaseController {

	/**
	 * Vigencium Repository
	 *
	 * @var Vigencium
	 */
	protected $vigencium;

	public function __construct(Vigencium $vigencium)
	{
		$this->vigencium = $vigencium;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$vigencia = $this->vigencium->all();

		return View::make('vigencia.index', compact('vigencia'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('vigencia.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Vigencium::$rules);

		if ($validation->passes())
		{
			$this->vigencium->create($input);

			return Redirect::route('vigencia.index');
		}

		return Redirect::route('vigencia.create')
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
		$vigencium = $this->vigencium->findOrFail($id);

		return View::make('vigencia.show', compact('vigencium'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$vigencium = $this->vigencium->find($id);

		if (is_null($vigencium))
		{
			return Redirect::route('vigencia.index');
		}

		return View::make('vigencia.edit', compact('vigencium'));
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
		$validation = Validator::make($input, Vigencium::$rules);

		if ($validation->passes())
		{
			$vigencium = $this->vigencium->find($id);
			$vigencium->update($input);

			return Redirect::route('vigencia.show', $id);
		}

		return Redirect::route('vigencia.edit', $id)
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
		$this->vigencium->find($id)->delete();

		return Redirect::route('vigencia.index');
	}

}
