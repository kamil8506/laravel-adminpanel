<div class="box-body">
    <div class="form-group">
      
	<div class="form-group">
        {{ Form::label('message', trans('validation.attributes.backend.tickets.message'), ['class' => 'col-lg-2 control-label required']) }}
		<div class="col-lg-9">
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
	   {{ Form::hidden('ticket_id', $tickets->id) }}
	   {{ Form::hidden('ticketnum', $tickets->ticketnum) }}
	   {{ Form::hidden('status', 'Open') }}
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
