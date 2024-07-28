<!doctype html>
<html>


<!-- Mirrored from themeim.com/demo/comercio/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Jul 2024 11:56:33 GMT -->
<head>
	<!-- Meta Data -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')</title>

	<!-- Fav Icon -->
	<link rel="apple-touch-icon" sizes="180x180" href="{{asset('client/assets/img/fav-icons/apple-touch-icon.png')}}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{asset('client/assets/img/fav-icons/favicon-32x32.png')}}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{asset('client/assets/img/fav-icons/favicon-16x16.png')}}">

	<!-- Dependency Styles -->
	<link rel="stylesheet" href="{{asset('client/dependencies/bootstrap/css/bootstrap.min.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('client/dependencies/fontawesome/css/fontawesome-all.min.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('client/dependencies/owl.carousel/css/owl.carousel.min.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('client/dependencies/owl.carousel/css/owl.theme.default.min.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('client/dependencies/flaticon/css/flaticon.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('client/dependencies/wow/css/animate.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('client/dependencies/jquery-ui/css/jquery-ui.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('client/dependencies/venobox/css/venobox.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('client/dependencies/slick-carousel/css/slick.css')}}" type="text/css">

	<!-- Site Stylesheet -->
	<link rel="stylesheet" href="{{asset('client/assets/css/app.css')}}" type="text/css">

    @viteReactRefresh
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body id="home-version-1" class="home-version-1" data-style="default">

	<div class="site-content">

        @include('clients.blocks.header')
        @yield('content')
        @include('clients.blocks.footer')





	</div>
	<!-- /#site -->

	<!-- Dependency Scripts -->
	<script src="{{asset('client/dependencies/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('client/dependencies/popper.js/popper.min.js')}}"></script>
	<script src="{{asset('client/dependencies/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('client/dependencies/owl.carousel/js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('client/dependencies/wow/js/wow.min.js')}}"></script>
	<script src="{{asset('client/dependencies/isotope-layout/js/isotope.pkgd.min.js')}}"></script>
	<script src="{{asset('client/dependencies/imagesloaded/js/imagesloaded.pkgd.min.js')}}"></script>
	<script src="{{asset('client/dependencies/jquery.countdown/js/jquery.countdown.min.js')}}"></script>
	<script src="{{asset('client/dependencies/gmap3/js/gmap3.min.js')}}"></script>
	<script src="{{asset('client/dependencies/venobox/js/venobox.min.js')}}"></script>
	<script src="{{asset('client/dependencies/slick-carousel/js/slick.js')}}"></script>
	<script src="{{asset('client/dependencies/headroom/js/headroom.js')}}"></script>
	<script src="{{asset('client/dependencies/jquery-ui/js/jquery-ui.min.js')}}"></script>
	<!--Google map api -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsBrMPsyNtpwKXPPpG54XwJXnyobfMAIc"></script>

	<!-- Site Scripts -->
	<script src="{{asset('client/assets/js/app.js')}}"></script>
</body>


<!-- Mirrored from themeim.com/demo/comercio/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Jul 2024 11:56:33 GMT -->
</html>