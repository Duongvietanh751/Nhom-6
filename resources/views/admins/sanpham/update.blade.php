@extends('layouts.admins')
@section('title')
    Sửa sản Phẩm
@endsection
@section('css')
        <!-- quill css -->
        <link href="{{ asset('admin/assets/libs/quill/quill.core.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/assets/libs/quill/quill.bubble.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/assets/libs/quill/quill.snow.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Sửa sản phẩm</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Sản phẩm</a></li>
                    <li class="breadcrumb-item active">UPDATE</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<form action="{{route('admins.sanpham.update',$SanPham->id)}}" method="POST" enctype="multipart/form-data" >
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
                                <label for="name" class="form-label">Mã Sản Phẩm</label>
                                <input type="text" class="form-control @error('ma_san_pham') is-invalid @enderror" name="ma_san_pham" id="name" value="{{$SanPham->ma_san_pham}}">
                                @error('ma_san_pham')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="name" class="form-label">Tên Sản Phẩm</label>
                                <input type="text" class="form-control @error('ten_san_pham') is-invalid @enderror" name="ten_san_pham" id="name" value="{{$SanPham->ten_san_pham}}">
                                @error('ten_san_pham')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="name" class="form-label">Giá Sản Phẩm</label>
                                <input type="number" class="form-control @error('gia_san_pham') is-invalid @enderror" name="gia_san_pham" id="name"value="{{$SanPham->gia_san_pham}}"> 
                                @error('gia_san_pham')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="name" class="form-label">Giá Khuyển Mại</label>
                                <input type="number" class="form-control @error('gia_khuyen_mai') is-invalid @enderror" name="gia_khuyen_mai" id="name" value="{{$SanPham->gia_khuyen_mai}}">
                                @error('gia_khuyen_mai')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="name" class="form-label">Danh Mục</label>
                                <select name="danh_muc_id" class="form-select ">
                                    <option selected>--Chọn Danh Mục --</option>
                                    @foreach ($listDanhMuc as $item)
                                        <option value="{{$item->id}}"
                                            {{$SanPham->danh_muc_id == $item->id ? 'selected' : ''}}>
                                            {{$item->ten_danh_muc}}
                                        </option>
                                    @endforeach
                                </select>
                                
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
                                <input type="number" class="form-control @error('so_luong') is-invalid @enderror" name="so_luong" id="name" value="{{$SanPham->so_luong}}">
                                @error('so_luong')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="name" class="form-label">Ngày Nhập</label>
                                <input type="date" class="form-control @error('ngay_nhap') is-invalid @enderror" name="ngay_nhap" id="name" value="{{$SanPham->ngay_nhap}}">
                                @error('ngay_nhap')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="name" class="form-label">Mô Tả Ngắn</label>
                                <textarea type="date" class="form-control @error('mo_ta_ngan') is-invalid @enderror" name="mo_ta_ngan" id="name">{{$SanPham->mo_ta_ngan}}</textarea>
                                @error('mo_ta_ngan')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="name" class="form-label">Trạng Thái</label>
                                <select name="trang_thai" id="" class="form-select @error('trang_thai') is-invalid @enderror" >
                                    <option value="0" {{$SanPham->trang_thai == '0' ? 'selected' : ''}}>Ẩn</option>
                                    <option value="1" {{$SanPham->trang_thai == '1' ? 'selected' : ''}}>Hiển Thị</option>
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
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0">Mô tả chi tiết sản phẩm</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="" id="quill-editor" style="height: 350px">
                        
                    </div>
                    <textarea name="noi_dung" id="noi_dung_content" class="d-none"></textarea>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Hình Ảnh</h4>
                </div>
                <div class="card-body">
                    <div class="row gy-4">
                            <div>
                                <label for="name" class="form-label">Hình Ảnh</label>
                                <input type="file" class="form-control" name="hinh_anh" id="name" onchange="showImage(event)">
                            </div>
                            <div style="margin: 10px">
                                <img src="{{ Storage::url($SanPham->hinh_anh) }}" alt="Hình Ảnh Sản Phẩm" name="hinh_anh" id="image_san_pham" style="width :100px">
                            </div>
                            <div>
                                <label for="name" class="form-label">Album Hình Ảnh</label>
                                <i class="mdi mdi-plus text-muted fs-18 rounded-2 border p-1" style="cursor: pointer" id="add-row"></i>
                                <table class="table align-middle table-nowrap mb-0">
                                    <tbody id="image-table-body">
                                       @foreach ($SanPham->hinhAnhSanPham as $index => $hinhAnh)
                                       <tr>
                                        <td class="d-flex align-items-center">
                                            <img src="{{ Storage::url($hinhAnh->hinh_anh) }}" alt="Hình Ảnh Sản Phẩm" name="hinh_anh" id="preview_{{ $index }}" style="width :70px" class="me-3">
                                            <input type="file" class="form-control" name="list_hinh_anh[{{ $hinhAnh->id }}]" id="hinh_anh" onchange="previewImage(this,{{ $index }})">
                                            <input type="hidden" name="list_hinh_anh[{{ $hinhAnh->id }}]" value="{{ $hinhAnh->id }}">
                                        </td>
                                        <td>
                                        <i class="mdi mdi-delete text-muted fs-18 rounded-2 border p-1" style="cursor: pointer" onclick="removeRow(this)"></i>
                                        </td>
                                        </tr>
                                       @endforeach
                                    </tbody>
                                </table>
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
                    <h4 class="card-title mb-0 flex-grow-1">Tùy Chỉnh Thông Tin Sản Phẩm</h4>
                </div>
                <div class="card-body">
                    <div class="row gy-4">
                        <div class="d-flex justify-content-between ">
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input bg-secondary" type="checkbox" name="hang_moi_ve"  {{$SanPham->hang_moi_ve == '1' ? 'selected' : ''}}>
                                <label class="form-check-label" for="flexSwitchCheckDefault">NEW</label>
                            </div>
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input bg-danger" type="checkbox" name="hang_hot"  {{$SanPham->hang_hot == '1' ? 'selected' : ''}}>
                                <label class="form-check-label" for="flexSwitchCheckDefault">HOT</label>
                            </div>
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input bg-success" type="checkbox" name="uu_dai"  {{$SanPham->uu_dai == '1' ? 'selected' : ''}}>
                                <label class="form-check-label" for="flexSwitchCheckDefault">HOT DEAL</label>
                            </div>
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" name="is_show_home"  {{$SanPham->is_show_home == '1' ? 'selected' : ''}}>
                                <label class="form-check-label" for="flexSwitchCheckDefault">SHOW HOME</label>
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
<script>
    document.addEventListener('DOMContentLoaded',function(){
        var quill = new Quill("#quill-editor",{
            theme:"snow",
        })
        //Hiển thị nội dung cũ
        var old_content = `{!! $SanPham->noi_dung !!}`;
        quill.root.innerHTML=old_content
        //Cập nhật lại textarea ẩn khi nội dung của quill-editor thay đỏi
        quill.on('text-change',function(){
            var html = quill.root.innerHTML;
            document.getElementById('noi_dung_content').value = html
        })
    })
