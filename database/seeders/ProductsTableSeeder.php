<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        DB::table('products')->insert([
            [
                'title' => 'Dog Calcium Food',
                'sku' => 'MS04',
                'price_new' => 20.00,
                'price' => 50.00,
                'description' => 'Founded in 1989, Jack & Jones is a Danish brand that offers cool, relaxed designs that express a strong visual style through their diffusion lines, Jack & Jones intelligence and Jack & Jones vintage.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Dry Dog Food',
                'sku' => null,
                'description' => $faker->text,
                'price_new' => null,
                'price' => 110.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Cat Buffalo Food',
                'sku' => null,
                'description' => $faker->text,
                'price_new' => null,
                'price' => 150.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Legacy Dog Food',
                'sku' => null,
                'description' => $faker->text,
                'price_new' => null,
                'price' => 170.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
