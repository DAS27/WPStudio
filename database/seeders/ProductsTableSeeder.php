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
                'price' => 20.00,
                'price_old' => 50.00,
                'description' => 'Founded in 1989, Jack & Jones is a Danish brand that offers cool, relaxed designs that express a strong visual style through their diffusion lines, Jack & Jones intelligence and Jack & Jones vintage.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Dry Dog Food',
                'sku' => null,
                'description' => $faker->text,
                'price' => 110.00,
                'price_old' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Cat Buffalo Food',
                'sku' => null,
                'description' => $faker->text,
                'price' => 150.00,
                'price_old' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Legacy Dog Food',
                'sku' => null,
                'description' => $faker->text,
                'price' => 170.00,
                'price_old' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
