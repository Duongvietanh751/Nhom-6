@extends('layouts.admins')
@section('title')
    Danh sách Danh Mục
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Danh Sách</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Bảng</a></li>
                        <li class="breadcrumb-item active">Danh sách Danh Mục</li>
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
                    <h5 class="card-title mb-0">Danh Sách Danh Mục</h5>
                    <a href="{{route('admins.danhmuc.create')}}" class="btn btn-primary mb-3">Thêm Mới</a>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Hình Ảnh</th>
                                <th>Tên Danh Mục</th>
                                <th>Trạng Thái</th>
                                <th>Chức Năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listDanhMuc as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>
                                    <img src="{{Storage::url($item->hinh_anh)}}" alt="" width="300px">
                                </td>
                                <td>{{$item->ten_danh_muc}}</td>
                                <td class="{{$item->trang_thai == true ? 'text-info' : 'text-danger'}}"> 
                                    {{$item->trang_thai == true ? 'Hiển Thị' : 'Ẩn'}}
                                </td>
                                <td>
                                    <a href="{{route('admins.danhmuc.edit',$item->id)}}"class="btn btn-info">Sửa</a>
                                    <form action="{{route('admins.danhmuc.destroy',$item->id)}}" method="post" class="d-inline" onsubmit="return confirm('Bạn có đồng ý xóa không')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            Xóa
                                        </button>
                                    </form>
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