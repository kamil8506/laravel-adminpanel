<?php

namespace App\Http\Responses\Frontend\Ticket;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Ticket\Ticket
     */
    protected $tickets;
	protected $status;

    /**
     * @param App\Models\Ticket\Ticket $tickets
     */
    public function __construct($tickets, $status)
    {
        $this->tickets = $tickets;
		$this->status = $status;
    }

    /**
     * To Response
     *
     * @param \App\Http\Requests\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function toResponse($request)
    {
        return view('frontend.tickets.edit')->with([
            'tickets' => $this->tickets,
			'status'  => $this->status,
        ]);
    }
}