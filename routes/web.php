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
    $sales = DB::select('select * from sales order by id DESC LIMIT 5');
    $salesgraph= DB::select('select month(date_sales) as dmonth,sum(total_num) as stotal from sales group by month(date_sales)');
    $arraysales=[];
    for ($x = 1; $x <= 12; $x++) 
    {
        $arraysales[$x]=0;
        foreach ($salesgraph as $sg) 
        {
            if(intval($sg->dmonth)==$x)
            {
              $arraysales[$x]=$sg->stotal;
              break;
            }
        }
    }
    return view('admindashboard',['sales'=>$sales,'graphdata'=>$arraysales]);
});

Route::get('/saleslist', function () {
    $sales = DB::select('select * from sales');
    $status = DB::select('select * from status');
    return view('sales',['sales'=>$sales,'xstatus'=>$status]);
});

Route::get('/editsales', function (request $request) {
    $salesid=$request->input('sid');
    $sales = DB::select('select * from sales where id=' .$salesid);
    //dd($prod);
    return view('editsales',['sales'=>$sales]); 
});

Route::get('/statuslist', function () {
    $stat = DB::select('select * from status');
    return view('status',['stat'=>$stat]);
});

Route::get('/addstat', function () {
    return view('addstat');
});

Route::post('/uploadstatus', function (request $request) {
    DB::insert('insert into status(Sname) values("' .$request->input('statname') .'") ');
    return redirect('/statuslist');
});

Route::get('/editstat', function (request $request) {
    $statid=$request->input('statid');
    $stats = DB::select('select * from status where id=' .$statid);
    //dd($prod);
    return view('editstat',['stats'=>$stats]); 
});

Route::post('/updatestat', function (request $request) {
    $updatestat=DB::update('update status set Sname="' .$request->input('statname'). '" where id='.$request->input('statid') .' ');
    return redirect('/statuslist');
});

Route::post('/deletestat',[App\Http\Controllers\ProductsController::class, 'DeleteStat']);

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

Route::post('/deleteuser', function (Request $request) {
    // dd($request->input('deluserid'));
    DB::table('users')->delete($request->input('deluserid'));
    //dd($users);
    return redirect('/users');
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
    $updatevc=DB::update('update vouchers set Vcode="' .$request->input('vcode') .'",Vname="' .$request->input('vname') .'",Vpercentage=' .(floatval($request->input('vperc'))/100) .' where id=' .$request->input('vchid'));
    $vouchers = DB::select('select * from vouchers');
    return view('voucher',['voucher'=>$vouchers]);
});


Route::post('/deletevoucher',[App\Http\Controllers\ProductsController::class, 'DeleteVou']);

Route::get('/return', function () {
    return view('return');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/shop', function () {
    return view('shop');
});

// Route::get('/test', function () {
//     $sales = DB::select("select * from sales inner join status on sales.status=status.id where sales.user_id=" .Auth()->user()->id);
//     dd($sales);
//     return view('myorders',['salesinfo'=>$sales]);

// });


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

Route::post('/updatesales',[App\Http\Controllers\ProductsController::class, 'UpdateSales']);

Route::get('/myorders',[App\Http\Controllers\HomeController::class, 'myorders']);

Route::get('/orders/{oid?}',[App\Http\Controllers\HomeController::class, 'orders']);

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
