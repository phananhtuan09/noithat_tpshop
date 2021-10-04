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
						
						<div class="col-lg-8 col-12">
							<div class="form-main">
								<div class="title">
									<h4>Đăng ký tài khoản</h4>
								</div>
								<form class="form" method="post" action="{{route('customer.store')}}">
									@csrf
									<div class="row">
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Họ và tên<span>*</span></label>
												<input name="name"  type="text" placeholder="Nhập họ và tên">
												<span class="error mess-error">{{ $errors->first('name') }}</span>
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Số điện thoại<span>*</span></label>
												<input name="phone"   onkeypress="return isNumberKey(event)" type="phone" placeholder="Nhập số điện thoại">
												<span class="error mess-error">{{ $errors->first('phone') }}</span>
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Mật khẩu đăng nhập<span>*</span></label>
												<input name="password"  type="password" placeholder="Mật khẩu ">
												<span class="error mess-error">{{ $errors->first('password') }}</span>
											</div>	
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Nhập lại mật khẩu<span>*</span></label>
												<input name="password_confirmation" type="password" placeholder="Nhập lại mật khẩu">
												<span class="error mess-error">{{ $errors->first('password_confirmation') }}</span>
													@if(Session::get('error'))
													<span class="error mess-error">{{Session::get('error')}}</span>
													{{session::forget('error')}}
													@endif
											</div>	
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Địa chỉ email<span>*</span></label>
												<input name="email" type="text" placeholder="Địa chỉ email">
												<span class="error mess-error">{{ $errors->first('email') }}</span>
													@if(Session::get('error'))
													<span class="error mess-error">{{Session::get('error')}}</span>
													{{session::forget('error')}}
													@endif
											</div>	
										</div>
										<div class="col-12">
											<div class="form-group button">
												<button type="submit" class="btn ">Đăng kí</button>
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
