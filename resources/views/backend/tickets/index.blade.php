@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.tickets.management'))

@section('page-header')
    <h1>{{ trans('labels.backend.tickets.management') }}</h1>
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.tickets.management') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.tickets.partials.tickets-header-buttons')
            </div>
        </div><!--box-header with-border-->

        <div class="box-body">
            <div class="table-responsive data-table-wrapper">
                <table id="tickets-table" class="table table-condensed table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.backend.tickets.table.id') }}</th>
                            <th>{{ trans('labels.backend.tickets.table.ticketnum') }}</th>
                            <th>{{ trans('labels.backend.tickets.table.subject') }}</th>
                            <th>{{ trans('labels.backend.tickets.table.message') }}</th>
                            <th>{{ trans('labels.backend.tickets.table.created_by') }}</th>
                            <th>{{ trans('labels.backend.tickets.table.status') }}</th>
                            <th>{{ trans('labels.backend.tickets.table.createdat') }}</th>
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
                    url: '{{ route("admin.tickets.get") }}',
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
                        { extend: 'copy', className: 'copyButton',  exportOptions: {columns: [ 0, 1, 2, 3 ]  }},
                        { extend: 'csv', className: 'csvButton',  exportOptions: {columns: [ 0, 1 ]  }},
                        { extend: 'excel', className: 'excelButton',  exportOptions: {columns: [ 0, 1 ]  }},
                        { extend: 'pdf', className: 'pdfButton',  exportOptions: {columns: [ 0, 1 ]  }},
                        { extend: 'print', className: 'printButton',  exportOptions: {columns: [ 0, 1 ]  }}
                    ]
                }
            });

            Backend.DataTableSearch.init(dataTable);
        });
    </script>
@endsection
