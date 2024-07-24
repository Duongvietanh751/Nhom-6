<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\DanhMucRequest;
use App\Models\DanhMuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DanhMucController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listDanhMuc=DanhMuc::orderByDesc('trang_thai')->get();
        return view("admins.danhmuc.index",compact('listDanhMuc'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.danhmuc.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DanhMucRequest $request)
    {
        if($request->isMethod('POST')){
            $params= $request->except('_token');
            if($request->hasFile('hinh_anh')){
                $filepath=$request->file('hinh_anh')->store('uploads/danhmucs','public');
            }else{
                $filepath=null;
            }
            $params['hinh_anh']=$filepath;
            DanhMuc::create($params);
            return redirect()->route('admins.danhmuc.index')->with('success','Thêm danh mục thành công');
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
        $DanhMuc=DanhMuc::findOrFail($id);
        return view('admins.danhmuc.update',compact('DanhMuc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if($request->isMethod('PUT')){
            $params=$request->except('_token','_method');
            $DanhMuc=DanhMuc::findOrFail($id);
            //Xử Lý Hình Ảnh
            if($request->hasFile('hinh_anh')){
                if($DanhMuc->hinh_anh && Storage::disk('public')->exists($DanhMuc->hinh_anh)){
                    Storage::disk('public')->delete($DanhMuc->hinh_anh);
                }
                $params['hinh_anh']=$request->file('hinh_anh')->store('uploads/danhmucs','public');
            }else{
                $params['hinh_anh']=$DanhMuc->hinh_anh;
            }
            $DanhMuc->update($params);
            return redirect()->route('admins.danhmuc.index')->with('success','Sửa Thành Công');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $DanhMuc=DanhMuc::findOrFail($id);
        $DanhMuc->delete();
        if($DanhMuc->hinh_anh && Storage::disk('public')->exists($DanhMuc->hinh_anh)){
            Storage::disk('public')->delete($DanhMuc->hinh_anh);
        }
        return redirect()->route('admins.danhmuc.index')->with('success','Xóa Thành Công');
    }
}
