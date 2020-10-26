<?php

namespace App\Repositories\Interfaces;

use App\Models\Product;

interface ProductRepositoryInterface
{
    public function getProducts();
    public function getProductsByIds(Product $product);
}
