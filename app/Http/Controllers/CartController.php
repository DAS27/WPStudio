<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        if (!is_null($_COOKIE['cart_id'])) {
            $cartId = $_COOKIE['cart_id'];
            $item = \Cart::session($cartId)->getContent()->first();
            return view('cart.cart', compact('item'));
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

    public function removeFromCart()
    {
        $cartId = $_COOKIE['cart_id'];
        $product = \Cart::session($cartId)->getContent()->first();
        \Cart::session($cartId)->remove($product->id);
        return view('cart.cart');
    }
}
