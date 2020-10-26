<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
        $faker = Factory::create();
        DB::table('products')->insert([
            [
                'name' => 'Dog Calcium Food',
                'slug' => 'dog-calcium-food',
                'sku' => 'MS04',
                'description' => 'Founded in 1989, Jack & Jones is a Danish brand that offers cool, relaxed designs that express a strong visual style through their diffusion lines, Jack & Jones intelligence and Jack & Jones vintage.',
                'price' => 20.00,
                'price_old' => 50.00,
                'image_path' => 'assets/img/product-details/l1.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Dry Dog Food',
                'slug' => 'dry-dog-food',
                'sku' => "{$faker->word}{$faker->numberBetween(10, 90)}",
                'description' => $faker->text,
                'price' => 110.00,
                'price_old' => null,
                'image_path' => 'assets/img/basket/cart-3.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Cat Buffalo Food',
                'slug' => 'cat-buffalo-food',
                'sku' => "{$faker->word}{$faker->numberBetween(10, 90)}",
                'description' => $faker->text,
                'price' => 150.00,
                'price_old' => null,
                'image_path' => 'assets/img/basket/cart-4.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Legacy Dog Food',
                'slug' => 'legacy-dog-food',
                'sku' => "{$faker->word}{$faker->numberBetween(10, 90)}",
                'description' => $faker->text,
                'price' => 170.00,
                'price_old' => null,
                'image_path' => 'assets/img/basket/cart-5.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
