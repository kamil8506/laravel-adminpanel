<?php

namespace App\Models\Ticket;

use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ticket\Traits\TicketAttribute;
use App\Models\Ticket\Traits\TicketRelationship;

class Ticket extends Model
{
    use ModelTrait,
        TicketAttribute,
    	TicketRelationship {
            // TicketAttribute::getEditButtonAttribute insteadof ModelTrait;
        }

    /**
     * NOTE : If you want to implement Soft Deletes in this model,
     * then follow the steps here : https://laravel.com/docs/6.x/eloquent#soft-deleting
     */

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'tickets';

    /**
     * Mass Assignable fields of model
     * @var array
     */
    protected $fillable = [
		'ticketnum', 'subject', 'message', 'created_by', 'status'
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
