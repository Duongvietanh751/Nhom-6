<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    use HasFactory;
    protected $table="danhmucs";
    protected $fillable = [
        'ten_danh_muc',
        'mo_ta',
    ];
    public function sanphams(){
        return $this->hasMany(SanPham::class);
    }
}
