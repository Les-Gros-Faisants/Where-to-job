<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration {

	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up()
	{
		Schema::create('locations', function($table)
		{
			$table->increments('id');
			$table->integer('user_id');
/*			$table->foreign('user_id')->references('id')->on('users');*/
			$table->string('location');
			$table->string('city');
			$table->string('name');
			$table->string('photos');
			$table->string('ambiance');
		});
	}

	/**
	* Reverse the migrations.
	*
	* @return void
	*/
	public function down()
	{
		Schema::drop('locations');
	}

}
