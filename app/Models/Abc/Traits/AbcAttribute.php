<?php

namespace App\Models\Abc\Traits;

/**
 * Class AbcAttribute.
 */
trait AbcAttribute
{
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/5.4/eloquent-mutators#defining-an-accessor


    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">
                '.$this->getEditButtonAttribute("edit-abc", "admin.abcs.edit").'
                '.$this->getDeleteButtonAttribute("delete-abc", "admin.abcs.destroy").'
                </div>';
    }
}
