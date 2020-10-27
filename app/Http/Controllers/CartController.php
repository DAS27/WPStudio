<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('cart.cart');
    }

    public function addToCart(Request $request)
    {
        $product = Product::where('id', $request->id)->first();
        if (!isset($_COOKIE['cart_id'])) {
            setcookie('cart_id', uniqid());
        }
        $cartId = $_COOKIE['cart_id'];
        \Cart::session($cartId);

        \Cart::add([
            'id' => $product->id,
            'name' => $product->title,
            'price' => $product->price_new ? $product->price_new : $product->price,
            'quantity' => (int) $request->qty,
            'attributes' => [],
        ]);

        return response()->json(\Cart::getContent());
    }
}
