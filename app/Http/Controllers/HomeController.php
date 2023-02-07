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

    public function myorders()
    {
        $sales = DB::select("select s.id as sid,s.order_num,s.user_id,s.total_num,s.status,stat.id as stid,stat.Sname from sales as s inner join status as stat on s.status=stat.id where s.user_id=" .Auth()->user()->id);
        // dd($sales);
        return view('myorders',['salesinfo'=>$sales]);
    }

    public function orders($oid)
    {
        $orders = DB::select('select * from orders where ordernum="' .$oid  .'" and userid=' .Auth()->user()->id  );
        return $orders;
    }
}
