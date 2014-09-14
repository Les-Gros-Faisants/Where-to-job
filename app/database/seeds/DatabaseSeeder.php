<?php

class DatabaseSeeder extends Seeder {

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
			'email'         => 'juju@gmail.com',
			'lastname'         => 'Ganichot',
			'firstname'         => 'Julien',
			'password'         => Hash::make('indahood'),
			'address'         => 'Rue des énormes Faisants',
			'city'         => 'Strasbourg',
			'job'         => 'Branleur',
			'infos'         => 'Guitariste, Chien de la casse',
			));
		$this->command->info('User created => mail : juju@gmail.com => password : indahood');

		$mainuser2 = User::create(array(
			'email'         => 'lolo@gmail.com',
			'lastname'         => 'Mendiondo',
			'firstname'         => 'Loris',
			'password'         => Hash::make('saumon'),
			'address'         => 'Rue des arabes',
			'city'         => 'Strasbourg',
			'job'         => 'Saumoniste',
			'infos'         => 'Inconnues',
			));

		$this->command->info('User created => mail : lolo@gmail.com => password : saumon');

		Location::create(array(
			'location'  => '30 Quai des Bateliers',
			'city'  => 'Strasbourg',
			'name'  => "Jimmy's bar",
			'ambiance' => 'Tamisée',
			'user_id' => $mainuser->id
			));
		Location::create(array(
			'location'  => '56 Grand Rue',
			'city'  => 'Strasbourg',
			'name'  => "L'artichaut",
			'ambiance' => 'Sobre',
			'user_id' => $mainuser->id
			));
		Location::create(array(
			'location'  => '7 rue du Vieux Marché aux Poissons',
			'city'  => 'Strasbourg',
			'name'  => 'The Dubliners',
			'ambiance' => 'Chère',
			'user_id' => $mainuser->id
			));
		Location::create(array(
			'location'  => '3 Rue des Soeurs',
			'city'  => 'Strasbourg',
			'name'  => "L'Alchimiste",
			'ambiance' => 'Magique',
			'user_id' => $mainuser2->id
			));
		Location::create(array(
			'location'  => '18 rue des Tonneliers',
			'city'  => 'Strasbourg',
			'name'  => 'Le Berthom',
			'ambiance' => 'Sombre',
			'user_id' => $mainuser2->id
			));

		Location::create(array(
			'location'  => '26 Rue de la Justice',
			'city'  => 'Mulhouse',
			'name'  => 'La Parenthèse',
			'ambiance' => 'Sombre',
			'user_id' => $mainuser2->id
			));
		Location::create(array(
			'location'  => '10 Passage Teutonique',
			'city'  => 'Mulhouse',
			'name'  => 'La Taverne des Chevaliers Teutoniques',
			'ambiance' => 'Chevalersque',
			'user_id' => $mainuser2->id
			));
		Location::create(array(
			'location'  => '18 Passage des Augustins',
			'city'  => 'Mulhouse',
			'name'  => 'Salsa Café',
			'ambiance' => 'Moche',
			'user_id' => $mainuser2->id
			));
		Location::create(array(
			'location'  => '2 Avenue de Lutterbach',
			'city'  => 'Mulhouse',
			'name'  => 'ZEN',
			'ambiance' => 'Zen',
			'user_id' => $mainuser2->id
			));

		Location::create(array(
			'location'  => '230 5th Ave',
			'city'  => 'New York',
			'name'  => '230 Fifth',
			'ambiance' => 'Mood',
			'user_id' => $mainuser2->id
			));
		Location::create(array(
			'location'  => '95 1st Ave',
			'city'  => 'New York',
			'name'  => 'Upstate',
			'ambiance' => 'Smooth',
			'user_id' => $mainuser2->id
			));
		Location::create(array(
			'location'  => '115 Broadway',
			'city'  => 'New York',
			'name'  => 'Trinity Place bar & Restaurant',
			'ambiance' => 'Rech',
			'user_id' => $mainuser2->id
			));
		
		$this->command->info('5 Locations crees');

	}

}
