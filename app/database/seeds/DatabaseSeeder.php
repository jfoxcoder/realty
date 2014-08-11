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
        $this->call('ContactsTableSeeder');
        $this->call('RegionsTableSeeder');
        $this->call('TownsTableSeeder');
        $this->call('SuburbsTableSeeder');
        $this->call('ListingsTableSeeder');
        $this->call('PhotosTableSeeder');

	}

}
