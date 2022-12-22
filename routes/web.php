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
    return view('home',['products'=>$products]);
});

Route::get('/category/{catid}', function ($catid) {
    $products = DB::select('select * from products where category=' .$catid);
    return view('home2',['products'=>$products]);
});

Route::get('/dashboard', function () {
    
    return view('dashboard');
});

Route::get('/home2', function () {
    
    return view('home2');
});

Route::get('/test', function () {
    
    return view('bootstrap');
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
    $prod = DB::select('select * from products where productid=' .$prodid);
    //dd($prod);
    return view('editproduct',['prod'=>$prod]);
    
});

Route::get('/updateproduct', function (Request $request) {
   $updatedb=DB::update('update products set productname="' .$request->input('txtname') .'",category=' .$request->input('category') .',price=' .$request->input('txtprice') .',quantity=' .$request->input('txtqty') .' where productid=' .$request->input('txtid') .' ');
   // return $name;
   //DB::insert('insert into products(productname,price,quantity) values("dog",34,5)');
   $products = DB::select('select * from products');
   return view('products',['products'=>$products]);
// return 'update products set productname="' .$request->input('txtname') .'",price=' .$request->input('txtprice') .',quantity=' .$request->input('txtqty') .' where productid=' .$request->input('txtid') .' ';
});

Route::get('/gmaps', function () {
    return view('gmaps');
});

Route::get('/return', function () {
    return view('return');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/uploadfile',[App\Http\Controllers\UploadFileController::class, 'index']);
Route::post('/uploadfile',[App\Http\Controllers\UploadFileController::class, 'showUploadFile']);

Route::get('/cart',[App\Http\Controllers\CartController::class, 'AddToCart']);
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
