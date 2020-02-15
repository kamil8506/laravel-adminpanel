<?php

namespace App\Repositories\Backend\Abc;

use DB;
use Carbon\Carbon;
use App\Models\Abc\Abc;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AbcRepository.
 */
class AbcRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Abc::class;

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
                config('module.abcs.table').'.id',
                config('module.abcs.table').'.created_at',
                config('module.abcs.table').'.updated_at',
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
        if (Abc::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.abcs.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Abc $abc
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Abc $abc, array $input)
    {
    	if ($abc->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.abcs.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Abc $abc
     * @throws GeneralException
     * @return bool
     */
    public function delete(Abc $abc)
    {
        if ($abc->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.abcs.delete_error'));
    }
}
