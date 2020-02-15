@extends('frontend.layouts.app')

@section('content')
<?php //print_r("<pre>");  print_r($packages);  print_r("</pre>"); ?>
<div class="page-banner-area bg-img-3 pt-95 pb-90">
	<div class="container">
		<div class="row">
			<div class="page-banner-content col-12 text-center">
				<h2>Pricing Plan</h2>
				<p>Pocket Law is the best Law Firm. We solve your problems  tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam</p>
			</div>
		</div>
	</div>
</div>
<div class="pricing-table-area mt-30 mb-30">
	<div class="row">
		<div class="col-12">
			<!--Section Title Start-->
			<div class="section-title text-center mb-40">
				<img src="img/icon/icon1.png" alt="">
				<h4>Pricing</h4>
				<h2>Choose your Package</h2>
				<p>Lawyer boluptatum deleniti atque corrupti quos dolores et quas molestias cepturi sint  eca itate non provident, similique sunt in culpa modi tempora incidunt ut labore et dolor am aerat</p>
			</div>
			<!--Section Title End-->
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-12 ml-auto mr-auto">
				<div class="row row-25">
					<?php $i = 1; ?>
					@foreach($packages as $package)
					<div class="col-lg-4 col-md-6 mb-30 pricing-table-wrap"> 
						<div class="single-pricing-table <?php echo $i == 2 ? 'pricing-active' : ''; ?> text-center">
							<div class="pricing-head">
								<div class="price">
									<h2><sup><i class="fa fa-inr" aria-hidden="true"></i></sup>{{$package->Amount}}</h2>
								</div>
								<h4>{{$package->package_name}}</h4>
							</div>
							<div class="pricing-body">
								<p>{{$package->Description}}</p>
								<ul>
									<li>Total Query: {{$package->Totalsms}}</li>
								</ul>
							</div>
							<div class="pricing-footer">
								<a href="javascript:void(0)" class="btn btn-small buy_now" data-amount="{{$package->Amount}}" data-id="{{$package->id}}">Select Plan</a>
							</div>
						</div>
					</div>
					<!--<div class="col-md-4 col-sm-6 col-xs-12">
						<div class="pricing-item text-center">
						<div class="price-title">
						<h3>{{$package->package_name}}</h3>
						<strong class="value"><i class="fa fa-inr" aria-hidden="true"></i>{{$package->Amount}}</strong>
						<p>{{$package->Description}}</p>
						</div>
						<ul class="price-table__info">
						<li>Total Query: {{$package->Totalsms}}</li>
						</ul> 
						<a href="javascript:void(0)" class="btn btn-small buy_now" data-amount="{{$package->Amount}}" data-id="{{$package->id}}">Select Plan</a>
						</div>
					</div> -->
					<?php $i++; ?>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('after-scripts')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
	var SITEURL = '{{URL::to('')}}';
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	}); 
	$('body').on('click', '.buy_now', function(e){
		var totalAmount = $(this).attr("data-amount");
		var product_id =  $(this).attr("data-id");
		var options = {
			"key": "rzp_test_3Mt1mpmoVd2sFl",
			"amount": (totalAmount*100), // 2000 paise = INR 20
			"name": "Pocket Law",
			"description": "Payment",
			"image": "https://cdn.razorpay.com/logos/D5Ut7rLn77sEt6_medium.png",
			"handler": function (response){
				$.ajax({
					url: SITEURL + '/package/purchase',
					type: 'post',
					dataType: 'json',
					data: {
						razorpay_payment_id: response.razorpay_payment_id , 
						totalAmount : totalAmount ,product_id : product_id,
					}, 
					success: function (msg) {
						
						window.location.href = SITEURL + '/tickets';
					}
				});
				
			},
			"prefill": {
				"contact": '9988665544',
				"email":   'haraccounts@yahoo.com',
			},
			"theme": {
				"color": "#528FF0"
			}
		};
		var rzp1 = new Razorpay(options);
		rzp1.open();
		e.preventDefault();
	});
	/*document.getElementsClass('buy_plan1').onclick = function(e){
		rzp1.open();
		e.preventDefault();
	}*/
</script>
@endsection