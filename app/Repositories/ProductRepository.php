<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function getProducts()
    {
        return Product::all();
    }

    public function getProductsById($id)
    {
        return Product::where('id', $id)->first();
    }
}
