<?php

namespace admin\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use admin\Repositories\institucionalRepository;
use admin\Models\Institucional;
use admin\Validators\InstitucionalValidator;

/**
 * Class InstitucionalRepositoryEloquent
 * @package namespace admin\Repositories;
 */
class InstitucionalRepositoryEloquent extends BaseRepository implements InstitucionalRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Institucional::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
