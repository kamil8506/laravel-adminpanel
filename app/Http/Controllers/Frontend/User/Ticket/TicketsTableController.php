<?php

namespace App\Http\Controllers\Frontend\User\Ticket;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Frontend\Ticket\TicketRepository;
use App\Http\Requests\Frontend\Ticket\ManageTicketRequest;

/**
 * Class TicketsTableController.
 */
class TicketsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var TicketRepository
     */
	 
	 
    protected $ticket;

    /**
     * contructor to initialize repository object
     * @param TicketRepository $ticket;
     */
    public function __construct(TicketRepository $ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * This method return the data of the model
     * @param ManageTicketRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageTicketRequest $request)
    {
        return Datatables::of($this->ticket->getForDataTable())
            ->escapeColumns(['id'])
			->addColumn('created_by', function ($ticket) {
                return $ticket->user_name;
            })
            ->addColumn('created_at', function ($ticket) {
                //return Carbon::parse($ticket->created_at)->toDateString();
				  return $ticket->created_at->format('d/m/Y h:i A');
            })
            ->addColumn('actions', function ($ticket) {
                return $ticket->action_buttons;
            })
            ->make(true);
    }
}
