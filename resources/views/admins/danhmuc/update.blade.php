@extends('layouts.admins')
@section('title')
    Sửa Danh Mục
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Sửa Danh Mục</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Danh Mục</a></li>
                    <li class="breadcrumb-item active">Thêm mới</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<form action="{{route('admins.danhmuc.update',$DanhMuc->id)}}" method="POST" enctype="multipart/form-data" >
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Thông tin</h4>
                </div>
                <div class="card-body">
                    <div class="row gy-4">
                        <div class="col-md-4">
                            <div>
                                <label for="name" class="form-label">Tên Danh Mục</label>
                                <input type="text" class="form-control @error('ten_danh_muc') is-invalid @enderror" name="ten_danh_muc" id="name" value="{{$DanhMuc->ten_danh_muc}}">
                                @error('ten_danh_muc')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="name" class="form-label">Hình Ảnh</label>
                                <input type="file" class="form-control" name="hinh_anh" id="name" onchange="showImage(event)">
                            </div>
                            <div style="margin: 10px">
                                <img src="{{Storage::url($DanhMuc->hinh_anh)}}" alt="Hình Ảnh Sản Phẩm" name="hinh_anh" id="image_san_pham" style="width :300px">
                            </div>
                            <div>
                                <label for="name" class="form-label">Trạng Thái</label>
                                <select name="trang_thai" id="" class="form-select @error('trang_thai') is-invalid @enderror" value="{{$DanhMuc->trang_thai}}">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển Thị</option>
                                </select>
                                @error('trang_thai')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <button class="btn btn-primary" style="" type="submit">Edit</button>
                </div><!-- end card header -->
            </div>
        </div>
        <!--end col-->
    </div>
</form>
@endsection
@section('js')
<script>
    function showImage(event) {
        const image_san_pham = document.getElementById('image_san_pham');

        const file = event.target.files[0];

        const reader = new FileReader();

        reader.onload = function () {
            image_san_pham.src = reader.result;
            image_san_pham.style.display = 'block';
        }

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection