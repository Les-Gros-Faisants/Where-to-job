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
		$this->command->info("CA C'EST DU SEED BATARD.");
	}
}

class UserTableSeeder extends Seeder {
	
	public function run() {

		DB::table('comments')->delete();
		DB::table('users')->delete();
		DB::table('locations')->delete();

		$mainuser = User::create(array(
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

		$mainuser2 = User::create(array(
			'email'         => 'bite@mail.com',
			'lastname'         => 'bite',
			'firstname'         => 'bite',
			'password'         => Hash::make('bite'),
			'address'         => 'rue du bite',
			'city'         => 'bitecity',
			'job'         => 'biteiste',
			'infos'         => 'grosbite',
			));

		$this->command->info('User created : mail : bite@mail.com : password : bite');

		$location1 = Location::create(array(
			'location'  => 'rue des gros culs',
			'city'  => 'grosculcity',
			'name'  => 'le bar des culs',
			'ambiance' => 'culisee',
			'user_id' => $mainuser->id
			));
		$location2 = Location::create(array(
			'location'  => 'rue blah',
			'city'  => 'Strasbourg',
			'name'  => 'Exile',
			'ambiance' => 'Sobre',
			'user_id' => $mainuser->id
			));
		$location3 = Location::create(array(
			'location'  => 'rue bloh',
			'city'  => 'Nancy',
			'name'  => 'PD',
			'ambiance' => 'merdique',
			'user_id' => $mainuser->id
			));
		$location4 = Location::create(array(
			'location'  => 'rue des Juifs',
			'city'  => 'Jerusalem',
			'name'  => 'Kipa',
			'ambiance' => 'juive',
			'user_id' => $mainuser2->id
			));


		$this->command->info('Locations crees');

	}

}
