<?php

namespace App\Repositories\Backend\Abcd;

use DB;
use Carbon\Carbon;
use App\Models\Abcd\Abcd;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AbcdRepository.
 */
class AbcdRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Abcd::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('module.abcds.table').'.id',
                config('module.abcds.table').'.created_at',
                config('module.abcds.table').'.updated_at',
            ]);
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
        if (Abcd::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.abcds.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Abcd $abcd
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Abcd $abcd, array $input)
    {
    	if ($abcd->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.abcds.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Abcd $abcd
     * @throws GeneralException
     * @return bool
     */
    public function delete(Abcd $abcd)
    {
        if ($abcd->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.abcds.delete_error'));
    }
}
