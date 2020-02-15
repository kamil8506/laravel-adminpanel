<?php

namespace App\Http\Controllers\Backend\Ticket;

use App\Models\Ticket\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Ticket\CreateResponse;
use App\Http\Responses\Backend\Ticket\EditResponse;
use App\Http\Responses\Backend\Ticket\ShowResponse;
use App\Repositories\Backend\Ticket\TicketRepository;
use App\Http\Requests\Backend\Ticket\ManageTicketRequest;
use App\Http\Requests\Backend\Ticket\CreateTicketRequest;
use App\Http\Requests\Backend\Ticket\StoreTicketRequest;
use App\Http\Requests\Backend\Ticket\StoreReplyTicketRequest;
use App\Http\Requests\Backend\Ticket\EditTicketRequest;
use App\Http\Requests\Backend\Ticket\UpdateTicketRequest;
use App\Http\Requests\Backend\Ticket\DeleteTicketRequest;
use App\Http\Requests\Backend\Ticket\ShowTicketRequest;

/**
 * TicketsController
 */
class TicketsController extends Controller
{
	 protected $status = [
        'Open' => 'Open Ticket',
        'Close' => 'Close Ticket',
		'Cancelled' => 'Cancelled Ticket',
        'OnHold' => 'On Hold Ticket',
    ];
	
    /**
     * variable to store the repository object
     * @var TicketRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param TicketRepository $repository;
     */
    public function __construct(TicketRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Ticket\ManageTicketRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageTicketRequest $request)
    {
        return new ViewResponse('backend.tickets.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateTicketRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Ticket\CreateResponse
     */
    public function create(CreateTicketRequest $request)
    {
        return new CreateResponse($this->status);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreTicketRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreTicketRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.tickets.index'), ['flash_success' => trans('alerts.backend.tickets.created')]);
    }
	
	  public function storereply(StoreReplyTicketRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->createreply($input);
        //return with successfull message
        return new RedirectResponse(route('admin.tickets.index'), ['flash_success' => trans('alerts.backend.tickets.created')]);
    }
	
    public function show(Ticket $ticket, ShowTicketRequest $request)
    {
		//print_r($ticket->id);
		$ticketslist = $this->repository->getTickets($ticket->id);
		$ticketsreplylist = $this->repository->getReplyTicket($ticket->id);
		///print_r("<pre>");print_r($ticketsreplylist);print_r("</pre>");
        return new ShowResponse($ticketslist, $ticketsreplylist, $this->status);
    }
	
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Ticket\Ticket  $ticket
     * @param  EditTicketRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Ticket\EditResponse
     */
    public function edit(Ticket $ticket, EditTicketRequest $request)
    {
        return new EditResponse($ticket, $this->status);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateTicketRequestNamespace  $request
     * @param  App\Models\Ticket\Ticket  $ticket
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $ticket, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.tickets.index'), ['flash_success' => trans('alerts.backend.tickets.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteTicketRequestNamespace  $request
     * @param  App\Models\Ticket\Ticket  $ticket
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Ticket $ticket, DeleteTicketRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($ticket);
        //returning with successfull message
        return new RedirectResponse(route('admin.tickets.index'), ['flash_success' => trans('alerts.backend.tickets.deleted')]);
    }
    
}
