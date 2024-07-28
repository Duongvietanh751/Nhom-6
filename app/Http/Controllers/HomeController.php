<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use Illuminate\Http\Request;

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
        $listProduct = SanPham::query()->get();

        return view('clients.home',compact('listProduct'));
    }
    public function contact(){
        return view('clients.chucnang.contact');
    }
    public function chiTietSanPham(string $id){
        $sanPham = SanPham::query()->findOrFail($id);
        $listSanPham = SanPham::query()->get();
        return view('clients.chucnang.chitiet',compact('sanPham','listSanPham'));
    }
}
