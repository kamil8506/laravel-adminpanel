@php
    use Illuminate\Support\Facades\Route;
@endphp
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', app_name())</title>

        <!-- Meta -->
        <meta name="description" content="@yield('meta_description', 'Laravel AdminPanel')">
        <meta name="author" content="@yield('meta_author', 'Viral Solani')">
        <meta name="keywords" content="@yield('meta_keywords', 'Laravel AdminPanel')">
        @yield('meta')

        <!-- Styles -->
        @yield('before-styles')

        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->
        @langrtl
            {{ Html::style(getRtlCss(mix('css/frontend.css'))) }}
        @else
            {{ Html::style(mix('css/frontend.css')) }}
        @endlangrtl

       {!! Html::style('js/select2/select2.min.css') !!}
        @yield('after-styles')
        {{ Html::style('css/custom.css') }}
        <!--All Css Here-->
		
		<!-- Droid Font CSS-->
		{{ Html::style('css/theme/css/droid.css') }}
		<!-- Icofont CSS-->
		{{ Html::style('css/theme/css/icofont.css') }}
		<!-- Font Awesome CSS-->
		{{ Html::style('css/theme/css/font-awesome.min.css') }}
		
		<!-- Animate CSS-->
		{{ Html::style('css/theme/css/animate.css') }}
		<!-- Owl Carousel CSS-->
		{{ Html::style('css/theme/css/owl.carousel.min.css') }}
		<!-- Datepicker CSS-->
		{{ Html::style('css/theme/css/jquery.datepicker.css') }}
		<!-- Calendar CSS-->
		{{ Html::style('css/theme/css/zabuto_calendar.css') }}
		<!-- Meanmenu CSS-->
		{{ Html::style('css/theme/css/meanmenu.min.css') }}
		<!-- Venobox CSS-->
		{{ Html::style('css/theme/css/venobox.css') }}
		<!-- Bootstrap CSS-->
		{{ Html::style('css/theme/css/bootstrap.min.css') }}
		<!-- Style CSS -->
		{{ Html::style('css/theme/css/style.css') }}
		<!-- Responsive CSS -->
		{{ Html::style('css/theme/css/responsive.css') }}
		
        <!-- Scripts -->
		<!-- Modernizr Js -->
		{{ Html::script('js/theme/js/vendor/modernizr-2.8.3.min.js') }}
			<!--Jquery 1.12.4-->
		{{ Html::script('js/theme/js/vendor/jquery-1.12.4.min.js') }}
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
        <?php
            if (!empty($google_analytics)) {
                echo $google_analytics;
            }
		?>
		<style>
			.heading-fancy:after {
    content: "";
    position: absolute;
    bottom: -20px;
    background-image: linear-gradient( to right,#FFBA42,#e373c5 );
    width: 120px;
    height: 4px;
    left: 0;
    right: 0;
    margin: 0 auto;
}
	</style>
    </head>
    <body id="app-layout">
        <div class="wrapper box-layout" id="app">
            @include('includes.partials.logged-in-as')
            @include('frontend.includes.nav')

            <!--<div class="container"></div> -->
			<?php //if("{{Route::currentRouteName()}}" == "frontend.index'"){  ?>
                @include('includes.partials.messages')
                @yield('content')
				<?php //}else{ ?>
				<!--<div class="container">-->
			 
					<!--</div>-->
				<?php //} ?>
            <!-- container -->
			@include('frontend.includes.footer')
        </div><!--#app-->

        <!-- Scripts -->
        @yield('before-scripts')
        {!! Html::script(mix('js/frontend.js')) !!}
		{!! Html::script(mix('js/frontend-custom.js')) !!}
        @yield('after-scripts')
        {{ Html::script('js/jquerysession.min.js') }}
        {{ Html::script('js/frontend/frontend.min.js') }}
        {!! Html::script('js/select2/select2.min.js') !!}

        <script type="text/javascript">
            if("{{Route::currentRouteName()}}" !== "frontend.user.account")
            {
                $.session.clear();
            }
        </script>
        @include('includes.partials.ga')
		
		<!--All Js Here-->
		
	
		<!--Waypoints-->
		
		{{ Html::script('js/theme/js/waypoints.min.js') }}
		<!--Counterup-->
		{{ Html::script('js/theme/js/jquery.counterup.min.js') }}
		<!--Carousel-->
		{{ Html::script('js/theme/js/owl.carousel.min.js') }}
		<!--Meanmenu-->
		{{ Html::script('js/theme/js/jquery.meanmenu.min.js') }}
		<!--Instafeed-->
		{{ Html::script('js/theme/js/instafeed.min.js') }}
		<!--Datepicker-->
		{{ Html::script('js/theme/js/jquery.datepicker.min.js') }}
		<!--Calendar-->
		{{ Html::script('js/theme/js/zabuto-calendar.min.js') }}
		<!--ScrollUp-->
		{{ Html::script('js/theme/js/jquery.scrollUp.min.js') }}
		<!--Wow-->
		{{ Html::script('js/theme/js/wow.min.js') }}
		<!--Venobox-->
		{{ Html::script('js/theme/js/venobox.min.js') }}
		<!--Popper-->
		{{ Html::script('js/theme/js/popper.min.js') }}
		<!--Bootstrap-->
		{{ Html::script('js/theme/js/bootstrap.min.js') }}
		<!--Plugins-->
		{{ Html::script('js/theme/js/plugins.js') }}
		<!--Main Js-->
		{{ Html::script('js/theme/js/main.js') }}
		
    </body>
</html>