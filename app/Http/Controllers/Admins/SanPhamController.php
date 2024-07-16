<?php

namespace App\Http\Controllers\Admins;
use App\Models\SanPham;     
use App\Models\DanhMuc;     

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $san_phams;
    public function __construct(){
        $this->san_phams = new SanPham;
    }
    public function index()
    {
        $listSanPham=SanPham::query()->with(['danhmuc'])->latest('id')->get();
        return view('admins.sanpham.index',compact('listSanPham'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.sanpham.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->isMethod('post')){

            $params= $request->except('_token');

            if($request->hasFile('hinh_anh')){
                $filename=$request->file('hinh_anh')->store('uploads/quantri','public');
            }else{
                $filename=null;
            }
            $params['hinh_anh']=$filename;
            SanPham::create($params);
            return redirect()->route('quantri.index')->with('success','Thêm sản Phẩm Thành Công');
         }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $SanPham=$this->san_phams->updateProduct($id);
        return view('admins.sanpham.update',compact('SanPham'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
