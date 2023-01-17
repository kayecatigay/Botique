<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;


class CartController extends Controller
{
    public function AddToCart()
    {
        if(isset(Auth()->user()->id))
        {
            // $cartlist = DB::select('select * from cart where userid=' .Auth()->user()->id);
            $cartlist = DB::table('cart')
                ->join('products', 'products.id', '=', 'cart.product_id')
                ->where('userid', Auth()->user()->id)
                ->get();
            // dd($cartlist);
            return view('cart',['cart'=>$cartlist]);
            // return view('home');
        }
        else
        { return redirect('/');    }
        
    }

    public function SaveCart(Request $request) { 
        //dd(Auth()->user()->id); 
        DB::insert('insert into cart(product_id,cart_quantity,userid) values(' .$request->input('id') .',1,' .Auth()->user()->id .')');
        return redirect('/');
     }
}
