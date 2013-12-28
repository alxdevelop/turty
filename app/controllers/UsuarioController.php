<?php

class UsuarioController extends BaseController{

	protected $layout = 'main';

	public function index()
	{
		return $this->layout->content = View::make('usuario.index');
	}



	public function crearUsuario(){
		//return View::make('usuario.crearUsuario;
		return $this->layout->content = View::make('usuario.crearUsuario');
	}

	public function guardarUsuario()
	{
		$data = Input::all();
		$data['username'];
		$usuario = new User();
		$usuario->usuario = $data['username'];
		$usuario->password = Hash::make($data['pass']);
		$usuario->active = 1;
		$usuario->save();
	}

	public function login()
	{
		$input = Input::all();

		$validation = Validator::make($input, User::$rulesLogin);

		

		if($validation->passes())
		{
			$loginData = array(
			'usuario' => $input['username'], 
			'password' => $input['pass'],
			'active' => 1
			);

			if(Auth::attempt($loginData))
			{
				return Redirect::to('usuario/index');
			}else{
				return Redirect::to('login')
			->withInput()
			->with('message', 'El usuario y/o contraseña es incorrecta..');
			}
		}

		
		return Redirect::to('login')
			->withInput()
			->withErrors($validation)
			->with('message', 'Por favor llena todos los campos del formulario..');
		
	}

	public function logout()
	{
		Auth::logout();
		return Redirect::to('login');
	}

}