@extends ('frontend.layouts.app')

@section ('title', trans('labels.frontend.tickets.management') . ' | ' . trans('labels.frontend.tickets.create'))

@section('page-header')
<h1>
	{{ trans('labels.frontend.tickets.management') }}
	<small>{{ trans('labels.frontend.tickets.create') }}</small>
</h1>
@endsection

@section('content')
<div class="page-banner-area bg-img-3 pt-95 pb-90">
	<div class="container">
		<div class="row">
			<div class="page-banner-content col-12 text-center">
				<h2>{{ trans('labels.frontend.tickets.management') }}</h2>
				<p>Pocket Law is the best Law Firm. We solve your problems  tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam</p>
			</div>
		</div>
	</div>
</div>
<div class="make-an-appoinment-area mt-30 mb-30">
	<div class="row">
		<div class="col-12">
			<!--Section Title Start-->
			<div class="section-title text-center mb-40">
				<img src="../img/icon/icon1.png" alt="">
				<h4>Ticket</h4>
				<h2>{{ trans('labels.frontend.tickets.create') }}</h2>
				
			</div>
			<!--Section Title End-->
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-12 ml-auto mr-auto">
				{{ Form::open(['route' => 'frontend.user.tickets.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-ticket', 'files' => true]) }}
				
				<div class="box box-info">
					<div class="box-header with-border">
						
						
						<div class="box-tools pull-right">
							@include('frontend.user.tickets.partials.tickets-header-buttons')
						</div><!--box-tools pull-right-->
					</div><!--box-header with-border-->
					
					<div class="box-body">
						<div class="form-group">
							{{-- Including Form blade file --}}
							@include("frontend.user.tickets.form")
							<div class="edit-form-btn text-center">
								<button class="sent-btn"> {{ link_to_route('frontend.user.tickets.index', trans('buttons.general.cancel'), [], ['class' => '']) }} </button>
								<!--{{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-primary btn-md']) }} -->
								<button class="sent-btn" type="submit">Create</button>
								<div class="clearfix"></div>
							</div><!--edit-form-btn-->
						</div><!-- form-group -->
					</div><!--box-body-->
				</div><!--box box-success-->
				{{ Form::close() }}
			</div>
		</div>
	</div>
</div>
@endsection
