<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    public function deleteProduct($id,$params){
        DB::table('sanphams')->where('id',$id)->delete();
    }
    use SoftDeletes;
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
