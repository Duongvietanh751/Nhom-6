<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use Illuminate\Http\Request;

class DanhMucController extends Controller
{
    public $danh_mucs;
    public function __construct(){
        $this->danh_mucs = new DanhMuc();
    }
    public function indexDanhMuc(){
        $listDanhMuc=DanhMuc::query()->get();
        return view('admins.danhmuc.index',compact('listDanhMuc'));
    }
}
