<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_images')->insert([
            [
                'product_id' => 1,
                'img' => 'assets/img/product-details/l1.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'product_id' => 2,
                'img' => 'assets/img/basket/cart-3.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'product_id' => 3,
                'img' => 'assets/img/basket/cart-4.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'product_id' => 4,
                'img' => 'assets/img/basket/cart-5.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
