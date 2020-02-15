<?php

namespace App\Http\Controllers\Backend\Abc;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Abc\AbcRepository;
use App\Http\Requests\Backend\Abc\ManageAbcRequest;

/**
 * Class AbcsTableController.
 */
class AbcsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var AbcRepository
     */
    protected $abc;

    /**
     * contructor to initialize repository object
     * @param AbcRepository $abc;
     */
    public function __construct(AbcRepository $abc)
    {
        $this->abc = $abc;
    }

    /**
     * This method return the data of the model
     * @param ManageAbcRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageAbcRequest $request)
    {
        return Datatables::of($this->abc->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($abc) {
                return Carbon::parse($abc->created_at)->toDateString();
            })
            ->addColumn('actions', function ($abc) {
                return $abc->action_buttons;
            })
            ->make(true);
    }
}
