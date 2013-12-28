<?php 

class AdminController extends BaseController
{
	protected $admin;


	public static $rules = array(
			'usuario' => 'required',
			'pass' => 'required|min:6',
			'repass' => 'required',
			//'pass' => $data['repass'],
			'nombre'	=>	'required',
			'email'		=>	'required'
		);

	public static $rulesSingle = array(
			'nombre'	=>	'required',
			'email'		=>	'required'
		);
	

	public function index()
	{

		$admin = DB::table('administrador')
							->join('usuario', 'administrador.usuario_id', '=', 'usuario.id')
							->select('administrador.id','administrador.nombre','administrador.email','usuario.usuario','usuario.active','administrador.usuario_id')
							->where('active','=',1)
							->get();

			return View::make('admin.index')->with(array('admin' => $admin));
	}

	public function nuevo()
	{
			return View::make('admin.nuevo');
	}	

	public function guardar()
	{
			$data = Input::all();


			$validacion = Validator::make($data, AdminController::$rules);

			if($data['pass'] == $data['repass']){
				$validacionPass = true;
				$msj = '';
			}else{
				$validacionPass = false;
				$msj = '.. the passwords not equals';
			}

			//var_dump($data);
			if($validacion->passes() && $validacionPass)
			{

				$usuario = new User;
				$usuario->usuario = $data['usuario'];
				$usuario->password = Hash::make($data['pass']);
				$usuario->active = $data['status'];
				$usuario->nivel = 0;
				$usuario->save();
				
				$admin = new Administrador;
				$admin->usuario_id = $usuario->id;
				$admin->nombre = $data['nombre'];
				$admin->email = $data['email'];
				$admin->save();

				return Redirect::to('admin');
			}

			return Redirect::to('admin/nuevo')
				->withInput()
				->withErrors($validacion)
				->with('message','There were validation errors'.$msj); 		
			//$usuario->id;



	}

	public function modificar($id)
	{
		$admin = DB::table('administrador')
							->join('usuario', 'administrador.usuario_id', '=', 'usuario.id')
							->where('administrador.id', '=', $id)
							->select('administrador.id','administrador.usuario_id',
											'administrador.nombre','administrador.email',
											'usuario.usuario','usuario.active')
							->get();

		return View::make('admin.modificar')->with(array('admin' => $admin));

	}

	public function modificarSimple()
	{
		$data = Input::all();

		$validation = Validator::make($data,AdminController::$rulesSingle);
		

		//var_dump($data);

		if($validation->passes())
		{
			$admin = Administrador::find($data['admin_id']);
			$admin->nombre = $data['nombre'];
			$admin->email = $data['email'];
			$admin->save();

			$usuario = User::find($data['usuario_id']);
			$usuario->active = $data['status'];
			$usuario->save();

			return Redirect::to('admin');
		}

			return Redirect::to('admin/edit/'.$data['admin_id'])
				->withInput()
				->withErrors($validation)
				->with('message','There were validation errors'); 		

	}

	public function modificarPass($id)
	{
			$usuario = User::find($id);
			return View::make('admin.modificar-pass')->with(array("usuario" => $usuario));
	}

	public function updatePass()
	{
		$data = Input::all();

		$rules = array('pass' => 'required|min:6',
			'repass' => 'required');


		$validation = Validator::make($data,$rules);

		if($data['pass'] == $data['repass']){
				$validacionPass = true;
				$msj = '';
			}else{
				$validacionPass = false;
				$msj = '.. the passwords not equals';
			}

		//var_dump($data);
		if($validation->passes() && $validacionPass)
		{
			$usuario = User::find($data['usuario_id']);
			$usuario->password = Hash::make($data['pass']);
			$usuario->save();			
			return Redirect::to('admin');
		}


			return Redirect::to('admin/modificar-pass/'.$data['usuario_id'])
				->withInput()
				->withErrors($validation)
				->with('message','There were validation errors'.$msj); 		

	}

	public function eliminar($id,$usuario_id)
	{
		//$data = Input::all();

		/*$admin = Administrador::find($id);
		$admin->delete();*/

		$usuario = User::find($usuario_id);
		$usuario->active = -1;
		$usuario->save();

		return Redirect::to('admin');
	}

}