<?php

namespace App\Http\Controllers\Backend\Abc;

use App\Models\Abc\Abc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Abc\CreateResponse;
use App\Http\Responses\Backend\Abc\EditResponse;
use App\Repositories\Backend\Abc\AbcRepository;
use App\Http\Requests\Backend\Abc\ManageAbcRequest;
use App\Http\Requests\Backend\Abc\CreateAbcRequest;
use App\Http\Requests\Backend\Abc\StoreAbcRequest;
use App\Http\Requests\Backend\Abc\EditAbcRequest;
use App\Http\Requests\Backend\Abc\UpdateAbcRequest;
use App\Http\Requests\Backend\Abc\DeleteAbcRequest;

/**
 * AbcsController
 */
class AbcsController extends Controller
{
    /**
     * variable to store the repository object
     * @var AbcRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param AbcRepository $repository;
     */
    public function __construct(AbcRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Abc\ManageAbcRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageAbcRequest $request)
    {
        return new ViewResponse('backend.abcs.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateAbcRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Abc\CreateResponse
     */
    public function create(CreateAbcRequest $request)
    {
        return new CreateResponse('backend.abcs.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreAbcRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreAbcRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.abcs.index'), ['flash_success' => trans('alerts.backend.abcs.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Abc\Abc  $abc
     * @param  EditAbcRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Abc\EditResponse
     */
    public function edit(Abc $abc, EditAbcRequest $request)
    {
        return new EditResponse($abc);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateAbcRequestNamespace  $request
     * @param  App\Models\Abc\Abc  $abc
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateAbcRequest $request, Abc $abc)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $abc, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.abcs.index'), ['flash_success' => trans('alerts.backend.abcs.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteAbcRequestNamespace  $request
     * @param  App\Models\Abc\Abc  $abc
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Abc $abc, DeleteAbcRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($abc);
        //returning with successfull message
        return new RedirectResponse(route('admin.abcs.index'), ['flash_success' => trans('alerts.backend.abcs.deleted')]);
    }
    
}
