@extends('layouts.app')
@section('content')
<section class="slider-wrapper">
    <div class="slider-start slider-1 owl-carousel owl-theme">

        <div class="item">
            <img src="{{asset('client/media/images/banner/f1.jpg')}}" alt="">
            <div class="container-fluid custom-container slider-content">
                <div class="row align-items-center">

                    <div class="col-12 col-sm-8 col-md-8 col-lg-6 ml-auto">
                        <div class="slider-text ">
                            <h4 class="animated fadeInUp"><span>BRAND NEW</span> COLLECTION</h4>
                            <h1 class="animated fadeInUp">COMERCIO SHOP</h1>
                            <p class="animated fadeInUp">Autem vel eum iriure dolor in molestie consequat vel illum dolore eu feugiat nulla facilisis at vero eros.</p>
                            <a class="animated fadeInUp btn-two" href="#">SHOP NOW</a>
                        </div>
                    </div>
                    <!-- Col End -->
                </div>
                <!-- Row End -->
            </div>
        </div>

        <div class="item">
            <img src="{{asset('client/media/images/banner/f2.jpg')}}" alt="">
            <div class="container-fluid custom-container slider-content">
                <div class="row align-items-center">

                    <div class="col-12 col-sm-8 col-md-8 col-lg-6 ml-auto">
                        <div class="slider-text ">
                            <h4 class="animated fadeIn"><span>BRAND NEW</span> COLLECTION</h4>
                            <h1 class="animated fadeIn">NEW ARRIVALS</h1>
                            <p class="animated fadeIn">Autem vel eum iriure dolor in hendrerit molestie consequat vel illum dolore eu feugiat nulla facilisis at vero eros.</p>
                            <a class="animated fadeIn btn-two" href="#">SHOP NOW</a>
                        </div>
                    </div>
                    <!-- Col End -->
                </div>
                <!-- Row End -->
            </div>
        </div>

        <div class="item">
            <img src="{{asset('client/media/images/banner/f3.jpg')}}" alt="">
            <div class="container-fluid custom-container slider-content">
                <div class="row align-items-center">
                    <div class="col-12 col-sm-8 col-md-8 offset-md-1 col-lg-6 offset-xl-2 col-xl-5 mr-auto">
                        <div class="slider-text mob-align-left">
                            <h4 class="animated fadeIn"><span>LATEST COLLECTION </span> 2018 </h4>
                            <h1 class="animated fadeIn">STYLE & GRACE </h1>
                            <p class="animated fadeIn">Autem vel eum iriure dolor molestie consequat vel illum dolore eu feugiat nulla facilisis at vero eros.</p>
                            <a class="animated fadeIn btn-two" href="#">SHOP NOW</a>
                        </div>
                    </div>
                    <!-- Col End -->
                </div>
                <!-- Row End -->
            </div>
        </div>

    </div>
</section>
<!-- Slides end -->



<!--=========================-->
<!--=        Banner         =-->
<!--=========================-->

<section class="banner padding-top-120">
    <div class="container-fluid custom-container">
        <div class="row">
            <div class="col-12 col-md-4">
                <a href="#">
                    <div class="sin-banner align-items-center">
                        <img src="{{asset('client/media/images/banner/2.png')}}" alt="">
                        <div class="sin-banner-con">
                            <div class="sin-banner-inner-wrap">
                                <div class="banner-top">
                                    <h4>Man's</h4>
                                    <h4>Acces <span>sories</span></h4>
                                </div>
                                <p>Extra</p>
                                <h3>60% Off</h3>
                                <span>Final sale</span>
                                <span>Items</span>
                            </div>
                        </div>
                    </div>
                    <!-- /.sin-banner -->
                </a>
            </div>
            <!-- /.col-xl-5 -->

            <div class="col-12 col-md-4">
                <a href="#">
                    <div class="sin-banner style-two">

                        <img src="{{asset('client/media/images/banner/3.png')}}" alt="">

                        <div class="sin-banner-con">
                            <div class="sin-banner-inner-wrap">
                                <h4>Woman's Shop</h4>
                                <h3>40% Off</h3>
                                <span>Best of Shop Beauty</span>
                            </div>

                        </div>


                    </div>
                    <!-- /.sin-banner -->
                </a>
            </div>
            <!-- /.col-xl-4 -->

            <div class="col-12 col-md-4">
                <a href="#">
                    <div class="sin-banner">
                        <img src="{{asset('client/media/images/banner/5.png')}}" alt="">
                        <div class="br-wrapper">
                            <div class="sin-banner-con-right">
                                <p>Kids shop sale</p>
                                <span>up to 80% off</span>
                            </div>
                        </div>
                    </div>
                    <!-- /.sin-banner -->
                </a>
            </div>
            <!-- /.col-xl-3 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- banner -->

