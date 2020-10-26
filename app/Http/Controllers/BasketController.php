<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class BasketController extends Controller
{
    private $basket;

    public function __construct()
    {
        $this->basket = json_decode(Cookie::get('basket'));
        if ($this->basket == null) {
            $this->basket = [];
        }
    }

    public function addToBasket($id)
    {
        Cookie::get('basket');
    }
    /*
    public function getBasket()
    {

    }
    */
    public function updateCart($id, $count)
    {
        $temp = array_map(function ($item) use ($id, $count) {
            if ($item[0] === $id) {
                return [$id, $count];
            }
            return $item;
        }, $this->basket);
        Cookie::queue('basket', json_encode($this->basket), 60);
        return $this->basket;
    }
}
