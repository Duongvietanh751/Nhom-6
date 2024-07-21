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
        Schema::create('sanphams', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(DanhMuc::class)->constrained();
            $table->string('ten_san_pham');
            $table->double('gia_san_pham');
            $table->double('gia_khuyen_mai')->nullable();
            $table->string('hinh_anh')->nullable();
            $table->double('so_luong');
            $table->unsignedBigInteger('luot_xem')->default(0);
            $table->text('mo_ta')->nullable();
            $table->string('trang_thai');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sanphams');
    }
};