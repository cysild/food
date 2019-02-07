@extends('layouts.front')
@section('title', 'Listing Page')
@section('content')
<body id="listing-page" ng-app="mymodule">
	<span id="response"></span>
	<header>
		<div class="row">
			<div class="container">
				<div class="col-xs-12 col-sm-5 col-md-6 col-lg-6">
					<a href="{{url('/')}}">
					<img src="{{url('/')}}/images/logo.png" class="img-responsive logo"></a>
				</div>
				<div class="col-xs-6 col-sm-3 col-md-2 col-lg-2">
					<div class="takeaway">
						<a href="#">
			    			<span><img src="{{url('/')}}/images/takeaway-icon.png"></span>&nbsp;&nbsp;
			    			<span>{{$type}}</span>
			    		</a>
					</div>
				</div>
				<div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
					<div class="location">
						<div>
							<p><i class="fa fa-map-marker" aria-hidden="true"></i></p>
						</div>
						<div>
							<select class="form-control" id="shop">
								@foreach($restratant as $res)






								@if(session::get('type') == 't')


								    @if(Helper::shop_status_takeaway($res->id))
									  	<option value="{{encrypt($res->id.'_'.session::get('type'))}}" 				@if($res->id == session::get('rest_id')) selected @endif >{{ucfirst($res->name)}}</option>

									  	@endif
								 	@endif

								@if(session::get('type') == 'p')
									 @if(Helper::shop_status_party($res->id))
									  	<option value="{{encrypt($res->id.'_'.session::get('type'))}}" 				@if($res->id == session::get('rest_id')) selected @endif >{{ucfirst($res->name)}}</option>

									  	@endif
								@endif

								@endforeach
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<div id="menu-list">
		<div class="row">
			<div class="container">
				<div class="hidden-xs hidden-sm col-md-2 col-lg-2 invisible-scrollbar"> 
					<div class="col1-list">
						<div class="desktop-menulist">
							<ul class="list">
								<?php $type=Session::get('type');  ?>
								@if($type == 't')
								<li><a href="#recommended">Recommended</a></li>
								@endif
	                       		@each('frontend.menu', $categories, 'category') 
								
							</ul>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-5 col-lg-5 invisible-scrollbar mobile-con">
					<div class="col2-listitems">
						@if($type == 't')
							<div id="recommended">
									<?php 
										$rest_id=Session::get('rest_id');
										$recommend=Helper::get_recommend($rest_id);
									?>
									@if($recommend['items'])
								<h3>Recommended</h3>
								<div class="menuend"></div>
								<div class="row">
								
							    		@foreach($recommend['items'] as $recommend)
							 				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 foodlist-section sc-product-item">
												<div class="menu-items">
													<img src="{{Helper::product_image($recommend->image)}}" class="img-responsive">
													<h4 data-name="product_name">{{$recommend->name}}</h4>
													<div class="row">
														<input name="product_price" value="{{$recommend->price}}" type="hidden" />
														<div class="col-xs-8 col-sm-8 col-md-4 col-lg-6">
															<p>&#163; <span id="product_price">{{$recommend->price}}</span></p>
														</div>
														<input name="product_id" value="{{$recommend->id}}" type="hidden" />
														<div class="col-xs-4 col-sm-4 col-md-8 col-lg-6">
															<button class="sc-add-to-cart">+ ADD</button>
														</div>
													</div>
												</div>
											</div>
										@endforeach
									</div>
									@endif
								</div>
						@endif
						<div class="foodlist" >
							@foreach($categories as $cat)
								<div id="{{ $cat->name}}" class="foodlist-items">
									@if ((count($cat->children) > 0) AND ($cat->parent_id > 0))

 										<?php $item  =  Helper::get_items($cat->id); ?>
 											@if($item['count'] > 0)
										<div class="head">
											<h3> {{ $cat->name}}</h3>
										
										</div>
										@endif
									@else
									 										<?php $item  =  Helper::get_items($cat->id); ?>

												@if($item['count'] > 0)
										<div class="head">
											<h3> {{ $cat->name}}</h3>
										
										</div>
									
 										<?php $item  =  Helper::get_items($cat->id); ?>
										@if($item['count'] > 0)
								   			@foreach($item['items'] as $items)
												@if($type== 't')		 					    
													<div class="row foodlist-section">
														<div class="sc-product-item">
															<div class="col-xs-8 col-sm-8 col-md-9 col-lg-9">
																<h4 data-name="product_name">   {{$items['name']}}</h4>
																    <input name="product_price" value="{{$items['price']}}" type="hidden" />
						                                            <input name="product_id" value="{{$items->id}}" type="hidden" />
																<p>&pound; {{$items['price']}}</p>
															</div>
															<div class="col-xs-4 col-sm-4 col-md-3 col-lg-3">
																<button class="sc-add-to-cart">+ ADD</button>
															</div>
														</div>
													</div>
												@else
										<div class="row foodlist-section uit">
											<div class="sc-product-item">
												<div class="col-xs-8 col-sm-8 col-md-9 col-lg-9">
													<p data-name="product_name">   {{$items['name']}}</p>
													    <input name="product_price" value="{{$items['points']}}" type="hidden" />
			                                            <input name="product_id" id="pid" value="{{$items->id}}" type="hidden" />
													<p>points:{{$items['points']}}</p>
												</div>
												<div class="col-xs-4 col-sm-4 col-md-3 col-lg-3">
													<button class="add-item sc-add-to-cart">+ ADD</button>
												</div>
											</div>
										</div>
									@endif
								@endforeach
									@endif
							@endif
						@endif
									@if (count($cat->children) > 0)
  										@foreach($cat->children as $cat)
   											@if ((count($cat->children) > 0) AND ($cat->parent_id > 0))											
									@else
										<?php $item  =  Helper::get_items($cat->id); ?>
										@if($item['count'] > 0)
											<h4>{{ $cat->name}}</h4>
								   			@foreach($item['items'] as $items)
												@if($type== 't')		    	  
													<div class="row foodlist-section">
														<div class="sc-product-item">
															<div class="col-xs-8 col-sm-8 col-md-9 col-lg-9">
																<p data-name="product_name">   {{$items['name']}}</p>
											    				<input name="product_price" value="{{$items['price']}}" type="hidden" />
	                                            				<input name="product_id" value="{{$items->id}}" type="hidden" />
																<p>&pound; {{$items['price']}}</p>
															</div>
															<div class="col-xs-4 col-sm-4 col-md-3 col-lg-3">
																<button class="sc-add-to-cart">+ ADD</button>
															</div>
														</div>
													</div>
												@else
											<div class="row foodlist-section uit">
											<div class="sc-product-item">
									<div class="col-xs-8 col-sm-8 col-md-9 col-lg-9">
										<p data-name="product_name">   {{$items['name']}}</p>
										    <input name="product_price" value="{{$items['points']}}" type="hidden" />
                                            <input name="product_id" id="pid" value="{{$items->id}}" type="hidden" />
										<p>points:{{$items['points']}}</p>
									</div>
									<div class="col-xs-4 col-sm-4 col-md-3 col-lg-3">
										<button class="add-item sc-add-to-cart">+ ADD</button>
									</div>
								</div>
								</div>



								@endif
										@endforeach
									@endif
								@endif
							@endforeach
						@endif
						</div>
						@endforeach
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-5 col-lg-5 mobile-con" id ="mobilecart">
				@if($type=='t')
					<div class="col3-cart invisible-scrollbar">
						<h3>Cart</h3>
						<form action="{{url('/addorders')}}" method="POST">	
							{{csrf_field()}}
		                    <div id="smartcart">
		                    	<div id="cart-mobile">
									<div class="row">
										<div class="col-xs-6 hidden-sm hidden-md hidden-lg">
											<div class="sc-cart-heading">
												<p><span class="sc-cart-count"></span> Item | <span class="sc-cart-subtotal"></span></p>
											</div>
										</div>
										<div class="mobileviewcartbtn">
											<div class="col-xs-6 hidden-sm hidden-md hidden-lg">
												<p class="text-right"><a href="#mobilecart"><i class="fa fa-shopping-bag" aria-hidden="true"></i> VIEW CART</a></p>
											</div>
										</div>
									</div>
								</div>
		                    </div>
		                    
						</form>
					</div>
				@else
				<div class="col3-cart invisible-scrollbar">
						<h3>Cart</h3>
						<form action="{{url('/addorders')}}" method="POST">	
							{{csrf_field()}}
		                    <div id="takeaway">
		                    	<div id="cart-mobile">
									<div class="row">
										<div class="col-xs-6 hidden-sm hidden-md hidden-lg">
											<div class="sc-cart-heading">
												<p><span class="sc-cart-count"></span> Item | <span class="sc-cart-subtotal"></span> Points</p>
											</div>
										</div>
										<div class="mobileviewcartbtn">
											<div class="col-xs-6 hidden-sm hidden-md hidden-lg">
												<p class="text-right"><a href="#mobilecart">VIEW CART</a></p>
											</div>
										</div>
									</div>
								</div>
		                    </div>
		                    
						</form>
					</div>
				@endif
			</div>
		</div>
	</div>
