<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Product;
use Faker\Factory as Faker;

class ProductTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->truncate();


        $faker = Faker::create();

        // nao consigo fazer o featured recommend
        foreach(range(1,15) as $i)
        {
            Product::create([
                'name'        => $faker->word(),
                'description' => $faker->sentence(),
                'price'       => $faker->numberBetween($min = 10, $max = 10000),
                'featured'    => $faker->numberBetween($min = 0, $max = 1),
                'recommend'   => $faker->numberBetween($min = 0, $max = 1)
            ]);
        }

    }
}