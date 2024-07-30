@extends('layouts.app')
@section('titile')
    Giỏ Hàng
@endsection
@section('content')
<section class="breadcrumb-area">
    <div class="container-fluid custom-container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bc-inner">
                    <p><a href="#">Home  |</a> Giỏ Hàng</p>
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
        <div class="row">
            <div class="col-xl-9">
                <form action="{{route('cart.update')}}" method="POST">
                    @csrf
                <div class="cart-table">
                    <table class="tables">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart as $key=> $item )
                            <tr>
                                <td class="pro-remove">
                                    <a href="#"><i class="fa fa-trash-o">X</i></a>
                                </td>
                                {{-- hình Ảnh --}}
                                <td>
                                    <a href="#">
                                        <div class="product-image">
                                            <img alt="Stylexpo" src="{{Storage::url($item['hinh_anh'])}}" width="70px">
                                            <input type="hidden" name="cart[{{ $key }}][hinh_anh]" value="{{$item['hinh_anh']}}">
                                        </div>
                                    </a>
                                </td>
                                {{-- Tên sản phẩm --}}
                                <td>
                                    <div class="product-title">
                                        <a href="{{route('products.detail',$key)}}">{{$item['ten_san_pham']}}</a>
                                        <input type="hidden" name="cart[{{ $key }}][ten_san_pham]" value="{{$item['ten_san_pham']}}">
                                    </div>
                                </td>
                                {{-- Số Lượng --}}
                                <td>
                                    <div class="cart-plus-minus-button">
                                        <input type="number" class="quantityInput cart-plus-minus" id="subtotal" data-price="{{$item['gia']}}" value="{{$item['so_luong']}}" 
                                        name="cart[{{ $key }}][so_luong]">
                                    </div>
                                </td>
                                {{-- Giá --}}
                                <td>
                                    <ul>
                                        <li>
                                            <div class="price-box">
                                                <span class="price">{{ number_format($item['gia'] , 0 , '' ,'.')}}</span>
                                                <input type="hidden" name="cart[{{ $key }}][gia]" value="{{$item['gia']}}">
                                            </div>
                                        </li>
                                    </ul>
                                </td>

                                {{-- Tổng Tiền --}}
                                <td>
                                    <div class="total-price-box">
                                        <span class="subtotal">{{ number_format($item['gia'] * $item['so_luong'] , 0 , '' ,'.')}} VND</span>
                                    </div>
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
            </form>
                <!-- /.row -->
            </div>
            <!-- /.col-xl-9 -->
            <div class="col-xl-3">
                <div class="cart-subtotal">
                    <p>SUBTOTAL</p>
                    <ul>
                        <li ><span>Sub-Total:</span>{{ number_format($subTotal, 0 , '' ,'.')}}</li>
                        <li ><span>Shipping Cost:</span>{{ number_format($shipping, 0 , '' ,'.')}}</li>
                        <li ><span>TOTAL:</span>{{ number_format($total, 0 , '' ,'.')}}</li>
                    </ul>
                    <div class="note">
                        <span>Order Note :</span>
                        <textarea></textarea>
                    </div>
                    <a href="#">Proceed To Checkout</a>
                </div>
                <!-- /.cart-subtotal -->


            </div>
            <!-- /.col-xl-3 -->
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
@section('js')
    <script>
        $('.pro-remove').on('click', function (){
        event.preventDefault(); // chặn thao tác mặc định của thẻ a
        var $row = $(this).closest('tr');
        $row.remove();
      })
    </script>
@endsection