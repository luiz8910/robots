<?php

namespace Admin\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Admin\Repositories\QuemSomosRepository;
use Admin\Models\QuemSomos;
use Admin\Validators\QuemSomosValidator;

/**
 * Class QuemSomosRepositoryEloquent
 * @package namespace Admin\Repositories;
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
