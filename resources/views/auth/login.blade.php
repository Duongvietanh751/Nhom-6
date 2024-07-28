@extends('layouts.app')
@section('title')
    Login
@endsection
@section('content')
<section class="breadcrumb-area">
    <div class="container-fluid custom-container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bc-inner">
                    <p><a href="#">Home  |</a> Login</p>
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
            <h3>Login <span>Account</span></h3>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-9 col-md-8 col-lg-6 col-xl-4">
                <div class="contact-form login-form">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row">
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
                            <div class="col-xl-8">
                                <label for="checkbox1" style="margin-right: 20px">Keep me logged in</label>
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} style="width: 20px" class="d-inline">
                            </div>
                            <div class="col-xl-4">
                                @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="switcher-text">Forgot Password</a>
                                @endif
                            </div>
                            <div class="col-xl-12">
                                <input type="submit" value="LOG IN">
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
            <span>Dont have account</span>
            <a href="{{ route('register') }}" class="btn-two">Create Account</a>
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
