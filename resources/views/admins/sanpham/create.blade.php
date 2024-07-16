@extends('layouts.admins')
@section('title')
    Thêm Mới Sản Phẩm
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Thêm mới sản phẩm</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Sản phẩm</a></li>
                    <li class="breadcrumb-item active">Thêm mới</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<form action="{{route('quantri.store')}}" method="post" enctype="multipart/form-data" >
    @csrf
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
                                <label for="name" class="form-label">Tên Sản Phẩm</label>
                                <input type="text" class="form-control" name="ten_san_pham" id="name">
                            </div>
                            <div>
                                <label for="name" class="form-label">Giá Sản Phẩm</label>
                                <input type="number" class="form-control" name="gia_san_pham" id="name" value="0"> 
                            </div>
                            <div>
                                <label for="name" class="form-label">Giá Khuyển Mại</label>
                                <input type="number" class="form-control" name="gia_khuyen_mai" id="name" value="0">
                            </div>
                            <div>
                                <label for="name" class="form-label">Hình Ảnh</label>
                                <input type="file" class="form-control" name="hinh_anh" id="name" onchange="showImage(event)">
                            </div>
                            <div style="margin: 10px">
                                <img src="" alt="Hình Ảnh Sản Phẩm" name="hinh_anh" id="image_san_pham" style="width :300px; display:none">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                                <label for="name" class="form-label">Số Lượng</label>
                                <input type="number" class="form-control" name="so_luong" id="name" value="0">
                            </div>
                            {{-- <div>
                                <label for="name" class="form-label">Ngày Nhập</label>
                                <input type="text" class="form-control" name="ngay_nhap" id="name">
                            </div> --}}
                            <div>
                                <label for="name" class="form-label">Mô Tả</label>
                                <textarea class="form-control" name="mo_ta" id="description" rows="2"></textarea>
                            </div>
                            <div>
                                <label for="name" class="form-label">Danh Mục</label>
                                <select name="danh_muc_id" id="" class="form-select">
                                    <option value="1">Thời Trang Nam</option>
                                    <option value="2">Thời Trang Nữ</option>
                                </select>
                            </div>
                            <div>
                                <label for="name" class="form-label">Trạng Thái</label>
                                <select name="trang_thai" id="" class="form-select">
                                    <option value="1">Còn Hàng</option>
                                    <option value="2">Hết Hàng</option>
                                </select>
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
                    <button class="btn btn-primary" style="" type="submit">Save</button>
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