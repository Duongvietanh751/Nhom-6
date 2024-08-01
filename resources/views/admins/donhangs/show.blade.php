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
        <div class="col-lg-6">

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                 Thông tin tài khoản đặt hàng
                </div>
                <div class="card-body ">
                    <ul >
                        <li class="text-left"> Tên Tài Khoản :{{$donHang->user->name}}</li>
                        <li class="text-left">Email : {{$donHang->user->email}} </li>
                        <li class="text-left">Số điện thoại : {{$donHang->user->phone}} </li>
                        <li class="text-left">Địa chỉ: {{$donHang->user->address}} </li>
                        <li class="text-left">Tài Khoản : {{$donHang->user->role}} </li>
                    </ul>
                </div>
            </div>
        </div><!--end col-->
        <div class="col-lg-6">

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                 Thông tin người nhận hàng
                </div>
                <div class="card-body ">
                    <ul >
                        <li class="text-left"> Mã Đơn Hàng :{{$donHang->ma_don_hang}}</li>
                        <li class="text-left">Tên Người Nhận : {{$donHang->ten_nguoi_nhan}} </li>
                        <li class="text-left">Email: : {{$donHang->email_nguoi_nhan}} </li>
                        <li class="text-left">Số Điện Thoại : {{$donHang->so_dien_thoai_nguoi_nhan}} </li>
                        <li class="text-left">Địa Chỉ : {{$donHang->dia_chi_nguoi_nhan}} </li>
                        <li class="text-left">Ngày Nhận Hàng : {{$donHang->created_at->format('d-m-Y')}}</li>
                        <li class="text-left">Ghi Chú : {{$donHang->ghi_chu}} </li>
                        <li class="text-left">Trạng Thái : {{$trangThaiDonHang[$donHang->trang_thai_don_hang]}} </li>
                        <li class="text-left">Trạng Thái Thanh Toán : {{$trangThaiThanhToan[$donHang->trang_thai_thanh_toan]}} </li>
                        <li class="text-left">Tiền Hàng : {{$donHang->tien_hang}} VND</li>
                        <li class="text-left">Tiền SHIP : {{$donHang->tien_ship}} VND</li>
                        <li class="text-left">Tổng Tiền : {{$donHang->tong_tien}} VND</li>

                    </ul>
                </div>
            </div>
        </div><!--end col-->
        <div class="col-lg-12">

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                 Sản phẩm của đơn đặt
                </div>
                <div class="card-body ">
                    <table id="example" class="table  table-bordered dt-responsive nowrap table-striped align-middle"
                    style="width:100%">
                        <thead>
                            <tr>
                                <th>Hình Ảnh</th>
                                <th>Mã Sản Phẩm</th>
                                <th>Tên Sản Phẩm </th>
                                <th>Đơn Giá/th>
                                <th>Số Lượng</th>
                                <th>Thành Tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($donHang->chiTietDonHang as $item)
                                @php
                                    $sanPham = $item->sanPham;
                                @endphp
                            <tr>
                                <td>
                                    <img src="{{Storage::url($sanPham->hinh_anh)}}" alt="" width="150px" class="img-fluid">
                                </td>
                                <td>
                                    {{$sanPham->ma_san_pham}}
                                </td>
                                <td>
                                    {{$sanPham->ten_san_pham}}
                                </td>
                                <td>
                                    {{number_format($item->don_gia,0,'','.')}}
                                </td>
                                <td>
                                    {{number_format($item->so_luong,0,'','.')}}

                                </td>
                                <td>
                                    {{number_format($item->thanh_tien,0,'','.')}}

                                </td>
                            </tr>
                            @endforeach
                            <!-- /.single product  -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!--end col-->
    </div>
@endsection
