@extends ('frontend.layouts.app')

@section ('title', trans('labels.frontend.tickets.management') . ' | ' . trans('labels.frontend.tickets.view'))

@section('page-header')
<h1>
	{{ trans('labels.frontend.tickets.management') }}
	<small>{{ trans('labels.frontend.tickets.view') }}</small>
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
				<h2>{{ trans('labels.frontend.tickets.view') }}</h2>
				
			</div>
			<!--Section Title End-->
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-12 ml-auto mr-auto">
				{{ Form::open(['route' => 'frontend.user.tickets.storereply', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-ticket', 'files' => true]) }}
				<div class="box box-info">
					<?php //print_r("<pre>"); print_r($tickets); print_r("<pre>"); exit; ?>
					<div class="box-header with-border">
						<div class="box-tools pull-right">
							@include('frontend.user.tickets.partials.tickets-header-buttons')
						</div><!--box-tools pull-right-->
					</div><!-- /.box-header -->
					<div class="box-header with-border mb-30">
						<div class="" style="white-space: nowrap;overflow-x: auto;"><b>Ticket No.  {{ $tickets->ticketnum }}</b>  <span style="padding-left:10%;"><b>Status: {{ $tickets->status }}</b></span></div>
					</div>
					<div class="box-body">
						@if($tickets->roles =='User')
						<div class="ticket-reply">
							@else
							<div class="ticket-reply staff">
								@endif	
								<div class="date">
									{{ $tickets->created_at->format('d/m/Y h:i A') }}
								</div>
								<div class="user">
									<i class="fa fa-user"></i>
									<span class="name">
										{{ $tickets->first_name }} {{ $tickets->last_name }}
									</span>
									<span class="type">
										@if($tickets->roles =='User')
										Client
										@else
										Admin
										@endif	
									</span>
								</div>
								<div class="message">
									<p><b>{{ $tickets->subject }}</b></p>
									<p>{{ $tickets->message }}</p>
								</div>
							</div>
							
							@foreach ($ticketsreply as $replies)
							<?php //print_r($replies); ?>
							@if($replies->roles =='User')
							<div class="ticket-reply">
								@else
								<div class="ticket-reply staff">
									@endif	
									<div class="date">
										{{ $replies->created_at->format('d/m/Y h:i A') }}
									</div>
									<div class="user">
										<i class="fa fa-user"></i>
										<span class="name">
											{{ $replies->first_name }} {{ $replies->last_name }}
										</span>
										<span class="type">
											@if($replies->roles =='User')
											Client
											@else
											Admin
											@endif	
										</span>
									</div>
									<div class="message">
										<p><b>{{ $replies->subject }}</b></p>
										<p>{{ $replies->message }}</p>
									</div>
								</div>
								
								@endforeach
								@if($tickets->status =='Open')
								<p style="padding-left: 13px;
								font-weight: bold;font-size: 1.3em;">Reply Query</p>
								<div class="form-group">
									@include("frontend.user.tickets.replyform")
									<div class="edit-form-btn text-center">
										<button class="sent-btn"> {{ link_to_route('frontend.user.tickets.index', trans('buttons.general.cancel'), [], ['class' => '']) }} </button>
										
										<!--{{ Form::submit(trans('buttons.general.crud.reply'), ['class' => 'btn btn-primary btn-md']) }} -->
										<button class="sent-btn" type="submit">Reply</button>
										
										<div class="clearfix"></div>
									</div>
								</div>
								@endif	
							</div>
							{{ Form::close() }}
						</div><!--box-->
						</div><!--box-->
						</div><!--box-->
							</div>
		</div>
	</div>
</div>
					@endsection					