<div class="box-body">
    <div class="form-group">
        <!-- Create Your Field Label Here -->
        <!-- Look Below Example for reference -->
        {{-- {{ Form::label('name', trans('labels.backend.blogs.title'), ['class' => 'col-lg-2 control-label required']) }} --}}
		
        <div class="col-lg-10">
            <!-- Create Your Input Field Here -->
            <!-- Look Below Example for reference -->
            {{-- {{ Form::text('name', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.blogs.title'), 'required' => 'required']) }} --}}
		</div><!--col-lg-10-->
	</div><!--form-group-->
	{{-- Package Name --}}
	<div class="form-group">
		{{ Form::label('Package Name', trans('validation.attributes.backend.packages.package_name'), ['class' => 'col-lg-2 control-label required']) }}
		
		<div class="col-lg-10">
			{{ Form::text('package_name', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.packages.package_name'), 'required' => 'required']) }}
		</div><!--col-lg-10-->
	</div><!--form control-->
	<div class="form-group">
		{{ Form::label('Total SMS', trans('validation.attributes.backend.packages.Totalsms'), ['class' => 'col-lg-2 control-label required']) }}
		
		<div class="col-lg-10">
			{{ Form::text('Totalsms', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.packages.Totalsms'), 'required' => 'required']) }}
		</div><!--col-lg-10-->
	</div><!--form control-->
	<div class="form-group">
		{{ Form::label('Package Amount', trans('validation.attributes.backend.packages.Amount'), ['class' => 'col-lg-2 control-label required']) }}
		<div class="col-lg-10">
			{{ Form::text('Amount', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.packages.Amount'), 'required' => 'required']) }}
		</div><!--col-lg-10-->
	</div><!--form control-->
	<div class="form-group">
		{{ Form::label('Package Discription', trans('validation.attributes.backend.packages.Discription'), ['class' => 'col-lg-2 control-label required']) }}
		<div class="col-lg-10">
			{{ Form::textarea('Discription', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.packages.Discription'), 'required' => 'required']) }}
		</div><!--col-lg-10-->
	</div><!--form control-->
</div><!--box-body-->

@section("after-scripts")
<script type="text/javascript">
	//Put your javascript needs in here.
	//Don't forget to put `@`parent exactly after `@`section("after-scripts"),
	//if your create or edit blade contains javascript of its own
	$( document ).ready( function() {
		//Everything in here would execute after the DOM is ready to manipulated.
	});
</script>
@endsection