</div>
	</div>
	<div id="mobile-menu-button" class="text-center">
		<button type="button" data-toggle="modal" data-target="#menuinmobile"><i class="fa fa-cutlery" aria-hidden="true"></i> Menu</button>
	</div>
	
	<!-- Modal -->
	<div id="menuinmobile" class="modal fade" role="dialog">
  		<div class="modal-dialog">
    		<!-- Modal content-->
    		<div class="modal-content">
      			<div class="modal-header">
        			<button type="button" class="close" data-dismiss="modal">&times;</button>
        			<h4 class="modal-title">Menu List</h4>
        		</div>
      			<div class="modal-body invisible-scrollbar mobile-menu">
        			<div class="col1-list">
						<ul class="list">
							<li><a href="#recommended">Recommended</a></li>
                       		@each('frontend.menu', $categories, 'category') 
							<?php $type=Session::get('type');  ?>
						</ul>
					</div>
     			 </div>
      			<div class="modal-footer">
        			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      			</div>
    		</div>
  		</div>
	</div>
	
</body>
@include('frontend.complete')
@endsection








@section('js')

    <script src="{{url('/')}}/js/jquery.smartCart.js" type="text/javascript"></script>
    <script src="{{url('/')}}/js/takeaway.js" type="text/javascript"></script>
            <link rel="stylesheet" href="{{url('/css')}}/bootstrap-datepicker.css">

      <script src="{{url('/')}}/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script type="text/javascript">

  
        $(document).ready(function(){

        	$('.cle').click(function(){

        			$("[name='name']").val('');
        			$("[name='address']").val('');
        			$("[name='phone']").val('');
        			$("[name='note']").val('');
        			$("[name='email']").val('');
        			$("[name='delivery_date']").val('');
        			$('.lds-coffee').hide();
        	});


        	$(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });

        

            // Initialize Smart Cart    	
/*getmembers();*/

var dateToday = new Date();

// var day = new Date();
// console.log(day); // Apr 30 2000

// var nextDay = new Date(day);


// var vv = nextDay.setDate(day.getDate()+1);

// $('.datepicker').datepicker({ 'startDate': vv,
// 	   format: 'yyyy-mm-dd',


//  }


//  );

    $(".datepicker").datepicker({
        dateFormat: "dd/mm/yy",
        changeMonth: true,
        changeYear: true,
        numberOfMonths: 2,
        startDate: dateToday,
	   format: 'yyyy-mm-dd',
       
    });

    $(".datepicker").datepicker("setDate", "2");


@if($type == 'p')
      $('#takeaway').Takeaway({
  				@if(Session::has('cart'))
            	cart:  {!!  Session::get('cart') !!} ,
            	@endif

       });

            @else

      $('#smartcart').smartCart({
  				@if(Session::has('cart'))
            	cart:  {!!  Session::get('cart') !!} ,
            	@endif
            });
              
   

            @endif
		});

		

    </script>
@endsection