<?php

namespace App\Http\Controllers\Admins;
use App\Models\DanhMuc;     
use App\Models\SanPham;     

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SanPhamRequest;
use Illuminate\Support\Facades\Storage;

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
    public function store(SanPhamRequest $request)
    {
        if($request->isMethod('POST')){
            $params= $request->except('_token');
            dd($params);

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
        //Sử dụng query buider
        $SanPham=$this->san_phams->updateProduct($id);
        return view('admins.sanpham.update',compact('SanPham'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if($request->isMethod('PUT')){

            $params= $request->except('_token','_method');
            

            //Xử dụng eloquent
            $SanPham=SanPham::findOrFail($id);

            //Xử lý hình ảnh
            if($request->hasFile('hinh_anh')){
                //Nếu có đẩy ảnh mới thì xóa ảnh cũ và lấy ảnh mới thêm vào DB
                if($SanPham->hinh_anh){
                    Storage::disk('public')->delete($SanPham->hinh_anh);
                }
                $params['hinh_anh']=$request->file('hinh_anh')->store('uploads/quantri','public');
            }else{
                $params['hinh_anh']=$SanPham->hinh_anh;
            }
            //Xử lý cập nhật thông tin
            //Eloquent
            $SanPham->update($params);
            return redirect()->route('quantri.index')->with('success','Cập nhật thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
