<?php

namespace App\Repositories\Backend\Ticket;

use DB;
use Carbon\Carbon;
use App\Models\TicketReplies\TicketReply;
use App\Models\Ticket\Ticket;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class TicketRepository.
 */
class TicketRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
	protected $status = [
        'Open' => 'Open Ticket',
        'Close' => 'Close Ticket',
        'OnHold' => 'OnHold',
    ];
	
    const MODEL = Ticket::class;
   
	protected $upload_path;
	
	protected $replymodel;
	/**
	* Storage Class Object.
     *
     * @var \Illuminate\Support\Facades\Storage
     */
    protected $storage;

    public function __construct(TicketReply $replymodel)
    {
		$this->replymodel = $replymodel;
        $this->upload_path = 'img'.DIRECTORY_SEPARATOR.'ticket'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }
	
    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
		 ->leftjoin(config('access.users_table'), config('access.users_table').'.id', '=', config('module.tickets.table').'.created_by')
            ->select([
                config('module.tickets.table').'.id',
                config('module.tickets.table').'.ticketnum',
                config('module.tickets.table').'.subject',
                config('module.tickets.table').'.message',
                config('module.tickets.table').'.created_by',
                config('module.tickets.table').'.ticket_document',
                config('module.tickets.table').'.status',
                config('module.tickets.table').'.created_at',
                config('module.tickets.table').'.updated_at',
				config('access.users_table').'.first_name as user_name',
            ]);
    }
	public function getTickets($ticketid)
    {
        return $this->query()
		 ->leftjoin(config('access.users_table'), config('access.users_table').'.id', '=', config('module.tickets.table').'.created_by')
		  ->leftJoin('role_user', 'role_user.user_id', '=', 'users.id')
            ->leftJoin('roles', 'role_user.role_id', '=', 'roles.id')
            ->select([
                config('module.tickets.table').'.id',
                config('module.tickets.table').'.ticketnum',
                config('module.tickets.table').'.subject',
                config('module.tickets.table').'.message',
                config('module.tickets.table').'.created_by',
                config('module.tickets.table').'.ticket_document',
                config('module.tickets.table').'.status',
                config('module.tickets.table').'.created_at',
                config('module.tickets.table').'.updated_at',
				config('access.users_table').'.first_name',
				config('access.users_table').'.last_name',
				'roles.name as roles',
            ])->where(config('module.tickets.table').'.id', $ticketid)->first();
    }
	
	public function getReplyTicket($ticketid)
    {
        return $this->replymodel->query()
		 ->leftjoin(config('access.users_table'), config('access.users_table').'.id', '=', config('module.ticket_replies.table').'.created_by')
		  ->leftJoin('role_user', 'role_user.user_id', '=', 'users.id')
            ->leftJoin('roles', 'role_user.role_id', '=', 'roles.id')
            ->select([
                config('module.ticket_replies.table').'.id',
                config('module.ticket_replies.table').'.ticketnum',
                config('module.ticket_replies.table').'.subject',
                config('module.ticket_replies.table').'.message',
                config('module.ticket_replies.table').'.created_by',
                config('module.ticket_replies.table').'.ticket_document',
                config('module.ticket_replies.table').'.status',
                config('module.ticket_replies.table').'.created_at',
                config('module.ticket_replies.table').'.updated_at',
				config('access.users_table').'.first_name',
				config('access.users_table').'.last_name',
				'roles.name as roles',
            ])->where(config('module.ticket_replies.table').'.ticket_id', $ticketid)->get();
    }

    /**
     * For Creating the respective model in storage
     *
     * @param array $input
     * @throws GeneralException
     * @return bool
     */
    public function create(array $input)
    {
		$input = $this->uploadImage($input);
		$input['created_by'] = access()->user()->id;
		$ticket = Ticket::create($input);
        if ($ticket) {
			$insertedId = $ticket->id;
			$num_padded = sprintf("%06d", $insertedId);
			$ticket_num = '#TCK-'.$num_padded;
			
			DB::table('tickets')
              ->where('id', $insertedId)
              ->update(['ticketnum' => $ticket_num]);
			  
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.tickets.create_error'));
    }
	  public function createreply(array $input)
    {
		$input = $this->uploadImage($input);
		$input['created_by'] = access()->user()->id;
		$ticket = TicketReply::create($input);
        if ($ticket) {
			$mstatus = $input['status'];
			$ticketid = $input['ticket_id'];
			DB::table('tickets')
              ->where('id', $ticketid)
              ->update(['status' => $mstatus]);
			  
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.tickets.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Ticket $ticket
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Ticket $ticket, array $input)
    {
    	if ($ticket->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.tickets.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Ticket $ticket
     * @throws GeneralException
     * @return bool
     */
    public function delete(Ticket $ticket)
    {
        if ($ticket->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.tickets.delete_error'));
    }
	
	    public function uploadImage($input)
    {
       

        if (isset($input['ticket_document']) && !empty($input['ticket_document'])) {
			$avatar = $input['ticket_document'];
            $fileName = time().$avatar->getClientOriginalName();

            $this->storage->put($this->upload_path.$fileName, file_get_contents($avatar->getRealPath()));

            $input = array_merge($input, ['ticket_document' => $fileName]);
		}
		return $input;
    }
}
