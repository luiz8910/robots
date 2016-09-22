<?php

namespace Admin\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Admin\Repositories\institucionalRepository;
use Admin\Models\Institucional;
use Admin\Validators\InstitucionalValidator;

/**
 * Class InstitucionalRepositoryEloquent
 * @package namespace Admin\Repositories;
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
