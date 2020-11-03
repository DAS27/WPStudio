<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        if (!empty($_COOKIE['cart_id'])) {
            $cartId = $_COOKIE['cart_id'];
            $products = \Cart::session($cartId)->getContent();
            return view('cart.cart', compact('products'));
        }
        return view('cart.cart');
    }

    public function addToCart(Request $request)
    {
        $product = Product::where('id', $request->id)->first();
        if (!isset($_COOKIE['cart_id'])) {
            $cartId = setcookie('cart_id', uniqid());
        } else {
            $cartId = $_COOKIE['cart_id'];
        }
        \Cart::session($cartId);

        \Cart::add([
            'id' => $product->id,
            'name' => $product->title,
            'price' => (int) $product->price_new ? $product->price_new : $product->price,
            'quantity' => (int) $request->qty,
            'attributes' => [
                'img_s' => $product->images[0]->img_small,
                'img_l' => $product->images[0]->img_large
            ],
        ]);

        return response()->json(\Cart::getContent());
    }

    public function removeFromCart(Request $request)
    {
        $cartId = $_COOKIE['cart_id'];
        $product = Product::where('id', $request->id)->first();
        \Cart::session($cartId)->remove($product->id);
        return view('cart.cart');
    }
}
