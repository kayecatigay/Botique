<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function CheckOut(Request $request)
    {
        dd('insert into orders(user_id,address,contact_num,payment_type) values("' .$request->input('userid') .'",' .$request->input('address') .',' .$request->input('contact') .',"' .$request->input('payment') .'") ');
        DB::insert('insert into orders(user_id,address,contact_num,payment_type) values("' .$request->input('userid') .'",' .$request->input('address') .',' .$request->input('contact') .',"' .$request->input('payment') .'") ');

        // DB::insert('insert into sales(productname,price,quantity,image,category) values("' .$request->input('txtname') .'",' .$request->input('txtprice') .',' .$request->input('txtqty') .',"' .$request->input('txtupload') .'","' .$request->input('category') .'") ');

        dd("okokok");

    }
        
}
