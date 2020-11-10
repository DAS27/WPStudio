<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $products = \Cart::getContent();
        $sortedProducts = $products->sortByDesc(function ($item) {
            return $item['attributes']['date_insert'];
        });
        return view('cart.cart', compact('sortedProducts'));
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
                'img_l' => $product->images[0]->img_large,
                'date_insert' => Carbon::now()
            ],
        ]);

        return response()->json(\Cart::getContent());
    }

    public function updateCount(Request $request)
    {
        $productId = Product::where('id', $request->id)
            ->pluck('id')
            ->first();
        \Cart::update($productId, [
            'quantity' => [
                'relative' => false,
                'value' => (int) $request->qty
            ],
        ]);
        return view('cart.cart');
    }

    public function removeFromCart(Request $request)
    {
        $productId = Product::where('id', $request->id)
            ->pluck('id')
            ->first();
        \Cart::remove($productId);
        return view('cart.cart');
    }

    public function incrementCount(Request $request)
    {
        $productId = Product::where('id', $request->id)
            ->pluck('id')
            ->first();
        \Cart::update($productId, [
            'quantity' => 1,
        ]);
        return view('cart.cart');
    }

    public function decrementCount(Request $request)
    {
        $productId = Product::where('id', $request->id)->pluck('id')->first();
        \Cart::update($productId, [
            'quantity' => -1,
        ]);
        return view('cart.cart');
    }
}
