@extends('layouts.front')
@section('title', 'Home')
@section('content')
<body id="home-page">


	<div id="logo-container">
		<div class="container">
			<img src="{{url('/')}}/images/logo.png" class="img-responsive logo">
		</div>
	</div>
   <div class="text-center">
	<span id="response"></span>
	</div>
	<div id="restaurant-selector">
		<div class="row">
			<div class="container">
				<div class="col-xs-12 col-sm-7 col-md-5 col-lg-5">
					<div class="restaurant-selector-inner">
						<ul class="nav nav-tabs">
					    	<li class="active">
					    		<a data-toggle="tab" href="#takeaway">
					    			<span><img src="{{url('/')}}/images/takeaway-icon.png"></span>
					    			<span>TAKE AWAY</span>
					    		</a>
					    	</li>
					    	<li>
					    		<a data-toggle="tab" href="#party">
					    			<span><img src="{{url('/')}}/images/party-icon.png"></span>
					    			<span>PARTY</span>
					    		</a>
					    	</li>
					  	</ul>
						<div class="tab-content">
						    <div id="takeaway" class="tab-pane fade in active">
							    <div class="tab-pane-inner">
							      	<p>Order food from favourite restaurants near you.</p>

							      	<select class="form-control " id="selection" name="shop" >
									  	<option value="0">Select Restaurant</option>
								@foreach($restartant as $res)


@if( $bha=Helper::shop_status_takeaway($res->id))
{{$bha}}
									  	<option value="{{encrypt($res->id.'_t')}}">{{$res->name}}</option>
									  	@endif
								@endforeach
									</select>
									{{csrf_field()}}
							
							    </div>
						    </div>

						    <div id="party" class="tab-pane fade">
						      	<div class="tab-pane-inner">
							      	<p>Order food from favourite restaurants near you.</p>
							      			<form method="POST" >
							      	<select class="form-control" id="selection" name="shop" >
									  	<option value="0">Select Restaurant</option>

								@foreach($restartant as $res)

@if(Helper::shop_status_party($res->id))
								  	<option value="{{encrypt($res->id.'_p')}}">{{$res->name}}</option>
								  		@endif
								@endforeach
									</select>
									{{csrf_field()}}
									<input type="hidden" name="type" value="{{rand(10,9999)}}">
								</form>
							    </div>
						    </div>
						 </div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-5 col-md-7 col-lg-7"></div>
			</div>	
		</div>	
	</div>	
	<footer>
		<div class="container">
			<p>Follow Us</p>
			<div class="social-icons">
				<span><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></span>&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span><i class="fa fa-twitter fa-2x" aria-hidden="true"></i></span>&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span><i class="fa fa-youtube fa-2x" aria-hidden="true"></i></span>&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></span>&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</div>
			<div class="footer-under">
				<p>&copy; 2018, Food Master. All rights reserved.</p>
			</div>
		</div>
	</footer>
</body>
@endsection