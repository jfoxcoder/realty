<?php

use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->delete();


        $me = User::create(array(
            'email' => 'jfoxcoder@gmail.com',
            'password' => '1234',
            'admin' => true
        ));

        $homer = User::create(array(
           'email' => 'homer@gmail.com',
            'password' => '1234',
            'admin' => false
        ));

        $marge = User::create(array(
            'email' => 'marge@gmail.com',
            'password' => '1234',
            'admin' => false
        ));


    }

}
