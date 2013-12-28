<?php

class EntregaController extends BaseController {

	protected $entrega;
	
	public function __construct(Entrega $entrega)
	{
		$this->entrega = $entrega;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
       $entrega = DB::table('entrega')
							->join('usuario', 'entrega.usuario_id', '=', 'usuario.id')
							->select('entrega.id','entrega.nombre','entrega.email','usuario.usuario','usuario.active','entrega.usuario_id')
							->where('active','=',1)
							->get();

       return View::make('entrega.index', compact('entrega'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('entrega.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		$validation = Validator::make($input, Entrega::$rules);

		if($input['pass'] == $input['repass']){
				$validacionPass = true;
				$msj = '';
			}else{
				$validacionPass = false;
				$msj = '.. Las contraseñas deben ser iguales';
			}

		if($validation->passes() && $validacionPass)
		{
				$usuario = new User;
				$usuario->usuario = $input['usuario'];
				$usuario->password = Hash::make($input['pass']);
				$usuario->active = 1;
				$usuario->nivel = 1;
				$usuario->save();
				
				$entrega = new Entrega;
				$entrega->usuario_id = $usuario->id;
				$entrega->nombre = $input['nombre'];
				$entrega->email = $input['email'];
				$entrega->save();

				return Redirect::route('entrega.show', $entrega->id);
		}

		return Redirect::route('entrega.create')
					->withInput()
					->withErrors($validation)
					->with('message','Existe un error al procesar la informacion'. $msj);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $entrega = DB::table('entrega')
							->join('usuario', 'entrega.usuario_id', '=', 'usuario.id')
							->select('entrega.id','entrega.nombre','entrega.email','usuario.usuario','usuario.active','entrega.usuario_id')
							->where('entrega.id','=',$id)
							->get();

        return View::make('entrega.show', compact('entrega'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $entrega = DB::table('entrega')
							->join('usuario', 'entrega.usuario_id', '=', 'usuario.id')
							->select('entrega.id','entrega.nombre','entrega.email','usuario.usuario','usuario.active','entrega.usuario_id')
							->where('entrega.id','=',$id)
							->get();

        return View::make('entrega.edit', compact('entrega'));
	}

	public function editPassword($id)
	{
		$entrega = DB::table('entrega')
							->join('usuario', 'entrega.usuario_id', '=', 'usuario.id')
							->select('entrega.id','entrega.nombre','entrega.email','usuario.usuario','usuario.active','entrega.usuario_id')
							->where('entrega.id','=',$id)
							->get();
		return View::make('entrega.editpass', compact('entrega'));
	}

	public function updatePass($id)
	{
		$input = Input::all();
		$rules = array('pass' => 'required|min:5',
					'repass' => 'required|min:5' );

		$validation = Validator::make($input, $rules);
		
		if($input['pass'] == $input['repass']){
				$validacionPass = true;
				$msj = '';
			}else{
				$validacionPass = false;
				$msj = '.. Las contraseñas deben ser iguales';
			}

		if($validation->passes() && $validacionPass)
		{
			$usuario = User::find($input['usuario_id']);
			$usuario->password = Hash::make($input['pass']);
			$usuario->save();

			return Redirect::route('entrega.show',$id);
		}

		return Redirect::route('entrega.editPassword', $id)
					->withInput()
					->withErrors($validation)
					->with('message','Existe un error al procesar la informacion'. $msj);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::all();
		$validation = Validator::make($input, Entrega::$rulesSimple);

		if($validation->passes())
		{
			$entrega = $this->entrega->find($id);
			$entrega->nombre = $input['nombre'];
			$entrega->email = $input['email'];
			$entrega->save();

			$usuario = User::find($input['usuario_id']);
			$usuario->active = $input['status'];
			$usuario->save();

			return Redirect::route('entrega.show', $id);
		}

		return Redirect::route('entrega.edit', $id)
								->withInput()
								->withErrors($validation)
								->with('message','Existen errores al procesar la informacion');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$usuario = User::find($id);
		$usuario->active = -1;
		$usuario->save();

		return Redirect::route('entrega.index');
	}

}
