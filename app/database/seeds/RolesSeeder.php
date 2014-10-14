<?php
	class RolesSeeder extends Seeder {
 
    public function run()
    {
        DB::table('roles')->delete();
        $admin = Role::create(array(
                'name' => 'admin' 
        ));
        
        $permisos = Permission::all();
        foreach($permisos as $permiso){
           $admin->attachPermission($permiso); 
        }
    }
 
}