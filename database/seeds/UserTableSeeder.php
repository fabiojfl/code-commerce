<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use CodeCommerce\User;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->truncate();

        User::create([
            'name' => 'fabiojs',
            'email' => 'fabiojs@gmail.com',
            'password' => bcrypt('admin'),
            'is_admin' => 1,
            'remember_token' => str_random(10),
        ]);

        $faker = Faker::create();

        foreach(range(2,9) as $i)
        {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt($faker->password),
                'remember_token' => str_random(10),
            ]);
        }


    }
}