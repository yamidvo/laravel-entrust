<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

        $this->call('PermisionsSeeder');
        $this->call('RolesSeeder');
		$this->call('UserSeeder');
        $this->command->info('Datos insertados!');
	}

}
