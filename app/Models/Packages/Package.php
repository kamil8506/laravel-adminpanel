<?php

namespace App\Models\Packages;

use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\Packages\Traits\PackageAttribute;
use App\Models\Packages\Traits\PackageRelationship;
use Illuminate\Database\Eloquent\SoftDeletes;
class Package extends Model
{
    use ModelTrait,
        PackageAttribute,
    	PackageRelationship,
		SoftDeletes {
            //PackageAttribute::getEditButtonAttribute insteadof ModelTrait;
            //PackageAttribute::getDeleteButtonAttribute insteadof ModelTrait;
        }

    /**
     * NOTE : If you want to implement Soft Deletes in this model,
     * then follow the steps here : https://laravel.com/docs/6.x/eloquent#soft-deleting
     */

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'packages';

    /**
     * Mass Assignable fields of model
     * @var array
     */
    protected $fillable = [
	'id',
	'package_name',
	'Totalsms',
	'Amount',
	'Discription',
	'created_at'
	];

    /**
     * Default values for model fields
     * @var array
     */
    protected $attributes = [

    ];

    /**
     * Dates
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * Guarded fields of model
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    /**
     * Constructor of Model
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}
