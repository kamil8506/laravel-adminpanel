@extends ('backend.layouts.app')
<style>
	.ticket-reply {
    margin: 10px 0;
    padding: 0;
    border: 1px solid #efefef;
    background-color: #fff;
}
.ticket-reply.staff {
    border: 1px solid #cce4fc;
}
.ticket-reply .date {
    float: right;
    padding: 8px 10px;
    font-size: 1em;
}
.ticket-reply .user {
    padding: 5px 0;
    background-color: #f8f8f8;
}
.ticket-reply.staff .user {
    background-color: #f2f9ff;
}
.ticket-reply .user i {
    float: left;
    font-size: 2.2em;
    padding: 2px 15px;
}
.ticket-reply .user .name {
    display: block;
    font-size: 1.2em;
}
.ticket-reply .user .type {
    display: block;
    font-weight: 700;
    font-size: .8em;
}
.ticket-reply .message {
    padding: 12px 15px;
}
.ticket-reply .message p {
    margin: 0 0 10px;
}
</style>	

@section ('title', trans('labels.backend.tickets.management') . ' | ' . trans('labels.backend.tickets.view'))

@section('page-header')
<h1>
	{{ trans('labels.backend.tickets.management') }}
	<small>{{ trans('labels.backend.tickets.view') }}</small>
</h1>
@endsection

@section('content')
 {{ Form::open(['route' => 'admin.tickets.storereply', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-ticket', 'files' => true]) }}
<div class="box box-info">
	<?php //print_r("<pre>"); print_r($tickets); print_r("<pre>"); exit; ?>
	<div class="box-header with-border">
		<h3 class="box-title">{{ trans('labels.backend.tickets.view') }}</h3>
		
		<div class="box-tools pull-right">
			@include('backend.tickets.partials.tickets-header-buttons')
		</div><!--box-tools pull-right-->
	</div><!-- /.box-header -->
	<div class="box-header with-border">
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
	<p style="padding-left: 13px;
    font-weight: bold;font-size: 1.3em;">Reply Query</p>
		<div class="form-group">
			@include("backend.tickets.replyform")
                    <div class="edit-form-btn">
                    {{ link_to_route('admin.tickets.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
					@if($tickets->status =='Open')
                    {{ Form::submit(trans('buttons.general.crud.reply'), ['class' => 'btn btn-primary btn-md']) }}
					@endif	
                    <div class="clearfix"></div>
					</div>
            </div>
            </div>
	 {{ Form::close() }}
</div><!--box-->
@endsection