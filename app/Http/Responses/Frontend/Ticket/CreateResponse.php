<?php

namespace App\Http\Responses\Frontend\Ticket;

use Illuminate\Contracts\Support\Responsable;

class CreateResponse implements Responsable
{
    /**
     * To Response
     *
     * @param \App\Http\Requests\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
	protected $status;
	 public function __construct($status)
    {
        $this->status = $status;
       
    }

	
    public function toResponse($request)
    {
        return view('frontend.user.tickets.create')->with([ 'status' => $this->status]);
    }
}