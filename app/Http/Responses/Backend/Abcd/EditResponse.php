<?php

namespace App\Http\Responses\Backend\Abcd;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Abcd\Abcd
     */
    protected $abcds;

    /**
     * @param App\Models\Abcd\Abcd $abcds
     */
    public function __construct($abcds)
    {
        $this->abcds = $abcds;
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
        return view('backend.abcds.edit')->with([
            'abcds' => $this->abcds
        ]);
    }
}