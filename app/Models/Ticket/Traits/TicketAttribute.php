<?php

namespace App\Models\Ticket\Traits;

/**
 * Class TicketAttribute.
 */
trait TicketAttribute
{
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/6.x/eloquent-mutators#defining-an-accessor

 public function getShowButtonAttribute($class)
    {
        if (access()->allow('show-ticket')) {
            return '<a class="'.$class.'" href="'.route('admin.tickets.show', $this).'">
                    <i data-toggle="tooltip" data-placement="top" title="View" class="fa fa-eye"></i>
                </a>';
        }
    }
	public function getFrontShowButtonAttribute($class)
    {
         if (access()->user()->id == 3 && access()->allow('view-frontend')) {
            return '<a class="'.$class.'" href="'.route('frontend.user.tickets.show', $this).'">
                    <i data-toggle="tooltip" data-placement="top" title="View" class="fa fa-eye"></i>
                </a>';
        }
    }
    /**
     * Action Button Attribute to show in grid
     * @return string
     */
	 
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">'.$this->getFrontShowButtonAttribute('btn btn-default btn-flat').''.$this->getShowButtonAttribute('btn btn-default btn-flat').''.$this->getEditButtonAttribute("edit-ticket", "admin.tickets.edit").''
                .$this->getDeleteButtonAttribute("delete-ticket", "admin.tickets.destroy").
                '</div>';
    }
}
