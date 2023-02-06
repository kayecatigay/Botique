<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UploadFileController extends Controller {
   public function index() {
      return view('uploadfile');
   }
   public function showUploadFile(Request $request) 
   {  
      $file = $request->file('image');
      //Move Uploaded File
      $destinationPath = 'uploads';
      $file->move($destinationPath,$file->getClientOriginalName());
      DB::insert('insert into products(productname,price,quantity,image,category) values("' .$request->input('txtname') .'",' .$request->input('txtprice') .',' .$request->input('txtqty') .',"' .$file->getClientOriginalName() .'","' .$request->input('category') .'") ');
      return redirect('/productlist');
   }
   public function index2(){
      return view('uploadvoucher');
   }
   public function showVoucher(Request $request) 
   {
      $file = $request->file('image');
      //Move Uploaded File
      $destinationPath = 'uploads';
      $file->move($destinationPath,$file->getClientOriginalName());
      DB::insert('insert into products(productname,price,quantity,image,category) values("' .$request->input('txtname') .'",' .$request->input('txtprice') .',' .$request->input('txtqty') .',"' .$file->getClientOriginalName() .'","' .$request->input('category') .'") ');
      return redirect('/productlist');
   }
}