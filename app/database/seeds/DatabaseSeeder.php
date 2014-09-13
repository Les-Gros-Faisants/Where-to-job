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

		$this->call('UserTableSeeder');
		$this->command->info('LOL PD !');
	}

}

class UserTableSeeder extends Seeder {
	
	public function run() {

		DB::table('comments')->delete();
		DB::table('users')->delete();
		DB::table('migrations')->delete();
		DB::table('locations')->delete();


		User::create(array(
			'email'         => 'cul@mail.com',
			'lastname'         => 'cul',
			'firstname'         => 'cul',
			'password'         => Hash::make('cul'),
			'address'         => 'rue du cul',
			'city'         => 'culcity',
			'job'         => 'culiste',
			'infos'         => 'groscul',
			));

		$this->command->info('User created : mail : cul@mail.com : password : cul');

		// Location::create(array(
		// 	'location'  => 'rue des gros culs',
		// 	'city'  => 'grosculcity',
		// 	'name'  => 'le bar des culs',
		// 	'user_id' => '2',
		// 	'ambiance' => 'culisee'
		// 	));
		// Location::create(array(
		// 	'location'  => 'rue des petits culs',
		// 	'city'  => 'petitculcity',
		// 	'name'  => 'le bar des petits culs',
		// 	'user_id' => '2',
		// 	'ambiance' => 'nulle'
		// 	));
		// Location::create(array(
		// 	'location'  => 'rue des mega culs',
		// 	'city'  => 'megaculcity',
		// 	'name'  => 'le bar des mega culs',
		// 	'user_id' => '2',
		// 	'ambiance' => 'defonce'
		// 	));

		// $this->command->info('Locations crées');	

	}

}
