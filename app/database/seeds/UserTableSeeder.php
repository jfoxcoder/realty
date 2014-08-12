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

        $testPassword = '1234';


        $me = User::create(array(
            'email' => 'jfoxcoder@gmail.com',
            'password' => $testPassword,
            'admin' => true
        ));

        $jeffrey = User::create(array(
            'email' => 'jeffrey.Hong@visioncollege.ac.nz',
            'password' => $testPassword,
            'admin' => true
        ));

        $homer = User::create(array(
           'email' => 'homer@gmail.com',
            'password' => $testPassword,
            'admin' => false
        ));

        $marge = User::create(array(
            'email' => 'marge@gmail.com',
            'password' => $testPassword,
            'admin' => false
        ));


    }

}
