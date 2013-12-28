<?php 

class DistribuidorController extends BaseController
{


	protected $distribuidor;

	public static $rules = array(
		'nombre'              =>	'required',
		'apellidos'           =>	'required',
		'telefono'            =>  'required',
		'celular'             =>  'required',
		'domicilio_personal'  =>  'required',
		'domicilio_entrega'   =>  'required',
		'limite_credito'      =>  'required'
		);

	public function __construct(Distribuidor $distribuidor)
	{
		$this->distribuidor = $distribuidor;
	}

	public function index()
	{

		$distribuidor = $this->distribuidor->where('nivel','=','1')->get();

		//return View::make('distribuidor.index')->with(array('dist' => $distribuidor));
		return View::make('distribuidor.index', compact('distribuidor'));
	}

	public function nuevo()
	{
		return View::make('distribuidor.nuevo');
	}




  /**
   *  Funcion para guardar el distribuidor
   *  @author Alejando Sanchez
   */
	public function guardar()
	{
		$input = Input::all();

		$validation = Validator::make($input,DistribuidorController::$rules);

		if($validation->passes())
		{
      //creamos el codigo
      $codigo = substr($input['nombre'],0,2) . substr($input['apellidos'],0,1);
      $codigo = strtolower($codigo);
      $ban = 0;
      $final = 0;
      

      //verificamos si existe
      do {

        unset($check); 
        if($ban > 0)
        {
          $check = Distribuidor::where('codigo','=',$codigo.$ban)
            ->take(1)
            ->get();
          
        }
        else
        {
          $check = Distribuidor::where('codigo','=',$codigo)
            ->take(1)
            ->get();
        }   
        //echo $check[0]->id;
        //var_dump($check);
        if(empty($check[0]))
        {
          if($ban > 0)
          {
            $codigo = $codigo.$ban;
          }
          $final = 1;
        }

        $ban = $ban+1;
      } while ($final == 0);




			$dist = new Distribuidor;
			$dist->nombre = $input['nombre'];
			$dist->apellidos = $input['apellidos'];
			$dist->telefono = $input['telefono'];
			$dist->email = $input['email'];
			$dist->celular = $input['celular'];
			$dist->domicilio_personal = $input['domicilio_personal'];
			$dist->domicilio_entrega = $input['domicilio_entrega'];
			$dist->nivel = 1;
			$dist->limite_credito = $input['limite_credito'];
			$dist->codigo = $codigo;
			$dist->save();


			/*foreach ($input['nombre_ref'] as $key => $value) {
			//echo $value;
			//echo $data['telefono_ref'][$key];



			}*/
			
				return Redirect::to('distribuidor');
		}

		return Redirect::to('distribuidor/nuevo')
			->withInput()
			->withErrors($validation)
			->with('message', 'Existen errores al validar la informacion');




	}


	public function createReferencia($id)
	{
		return View::make('distribuidor.createReferencia')
									->with('id', $id);
	}

	public function saveReferencia()
	{
		$input = Input::all();
		//var_dump($input);

		$rules = array('nombre_ref' => 'required',
										'telefono_ref' => 'required' );

		$validation = Validator::make($input, $rules);

		if($validation->passes())
		{
				$ref = new ReferenciasPersonales;
				$ref->distribuidor_id = $input['distribuidor_id'];
				$ref->nombre = $input['nombre_ref'];
				$ref->telefono = $input['telefono_ref'];
				$ref->save();

				return Redirect::route('distribuidor.alone', $input['distribuidor_id']);
		}

		return Redirect::route('distribuidor.createReferencia', $input['distribuidor_id'])
			->withInput()
			->withErrors($validation)
			->with('message', 'Existen errores al validar la informacion');


	}

	public function show($id)
	{
		
		$distribuidor = $this->distribuidor->find($id);

		$referencias = ReferenciasPersonales::where('distribuidor_id', '=', $id)->get();

		//var_dump($distribuidor);
		//var_dump($referencias);
		$data = array('distribuidor' => $distribuidor, 'referencias' => $referencias);
		return View::make('distribuidor.show')->with($data);
	}

	public function modificar($id)
	{
		
		$distribuidor = $this->distribuidor->find($id);

		if(is_null($distribuidor)){
			return Redirect::route('distribuidor.index');
		}
		
		return View::make('distribuidor.modificar', compact('distribuidor'));
	}

	public function update()
	{
		$input = Input::all();

		$validation = Validator::make($input, DistribuidorController::$rules);

		if($validation->passes())
		{
			$dist = Distribuidor::find($input['distribuidor_id']);
			$dist->nombre = $input['nombre'];
			$dist->apellidos = $input['apellidos'];
			$dist->telefono = $input['telefono'];
			$dist->email = $input['email'];
			$dist->celular = $input['celular'];
			$dist->domicilio_personal = $input['domicilio_personal'];
			$dist->domicilio_entrega = $input['domicilio_entrega'];
			$dist->nivel = 1;
			$dist->limite_credito = $input['limite_credito'];
			$dist->save();


			return Redirect::route('distribuidor.alone',$input['distribuidor_id']);
			
		}

		return Redirect::route('distribuidor.modificar', $input['distribuidor_id'])
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');

	}

	

	public function drop($id)
	{
		//$data = Input::all();
		//var_dump($data);
		$user = $this->distribuidor->find($id);
		$user->nivel = -1;
		$user->save();

		return Redirect::route('distribuidor.index');
	}

	public function alone($id)
	{
		$distribuidor = $this->distribuidor->findOrFail($id);

		return View::make('distribuidor.alone', compact('distribuidor'));
	}

	public function modificarReferencia($id)
	{
		$referencia = ReferenciasPersonales::find($id);
		//var_dump($referencia);
		return View::make('distribuidor.modificar-referencia', compact('referencia'));
	}

	public function updateReferencia()
	{
		$input = Input::all();

		$rules = array('nombre_ref' => 'required',
				'telefono_ref' => 'required' );

		$validation = Validator::make($input,$rules);

		if($validation->passes())
		{
			$referencia = ReferenciasPersonales::find($input['referencia_id']);
			$referencia->nombre	= $input['nombre_ref'];
			$referencia->telefono = $input['telefono_ref'];
			$referencia->save();

			return Redirect::route('distribuidor.alone', $input['distribuidor_id']);
		}

		return Redirect::route('distribuidor.modificarReferencia', $input['referencia_id'])
										->withInput()
										->withErrors($validation)
										->with('message', 'Existen errores al procesar la informacion');


	}

	public function dropReferencia($id)
	{
		$referencia = ReferenciasPersonales::find($id);
		$distribuidor_id = $referencia->distribuidor_id;
		$referencia->delete();

		return Redirect::route('distribuidor.alone',$distribuidor_id);
	}
}
