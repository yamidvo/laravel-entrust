<?php

class RolesController extends \BaseController {

	
    public function __construct()
    {
        $this->beforeFilter('ver_roles', array('only' => 'index') );
        $this->beforeFilter('crear_roles', array('only' => 'create') );
        $this->beforeFilter('crear_roles', array('only' => 'store') );
        $this->beforeFilter('editar_roles', array('only' => 'edit') );
        $this->beforeFilter('editar_roles', array('only' => 'update') );
        $this->beforeFilter('eliminar_roles', array('only' => 'delete') );
    }
    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		Return View::make('role.role', array('roles' => Role::all(), 'permisos' => Permission::all()));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('role.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$role = new Role();
        $role->name = Input::get('name');
        $role->save();
        
        return Redirect::route('roles.index');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('role.edit', array('role' => Role::find($id)));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$role = Role::find($id);
        $role->name = Input::get('name');
        $role->save();
        return Redirect::route('roles.index');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Role::destroy($id);
        return Redirect::route('roles.index');
	}


}
