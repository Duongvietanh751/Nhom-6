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
    public function index(Request $request)
    {
        //Lây dữ liệu từ form select
        $search=$request->input('search');
        $searchTrangThai=$request->input('searchTrangThai');

        $listSanPham=SanPham::orderByDesc('trang_thai')->with(['danhmuc'])->latest('id')
        ->when($search,function($query,$search){
            return $query->where('ten_san_pham','like',"%{$search}")
                            ->orWhere('so_luong','like',"%{$search}");
        })
        ->when($searchTrangThai !== null, function ($query) use ($searchTrangThai) {
            return $query->where('trang_thai', '=', $searchTrangThai);
        })
        ->paginate(3);
         // cho hiển thị bao nhiêu san phẩm paginate(viết vô đây bn bản);
        return view('admins.sanpham.index',compact('listSanPham'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $listDanhMuc=DanhMuc::query()->get();
        return view('admins.sanpham.create',compact('listDanhMuc'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SanPhamRequest $request)
    {
    if($request->isMethod('POST')){
        $params=$request->exists('_token');
        if($request->hasFile('hinh_anh')){
            $filepath= $request->file('hinh_anh')->store('uploads/quantri','public');
        }else{
            $filepath=null;
        }
        $params['hinh_anh']=$filepath;
        SanPham::create($params);
        return redirect()->route('quantri.index')->with('success','Thêm thanh cong');
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
        $SanPham=SanPham::finOrFail($id);
        return view('admins.sanpham.update',compact('SanPham'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if($request->isMethod('PUT')){
            $params=$request->exists('_token','_method');
            $SanPham=SanPham::finOrFail($id);
            if($request->hasFile('hinh_anh')){
                if($SanPham->hinh_anh && Storage::disk('public')->exists($SanPham->hinh_anh)){
                    Storage::disk('public') ->delete($SanPham->hinh_anh);
                }

            }else{
                $params['hinh_anh']=$SanPham->hinh_anh;
            }
            $SanPham=SanPham::updated($params);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id)
    {
        //Sử Dụng Query BuiDer
        // if($request->isMethod('DELETE')){
        // if($SanPham){
        //     $this->san_phams->deleteProduct($id);
        //     if($SanPham->hinh_anh && Storage::disk('public')->exists($SanPham->hinh_anh)){
        //         //Xóa Bằng Query BuiDer
        //         Storage::disk('public')->delete($SanPham->hinh_anh);
        //     }
        //     return redirect()->route('quantri.index')->with('success','Xóa thành công');
        // }
        // }

        // SỬ Dụng ELOQUENT
        if($request->isMethod('DELETE')){
            $SanPham=SanPham::query()->findOrFail($id);
            $SanPham->delete();
            if($SanPham->hinh_anh && Storage::disk('public')->exists($SanPham->hinh_anh)){
                //Xóa Bằng Query BuiDer
                Storage::disk('public')->delete($SanPham->hinh_anh);
            }
            return redirect()->route('quantri.index')->with('success','Xóa thành công');
        }
        //Một số hàm sử dụng khi xóa mềm
        //Hàm hiển thị toàn bộ sản phẩm đã xóa mềm (Thùng rác)
             // $listSanPham=SanPham::query()->onlyTrashed()->get();
        //Hàm hoàn tác sản phẩm xóa mềm
            //$SanPham->restore();\
        //Hàm xóa vĩnh viễn khi đã xóa mềm
        //$SanPham->forceDelete();
    }
}
