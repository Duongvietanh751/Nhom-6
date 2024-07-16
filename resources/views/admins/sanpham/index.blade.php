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
                    <h5 class="card-title mb-0">Danh Sách sản Phẩm</h5>
                    <a href="{{route('quantri.create')}}" class="btn btn-primary mb-3">Thêm Mới</a>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Giá Sản Phẩm</th>
                                <th>Giá Khuyển Mại</th>
                                <th>Hình Ảnh</th>
                                <th>Số Lượng</th>
                                <th>Lượt Xem</th>
                                <th>Ngày Nhập</th>
                                <th>Mô Tả</th>
                                <th>Danh Mục</th>
                                <th>Trạng Thái</th>
                                <th>Chức Năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listSanPham as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->ten_san_pham}}</td>
                                <td>{{$item->gia_san_pham}}</td>
                                <td>{{$item->gia_khuyen_mai}}</td>
                                <td>
                                    <img src="{{Storage::url($item->hinh_anh)}}" alt="" width="200px">
                                </td>
                                <td>{{$item->so_luong}}</td>
                                <td>{{$item->luot_xem}}</td>
                                <td>{{$item->created_at}}</td>
                                <td>{{$item->mo_ta}}</td>
                                <td>{{$item->danh_muc_id == 2 ? 'Thời Trang Nam':'Thời Trang Nữ' }}</td>
                                <td>{{$item->trang_thai == 2 ? 'Còn Hàng':'Hết Hàng'}}</td>
                                <td>
                                    <a href="" class="btn btn-success">Xem Chi Tiết</a>
                                    <a href="{{route('quantri.edit',$item->id)}}"class="btn btn-info">Sửa</a>
                                    <a href=""class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!--end col-->
    </div>
@endsection
