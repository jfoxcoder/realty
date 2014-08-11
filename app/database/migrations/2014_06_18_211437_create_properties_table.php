<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePropertiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('properties', function(Blueprint $table)
		{
			$table->increments('id');

            // property profile
			$table->integer('land'); // square metres
            $table->integer('floor'); // square metres
            $table->integer('beds'); // number of beds
            $table->integer('baths'); // number of bathrooms
            $table->integer('cars'); // onsite parking

            // address
            $table->integer('suburb_id')->unsigned();
            $table->integer('created_by')->unsigned();

			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('properties');
	}

}
