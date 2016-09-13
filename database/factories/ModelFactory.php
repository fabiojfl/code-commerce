<?php

$factory->define('App\User', function ($faker)
{
	return [
        'name' => $faker->name,
        'email' => $faker->email,
       'cep' => $faker->number,
       'endereco' => $faker->address,
       'destinatario' => $faker->streetName,
       'numero' => $faker->buildingNumber,
       'complemento' => $faker->streetAddress,
       'bairro' => $faker->cityPrefix,
       'cidade' => $faker->city,
       'estado' => $faker->country,
       'is_admin' => $faker->email,



        /*
                                'cep'
                                'endereco'
                                'destinatario'
                                'numero'
                                'complemento'
                                'bairro'
                                'cidade'
                                'estado'
                                'is_admin'
                                */


        'password' => str_random(10),
        'remember_token' => str_random(10),

    ];
});