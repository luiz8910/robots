<?php

namespace admin\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use admin\Repositories\QuemSomosRepository;
use admin\Models\QuemSomos;
use admin\Validators\QuemSomosValidator;

/**
 * Class QuemSomosRepositoryEloquent
 * @package namespace admin\Repositories;
 */
class QuemSomosRepositoryEloquent extends BaseRepository implements QuemSomosRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return QuemSomos::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
