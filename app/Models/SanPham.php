<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;
    // public function getList(){
    //     $listSanPham=DB::table('sanphams')->orderBy('id','desc')->get();
    // }
    public function createProduct($data){
        DB::table('sanphams')->insert($data);
    }
    public function updateProduct($id){
        $san_pham = DB::table('sanphams')->where('id',$id)->first();
        return $san_pham;
    }
    protected $table='sanphams';
    protected $fillable = [
        'danh_muc_id',
        'ten_san_pham',
        'gia_san_pham',
        'gia_khuyen_mai',
        'hinh_anh',
        'so_luong',
        'luot_xem',
        'mo_ta',
        'trang_thai',
        'created_at',
        'updated_at',
    ] ;
    public function danhmuc(){
        return $this->belongsTo(DanhMuc::class,);
    }
}
