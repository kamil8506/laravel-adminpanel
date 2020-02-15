<?php

namespace App\Http\Controllers\Backend\Abcd;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Abcd\AbcdRepository;
use App\Http\Requests\Backend\Abcd\ManageAbcdRequest;

/**
 * Class AbcdsTableController.
 */
class AbcdsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var AbcdRepository
     */
    protected $abcd;

    /**
     * contructor to initialize repository object
     * @param AbcdRepository $abcd;
     */
    public function __construct(AbcdRepository $abcd)
    {
        $this->abcd = $abcd;
    }

    /**
     * This method return the data of the model
     * @param ManageAbcdRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageAbcdRequest $request)
    {
        return Datatables::of($this->abcd->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($abcd) {
                return Carbon::parse($abcd->created_at)->toDateString();
            })
            ->addColumn('actions', function ($abcd) {
                return $abcd->action_buttons;
            })
            ->make(true);
    }
}
