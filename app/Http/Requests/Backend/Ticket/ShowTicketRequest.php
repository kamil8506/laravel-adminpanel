<?php

namespace App\Http\Requests\Backend\Ticket;

use App\Http\Requests\Request;

/**
 * Class ShowTicketRequest.
 */
class ShowTicketRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('show-ticket');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
