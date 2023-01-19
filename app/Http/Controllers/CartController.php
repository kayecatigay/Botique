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
            $cart = DB::select("select * from cart where  userid = " .Auth()->user()->id );
            $cartlist = DB::table('cart')
                ->join('products', 'products.id', '=', 'cart.product_id')
                ->where('userid', Auth()->user()->id)
                ->get();
            // dd($cartlist);
            return view('cart',['cart'=>$cartlist,'countcart'=>count($cart)]);
            // return view('home');
        }
        else
        { return redirect('/');    }
        
    }

    public function SaveCart(Request $request) { 
        //dd(Auth()->user()->id); 
        $sql = "select * from cart where product_id = ".$request->input('id') ." and userid = " .Auth()->user()->id ;
        $cart = DB::select($sql);
        //dd("asas");
        if(count($cart) == 0)
        {
            DB::insert('insert into cart(product_id,cart_quantity,userid) values(' .$request->input('id') .',1,' .Auth()->user()->id .')');
        }
        else
        {
            $updatesql = "update cart SET cart_quantity='" .(($cart[0]->cart_quantity)+1) ."' where userid= " .Auth()->user()->id ." and product_id = " .$request->input('id');
            $cart = DB::update($updatesql);
        }
        // dd("hghghg");
        
        //DB::insert('insert into cart(product_id,cart_quantity,userid) values(' .$request->input('id') .',1,' .Auth()->user()->id .')');
        return redirect('/');
     }
}
