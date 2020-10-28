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
                'img_small' => 'assets/img/product-details/s1.jpg',
                'img_large' => 'assets/img/product-details/l1.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'product_id' => 2,
                'img_small' => 'assets/img/product-details/s2.jpg',
                'img_large' => 'assets/img/product-details/l2.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'product_id' => 3,
                'img_small' => 'assets/img/product-details/s3.jpg',
                'img_large' => 'assets/img/product-details/l3.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'product_id' => 4,
                'img_small' => 'assets/img/product-details/s4.jpg',
                'img_large' => 'assets/img/product-details/l4.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
