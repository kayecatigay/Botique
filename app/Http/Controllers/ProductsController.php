<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function CheckOut(Request $request)
    {
        $allprod = $request->input('allprod');
        $allprice = $request->input('allprice');
        $allqty = $request->input('allqty');
        $allprod=explode("|*|",$allprod);
        $allprice=explode("|*|",$allprice);
        $allqty=explode("|*|", $allqty);
        $allinsert="insert into orders(userid,ordernum,productname,price,quantity) values";
        $ordernum=Auth()->user()->id ."-"  .Date("d")  .Date("i");
        // dd($allprod);
        for ($x = 0; $x <= count($allprod)-2; $x++) {
            $allinsert.="(" .Auth()->user()->id .",'" .$ordernum ."','" .$allprod[$x] ."'," .$allprice[$x] ."," .$allqty[$x] ."),";
          }
        $allinsert=substr($allinsert,0,-1);
        DB::insert($allinsert);
        DB::insert("insert into sales(order_num,user_id,address,contact_num,payment_type,discount,total_num,date_sales) values('" .$ordernum  ."'," .Auth()->user()->id .",'"  .$request->input('address') ."','" .$request->input('contact') ."','" .$request->input('payment') ."'," .$request->input('discount') ."," .$request->input('totalnum') .",'" .Date("Y-m-d") ."')");
        DB::delete("DELETE FROM cart WHERE userid = " .Auth()->user()->id);

        return redirect('/cart');  

    }
        
}
