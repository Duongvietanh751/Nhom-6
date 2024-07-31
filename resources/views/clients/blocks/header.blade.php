
<header id="header" class="header-area">
    <div class="container-fluid custom-container menu-rel-container">
        <div class="row">
            <!-- Logo
            ============================================= -->

            <div class="col-lg-6 col-xl-2">
                <div class="logo">
                    <a href="index.html">
                        <img src="{{asset('client/media/images/logo.png')}}" alt="">
                    </a>
                </div>
            </div>

            <!-- Main menu
            ============================================= -->

            <div class="col-lg-12 col-xl-7 order-lg-3 order-xl-2 menu-container">
                <div class="mainmenu">
                    <ul id="navigation">
                        <li ><a href="{{route('home')}}" class="active">home</a>
                        </li>
                        </li>
                        <li ><a href="index.html">Men</a>
                            <div class="mega-menu">
                                <div class="mega-catagory mega-img per-30">
                                    <a href="#"><img src="{{asset('client/media/images/banner/mmb1.jpg')}}" alt=""></a>
                                </div>
                                <div class="mega-catagory mega-img per-30">
                                    <a href="#"><img src="{{asset('client/media/images/banner/mmb2.jpg')}}" alt=""></a>
                                </div>
                            </div>
                        </li>
                        <li ><a href="index.html">Women</a>
                            <div class="mega-menu five-col">
                                <div class="mega-product">
                                    <div class="sin-product">
                                        <div class="pro-img">
                                            <img src="{{asset('client/media/images/product/10.jpg')}}" alt="">
                                        </div>
                                        <div class="mid-wrapper">
                                            <h5 class="pro-title"><a href="product.html">High-Low Dresses</a></h5>
                                            <span>$60.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mega-product">
                                    <div class="sin-product">
                                        <div class="pro-img">
                                            <img src="{{asset('client/media/images/product/10.jpg')}}" alt="">
                                        </div>
                                        <div class="mid-wrapper">
                                            <h5 class="pro-title"><a href="product.html">High-Low Dresses</a></h5>
                                            <span>$60.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mega-product">
                                    <div class="sin-product">
                                        <div class="pro-img">
                                            <img src="{{asset('client/media/images/product/11.jpg')}}" alt="">
                                        </div>
                                        <div class="mid-wrapper">
                                            <h5 class="pro-title"><a href="product.html">Empire Dresses</a></h5>
                                            <span>$10.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mega-product">
                                    <div class="sin-product">
                                        <div class="pro-img">
                                            <img src="{{asset('client/media/images/product/12.jpg')}}" alt="">
                                        </div>
                                        <div class="mid-wrapper">
                                            <h5 class="pro-title"><a href="product.html">Bodycon Dresses</a></h5>
                                            <span>$40.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mega-product">
                                    <div class="sin-product">
                                        <div class="pro-img">
                                            <img src="{{asset('client/media/images/product/13.jpg')}}" alt="">
                                        </div>
                                        <div class="mid-wrapper">
                                            <h5 class="pro-title"><a href="product.html">Laptop carry bag</a></h5>
                                            <span>$70.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li ><a href="shop.html">Shop</a>
                        </li>
                        <li ><a href="blog.html">Blog</a>
                        </li>
                        <li><a href="{{route('contact')}}">CONTACT</a></li>
                        <li ><a href="{{route('donhangs.index')}}">ORDER</a>
                    </ul>
                </div>
            </div>
            <!--Main menu end-->
            <div class="col-lg-6 col-xl-3 order-lg-2 order-xl-3">
                <div class="header-right-one">
                    <ul>
                        <li>
                            <div class="">
                                <div class="mainmenu">
                                    <ul id="navigation">
                                        @guest
                                        @if (Route::has('login'))
                                            
                                                <a class="" href="{{ route('login') }}">{{ __('Login') }}</a> |
                                            
                                        @endif
            
                                        @if (Route::has('register'))
                                            
                                                <a class="" href="{{ route('register') }}">{{ __('Register') }}</a>
                                            
                                        @endif
                                        @else
                                        <li class="has-child">
                                            <a id="navbarDropdown" class="active">
                                                {{ Auth::user()->name }}
                                            </a>
                                            <ul class="sub-menu" >
                                                <li>
                                                    <a  href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                                  document.getElementById('logout-form').submit();">
                                                     {{ __('Logout') }}
                                                    </a>
                
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                </li>
                                            </ul>
                                        </li>
                                         @endguest
                                    </div>
                                </div>
                        </li>
                        <li class="top-cart">
                            <a href="{{route('cart.list')}}">
                                <i class="fa fa-shopping-cart" aria-hidden="true">
                                    </i> {{ session('cart') ? count(session('cart')) : '0'}}</a>
                            {{-- <div class="cart-drop">
                                <div class="single-cart">
                                    <div class="cart-img">
                                        <img alt="" src="{{asset('client/media/images/product/car1.jpg')}}">
                                    </div>
                                    <div class="cart-title">
                                        <p><a href="#">Aliquam Consequat</a></p>
                                    </div>
                                    <div class="cart-price">
                                        <p>1 x $500</p>
                                    </div>
                                    <a href="#"><i class="fa fa-times"></i></a>
                                </div>
                                <div class="single-cart">
                                    <div class="cart-img">
                                        <img alt="" src="{{asset('client/media/images/product/car2.jpg')}}">
                                    </div>
                                    <div class="cart-title">
                                        <p><a href="#">Quisque In Arcuc</a></p>
                                    </div>
                                    <div class="cart-price">
                                        <p>1 x $200</p>
                                    </div>
                                    <a href="#"><i class="fa fa-times"></i></a>
                                </div>
                                <div class="cart-bottom">
                                    <div class="cart-sub-total">
                                        <p>Sub-Total <span>$700</span></p>
                                    </div>
                                    <div class="cart-sub-total">
                                        <p>Eco Tax (-2.00)<span>$7.00</span></p>
                                    </div>
                                    <div class="cart-sub-total">
                                        <p>VAT (20%) <span>$40.00</span></p>
                                    </div>
                                    <div class="cart-sub-total">
                                        <p>Total <span>$244.00</span></p>
                                    </div>
                                    <div class="cart-checkout">
                                        <a href="cart.html"><i class="fa fa-shopping-cart"></i>View Cart</a>
                                    </div>
                                    <div class="cart-share">
                                        <a href="#"><i class="fa fa-share"></i>Checkout</a>
                                    </div>
                                </div>
                            </div> --}}
                        </li>
                        <li class="top-search">
                            <a href="javascript:void(0)"><i class="fa fa-search" aria-hidden="true"></i>
                            </a>
                            <input type="text" class="search-input" placeholder="Search">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Container-Fluid-->
</header>