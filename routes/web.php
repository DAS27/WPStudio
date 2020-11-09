<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'home')->name('home');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::delete('/cart/item-remove', [CartController::class, 'removeFromCart'])->name('cart.item.remove');
Route::patch('/cart/item-inc', [CartController::class, 'incrementCount'])->name('cart.item.inc');
Route::patch('/cart/item-dec', [CartController::class, 'decrementCount'])->name('cart.item.dec');
Route::patch('/cart/item-update', [CartController::class, 'updateCount'])->name('cart.item.update');
