<?php

namespace App\Http\Controllers\Frontend\User\Ticket;

use App\Models\Ticket\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Frontend\Ticket\CreateResponse;
use App\Http\Responses\Frontend\Ticket\EditResponse;
use App\Http\Responses\Frontend\Ticket\ShowResponse;
use App\Repositories\Frontend\Ticket\TicketRepository;
use App\Http\Requests\Frontend\Ticket\ManageTicketRequest;
use App\Http\Requests\Frontend\Ticket\CreateTicketRequest;
use App\Http\Requests\Frontend\Ticket\StoreReplyTicketRequest;
use App\Http\Requests\Frontend\Ticket\StoreTicketRequest;
use App\Http\Requests\Frontend\Ticket\EditTicketRequest;
use App\Http\Requests\Frontend\Ticket\UpdateTicketRequest;
use App\Http\Requests\Frontend\Ticket\DeleteTicketRequest;
use App\Http\Requests\Frontend\Ticket\ShowTicketRequest;

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
     * @param  App\Http\Requests\Frontend\Ticket\ManageTicketRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageTicketRequest $request)
    {
		$totalnoofquery =  0;
		$Purchansequery = 0;
		$remainquery = 0;
		$totalnoofquery = $this->repository->getTotalNoOfQuery();
		$Purchansequery = $this->repository->getTotalNoOfQueryPurchase();
		$remainquery = $Purchansequery - $totalnoofquery;
		$with = array('totalquery'=>$Purchansequery, 'remainingquery'=>$remainquery);
		
        return new ViewResponse('frontend.user.tickets.index', $with);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateTicketRequestNamespace  $request
     * @return \App\Http\Responses\Frontend\Ticket\CreateResponse
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
        return new RedirectResponse(route('frontend.user.tickets.index'), ['flash_success' => trans('alerts.frontend.tickets.created')]);
    }
	
	  public function storereply(StoreReplyTicketRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->createreply($input);
		$ticketid = $input['ticket_id'];
		$ticketslist = $this->repository->getTickets($ticketid);
		//return with successfull message
        return new RedirectResponse(route('frontend.user.tickets.show', $ticketslist), ['flash_success' => trans('alerts.frontend.tickets.replied')]);
    }
	
    public function show(Ticket $ticket, ShowTicketRequest $request)
    {
		$ticketslist = $this->repository->getTickets($ticket->id);
		$ticketsreplylist = $this->repository->getReplyTicket($ticket->id);
        return new ShowResponse($ticketslist, $ticketsreplylist, $this->status);
    }
	
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Ticket\Ticket  $ticket
     * @param  EditTicketRequestNamespace  $request
     * @return \App\Http\Responses\Frontend\Ticket\EditResponse
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
        return new RedirectResponse(route('frontend.user.tickets.index'), ['flash_success' => trans('alerts.backend.tickets.updated')]);
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
        return new RedirectResponse(route('frontend.user.tickets.index'), ['flash_success' => trans('alerts.backend.tickets.deleted')]);
    }
    
}
