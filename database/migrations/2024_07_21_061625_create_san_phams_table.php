<?php

use App\Models\DanhMuc;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('san_phams', function (Blueprint $table) {
            $table->id();
            $table->string('ma_san_pham')->unique();
            $table->string('ten_san_pham');
            $table->string('hinh_anh')->nullable();
            $table->double('gia_san_pham');
            $table->double('gia_khuyen_mai')->nullable();
            $table->string('mo_ta_ngan')->nullable();
            $table->text('noi_dung')->nullable();
            $table->unsignedInteger('so_luong');
            $table->unsignedBigInteger('luot_xem');
            $table->date('ngay_nhap');
            $table->foreignIdFor(DanhMuc::class)->constrained();
            $table->boolean('trang_thai')->default(true);
            $table->boolean('hang_moi_ve')->default(true);
            $table->boolean('hang_hot')->default(true);
            $table->boolean('uu_dai')->default(true);
            $table->boolean('is_show_home')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('san_phams');
    }
};
