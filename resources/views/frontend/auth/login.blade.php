@extends('frontend.layouts.app')

@section('content')
<div class="page-banner-area bg-img-3 pt-95 pb-90">
		    <div class="container">
		        <div class="row">
		            <div class="page-banner-content col-12 text-center">
                        <h2>Login</h2>
                        <p>Pocket Law is the best Law Firm. We solve your problems  tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam</p>
		                
		            </div>
		        </div>
		    </div>
	</div>
	<div class="wpb_wrapper pt-25 pb-30">
			<h1 class="heading-fancy text-center" style="position: relative;">Welcome Abroad</h1>
		</div>
		<div class="make-an-appoinment-area pb-30">
		    <div class="container">
		        <div class="row">
		            <div class="col-xl-6 offset-xl-4 col-lg-6 offset-lg-4 col-12 offset-0">
		                <div class="page-appointment">
		                     <div class="page-appointment-box">
		                        {{ Form::open(['route' => 'frontend.auth.login', 'class' => 'form-horizontal']) }}
		                            <div class="row">
		                                <div class="col-md-8">
		                                    <div class="single-input mt-3">
		                                        {{ Form::input('email', 'email', null, ['class' => '', 'placeholder' => trans('validation.attributes.frontend.register-user.email')]) }}
		                                    </div>
		                                </div>
		                                <div class="col-md-8">
		                                    <div class="single-input">
												{{ Form::input('password', 'password', null, ['class' => '', 'placeholder' => trans('validation.attributes.frontend.register-user.password')]) }}
		                                      
		                                    </div>
		                                </div>
		                                <div class="col-md-8">
		                                   <div class="single-input">
		                                    <button class="sent-btn" type="submit">Login</button>
											</div>
		                                </div>
		                            </div>
		                         {{ Form::close() }}
		                        
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>


@endsection