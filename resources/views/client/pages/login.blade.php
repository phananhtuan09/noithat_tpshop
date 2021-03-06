@extends('client.layout')
@section('content')
	@include('config')
	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="blog-single.html">Contact</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
  
	<!-- Start Contact -->
	<section id="contact-us" class="contact-us section">
		<div class="container">
				<div class="contact-head">
					<div class="row justify-content-center">
						<div class="col-lg-4 col-12 ">
							<div class="form-main">
								<div class="title">
									<h4>Đăng nhập</h4>
								</div>
								<form class="form" method="post" action="{{route('shop.login')}}">
									@csrf
									<div class="row">
										<div class="col-12">
											@if(Session::get('error_login'))
												<span class="error mess-error">{{Session::get('error_login')}}</span>
												{{session::forget('error_login')}}
											@endif
											<div class="form-group">
												<label>Email<span>*</span></label>
												<input name="email"   type="text" placeholder="">
												<span class="error mess-error">{{ $errors->first('email') }}</span>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group">
												<label>Mật khẩu đăng nhập<span>*</span></label>
												<input name="password"  type="password" placeholder="">
												<span class="error mess-error">{{ $errors->first('password') }}</span>
											</div>	
										</div>
										<div class="col-12">
											<div class="form-group button">
												<button type="submit" class="btn btn-submit ">Đăng nhập</button>
											</div>
											<div class="form-group button">
												<a class="btn btn-lg btn-social btn-facebook" href="{{ route('login.facebook') }}">
											    <i class="fa fa-facebook fa-fw"></i> Đăng nhập với Facebook
											    </a>
											</div>
											<div class="form-group button">
												<a class="btn btn-lg btn-social btn-google" href="{{ route('login.google') }}">
											    <i class="fa fa-google fa-fw"></i> Đăng nhập với Google
											    </a>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
						
						
					</div>
				</div>
			</div>
	</section>
	<!--/ End Contact -->
	
	<!-- Map Section -->
	<div class="map-section container">
		<div id="myMap">
			{!! $setting->iframe_google_map !!}

		</div>
	</div>
	<!--/ End Map Section -->
	
	<!-- Start Shop Newsletter  -->
	<section class="shop-newsletter section">
		<div class="container">
			<div class="inner-top">
				<div class="row">
					<div class="col-lg-8 offset-lg-2 col-12">
						<!-- Start Newsletter Inner -->
						<div class="inner">
							<h4>Newsletter</h4>
							<p> Subscribe to our newsletter and get <span>10%</span> off your first purchase</p>
							<form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
								<input name="EMAIL" placeholder="Your email address" required="" type="email">
								<button class="btn">Subscribe</button>
							</form>
						</div>
						<!-- End Newsletter Inner -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Newsletter -->
	
@endsection
			