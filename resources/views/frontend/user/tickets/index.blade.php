@extends('frontend.layouts.app')

@section ('title', trans('labels.frontend.tickets.management'))

@section('page-header')
<h1>{{ trans('labels.frontend.tickets.management') }}</h1>
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
<div class="container">
<div class="box box-info mb-150">
	<div class="box-header with-border">
	<div class="row mt-50">
			<div class="col-md-6">
				<div class="media">
					<span class="media-left">
						<i class="fa fa-credit-card" aria-hidden="true" style="font-size:16px;"></i>
					</span>
					<div class="media-body">
						<h4 style="margin-top:0">Total Queries: <span class="text-primary"> {{ $totalquery }}</span></h4>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="media">
					<span class="media-left">
						<i class="fa fa-credit-card" aria-hidden="true" style="font-size:16px;"></i>
					</span>
					<div class="media-body">
						<h4 style="margin-top:0">Remaining Queries: <span class="text-primary"> {{ $remainingquery }}</span></h4>
					</div>
				</div>
			</div>
		</div>
		
		<div class="box-tools pull-right">
			@include('frontend.user.tickets.partials.tickets-header-buttons')
		</div>
	</div><!--box-header with-border-->
	
	<div class="box-body">
		
		<div class="table-responsive data-table-wrapper">
			<table id="tickets-table" class="table table-condensed table-hover table-bordered" style="width:100%;">
				<thead>
					<tr>
						<th>{{ trans('labels.frontend.tickets.table.id') }}</th>
						<th>{{ trans('labels.frontend.tickets.table.ticketnum') }}</th>
						<th>{{ trans('labels.frontend.tickets.table.subject') }}</th>
						<th>{{ trans('labels.frontend.tickets.table.message') }}</th>
						<th>{{ trans('labels.frontend.tickets.table.created_by') }}</th>
						<th>{{ trans('labels.frontend.tickets.table.status') }}</th>
						<th>{{ trans('labels.frontend.tickets.table.createdat') }}</th>
						<th>{{ trans('labels.general.actions') }}</th>
					</tr>
				</thead>
				<!--<thead class="transparent-bg">
					<tr>
					<th></th>
					<th></th>
					<th></th>
					</tr>
				</thead>-->
			</table>
		</div><!--table-responsive-->
	</div><!-- /.box-body -->
</div><!--box-->
</div><!--box-->
@endsection

@section('after-scripts')
{{-- For DataTables --}}
{{ Html::script(mix('js/dataTable.js')) }}

<script>
	//Below written line is short form of writing $(document).ready(function() { })
	$(function() {
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		
		var dataTable = $('#tickets-table').dataTable({
			processing: true,
			serverSide: true,
			ajax: {
				url: '{{ route("frontend.user.tickets.get") }}',
				type: 'post'
			},
			columns: [
			{data: 'id', name: '{{config('module.tickets.table')}}.id'},
			{data: 'ticketnum', name: '{{config('module.tickets.table')}}.ticketnum'},
			{data: 'subject', name: '{{config('module.tickets.table')}}.subject'},
			{data: 'message', name: '{{config('module.tickets.table')}}.message'},
			{data: 'created_by', name: '{{config('module.tickets.table')}}.created_by'},
			{data: 'status', name: '{{config('module.tickets.table')}}.status'},
			{data: 'created_at', name: '{{config('module.tickets.table')}}.created_at'},
			{data: 'actions', name: 'actions', searchable: false, sortable: false}
			],
			order: [[0, "asc"]],
			searchDelay: 500,
			dom: 'lBfrtip',
			buttons: {
				buttons: [
				{ extend: 'copy', className: 'copyButton',  exportOptions: {columns: [ 0, 1, 2, 3, 4 ]  }},
				{ extend: 'csv', className: 'csvButton',  exportOptions: {columns: [ 0, 1, 2, 3, 4 ]  }},
				{ extend: 'excel', className: 'excelButton',  exportOptions: {columns: [ 0, 1, 2, 3, 4 ]  }},
				{ extend: 'pdf', className: 'pdfButton',  exportOptions: {columns: [ 0, 1, 2, 3, 4 ]  }},
				{ extend: 'print', className: 'printButton',  exportOptions: {columns: [ 0, 1, 2, 3, 4 ]  }}
				]
			}
		});
		
		Frontend.DataTableSearch.init(dataTable);
	});
</script>
@endsection
