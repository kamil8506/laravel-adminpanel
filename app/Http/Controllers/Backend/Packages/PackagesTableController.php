<?php

namespace App\Http\Controllers\Backend\Packages;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Packages\PackageRepository;
use App\Http\Requests\Backend\Packages\ManagePackageRequest;

/**
 * Class PackagesTableController.
 */
class PackagesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var PackageRepository
     */
    protected $package;

    /**
     * contructor to initialize repository object
     * @param PackageRepository $package;
     */
    public function __construct(PackageRepository $package)
    {
        $this->package = $package;
    }

    /**
     * This method return the data of the model
     * @param ManagePackageRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManagePackageRequest $request)
    {
        return Datatables::of($this->package->getForDataTable())
            ->escapeColumns(['id','package_name','Totalsms','Amount','Discription'])
            ->addColumn('created_at', function ($package) {
                return Carbon::parse($package->created_at)->toDateString();
            })
            ->addColumn('actions', function ($package) {
                return $package->action_buttons;
            })
            ->make(true);
    }
}
