<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ContactsTableSeeder extends Seeder {

	public function run()
	{
        DB::table('contacts')->delete();
		$faker = Faker::create();

		foreach(range(1, 20) as $index)
		{
            Contact::create(array(
                'name' => ($faker->boolean() ? $faker->name: $faker->firstName),
                'email' => $faker->email,
                'phone' => ($faker->boolean() ? $faker->phoneNumber : null),
                'message' => $faker->realText(),
                'replied' => false
            ));
		}
	}

}