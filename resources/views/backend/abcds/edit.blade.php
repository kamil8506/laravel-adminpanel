@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.abcds.management') . ' | ' . trans('labels.backend.abcds.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.abcds.management') }}
        <small>{{ trans('labels.backend.abcds.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($abcds, ['route' => ['admin.abcds.update', $abcd], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-abcd']) }}

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.abcds.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.abcds.partials.abcds-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            <div class="box-body">
                <div class="form-group">
                    {{-- Including Form blade file --}}
                    @include("backend.abcds.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.abcds.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                        {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-primary btn-md']) }}
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!--form-group-->
            </div><!--box-body-->
        </div><!--box box-success -->
    {{ Form::close() }}
@endsection