<!--=========================-->
<!--=        Product Filter      =-->
<!--=========================-->


<section class="main-product">
    <div class="container container-two">
        <div class="section-heading">
            <h3>Welcome to <span>product</span></h3>
        </div>
        <!-- /.section-heading-->
        <div class="row">
            <div class="col-xl-12 ">
                <div class="pro-tab-filter">
                    <ul class="pro-tab-button">
                        <li class="filter active" data-filter="*">ALL</li>
                        <li class="filter" data-filter=".two">Accessories</li>
                        <li class="filter" data-filter=".three">Men's clothing</li>
                        <li class="filter" data-filter=".four">Kids clothing</li>
                        <li class="filter" data-filter=".five">Women dresses</li>
                    </ul>
                    <div class="grid row">
                        <!-- single product -->
                        @foreach ($listProduct as $sanPham)
                            <div class=" grid-item two col-6 col-md-6  col-lg-4 col-xl-3">
                                <div class="sin-product style-one">
                                    <div class="pro-img">
                                        <img src="{{Storage::url($sanPham->hinh_anh)}}" alt="">
                                    </div>
                                    <div class="mid-wrapper">
                                        <h5 class="pro-title"><a href="{{route('products.detail',$sanPham->id)}}">{{$sanPham->ten_san_pham}}</a></h5>
                                        <span>{{$sanPham->gia_san_pham}}</span>
                                    </div>

                                    <div class="pro-icon">
                                        <ul>
                                            <button class="btn" style="margin-bottom: 10px"><i class="flaticon-valentines-heart"></i></button>
                                               <form action="{{route('cartAdd')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="quantity" value="1">
                                                    <input type="hidden" name="product_id" value="{{$sanPham->id}}">
                                                <button class="btn"><i class="flaticon-shopping-cart"></i></button>
                                                </form>                                         
                                        </ul>
                                    </div>
                                </div>
                            </div>
                         @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Row End -->
    </div>
    <!-- Container  -->
</section>

<section class="feature-area">
    <div class="container-fluid custom-container">
        <div class="row">
            <!-- Single Feature -->
            <div class="col-sm-6 col-xl-3">
                <div class="sin-feature">
                    <div class="inner-sin-feature">
                        <div class="icon">
                            <i class="flaticon-free-delivery"></i>
                        </div>
                        <div class="f-content">
                            <h6><a href="#">FREE SHIPPING</a></h6>
                            <p>Free shipping on all order</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Feature -->
            <div class="col-sm-6  col-xl-3">
                <div class="sin-feature">
                    <div class="inner-sin-feature">
                        <div class="icon">
                            <i class="flaticon-shopping-online-support"></i>
                        </div>
                        <div class="f-content">
                            <h6><a href="#">ONLINE SUPPORT</a></h6>
                            <p>Online support 24 hours</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Feature -->
            <div class="col-sm-6  col-xl-3">
                <div class="sin-feature">
                    <div class="inner-sin-feature">
                        <div class="icon">
                            <i class="flaticon-return-of-investment"></i>
                        </div>
                        <div class="f-content">
                            <h6><a href="#">MONEY RETURN</a></h6>
                            <p>Back guarantee under 5 days</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Feature -->
            <div class="col-sm-6  col-xl-3">
                <div class="sin-feature">
                    <div class="inner-sin-feature">
                        <div class="icon">
                            <i class="flaticon-sign"></i>
                        </div>
                        <div class="f-content">
                            <h6><a href="#">MEMBER DISCOUNT</a></h6>
                            <p>Onevery order over $150</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.feature-area -->

