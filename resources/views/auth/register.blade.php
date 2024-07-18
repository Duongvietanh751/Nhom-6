@extends('layouts.app')

@section('content')
<div id="preloader" class="preloader">
    <div class='inner'>
        <div class='line1'></div>
        <div class='line2'></div>
        <div class='line3'></div>
    </div>
</div>
<section class="fxt-template-animation fxt-template-layout9" data-bg-image="{{asset('themeLogin/img/figure/bg9-l.jpg')}}">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-3">
                <div class="fxt-header">
                    <a href="{{asset('themeLogin/login-9.html')}}" class="fxt-logo"><img src="{{asset('themeLogin/img/logo-9.png')}}">></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="fxt-content">
                    <h2>Register into your account</h2>
                    <div class="fxt-form">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <div class="fxt-transformY-50 fxt-transition-delay-1">
                                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="name">
                                </div>
                                @error('name')
                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="fxt-transformY-50 fxt-transition-delay-1">
                                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" placeholder="email">
                                </div>
                                @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                 @enderror
                            </div>
                            <div class="form-group">
                                <div class="fxt-transformY-50 fxt-transition-delay-2">
                                    <input id="password" type="password" name="password"class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password" placeholder="password">
                                    <i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
                                </div>
                                @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="fxt-transformY-50 fxt-transition-delay-2">
                                    <input id="password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="confirm password">
                                    <i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
                                </div>
                                @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="fxt-transformY-50 fxt-transition-delay-3">
                                    <div class="fxt-checkbox-area">
                                        <div class="checkbox">
                                            <input id="checkbox1" type="checkbox">
                                            <label for="checkbox1">Keep me logged in</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="fxt-transformY-50 fxt-transition-delay-4">
                                    <button type="submit" class="fxt-btn-fill">Register</button>
                                </div>
                            </div>
                            <div class="fxt-footer">
                                <div class="fxt-transformY-50 fxt-transition-delay-9">
                                    <p>Already have an account?<a href="{{route('login')}}" class="switcher-text2 inline-text">Log in</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
