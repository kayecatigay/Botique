<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = DB::select('select * from products');
        $cart = DB::select("select * from cart where  userid = " .Auth()->user()->id );
        // dd($cart);
        return view('home',['products'=>$products,'countcart'=>count($cart)]);
        // return view('home');
    }
}
