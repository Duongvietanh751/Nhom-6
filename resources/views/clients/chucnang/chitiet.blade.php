@extends('layouts.app')
@section('content')
    
		<section class="breadcrumb-area">
			<div class="container-fluid custom-container">
				<div class="row">
					<div class="col-xl-12">
						<div class="bc-inner">
							<p><a href="#">Home  |</a> PRODUCT DETAIL</p>
						</div>
					</div>
					<!-- /.col-xl-12 -->
				</div>
				<!-- /.row -->
			</div>
			<!-- /.container -->
		</section>

		<!--=========================-->
		<!--=        Shop area          =-->
		<!--=========================-->

		<section class="shop-area style-two">
			<div class="container">
				<div class="row">
					<div class="col-xl-12">
						<div class="row">
							<div class="col-lg-6 col-xl-6">
								<!-- Product View Slider -->
								<div class="quickview-slider">
									<div class="slider-for">
										<div class="">
											<img src="{{Storage::url($sanPham->hinh_anh)}}" alt="Thumb">
										</div>
										@foreach ($sanPham->hinhAnhSanPham as $item)
											<div class="">
												<img src="{{Storage::url($item->hinh_anh)}}" alt="thumb">
											</div>
										@endforeach
									</div>
									{{-- Líst danh sach anh nho --}}
									<div class="slider-nav">
										<div class="">
											<img src="{{Storage::url($sanPham->hinh_anh)}}" alt="Thumb">
										</div>
										@foreach ($sanPham->hinhAnhSanPham as $item)
											<div class="">
												<img src="{{Storage::url($item->hinh_anh)}}" alt="thumb">
											</div>
										@endforeach
									</div>
								</div>
								<!-- /.quickview-slider -->
							</div>
							<!-- /.col-xl-6 -->

							<div class="col-lg-6 col-xl-6">
								<div class="product-details">
									<h5 class="pro-title"><a href="#">{{$sanPham->ten_san_pham}}</a></h5>
									<span class="price">Price : {{ number_format($sanPham->gia_san_pham, 0 , '' ,'.')}} VND</span>
									<span class="price">Price Sale : {{ number_format($sanPham->gia_khuyen_mai, 0 , '' ,'.')}} VND</span>
									<div class="size-variation">
										<span>Quanity : {{$sanPham->so_luong}}</span>
									</div>
										<div class="add-tocart-wrap">
											<!--PRODUCT INCREASE BUTTON START-->
											<form action="{{route('cartAdd')}}" method="POST">
												@csrf
												<div class="cart-plus-minus-button">
													<input type="text" value="1" name="quantity" id="quantityInput" class="cart-plus-minus">
												</div>
												<input type="hidden" name="product_id" value="{{$sanPham->id}}">
												<button type="submit" class="btn"><i class="flaticon-shopping-purse-icon"></i>Add to Cart</button>
											</form>
											<!-- <a href="#"><i class="flaticon-valentines-heart"></i></a> -->
										</div>

									<!-- <span>SKU:	N/A</span>
								<p>Tags <a href="#">boys,</a><a href="#"> dress,</a><a href="#">Rok-dress</a></p> -->

									<p>{{$sanPham->mo_ta_ngan}}</p>
									<ul>
										<li>Lorem ipsum dolor sit amet</li>
										<li>quis nostrud exercitation ullamco</li>
										<li>Duis aute irure dolor in reprehenderit</li>
									</ul>
									<div class="product-social">
										<span>Share :</span>
										<ul>
											<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
											<li><a href="#"><i class="fab fa-twitter"></i></a></li>
											<li><a href="#"><i class="fab fa-instagram"></i></a></li>
											<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
										</ul>
									</div>

								</div>
								<!-- /.product-details -->
							</div>
							<!-- /.col-xl-6 -->


							<div class="col-xl-12">
								<div class="product-des-tab">
									<ul class="nav nav-tabs " role="tablist">
										<li class="nav-item">
											<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">DESCRIPTION</a>
										</li>
										
										<li class="nav-item">
											<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">REVIEWS (1)</a>
										</li>
									</ul>
									<div class="tab-content" id="myTabContent">
										<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
											<div class="prod-bottom-tab-sin description">
												<h5>Description</h5>
												<p>
													{!! $sanPham->noi_dung !!}
												</p>
											</div>
										</div>
										<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
											<div class="prod-bottom-tab-sin">
												<h5>Review (1)</h5>
												<div class="product-review">
													<div class="reviwer">
														<img src="media/images/reviewer.png" alt="">
														<div class="review-details">
															<span>Posted by Tonoy - Published on	March 22, 2018</span>
															<div class="rating">
																<ul>
																	<li><a href="#"><i class="far fa-star"></i></a></li>
																	<li><a href="#"><i class="far fa-star"></i></a></li>
																	<li><a href="#"><i class="far fa-star"></i></a></li>
																	<li><a href="#"><i class="far fa-star"></i></a></li>
																	<li><a href="#"><i class="far fa-star"></i></a></li>
																</ul>
															</div>
															<p>But I must explain to you how all this mistaken idea of denouncipleasure and praisi pain was born and I will give you a complete.</p>
														</div>
													</div>
													<div class="add-your-review">
														<h6>ADD A REVIEW</h6>
														<p>YOUR RATING* </p>
														<div class="rating">
															<ul>
																<li><a href="#"><i class="far fa-star"></i></a></li>
																<li><a href="#"><i class="far fa-star"></i></a></li>
																<li><a href="#"><i class="far fa-star"></i></a></li>
																<li><a href="#"><i class="far fa-star"></i></a></li>
																<li><a href="#"><i class="far fa-star"></i></a></li>
															</ul>
														</div>

														<div class="raing-form">
															<form action="#">
																<input type="text" placeholder="">
																<input type="text">
																<textarea name="rating-form"></textarea>
																<input type="submit">
															</form>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- /.row -->
					</div>
					<!-- /.col-xl-9 -->
				</div>
				<!-- /.row -->
			</div>
			<!-- /.container-fluid -->
		</section>
		<!-- /.shop-area -->

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
