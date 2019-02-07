<!DOCTYPE html>
<html lang="en" ng-app="mymodule">
	<head>
		<title>@yield('title')</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta name="Robots" CONTENT="NOINDEX, NOFOLLOW" /> <!-- Remove this tag after hosting the site-->
		<!--<meta name="Robots" content="INDEX,ALL"/> open these tags after hosting the site-->
        <!--<link rel="canonical" href="Site url" />-->
		
		<link rel="stylesheet" href="{{url('/')}}/css/bootstrap.min.css">
		<link rel="stylesheet" href="{{url('/')}}/css/style.css">
		<link rel="stylesheet" href="{{url('/')}}/css/responsive.css">
		<link rel="stylesheet" href="{{url('/')}}/css/slider.css">
		<link rel="stylesheet" href="{{url('/')}}/css/font-awesome.min.css">
		<link rel="stylesheet" href="{{url('/')}}/css/jquery.fancybox.min.css" />
		<link rel="stylesheet" href="{{url('/')}}/css/filter-gallery.css" />
		<link rel="stylesheet" href="{{url('/')}}/css/testimonial.css" />

				<link rel="stylesheet" href="{{url('/')}}/css/smart_cart.css" />


		    <script type="text/javascript">
var APP_URL = {!! json_encode(url('/')) !!}
</script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	</head>
	@yield('content')
	<script src="{{url('/')}}/js/jquery-3.3.1.min.js"></script>
	<script src="{{url('/')}}/js/bootstrap.min.js"></script>
	<script src="{{url('/')}}/js/angular.js"></script>
	<script src="{{url('/')}}/js/less.min.js"></script>
	<script src="{{url('/')}}/js/script.js"></script>
	<script src="{{url('/')}}/js/slider.js"></script>
	<script src="{{url('/')}}/js/filter-gallery.js"></script>
	<script src="{{url('/')}}/js/jquery.fancybox.min.js"></script>
		<script src="{{url('/')}}/js/global.js"></script>

    <script type="text/javascript">

  
        $(document).ready(function(){
            // Initialize Smart Cart    	



   //          $('#smartcart').smartCart({
  	// @if(Session::has('cart'))
   //          	cart:  {!!  Session::get('cart') !!} ,
   //          	@endif
   //          });
		});
    </script>
	<script>
		var myapp = angular.module('mymodule', []);

		    myapp.config(function($interpolateProvider) {
		        $interpolateProvider.startSymbol('[[');
		        $interpolateProvider.endSymbol(']]');
		    });
	</script>
	<script>
		$( document ).ready(function() {
			$('.sub-food-menu').hide();
		});
		$('.drop-submenu').on('click', function(){
			$(this).next('.sub-food-menu').toggle('slow');
		});
		$('.scrollLink').on('click', function(){
			$('#menuinmobile').modal('hide');
			var target = this.getAttribute('href');
			$("html, body").animate({ scrollTop: $(target).offset().top }, 2000);
		});
	</script>
	<script>
		$(document).ready(function(){
		    
		});
	</script>
	@yield('js')
</html>