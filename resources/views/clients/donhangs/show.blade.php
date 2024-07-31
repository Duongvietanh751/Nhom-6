@extends('layouts.app')
@section('content')
<section class="breadcrumb-area">
    <div class="container-fluid custom-container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bc-inner">
                    <p><a href="#">SHOW  |</a> CART </p>
                </div>
            </div>
            <!-- /.col-xl-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>

<!--=========================-->
<!--=        Breadcrumb         =-->
<!--=========================-->

<section class="account-area">
    <div class="container-fluid custom-container">
        <div class="row">
            <div class="col-xl-4">
                <div class="account-details">
                    <p class="text-left text-danger">Thông tin đơn hàng</p>
                    <ul >
                        <li class="text-left"> Mã Đơn Hàng :{{$donHang->ma_don_hang}}</li>
                        <li class="text-left">Tên Người Nhận : {{$donHang->ma_don_hang}} </li>
                        <li class="text-left">Email: : {{$donHang->email_nguoi_nhan}} </li>
                        <li class="text-left">Số Điện Thoại : {{$donHang->so_dien_thoai_nguoi_nhan}} </li>
                        <li class="text-left">Địa Chỉ : {{$donHang->dia_chi_nguoi_nhan}} </li>
                        <li class="text-left">Ngày Nhận Hàng : {{$donHang->created_at->format('d-m-Y')}}</li>
                        <li class="text-left">Ghi Chú : {{$donHang->ghi_chu}} </li>
                        <li class="text-left">Trạng Thái : {{$donHang->trang_thai_don_hang}} </li>
                        <li class="text-left">Trạng Thái Thanh Toán : {{$donHang->trang_thai_thanh_toan}} </li>
                        <li class="text-left">Tiền Hàng : {{$donHang->tien_hang}} VND</li>
                        <li class="text-left">Tiền SHIP : {{$donHang->tien_ship}} VND</li>
                        <li class="text-left">Tổng Tiền : {{$donHang->tong_tien}} VND</li>

                    </ul>
                </div>
                <!-- /.cart-subtotal -->
            </div>
            <!-- /.col-xl-3 -->
            <div class="col-xl-8">
                <div class="account-table">
                    <h6>Order History</h6>
                    <table class="tables">
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
                <!-- /.cart-table -->
            </div>
            <!-- /.col-xl-9 -->

        </div>
    </div>
</section>
<!-- /.cart-area -->

<!--=========================-->
<!--=   Subscribe area      =-->
<!--=========================-->

<section class="subscribe-area style-two">
    <div class="container container-two">
        <div class="row">
            <div class="col-lg-5">
                <div class="subscribe-text">
                    <h6>Join our newsletter</h6>
                </div>
            </div>
            <!-- col-xl-6 -->

            <div class="col-lg-7">
                <div class="subscribe-wrapper">
                    <input placeholder="Enter Keyword" type="text">
                    <button type="submit">SUBSCRIBE</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-two -->
</section>
@endsection