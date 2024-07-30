@extends('layouts.app')
@section('title')
    Giỏ Hàng
@endsection
@section('content')
<section class="breadcrumb-area">
    <div class="container-fluid custom-container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bc-inner">
                    <p><a href="#">Home  |</a> Đặt Hàng</p>
                </div>
            </div>
            <!-- /.col-xl-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<section class="cart-area">
    <div class="container-fluid custom-container">
        <form action="{{route('donhangs.store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-xl-7">
                    <div class="row justify-content-center">
                        <div class="">
                            <div class="contact-form">
                                
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <label for="">Tên Người Nhận</label>
                                            <input type="text" placeholder="Tên Người Nhận"  name="ten_nguoi_nhan" value="{{Auth::user()->name}}">
                                            @error('ten_nguoi_nhan')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="col-xl-6">
                                            <label for="">Email</label>

                                            <input type="text" placeholder="Email Người Nhận" name="email_nguoi_nhan" value="{{Auth::user()->email}}" >
                                            @error('email_nguoi_nhan')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="col-xl-6">
                                            <label for="">Số điện thoại</label>

                                            <input type="text" placeholder="Số Điện Thoại Người Nhận" name="so_dien_thoai_nguoi_nhan" value="{{Auth::user()->phone}}" >
                                            @error('so_dien_thoai_nguoi_nhan')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="col-xl-6">
                                            <label for="">Địa Chỉ</label>

                                            <input type="text" placeholder="Địa chỉ người nhận Người Nhận" name="dia_chi_nguoi_nhan" value="{{Auth::user()->address}}" >
                                            @error('dia_chi_nguoi_nhan')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-xl-12">
                                            <label for="">Ghi Chú</label>
                                            <textarea name="ghi_chu" cols="30" rows="10" placeholder="Bạn có cần thêm thông tin gì không ? "></textarea>
                                            @error('ghi_chu')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>		
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5">
                    <div class="cart-subtotal">
                        <p>Đơn Hàng Gồm :</p>
                        @foreach ($carts as $item)
                        <ul style="margin-bottom: 30px">
                            <li><span>Tên Sản Phẩm : </span>{{$item['ten_san_pham']}}</li>
                            <li><span>Số Lượng</span>{{$item['so_luong']}}</li>
                            <li><span>Giá Tiền</span>{{number_format($item['gia']*$item['so_luong'],0,'','.')}} VND</li>
                        </ul>
                        @endforeach
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio"  id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                Thanh toán khi nhận hàng
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                Thanh toán online
                                </label>
                            </div>
                        </div>
                        <h4 style="color: red"><span>SUBTOTAL:   </span>{{number_format($subTotal,0,'','.')}} VND</h4>
                        <input type="hidden" name="tien_hang" value="{{$subTotal}}">
                        <h4 style="color: red"><span>SHIPPING:   </span>{{number_format($shipping,0,'','.')}} VND</h4>
                        <input type="hidden" name="tien_ship" value="{{$shipping}}">
                        <h4 style="color: red"><span>TOTAL:   </span>{{number_format($total,0,'','.')}} VND</h4>
                        <input type="hidden" name="tong_tien" value="{{$total}}">
                        <button type="submit" class="btn btn-success" style="margin-top: 30px">Đặt Hàng</button>
                    </div>
                    <!-- /.cart-subtotal -->
                </div>
                <!-- /.col-xl-3 -->
            </div>
        </form>
    </div>
</section>
@endsection