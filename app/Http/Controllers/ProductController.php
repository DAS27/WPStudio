<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductController extends Controller
{
    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function show($id)
    {
        $product = $this->productRepository->getProductsById($id);
        return view('product.product-details', ['product' => $product]);
    }
}
