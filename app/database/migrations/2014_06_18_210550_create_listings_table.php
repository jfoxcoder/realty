<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateListingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('listings', function(Blueprint $table)
		{
			$table->increments('id');

            // listing details
            $table->string('title');
			$table->text('description')->nullable();
			$table->decimal('price', 8,2)->nullable();

            // property profile
            $table->integer('land')->nullable(); // square metres
            $table->integer('floor')->nullable(); // square metres
            $table->integer('beds')->nullable(); // number of beds
            $table->integer('baths')->nullable(); // number of bathrooms
            $table->integer('cars')->nullable(); // onsite parking

            // address profile
            $table->integer('suburb_id')->unsigned();
            $table->string('street_number');
            $table->string('street_name');

            // admin who listed the property
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
		Schema::drop('listings');
	}

}
