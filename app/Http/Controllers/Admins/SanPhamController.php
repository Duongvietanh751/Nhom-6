<?php

namespace App\Http\Controllers\Admins;
use App\Models\DanhMuc;     
use App\Models\SanPham;     

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SanPhamRequest;
use App\Models\HinhAnhSanPham;
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
        ->paginate(10);
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
            $params= $request->except('_token');
            //chuyển đổi giá trị checkbox thành boolean
            $params['trang_thai']=$request->has('trang_thai') ? 1 : 0;
            $params['hang_moi_ve']=$request->has('hang_moi_ve') ? 1 : 0;
            $params['hang_hot']=$request->has('hang_hot') ? 1 : 0;
            $params['uu_dai']=$request->has('uu_dai') ? 1 : 0;
            $params['is_show_home']=$request->has('is_show_home') ? 1 : 0;
            // Xử Lý ảnh đại diện
            if($request->hasFile('hinh_anh')){
                $params['hinh_anh'] = $request->file('hinh_anh')->store('uploads/sanpham','public');
            }else{
                $params['hinh_anh']=null;
            }
            //Thêm sản Phẩm
            $sanPham = SanPham::query()->create($params);
            //Lấy id sản phẩm vừa thêm để thêm được album 
            $sanPhamID = $sanPham->id;

            // xử lý album 
            if($request->hasFile('list_hinh_anh')){
                foreach($request->file('list_hinh_anh') as $image){
                    if($image){
                        $path =$image->store('uploads/hinhanhsanpham/id_'.$sanPhamID, 'public');
                        $sanPham->hinhAnhSanPham()->create(
                            [
                                'san_pham_id' => $sanPhamID,
                                'hinh_anh' => $path
                            ]
                        );
                    }
                }
            }
            return redirect()->route('admins.sanpham.index')->with('success','Thêm sản Phẩm Thành Công');
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

        $SanPham=SanPham::findOrFail($id);
        $listDanhMuc=DanhMuc::query()->get();
        return view('admins.sanpham.update',compact('SanPham','listDanhMuc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if($request->isMethod('PUT')){
            $params= $request->except('_token','_method');
            //chuyển đổi giá trị checkbox thành boolean
            $params['trang_thai']=$request->has('trang_thai') ? 1 : 0;
            $params['hang_moi_ve']=$request->has('hang_moi_ve') ? 1 : 0;
            $params['hang_hot']=$request->has('hang_hot') ? 1 : 0;
            $params['uu_dai']=$request->has('uu_dai') ? 1 : 0;
            $params['is_show_home']=$request->has('is_show_home') ? 1 : 0;

            $SanPham = SanPham::findOrFail($id);

            // Xử Lý ảnh đại diện
            if($request->hasFile('hinh_anh')){
                if($SanPham->hinh_anh && Storage::disk('public')->exists($SanPham->hinh_anh)){
                    Storage::disk('public')->delete($SanPham->hinh_anh);
                }
                $params['hinh_anh'] = $request->file('hinh_anh')->store('uploads/sanpham','public');
            }else{
                $params['hinh_anh']=$SanPham->hinh_anh;
            }
            //Xu ly ablum
                $currentImages = $SanPham->hinhAnhSanPham->pluck('id')->toArray();
                $arrayCombine = array_combine($currentImages ,$currentImages);

                foreach($arrayCombine as $key => $value){
                    //Tim kiem id hinh trong mang hinh anh moi day len
                    // Neu kh ton tai ID thi tuc la nguoi dung da xoa hinh do
                    if(!array_key_exists($key,$request->list_hinh_anh)){
                        $hinhAnhSanPham = HinhAnhSanPham::query()->find($key);
                        //Xoa hinh anh
                        if($hinhAnhSanPham  && Storage::disk('public')->exists($hinhAnhSanPham->hinh_anh)){
                            Storage::disk('public')->delete($hinhAnhSanPham->hinh_anh);
                            $hinhAnhSanPham->delete();
                        }
                    }
                }
                //Truong hop them hoacj sua
                foreach ($request->list_hinh_anh as $key => $image) {
                    if(!array_key_exists($key,$arrayCombine)){
                        if($request->hasFile("list_hinh_anh.$key")){
                            $path = $image->store('uploads/hinhanhsanpham/id_'.$id,'public');
                            $SanPham->hinhAnhSanPham()->create([
                                'san_pham_id'=>$id,
                                'hinh_anh'=>$path,
                            ]);
                        }
                     } else if(is_file($image) && $request->hasFile("list_hinh_anh.$key")){
                        //Truong hop thay doi hinh anh
                        $hinhAnhSanPham = HinhAnhSanPham::query()->find($key);
                        if($hinhAnhSanPham && Storage::disk('public')->exists($hinhAnhSanPham->hinh_anh)){
                            Storage::disk('public')->delete($hinhAnhSanPham->hinh_anh);
                         }
                         $path = $image->store('uploads/hinhAnhSanPham_id'.$id,'public');
                         $hinhAnhSanPham->update([
                            'hinh_anh'=>$path,
                        ]);
                     }
                }
                

            $SanPham->update($params);
            return redirect()->route('admins.sanpham.index')->with('success','Update Phẩm Thành Công');
         }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id)
    {
        if($request->isMethod('DELETE')){
        $SanPham=SanPham::query()->findOrFail($id);
        if($SanPham->hinh_anh && Storage::disk('public')->exists($SanPham->hinh_anh)){
            Storage::disk('public')->delete($SanPham->hinh_anh);
        }
        $SanPham->hinhAnhSanPham()->delete();
        $path = 'uploads/hinhAnhSanPham/id_'.$id;
        if(Storage::disk('public')->exists($path)){
            Storage::disk('public')->deleteDirectory($path);
        }
        $SanPham->delete();
        return redirect()->route('admins.sanpham.index')->with('success','Xóa thành công');
    } 
 }
}
