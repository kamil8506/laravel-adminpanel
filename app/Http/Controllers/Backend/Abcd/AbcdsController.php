<?php

namespace App\Http\Controllers\Backend\Abcd;

use App\Models\Abcd\Abcd;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Abcd\CreateResponse;
use App\Http\Responses\Backend\Abcd\EditResponse;
use App\Repositories\Backend\Abcd\AbcdRepository;
use App\Http\Requests\Backend\Abcd\ManageAbcdRequest;
use App\Http\Requests\Backend\Abcd\CreateAbcdRequest;
use App\Http\Requests\Backend\Abcd\StoreAbcdRequest;
use App\Http\Requests\Backend\Abcd\EditAbcdRequest;
use App\Http\Requests\Backend\Abcd\UpdateAbcdRequest;
use App\Http\Requests\Backend\Abcd\DeleteAbcdRequest;

/**
 * AbcdsController
 */
class AbcdsController extends Controller
{
    /**
     * variable to store the repository object
     * @var AbcdRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param AbcdRepository $repository;
     */
    public function __construct(AbcdRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Abcd\ManageAbcdRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageAbcdRequest $request)
    {
        return new ViewResponse('backend.abcds.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateAbcdRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Abcd\CreateResponse
     */
    public function create(CreateAbcdRequest $request)
    {
        return new CreateResponse('backend.abcds.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreAbcdRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreAbcdRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.abcds.index'), ['flash_success' => trans('alerts.backend.abcds.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Abcd\Abcd  $abcd
     * @param  EditAbcdRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Abcd\EditResponse
     */
    public function edit(Abcd $abcd, EditAbcdRequest $request)
    {
        return new EditResponse($abcd);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateAbcdRequestNamespace  $request
     * @param  App\Models\Abcd\Abcd  $abcd
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateAbcdRequest $request, Abcd $abcd)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $abcd, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.abcds.index'), ['flash_success' => trans('alerts.backend.abcds.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteAbcdRequestNamespace  $request
     * @param  App\Models\Abcd\Abcd  $abcd
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Abcd $abcd, DeleteAbcdRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($abcd);
        //returning with successfull message
        return new RedirectResponse(route('admin.abcds.index'), ['flash_success' => trans('alerts.backend.abcds.deleted')]);
    }
    
}
