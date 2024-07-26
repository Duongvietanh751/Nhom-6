@extends('layouts.admins')
@section('title')
    Danh Sách Sản Phẩm
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Danh Sách</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Bảng</a></li>
                        <li class="breadcrumb-item active">Danh sách sản phẩm</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <a href="{{route('admins.sanpham.create')}}" class="btn btn-primary mb-3">Thêm Mới</a>
                    <form action="" method="GET">
                        @csrf
                        <div class="input-group">
                            <select name="searchTrangThai" id="" class="form-select">
                                <option value="">Chọn Trạng Thái</option>
                                <option value="1">Hiển Thị</option>
                                <option value="2">Ẩn</option>
                            </select>
                            <input type="text" class="form-control" name="search" placeholder="Tìm kiếm sản phẩm">
                            <button class="btn btn-secondary" type="submit">Tìm Kiếm</button>
                        </div>
                    </form>
                </div>
                <div class="card-body ">
                    <table id="example" class="table  table-bordered dt-responsive nowrap table-striped align-middle"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Mã Sản Phẩm</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Hình Ảnh</th>
                                <th>Giá Sản Phẩm</th>
                                <th>Giá Khuyến Mại</th>
                                <th>Số lượng</th>
                                <th>Danh Mục</th>
                                <th>Trạng Thái</th>
                                <th>Chức Năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listSanPham as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->ma_san_pham}}</td>
                                <td>{{$item->ten_san_pham}}</td>
                                <td>
                                    <img src="{{Storage::url($item->hinh_anh)}}" alt="" width="200px">
                                </td>
                                <td>{{number_format($item->gia_san_pham)}}</td>
                                <td>{{ empty($item->gia_khuyen_mai) ? 0 : $item->gia_san_pham}}</td>
                                <td>{{$item->so_luong}}</td>
                                <td>{{$item->DanhMuc->ten_danh_muc }}</td>
                                <td class="{{$item->trang_thai == true ? 'text-success' : 'text-danger'}}">
                                    {{$item->trang_thai == true ? 'Hiển Thị' : 'Ẩn'}}
                                </td>
                                <td>
                                    <a href="{{route('admins.sanpham.edit',$item->id)}}"class="btn btn-info">Sửa</a>
                                    <form action="{{route('admins.sanpham.destroy',$item->id)}}" method="POST" onsubmit="return confirm('Bạn có muốn xóa không')" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$listSanPham->links('pagination::bootstrap-5')}}
                </div>
            </div>
        </div><!--end col-->
    </div>
@endsection
