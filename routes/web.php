<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $products = DB::select('select * from products');
    if(Auth()->user())
    {
        $cart = DB::select("select * from cart where  userid = " .Auth()->user()->id );
        return view('home',['products'=>$products,'countcart'=>count($cart)]);
            
    }
    else
    {
        return view('home',['products'=>$products]);
    }
});

Route::get('/category/{catid}', function ($catid) {
    $products = DB::select('select * from products where category=' .$catid);
    return view('home2',['products'=>$products]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/RecentSales', function () {
    $sales = DB::select('select * from sales');
    return view('dashboard',['sales'=>$sales]);
});

Route::get('/home2', function () {
    
    return view('home2');
});

Route::get('/test', function () {
    
    return view('bootstrap');
});

Route::get('/gmaps', function () {
    
    return view('gmaps');
});

Route::get('/users', function () {
    $users = DB::select('select * from users ');
    //dd($users);
    return view('users',['user'=>$users]);
});

Route::get('/deleteuser/{userid}', function ($userid) {
    DB::table('users')->delete($userid);
    //dd($users);
    echo"User has been deleted!";
});

Route::get('/productlist', function () {
    $products = DB::select('select * from products');
    //dd($products);
    return view('products',['products'=>$products]);
});

Route::get('/addproduct', function () {
    return view('addproduct');
});

Route::get('/insertproduct', function (Request $request) {
    DB::insert('insert into products(productname,price,quantity,image,category) values("' .$request->input('txtname') .'",' .$request->input('txtprice') .',' .$request->input('txtqty') .',"' .$request->input('txtupload') .'","' .$request->input('category') .'") ');
    return redirect('/productlist');
});


Route::get('/editproduct', function (Request $request) {
    $prodid=$request->input('txtid');
    $prod = DB::select('select * from products where id=' .$prodid);
    //dd($prod);
    return view('editproduct',['prod'=>$prod]);
    
});

Route::get('/updateproduct', function (Request $request) {
   $updatedb=DB::update('update products set productname="' .$request->input('txtname') .'",category=' .$request->input('category') .',price=' .$request->input('txtprice') .',quantity=' .$request->input('txtqty') .' where id=' .$request->input('txtid') .' ');
   // return $name;
   //DB::insert('insert into products(productname,price,quantity) values("dog",34,5)');
   $products = DB::select('select * from products');
   return view('products',['products'=>$products]);
// return 'update products set productname="' .$request->input('txtname') .'",price=' .$request->input('txtprice') .',quantity=' .$request->input('txtqty') .' where productid=' .$request->input('txtid') .' ';
});

Route::get('/addvoucher', function () {
    return view('addvoucher');
});

Route::get('/deletevoucher',[App\Http\Controllers\ProductsController::class, 'DeleteVou']);

Route::get('/voucherlist', function () {
    $vouchers = DB::select('select * from vouchers');
    //dd($products);
    return view('voucher',['voucher'=>$vouchers]);
});

Route::get('/editvoucher', function (Request $request) {
    $vchrid=$request->input('vchrid');
    $voucher = DB::select('select * from vouchers where id=' .$vchrid);
    //dd($prod);
    return view('editvoucher',['voucher'=>$voucher]); 
});

Route::get('/updatevoucher', function (Request $request) {
    $updatevc=DB::update('update vouchers set Vcode="' .$request->input('vcode') .'",Vname="' .$request->input('vname') .'",Vpercentage=' .$request->input('vperc') .' ');
    $vouchers = DB::select('select * from vouchers');
    return view('voucher',['voucher'=>$vouchers]);
});

Route::get('/return', function () {
    return view('return');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/shop', function () {
    return view('shop');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/uploadfile',[App\Http\Controllers\UploadFileController::class, 'index']);
Route::post('/uploadfile',[App\Http\Controllers\UploadFileController::class, 'showUploadFile']);

Route::get('/uploadvoucher',[App\Http\Controllers\UploadFileController::class, 'index2']);
Route::post('/uploadvoucher',[App\Http\Controllers\UploadFileController::class, 'showVoucher']);

Route::get('/cart',[App\Http\Controllers\CartController::class, 'AddToCart']);

Route::post('/SavetoCart',[App\Http\Controllers\CartController::class, 'SaveCart']);

Route::post('/deleteitem',[App\Http\Controllers\CartController::class, 'DeleteItem']);

Route::get('/checkout',[App\Http\Controllers\ProductsController::class, 'CheckOut']);

Route::get('/chkvoucher',[App\Http\Controllers\ProductsController::class, 'CheckVoucher']);
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
