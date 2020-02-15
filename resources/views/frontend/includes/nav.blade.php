<header>
	<div class="header-container">
		<!--Header Top Area Start-->
		<div class="header-top-area default-bg">
			<div class="container">
				<div class="row row-75">
					<div class="header-top-wrap col-12">
						<div class="row">
							<!--Header Top Left Area Start-->
							<div class="col-md-4 col-xl-3">
								<div class="header-top-left">
									<p>CALL US : <a href="#"> +008 12548 658 658</a></p>
								</div>
							</div>
							<!--Header Top Left Area End-->
							<!--Header Top Middle Area Start-->
							<div class="col-md-4 col-xl-6">
								<div class="header-top-middle text-center">
									<ul class="social-link">
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-instagram"></i></a></li>
										<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
									</ul>
								</div>
							</div>
							<!--Header Top Middle Area End-->
							<!--Header Top Right Area Start-->
							<div class="col-md-4 col-xl-3">
								<div class="header-top-right">
									<p>MAIL US :<a href="#">info@example.com</a></p>
								</div>
							</div>
							<!--Header Top Right Area End-->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--Header Top Area End-->
		<!--Header Bottom Area Start-->
		<div class="header-bottom-area header-sticky">
			<div class="container">
				<div class="row align-items-center">
					<!--Header Logo Start-->
					<div class="col-md-3">
						<div class="header-logo">
							<a href="{{ route('frontend.index') }}"><img src="{{route('frontend.index')}}/img/logo/logo.png" alt=""></a>
						</div>
					</div>
					<!--Header Logo End-->
					<!--Header Menu Start-->
					<div class="col-md-9">
						<div class="header-menu-area text-right">
							<nav>
								<ul class="main-menu">
									<li class="active"><a href="{{ route('frontend.index') }}">HOME</a></li>
									<li><a href="{{ route('frontend.aboutus') }}">ABOUT US</a></li>
									<li><a href="{{ route('frontend.services') }}">SERVICES</a></li>
									<li>{{ link_to_route('frontend.user.tickets.index', trans('navs.frontend.ticket')) }}</li>
									<li>{{ link_to_route('frontend.user.package', trans('navs.frontend.package')) }}</li>
									{{-- @endif --}}
									
									@if ($logged_in_user)
									<li>{{ link_to_route('frontend.user.dashboard', trans('navs.frontend.dashboard')) }}</li>
									@endif
									
									@if (! $logged_in_user)
									<li>{{ link_to_route('frontend.auth.login', trans('navs.frontend.login')) }}</li>
									
									@if (config('access.users.registration'))
									<li>{{ link_to_route('frontend.auth.register', trans('navs.frontend.register')) }}</li>
									@endif
									@else
									<li>
										<a href="#">
											{{ $logged_in_user->name }} <span class="caret"></span>
										</a>
										
										<ul>
											@permission('view-backend')
											<li>{{ link_to_route('admin.dashboard', trans('navs.frontend.user.administration')) }}</li>
											@endauth
											
											<li>{{ link_to_route('frontend.user.account', trans('navs.frontend.user.account')) }}</li>
											<li>{{ link_to_route('frontend.auth.logout', trans('navs.general.logout')) }}</li>
										</ul>
									</li>
									@endif
								</ul>
							</nav>
						</div>
					</div>
					<!--Header Menu End-->
				</div>
				<div class="row">
					<div class="col-12">  
						<!--Mobile Menu Area Start-->
						<div class="mobile-menu d-lg-none d-xl-none"></div>
						<!--Mobile Menu Area End-->
					</div>
				</div>
			</div>
		</div>
		<!--Header Bottom Area End-->
	</div>
</header>