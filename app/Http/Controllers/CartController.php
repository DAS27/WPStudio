<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $products = \Cart::getContent();
        return view('cart.cart', compact('products'));
    }

    public function addToCart(Request $request)
    {
        $product = Product::where('id', $request->id)->first();
        \Cart::add([
            'id' => $product->id,
            'name' => $product->title,
            'price' => (int) $product->price,
            'quantity' => (int) $request->qty,
            'attributes' => [
                'img_s' => $product->images[0]->img_small,
                'img_l' => $product->images[0]->img_large
            ],
        ]);

        return response()->json(\Cart::getContent());
    }

    public function updateCount(Request $request)
    {
        $product = Product::where('id', $request->id)->first();
        \Cart::update($product->id, [
            'quantity' => [
                'relative' => false,
                'value' => (int) $request->qty
            ],
        ]);
        return view('cart.cart');
    }

    public function removeFromCart(Request $request)
    {
        $product = Product::where('id', $request->id)->first();
        \Cart::remove($product->id);
        return view('cart.cart');
    }

    public function incrementCount(Request $request)
    {
        $product = Product::where('id', $request->id)->first();
        \Cart::update($product->id, [
            'quantity' => 1,
        ]);
        return view('cart.cart');
    }

    public function decrementCount(Request $request)
    {
        $product = Product::where('id', $request->id)->first();
        \Cart::update($product->id, [
            'quantity' => -1,
        ]);
        return view('cart.cart');
    }
}