<!--=========================-->
<!--=   Product  area Two   =-->
<!--=========================-->

<section class="banner-product">
    <div class="container container-two">
        <div class="section-heading pb-30">
            <h3>NEW <span>TRENDING</span></h3>
        </div>
        <!-- section-heading-->
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-4 col-md-8">
                <!-- Single Product-->
                <div class="sin-product">
                    <div class="pro-img">
                        <img src="{{asset('client/media/images/product/b1.jpg')}}" alt="">
                    </div>
                    <div class="mid-wrapper style-two">
                        <h5 class="pro-title"><a href="product.html">Colorfull long dress</a></h5>
                        <div class="rating">
                            <ul>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star-half"></i></a></li>
                            </ul>
                        </div>
                        <span>$60.00</span>
                    </div>
                    <div class="pro-icon">
                        <ul>
                            <li><a href="#"><i class="flaticon-valentines-heart"></i></a></li>
                            <li><a href="#"><i class="flaticon-shopping-cart"></i></a></li>
                            <li><a class="trigger" href="#"><i class="flaticon-zoom-in"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-sm-6">
                <!-- Single Product-->
                <div class="sin-product">
                    <div class="pro-img">
                        <img src="{{asset('client/media/images/product/10.jpg')}}" alt="">
                    </div>
                    <div class="mid-wrapper style-two">
                        <h5 class="pro-title"><a href="product.html">Top shirt for women</a></h5>
                        <div class="rating">
                            <ul>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star-half"></i></a></li>
                            </ul>
                        </div>
                        <span>$60.00</span>
                    </div>
                    <div class="pro-icon">
                        <ul>
                            <li><a href="#"><i class="flaticon-valentines-heart"></i></a></li>
                            <li><a href="#"><i class="flaticon-shopping-cart"></i></a></li>
                            <li><a class="trigger" href="#"><i class="flaticon-zoom-in"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- Single Product-->
                <div class="sin-product">
                    <div class="pro-img">
                        <img src="{{asset('client/media/images/product/11.jpg')}}" alt="">
                    </div>
                    <div class="mid-wrapper style-two">
                        <h5 class="pro-title"><a href="product.html">Men long jacket</a></h5>
                        <div class="rating">
                            <ul>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                            </ul>
                        </div>
                        <span>$60.00</span>
                    </div>
                    <div class="pro-icon">
                        <ul>
                            <li><a href="#"><i class="flaticon-valentines-heart"></i></a></li>
                            <li><a href="#"><i class="flaticon-shopping-cart"></i></a></li>
                            <li><a class="trigger" href="#"><i class="flaticon-zoom-in"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class=" col-lg-4 col-sm-6 col-xl-3">
                <!-- Single Product-->
                <div class="sin-product">
                    <div class="pro-img">
                        <img src="{{asset('client/media/images/product/12.jpg')}}" alt="">
                    </div>
                    <div class="mid-wrapper style-two">
                        <h5 class="pro-title"><a href="product.html">Lon  dress</a></h5>
                        <div class="rating">
                            <ul>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star-half"></i></a></li>
                            </ul>
                        </div>
                        <span>$60.00</span>
                    </div>
                    <div class="pro-icon">
                        <ul>
                            <li><a href="#"><i class="flaticon-valentines-heart"></i></a></li>
                            <li><a href="#"><i class="flaticon-shopping-cart"></i></a></li>
                            <li><a class="trigger" href="#"><i class="flaticon-zoom-in"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- Single Product-->
                <div class="sin-product">
                    <div class="pro-img">
                        <img src="{{asset('client/media/images/product/13.jpg')}}" alt="">
                    </div>
                    <div class="mid-wrapper style-two">
                        <h5 class="pro-title"><a href="product.html">Embellished white dress</a></h5>
                        <div class="rating">
                            <ul>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                            </ul>
                        </div>
                        <span>$60.00</span>
                    </div>
                    <div class="pro-icon">
                        <ul>
                            <li><a href="#"><i class="flaticon-valentines-heart"></i></a></li>
                            <li><a href="#"><i class="flaticon-shopping-cart"></i></a></li>
                            <li><a class="trigger" href="#"><i class="flaticon-zoom-in"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- Container-two  -->
