<div class="box-body">
    <div class="form-group">
        <!-- Create Your Field Label Here -->
        <!-- Look Below Example for reference -->
        {{-- {{ Form::label('name', trans('labels.backend.tickets.title'), ['class' => 'col-lg-2 control-label required']) }} --}}

        <div class="col-lg-10">
            <!-- Create Your Input Field Here -->
            <!-- Look Below Example for reference -->
            {{-- {{ Form::text('name', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.tickets.title'), 'required' => 'required']) }} --}}
        </div><!--col-lg-10-->
    </div><!--form-group-->
	 <!--<div class="form-group">
        {{ Form::label('ticketnum', trans('validation.attributes.backend.tickets.ticketnum'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::text('ticketnum', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.tickets.ticketnum'), 'required' => 'required']) }}
        </div><!--col-lg-10-->
   <!-- </div>--><!--form control-->
	 <div class="form-group">
        {{ Form::label('subject', trans('validation.attributes.backend.tickets.subject'), ['class' => 'col-lg-2 control-label required']) }}
		<div class="col-lg-10">
            {{ Form::text('subject', null, ['class' => 'form-control box-size', 'placeholder' => 'Enter the Subject', 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->
	<div class="form-group">
        {{ Form::label('message', trans('validation.attributes.backend.tickets.message'), ['class' => 'col-lg-2 control-label required']) }}
		<div class="col-lg-10">
            {{ Form::textarea('message', null, ['class' => 'form-control box-size', 'placeholder' => 'Type the comment...', 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->
	 <div class="form-group">
		
        {{ Form::label('ticket_document', trans('validation.attributes.backend.tickets.ticket_document'), ['class' => 'col-lg-2 control-label required']) }}
        @if(!empty($tickets->ticket_document))
            <div class="col-lg-1">
                <img src="{{ Storage::disk('public')->url('img/ticket/' . $tickets->ticket_document) }}" height="80" width="80">
            </div>
            <div class="col-lg-5">
                <div class="custom-file-input">
                    <input type="file" name="ticket_document" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" />
                    <label for="file-1"><i class="fa fa-upload"></i><span>Choose a file</span></label>
                </div>
            </div>
        @else
            <div class="col-lg-5">
                <div class="custom-file-input">
                        <input type="file" name="ticket_document" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" />
                        <label for="file-1"><i class="fa fa-upload"></i><span>Choose a file</span></label>
                </div>
            </div>
       @endif
    </div><!--form control-->
	  <div class="form-group">
       
		<div class="col-lg-10">
          {{ Form::hidden('status', 'Open', ['class' => 'form-control box-size']) }}
        </div><!--col-lg-3-->
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
