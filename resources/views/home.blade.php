@auth 
	@if( Auth::user()->role === 1)
		<script>window.location.href = "dashboard";</script>
	@endif 
@endauth 

<!DOCTYPE html>
<html lang="en">
<head>
<title>Pauline`s Boutique Shop</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Colo Shop Template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
</head>
<body>
 
<div class="super_container">

	<!-- Header -->
	@section('header')
		<header class="header trans_300">

			<!-- Top Navigation -->

			@section('top_nav')
				<div class="top_nav">
					<div class="container">
						<div class="row">
							<div class="col-md-6">
								<div class="top_nav_left"></div>
							</div>
							<div class="col-md-6 text-right">
								<div class="top_nav_right">
									<ul class="top_nav_menu">

			
										<li class="account">
											<a href="#">
												My Account
												<i class="fa fa-angle-down"></i>
											</a>
											<ul class="account_selection">
												@auth 
													<li><i class="fa fa-user" aria-hidden="true"></i> 
																									
														{{ Auth::user()->name }}
			
													</li>
													<li> 
													<a class="dropdown-item" href="{{ route('logout') }}"
														onclick="event.preventDefault();
																	document.getElementById('logout-form').submit();">
														{{ __('Logout') }}
													</a>

													<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
														@csrf
													</form>
													</li>
												@endauth
												
												@guest
													<li><a href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
													<li><a href="{{ route('register') }}"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
												@endguest
											</ul>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			@show

			<!-- Main Navigation -->

			<div class="main_nav_container">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 text-right">
							<div class="logo_container">
								<a href="#">Pauline`s <span>Boutique</span></a>
							</div>
							<nav class="navbar">
								<ul class="navbar_menu">
									<li><a href="/">home</a></li>
									<li><a href="shop">shop</a></li>
									<li><a href="contact">contact</a></li>
								</ul>
								<ul class="navbar_user">
									<li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-user" aria-hidden="true"></i></a></li>
									<li class="checkout">
										<a href="cart">
											<i class="fa fa-shopping-cart" aria-hidden="true"></i>
											@if (isset($countcart)) 
												@if ($countcart>0) 
												<span id="checkout_items" class="checkout_items"> {{ $countcart }} </span> 
												@endif	
											@endif
										</a>
									</li>
								</ul>
								<div class="hamburger_container">
									<i class="fa fa-bars" aria-hidden="true"></i>
								</div>
							</nav>
						</div>
					</div>
				</div>
			</div>

		</header>
	@show

	<div class="fs_menu_overlay"></div>
	<div class="hamburger_menu">
		<div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
		<div class="hamburger_menu_content text-right">
			<ul class="menu_top_nav">
				<li class="menu_item has-children">
					<a href="#">
						My Account
						<i class="fa fa-angle-down"></i>
					</a>
					<ul class="menu_selection">
						<li><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
						<li><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
					</ul>
				</li>
				<li class="menu_item"><a href="home">home</a></li>
				<li class="menu_item"><a href="shop">shop</a></li>
				<li class="menu_item"><a href="contact">contact</a></li>
			</ul>
		</div>
	</div>

	@section('maincontent')

		<!-- Slider -->

		<div class="main_slider" style="background-image:url(images/slider.jpg)">
			<div class="container fill_height">
				<div class="row align-items-center fill_height">
					<div class="col">
						<div class="main_slider_content">
							<h1>Get up to 30% Off New Arrivals</h1>
							<div class="red_button shop_now_button"><a href="#">shop now </a></div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Banner -->

		

		<!-- New Arrivals -->
		@section('new arrivals')
			<div class="new_arrivals">
				<div class="container">
					<div class="row">
						<div class="col text-center">
							<div class="section_title new_arrivals_title">
								<h2>New Arrivals</h2>
							</div>
						</div>
					</div>
					<div class="row align-items-center">
						<div class="col text-center">
							<div class="new_arrivals_sorting">
								<ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
									<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*"><a href="/">all</a></li>
									<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".men"><a href="/category/1">Men's</a></li>
									<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".women"><a href="/category/2">Women's</a></li>
									<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".accessories"><a href="/category/3">Accesories</a></li>
									<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".men"><a href="/category/4">Skin Care</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>
								@if(isset($products))
									<!-- Products -->
									
										@foreach ($products as $prd)
										<div class="product-item men">
											<div class="product product_filter">
												<div class="product_image">
													<img src="uploads/{{ $prd->image }}" alt="">
												</div>
												<div class="favorite"></div>
												<div class="product_info">
													<h6 class="product_name"><a href="single.html">{{$prd->productname}}</a></h6>
													<div class="product_price">Php {{number_format($prd->price,2) }}</div>
												</div>
											</div>
											<div class="red_button add_to_cart_button">
												{{ Form::open(array('url' => '/SavetoCart')) }}
													{{ Form::hidden('id',$prd->id)}}
													<button type="submit" class="red_button add_to_cart_button">Add to Cart</button>
												{{ Form::close() }}
											</div>
												
											<div>

											</div>
										</div>
										@endforeach
									

								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		@show
		<!-- Deal of the week -->

		<div class="deal_ofthe_week">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-6">
						<div class="deal_ofthe_week_img">
							<img src="images/deal_ofthe_week.png" alt="">
						</div>
					</div>
					<div class="col-lg-6 text-right deal_ofthe_week_col">
						<div class="deal_ofthe_week_content d-flex flex-column align-items-center float-right">
							<div class="section_title">
								<h2>Deal Of The Week</h2>
							</div>
							<ul class="timer">
								<li class="d-inline-flex flex-column justify-content-center align-items-center">
									<div id="day" class="timer_num">03</div>
									<div class="timer_unit">Day</div>
								</li>
								<li class="d-inline-flex flex-column justify-content-center align-items-center">
									<div id="hour" class="timer_num">15</div>
									<div class="timer_unit">Hours</div>
								</li>
								<li class="d-inline-flex flex-column justify-content-center align-items-center">
									<div id="minute" class="timer_num">45</div>
									<div class="timer_unit">Mins</div>
								</li>
								<li class="d-inline-flex flex-column justify-content-center align-items-center">
									<div id="second" class="timer_num">23</div>
									<div class="timer_unit">Sec</div>
								</li>
							</ul>
							<div class="red_button deal_ofthe_week_button"><a href="#">shop now</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Best Sellers -->

		<!-- Benefit -->

		<div class="benefit">
			<div class="container">
				<div class="row benefit_row">
					<div class="col-lg-3 benefit_col">
						<div class="benefit_item d-flex flex-row align-items-center">
							<div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
							<div class="benefit_content">
								<h6>free shipping</h6>
								<p>Suffered Alteration in Some Form</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 benefit_col">
						<div class="benefit_item d-flex flex-row align-items-center">
							<div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
							<div class="benefit_content">
								<h6>cach on delivery</h6>
								<p>The Internet Tend To Repeat</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 benefit_col">
						<div class="benefit_item d-flex flex-row align-items-center">
							<div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
							<div class="benefit_content">
								<h6>45 days return</h6>
								<p>Making it Look Like Readable</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 benefit_col">
						<div class="benefit_item d-flex flex-row align-items-center">
							<div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
							<div class="benefit_content">
								<h6>opening all week</h6>
								<p>8AM - 09PM</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	@show

	

	

	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
						<ul class="footer_nav">
							
							<li><a href="contact">Contact us</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="footer_social d-flex flex-row align-items-center justify-content-lg-end justify-content-center">
						<ul>
							<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="footer_nav_container">
						<div class="cr">©2018 All Rights Reserverd. Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#">Colorlib</a> &amp; distributed by <a href="https://themewagon.com">ThemeWagon</a></div>
					</div>
				</div>
			</div>
		</div>
	</footer>

</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/custom.js"></script>
</body>

</html>