</section>
<!-- main-product -->

<!--=========================-->
<!--=   Discount Countdown area   =-->
<!--=========================-->

<section class="add-area">
    <a href="#"><img src="{{asset('client/media/images/banner/add.jpg')}}" alt=""></a>
</section>

<!--=========================-->
<!--=   Small Product area    =-->
<!--=========================-->

<section class="product-small">
    <div class="container-fluid  custom-container">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-xl-3">
                <div class="small-sec-title">
                    <h6>TOP <span>SALE</span></h6>
                </div>
                <!-- Single product-->
                <div class="sin-product-s">
                    <div class="sp-img">
                        <img src="{{asset('client/media/images/product/s9.jpg')}}" alt="">
                    </div>
                    <div class="small-pro-details">
                        <h5 class="title"><a href="#">Sunglass dark color</a></h5>
                        <div class="rating">
                            <ul>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                            </ul>
                        </div>
                        <span>$60</span>
                        <a href="#">Buy Now</a>
                    </div>
                </div>

                <!-- Single product-->
                <div class="sin-product-s">
                    <div class="sp-img">
                        <img src="{{asset('client/media/images/product/s2.jpg')}}" alt="">
                    </div>
                    <div class="small-pro-details">
                        <h5 class="title"><a href="#">Top dress</a></h5>
                        <div class="rating">
                            <ul>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                            </ul>
                        </div>
                        <span>$60</span>
                        <a href="#">Buy Now</a>
                    </div>
                </div>


            </div>
            <!-- col -->

            <div class="col-sm-6 col-xl-3  col-md-6">
                <div class="small-sec-title">
                    <h6>TOP <span>RATED</span></h6>
                </div>
                <!-- Single product-->
                <div class="sin-product-s">
                    <div class="sp-img">
                        <img src="{{asset('client/media/images/product/s1.jpg')}}" alt="">
                    </div>
                    <div class="small-pro-details">
                        <h5 class="title"><a href="#">Blue girls cap</a></h5>
                        <div class="rating">
                            <ul>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                            </ul>
                        </div>
                        <span>$60</span>
                        <a href="#">Buy Now</a>

                    </div>
                </div>

                <!-- Single product-->
                <div class="sin-product-s">
                    <div class="sp-img">
                        <img src="{{asset('client/media/images/product/s11.jpg')}}" alt="">
                    </div>
                    <div class="small-pro-details">
                        <h5 class="title"><a href="#">Red tops</a></h5>
                        <div class="rating">
                            <ul>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                            </ul>
                        </div>
                        <span>$60</span>
                        <a href="#">Buy Now</a>
                    </div>
                </div>


            </div>
            <!-- col -->

            <div class="col-sm-6 col-xl-3  col-md-6">
                <div class="small-sec-title">
                    <h6>WEEKLY <span>BEST</span></h6>
                </div>
                <!-- Single product-->
                <div class="sin-product-s">
                    <div class="sp-img">
                        <img src="{{asset('client/media/images/product/s9.jpg')}}" alt="">
                    </div>
                    <div class="small-pro-details">
                        <h5 class="title"><a href="#">Contrasting T-Shirt</a></h5>
                        <div class="rating">
                            <ul>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                            </ul>
                        </div>
                        <span>$60</span>
                        <a href="#">Buy Now</a>
                    </div>
                </div>

                <!-- Single product-->
                <div class="sin-product-s">
                    <div class="sp-img">
                        <img src="{{asset('client/media/images/product/s4.jpg')}}" alt="">
                    </div>
                    <div class="small-pro-details">
                        <h5 class="title"><a href="#">Sunglas</a></h5>
                        <div class="rating">
                            <ul>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                            </ul>
                        </div>
                        <span>$60</span>
                        <a href="#">Buy Now</a>
                    </div>
                </div>


            </div>
            <!-- col -->

            <div class="col-sm-6 col-xl-3 col-md-6">
                <div class="small-sec-title">
                    <h6>SALE <span>OFF</span></h6>
                </div>
                <!-- Single product-->
                <div class="sin-product-s">
                    <div class="sp-img">
                        <img src="{{asset('client/media/images/product/s6.jpg')}}" alt="">
                    </div>
                    <div class="small-pro-details">
                        <h5 class="title"><a href="#">Contrasting T-Shirt</a></h5>
                        <div class="rating">
                            <ul>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                            </ul>
                        </div>
                        <span>$60</span>
                        <a href="#">Buy Now</a>
                    </div>
                </div>

                <!-- Single product-->
                <div class="sin-product-s">
                    <div class="sp-img">
                        <img src="{{asset('client/media/images/product/s7.jpg')}}" alt="">
                    </div>
                    <div class="small-pro-details">
                        <h5 class="title"><a href="#">Contrasting T-Shirt</a></h5>
                        <div class="rating">
                            <ul>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                            </ul>
                        </div>
                        <span>$60</span>
                        <a href="#">Buy Now</a>
                    </div>
                </div>
            </div>
            <!-- col -->
        </div>
        <!-- row -->
    </div>
    <!-- container-fluid End-->
