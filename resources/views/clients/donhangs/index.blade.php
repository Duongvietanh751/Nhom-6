@extends('layouts.app')
@section('title')
    ORDER
@endsection
@section('content')
<section class="breadcrumb-area">
    <div class="container-fluid custom-container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bc-inner">
                    <p><a href="#">Home  |</a>Order</p>
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

<section class="cart-area">
    <div class="container-fluid custom-container">
        @if (session('success'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-bottom:30px">
                            {{session('success')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

                            </button>
                        </div>
         @endif
        <div class="row">
            <div class="col-xl-12">
                <div class="cart-table">
                    <table class="tables table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Mã Đơn Hàng</th>
                                <th>Ngày Đặt</th>
                                <th>Trạng Thái</th>
                                <th>Tổng Tiền</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($donHangs as  $item )
                            <tr>
                               <td>
                                <a href="{{route('donhangs.show',$item->id)}}" class="btn btn-info">
                                    {{$item->ma_don_hang}}
                                </a>
                               </td>
                               <td>
                                {{$item->created_at->format('d-m-y')}}
                               </td>
                               <td>
                                {{$trangThai[$item->trang_thai_don_hang]}}
                               </td>
                               <td>
                                {{$item->tong_tien}}
                               </td>
                               <td>
                                    <a href="{{route('donhangs.show',$item->id)}}" class="btn btn-info">
                                        View
                                    </a>
                                    <form action="{{route('donhangs.update',$item->id)}}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        @if ($item->trang_thai_don_hang === $type_cho_xac_nhan)
                                            <input type="hidden" name="huy_don_hang" value="1">
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có muốn hủy đơn hàng không ?')">Hủy</button>
                                        @elseif ($item->trang_thai_don_hang === $type_cho_xac_nhan)
                                        <input type="hidden" name="da_giao_hang" value="1">
                                        <button type="submit" class="btn btn-success" onclick="return confirm('Xác nhận đã nhận hàng')">Hủy</button>
                                        @endif
                                    </form>
                               </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <!-- /.cart-table -->
                <div class="row cart-btn-section">
                    <div class="col-12 col-sm-8 col-lg-6">
                        <div class="cart-btn-left">
                            <a class="coupon-code" href="#">Coupon Code</a>
                            <a href="#">Apply Coupon</a>
                        </div>
                    </div>
                    <!-- /.col-xl-6 -->
                    <div class="col-12 col-sm-4 col-lg-6">
                        <div class="cart-btn-right">
                            <button type="submit" class="btn btn-success">Update Cart</button>
                        </div>
                    </div>
                    <!-- /.col-xl-6 -->
                </div>
                <!-- /.row -->
            </div>
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
