@extends('layouts.app')
@section('title')
    REGISTER
@endsection
@section('content')
<section class="breadcrumb-area">
    <div class="container-fluid custom-container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bc-inner">
                    <p><a href="#">Home  |</a> REGISTER</p>
                </div>
            </div>
            <!-- /.col-xl-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>

<!--=========================-->
<!--=        Login         =-->
<!--=========================-->



<!--Login  area
============================================= -->

<section class="contact-area">
    <div class="container-fluid custom-container">
        <div class="section-heading pb-30">
            <h3>REGISTER <span>Account</span></h3>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-9 col-md-8 col-lg-6 col-xl-4">
                <div class="contact-form login-form">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                            <div class="col-xl-12">
                                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="name">
                                @error('name')
                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="col-xl-12">
                                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" name="email" placeholder="email" required autocomplete="email" autofocu>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-xl-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="********" required="required">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-xl-12">
                                <div>
                                <input id="password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="confirm password">
                                <i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
                                </div>
                                @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                @enderror
                            </div>
                            <div class="col-xl-12">
                                <input type="submit" value="REGISTER">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row end -->
    </div>
    <!-- /.container-fluid end -->
</section>
<!-- /.contact-area end -->

<section class="login-now">
    <div class="container-fluid custom-container">
        <div class="col-12">
            <span>Have account</span>
            <a href="{{route('login')}}"  class="btn-two">Log in</a>
        </div>
        <!-- /.col-12 -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.login-now -->









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
<!-- subscribe-area -->
@endsection
