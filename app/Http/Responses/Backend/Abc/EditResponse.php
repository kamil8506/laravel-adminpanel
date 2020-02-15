<?php

namespace App\Http\Responses\Backend\Abc;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Abc\Abc
     */
    protected $abcs;

    /**
     * @param App\Models\Abc\Abc $abcs
     */
    public function __construct($abcs)
    {
        $this->abcs = $abcs;
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
        return view('backend.abcs.edit')->with([
            'abcs' => $this->abcs
        ]);
    }
}