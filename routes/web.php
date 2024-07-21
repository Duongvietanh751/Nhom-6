<?php

use App\Http\Controllers\Admins\DanhMucController;
use App\Http\Controllers\Admins\SanPhamController;
use App\Http\Controllers\AuthController;
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
Route::get('/', function () {
    return view('home');
});
//Đường dẫn sản phẩm controller (ADMIN)
Route::resource('quantri',SanPhamController::class)->middleware(checkRoleAdminMiddleware::class);

//Đường dẫn danh mục controller(Admin)
Route::get('indexDanhmuc',[DanhMucController::class,'indexDanhMuc'])->name('indexDanhMuc');
Route::get('createDanhMuc',[DanhMucController::class,'createDanhMuc'])->name('createDanhMuc');


// Dường dẫn đăng ký đăng nhập
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

