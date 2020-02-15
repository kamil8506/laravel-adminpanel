<?php

namespace App\Models\Test\Traits;

/**
 * Class TestAttribute.
 */
trait TestAttribute
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
                '.$this->getEditButtonAttribute("edit-test", "admin.tests.edit").'
                '.$this->getDeleteButtonAttribute("delete-test", "admin.tests.destroy").'
                </div>';
    }
}
