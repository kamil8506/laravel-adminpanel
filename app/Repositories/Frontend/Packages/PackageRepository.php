<?php

namespace App\Repositories\Frontend\Packages;


use App\Exceptions\GeneralException;
use App\Models\Packages\Package;
use App\Models\Purchasepackages\Purchasepackage;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * Class PackageRepository.
 */
class PackageRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Package::class;

   

    public function findByEmail($email)
    {
        return $this->query()->where('email', $email)->first();
    }

    public function create($inputs)
    {
		//print_r("<pre>");print_r($inputs);print_r("<pre>");
		$packageid = $inputs->product_id;
		$amount = $inputs->totalAmount;
		$payment_id = $inputs->razorpay_payment_id;
		
		$gedata = $this->query()->where('id', $packageid)->first();
		$noofquery = $gedata->Totalsms;
		$input = array(); 
		$input['created_by'] = access()->user()->id;
		$input['package_id'] = $packageid;
		$input['totalAmount'] = $amount;
		$input['transationId'] = $payment_id;
		$input['totalquery'] = $noofquery;
		$input['pendingquery'] = $noofquery;
		Purchasepackage::create($input);
		return true;
    }

   
  
}
