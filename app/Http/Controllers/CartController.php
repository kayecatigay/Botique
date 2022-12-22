<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;


class CartController extends Controller
{
    public function AddToCart()
    {
        $cartlist = DB::select('select * from cart where userid=' .Auth()->user()->id);
        //dd($cartlist);
        return view('cart',['cart'=>$cartlist]);
        // return view('home');
    }
}
