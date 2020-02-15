@extends('frontend.layouts.app')

@section('content')
<div class="page-banner-area bg-img-3 pt-95 pb-90">
	<div class="container">
		<div class="row">
			<div class="page-banner-content col-12 text-center">
				<h2>Registration</h2>
				<p>Pocket Law is the best Law Firm. We solve your problems  tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam</p>
				
			</div>
		</div>
	</div>
</div>
<div class="wpb_wrapper pt-25 pb-30">
	<h1 class="heading-fancy text-center" style="position: relative;">Create Account</h1>
</div>
<div class="make-an-appoinment-area pb-30">
	<div class="container">
		<div class="row">
			<div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1 col-12 offset-0">
				
				<div class="page-appointment">
					<div class="page-appointment-box">
						{{ Form::open(['route' => 'frontend.auth.register', 'class' => 'form-horizontal']) }}
						<div class="row">
							<div class="col-md-6">
								<div class="single-input mt-3">
									{{ Form::input('name', 'first_name', null, ['class' => '', 'placeholder' => trans('validation.attributes.frontend.register-user.firstName')]) }}
								</div>
							</div>
							<div class="col-md-6">
								<div class="single-input mt-3">
									{{ Form::input('name', 'last_name', null, ['class' => '', 'placeholder' => trans('validation.attributes.frontend.register-user.lastName')]) }}
								</div>
							</div>
							<div class="col-md-6">
								<div class="single-input">
									{{ Form::input('email', 'email', null, ['class' => '', 'placeholder' => trans('validation.attributes.frontend.register-user.email')]) }}
								</div>
							</div>
							<div class="col-md-6">
								<div class="single-input">
									{{ Form::input('text', 'phone', null, ['class' => '', 'placeholder' => trans('validation.attributes.frontend.register-user.phone')]) }}
								</div>
							</div>
							<div class="col-md-6">
								<div class="single-input">
									{{ Form::input('password', 'password', null, ['class' => '', 'placeholder' => trans('validation.attributes.frontend.register-user.password')]) }}
								</div>
							</div>
							<div class="col-md-6">
								<div class="single-input">
									{{ Form::input('password', 'password_confirmation', null, ['class' => '', 'placeholder' => trans('validation.attributes.frontend.register-user.password_confirmation')]) }}
								</div>
							</div>
							<div class="col-md-12 d-none">
								<label class="col-md-12 control-label">
									{!! Form::checkbox('is_term_accept',1,true) !!}
								I accept {!! link_to_route('frontend.pages.show', trans('validation.attributes.frontend.register-user.terms_and_conditions').'*', ['page_slug'=>'terms-and-conditions']) !!} </label>
								
							</div>
							<div class="col-md-8">
								<div class="single-input">
									<button class="sent-btn" type="submit">Register</button>
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

@section('after-scripts')
@if (config('access.captcha.registration'))
{!! Captcha::script() !!}
@endif

<script type="text/javascript">
	
	$(document).ready(function() {
		// To Use Select2
		Backend.Select2.init();
	});
</script>
@endsection
