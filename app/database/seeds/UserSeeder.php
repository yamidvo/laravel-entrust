<?php
	class UserSeeder extends Seeder {
 
    public function run()
    {
        DB::table('users')->delete();
        $user = User::create(array(
                'id' => 1,
                'username' => 'admin',
                'first_name' => 'Yamid',
                'last_name' => 'Viloria Ortega',
                'email' => 'admin@admin.com',
                'password' => Hash::make('1234'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime      
        ));
        $role = Role::where('name', '=', 'admin')->get()->first();
        $user->attachRole( $role );
    }
 
}