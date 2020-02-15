<?php

namespace App\Http\Responses\Backend\Packages;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Packages\Package
     */
    protected $packages;

    /**
     * @param App\Models\Packages\Package $packages
     */
    public function __construct($packages)
    {
        $this->packages = $packages;
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
        return view('backend.packages.edit')->with([
            'packages' => $this->packages
        ]);
    }
}