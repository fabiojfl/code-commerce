<?php

use Illuminate\Database\Seeder;
//use Illuminate\Database\Eloquent\Model;
use \CodeCommerce\ProductTag;
use Faker\Factory as Faker;

class ProductTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_tag')->truncate();


        $faker = Faker::create();


            //ProductTag::create(['product_id' => 1,'tag_id' => 1]);


    }
}

