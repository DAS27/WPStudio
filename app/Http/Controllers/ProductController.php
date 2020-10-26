<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductController extends Controller
{
    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $products = $this->productRepository->getProducts();
        return view('product-details')->with($products);
    }

    public function show($id)
    {
        $product_id = Product::find($id);
        $products = $this->productRepository->getProductsByIds($product_id);

        return view('product-details')->with($products);
    }
}