</script>

<script>
    document.addEventListener('DOMContentLoaded',function(){
            var rowCount = {{ count($SanPham->hinhAnhSanPham) }} ;
           document.getElementById('add-row').addEventListener('click', function(){
            var tableBody = document.getElementById('image-table-body');

            var newRow = document.createElement('tr');
            newRow.innerHTML = `
             <td class="d-flex align-items-center">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSbIwiKbRMRJkaJBTn7kU1Atnt_Qd6exNbacQ&s" alt="Hình Ảnh Sản Phẩm" name="hinh_anh" id="preview_${rowCount}" style="width :70px">
                <input type="file" class="form-control" name="list_hinh_anh[id_${rowCount}]" id="name" onchange="previewImage(this,${rowCount})">
            </td>
            <td>
                <i class="mdi mdi-delete text-muted fs-18 rounded-2 border p-1" style="cursor: pointer" onclick="removeRow(this)"></i>
            </td>
            `;
            tableBody.appendChild(newRow);
            rowCount++;
           })

        });
        function previewImage(input,rowIndex){
            if(input.files && input.files[0]){
                const reader = new FileReader();

            reader.onload = function (e) {
                document.getElementById(`preview_${rowIndex}`).setAttribute('src',e.target.result)
            }

                reader.readAsDataURL(input.files[0]);
            }
        }
        function removeRow (item) {
            var row = item.closest('tr');
            row.remove();
        }
</script>
<!-- ckeditor -->
<script src="{{ asset('admin/assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js')}}"></script>

<!-- quill js -->
<script src="{{ asset('admin/assets/libs/quill/quill.min.js')}}"></script>

<!-- init js -->
<script src="{{ asset('admin/assets/js/pages/form-editor.init.js')}}"></script>
<script src="{{ asset('admin/assets/js/app.js')}}"></script>
@endsection