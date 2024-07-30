<?php

use App\Http\Controllers\Admins\DanhMucController;
use App\Http\Controllers\Admins\SanPhamController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OderController;
use App\Http\Controllers\OrderController;
use App\Http\Middleware\checkRoleAdminMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth ;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Đường dẫn trang khách hàng
// Route::get('/', function () {
//     return view('');
// });
//Đường dẫn sản phẩm controller (ADMIN)
// Route::resource('quantri',SanPhamController::class)->middleware(checkRoleAdminMiddleware::class);

// Dường dẫn đăng ký đăng nhập
Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::post('Postcontact', [App\Http\Controllers\HomeController::class, 'Postcontact'])->name('Postcontact');
Route::get('/product/detail/{id}',[App\Http\Controllers\HomeController::class,'chiTietSanPham'])->name('products.detail');

//cart 
Route::get('/list-cart',     [CartController::class,'listCart'])->name('cart.list');
Route::post('/add-to-cart',  [CartController::class,'addCart'])->name('cartAdd');
Route::post('/update-cart',  [CartController::class,'updateCart'])->name('cart.update');

//Oder 
Route::prefix('donhangs')
    ->as('donhangs.')
    ->group(function () {
        Route::get('/',[OrderController::class,'index'])->name('index');
        Route::get('/create',[OrderController::class,'create'])->name('create');
        Route::post('/store',[OrderController::class,'store'])->name('store');
        Route::get('/show/{id}',[OrderController::class,'show'])->name('show');
        Route::put('{id}/update',[OrderController::class,'update'])->name('update');
    });


//ADMIN
Route::middleware(checkRoleAdminMiddleware::class)->prefix('admins')
->as('admins.')
->group(function () {
    Route::get('/',function(){
        return view('admins.dashboard');
    })->name('dasboard');
    Route::prefix('danhmuc')
    ->as('danhmuc.')
    ->group(function () {
        Route::get('/',[DanhMucController::class,'index'])->name('index');
        Route::get('/create',[DanhMucController::class,'create'])->name('create');
        Route::post('/store',[DanhMucController::class,'store'])->name('store');
        Route::get('/show/{id}',[DanhMucController::class,'show'])->name('show');
        Route::get('{id}/edit',[DanhMucController::class,'edit'])->name('edit');
        Route::put('{id}/update',[DanhMucController::class,'update'])->name('update');
        Route::delete('{id}/destroy',[DanhMucController::class,'destroy'])->name('destroy');
    });
    Route::prefix('sanpham')
    ->as('sanpham.')
    ->group(function () {
        Route::get('/',[SanPhamController::class,'index'])->name('index');
        Route::get('/create',[SanPhamController::class,'create'])->name('create');
        Route::post('/store',[SanPhamController::class,'store'])->name('store');
        Route::get('/show/{id}',[SanPhamController::class,'show'])->name('show');
        Route::get('{id}/edit',[SanPhamController::class,'edit'])->name('edit');
        Route::put('{id}/update',[SanPhamController::class,'update'])->name('update');
        Route::delete('{id}/destroy',[SanPhamController::class,'destroy'])->name('destroy');

    });
});

