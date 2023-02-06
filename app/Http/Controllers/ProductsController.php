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
        $totalamount=str_replace(",","",$request->input('totalnum'));
        $ordernum=Auth()->user()->id ."-"  .Date("d")  .Date("i");
        // dd($allprod);
        for ($x = 0; $x <= count($allprod)-2; $x++) {
            $allinsert.="(" .Auth()->user()->id .",'" .$ordernum ."','" .$allprod[$x] ."'," .$allprice[$x] ."," .$allqty[$x] ."),";
          }
        $allinsert=substr($allinsert,0,-1);
        DB::insert($allinsert);
        DB::insert("insert into sales(order_num,user_id,address,contact_num,payment_type,discount,total_num,date_sales) values('" .$ordernum  ."'," .Auth()->user()->id .",'"  .$request->input('address') ."','" .$request->input('contact') ."','" .$request->input('payment') ."'," .$request->input('discounttext') .","  .$totalamount .",'" .Date("Y-m-d") ."')");
        DB::delete("DELETE FROM cart WHERE userid = " .Auth()->user()->id);

        return redirect('/cart');  

    }

    public function CheckVoucher(Request $request)
    {
        $voucher = DB::select("select * from vouchers where  Vcode = '" .$request->input('discount') ."'");
        
        if($voucher)
            { return $voucher[0];}
        else
            {return NULL;}
            
    }

    public function DeleteVou(Request $request){
        // dd($request->input('vdelchrid'));
        DB::delete("DELETE FROM vouchers WHERE id = " .$request->input('vdelchrid'));
        return redirect('/voucherlist');
    }

        
}