</section>


<!--=========================-->
<!--=   Instagram area      =-->
<!--=========================-->

<section class="instagram-area">
    <div class="instagram-slider owl-carousel owl-theme">
        <!-- single instagram-slider -->
        <div class="sin-instagram">
            <img src="{{asset('client/media/images/instagram/1.jpg')}}" alt="">
            <div class="hover-text">
                <a href="#">
            <img src="{{asset('client/media/images/icon/ig.png')}}" alt="">
            <span>instagram</span>
        </a>
            </div>
        </div>
        <!-- single instagram-slider -->
        <div class="sin-instagram">
            <img src="{{asset('client/media/images/instagram/2.jpg')}}" alt="">
            <div class="hover-text">
                <a href="#">
            <img src="{{asset('client/media/images/icon/ig.png')}}" alt="">
            <span>instagram</span>
        </a>
            </div>
        </div>
        <!-- single instagram-slider -->
        <div class="sin-instagram">
            <img src="{{asset('client/media/images/instagram/3.jpg')}}" alt="">
            <div class="hover-text">
                <a href="#">
            <img src="{{asset('client/media/images/icon/ig.png')}}" alt="">
            <span>instagram</span>
        </a>
            </div>
        </div>
        <!-- single instagram-slider -->
        <div class="sin-instagram">
            <img src="{{asset('client/media/images/instagram/4.jpg')}}" alt="">
            <div class="hover-text">
                <a href="#">
            <img src="{{asset('client/media/images/icon/ig.png')}}" alt="">
            <span>instagram</span>
        </a>
            </div>
        </div>
        <!-- single instagram-slider -->
        <div class="sin-instagram">
            <img src="{{asset('client/media/images/instagram/5.jpg')}}" alt="">
            <div class="hover-text">
                <a href="#">
            <img src="{{asset('client/media/images/icon/ig.png')}}" alt="">
            <span>instagram</span>
        </a>
            </div>
        </div>
    </div>
    <!-- /.instagram-slider end -->
</section>
<!-- /.instagram-area end-->
@endsection