<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;
    protected $fillable = [
        'ma_san_pham',
        'ten_san_pham',
        'hinh_anh',
        'gia_san_pham',
        'gia_khuyen_mai',
        'mo_ta_ngan',
        'noi_dung',
        'so_luong',
        'luot_xem',
        'ngay_nhap',
        'danh_muc_id',
        'trang_thai',
        'hang_moi_ve',
        'hang_hot',
        'uu_dai',
        'is_show_home',
    ];
    protected $casts = [
        'trang_thai'=>'boolean',
        'hang_moi_ve'=>'boolean',
        'hang_hot'=>'boolean',
        'uu_dai'=>'boolean',
        'is_show_home'=>'boolean',
    ];
    public function DanhMuc(){
        return $this->belongsTo(DanhMuc::class);
    }
    public function hinhAnhSanPham(){
        return $this->belongsTo(HinhAnhSanPham::class);
    }
}
