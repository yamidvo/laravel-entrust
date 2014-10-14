<?php

class UserController extends \BaseController {

    
    public function __construct()
    {
        $this->beforeFilter('ver_usuarios', array('only' => 'index') );
        $this->beforeFilter('crear_usuarios', array('only' => 'create') );
        $this->beforeFilter('crear_usuarios', array('only' => 'store') );
        $this->beforeFilter('editar_usuarios', array('only' => 'edit') );
        $this->beforeFilter('editar_usuarios', array('only' => 'update') );
        $this->beforeFilter('eliminar_usuarios', array('only' => 'delete') );
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();
        foreach($users as $user){
            $user['rol'] = $user->roles()->first();
        }
        return View::make('users.users', array('users' => $users));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $roles = Role::all()->lists('name','id');
		return View::make('users.create', array('roles' => $roles));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
        $input['password'] = Hash::make($input['password']);//hacemos un hash de la contraseña
        
        $user = User::create($input);
        $user->attachRole(Role::find(Input::get('rol')));
        return Redirect::route('users.index');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return 'show';
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $user = User::find($id);
        $userRole = $user->roles()->first();
        $user['rol'] = $userRole;
		return View::make('users.edit', array('user' => $user, 'roles' => Role::all()->lists('name','id')));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$nombre = Input::get('first_name');
        $apellido = Input::get('last_name');
        $username = Input::get('username');
        $email = Input::get('email');
        $password = Hash::make(Input::get('password'));
        
        $user = User::find($id);
        $user->first_name = $nombre;
        $user->last_name = $apellido;
        $user->username = $username;
        $user->email = $email;
        if(!empty(Input::get('password'))){
            $user->password = $password;
        }
        $user->save();
         
        $user->roles()->detach();//no es necesario eliminar la relacion con el antiguo rol ya que la libreria permite tener multiples roles
        
        $user->attachRole(Role::find(Input::get('rol')));
        
        return Redirect::route('users.index');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		User::destroy($id);
        return Redirect::route('users.index');
	}


}
