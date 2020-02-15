<?php

namespace App\Http\Responses\Frontend\Ticket;

use Illuminate\Contracts\Support\Responsable;

class ShowResponse implements Responsable
{
    /**
     * @param App\Models\Ticket\Ticket $tickets
     */
    protected $ticketslist;
    protected $ticketsreplylist;
	protected $status;

    /**
     * @param \App\Models\Access\User\User $user
     */
	public function __construct($ticketslist, $ticketsreplylist, $status)
    {
        $this->tickets = $ticketslist;
        $this->ticketsreply = $ticketsreplylist;
		$this->status = $status;
		
    }

    /**
     * In Response.
     *
     * @param \App\Http\Requests\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function toResponse($request)
    {
        return view('frontend.user.tickets.show')->with([
            'tickets' => $this->tickets,
            'ticketsreply' => $this->ticketsreply,
			'status'  => $this->status,
        ]);
    }
}
