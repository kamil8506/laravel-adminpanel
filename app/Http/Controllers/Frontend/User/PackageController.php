<?php

namespace App\Http\Controllers\Frontend\User;

use App\Models\Packages\Package;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Requests\Frontend\User\PackageViewRequest;
use App\Http\Requests\Frontend\User\PackagePurchaseRequest;
use App\Repositories\Frontend\Packages\PackageRepository;
Use Response;
/**
 * Class PackageController.
 */
class PackageController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
	   protected $repository;

    /**
     * contructor to initialize repository object
     * @param PackageRepository $repository;
     */
    public function __construct(PackageRepository $repository)
    {
        $this->repository = $repository;
    }
	 
    public function index(PackageViewRequest $request)
    {
        $packages = Package::all();
        return view('frontend.user.package', compact('packages', $packages));
    }
	
	  
	public function purchasePackage(PackagePurchaseRequest $request){
		
		
		 $this->repository->create($request);
		 $arr = array('msg' => 'Payment successfully credited', 'status' => true);
		 return Response()->json($arr);  
		 //return new RedirectResponse(route('frontend.user.tickets.index'), ['flash_success' => trans('alerts.frontend.packages.created')]);
		  
	}
	  
}
