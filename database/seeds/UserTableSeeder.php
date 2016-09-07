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
            'name'          => 'fabiojs',
            'email'         => 'fabiojs@gmail.com',
            'password'      => bcrypt('admin'),
            'cep'           => 72765766,
            'endereco'      => 'Rua Fonceca de Souza',
            'destinatario'  => 'Fábio Jose',
            'numero'        => 12,
            'complemento'   => 'Casa 23',
            'bairro'        => 'Madureira',
            'cidade'        => 'Rio de Janeiro',
            'estado'        => 'RJ',

            'is_admin' => 1,
            'remember_token' => str_random(10),
        ]);

        $faker = Faker::create();

        foreach(range(1,2) as $i)
        {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt($faker->password),
                'name' => $faker->name,
                'email' => $faker->email,
                'cep' => $faker->buildingNumber,
                'endereco' => $faker->address,
                'destinatario' => $faker->streetName,
                'numero' => $faker->buildingNumber,
                'complemento' => $faker->streetAddress,
                'bairro' => $faker->cityPrefix,
                'cidade' => $faker->city,
                'estado' => $faker->country,
                'is_admin' => $faker->numberBetween(0,2),
                'remember_token' => str_random(10),
            ]);
        }


    }
}