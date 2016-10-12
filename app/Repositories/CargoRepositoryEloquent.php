<?php

namespace Admin\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Admin\Repositories\CargoRepository;
use Admin\Models\Cargo;
use Admin\Validators\CargoValidator;

/**
 * Class CargoRepositoryEloquent
 * @package namespace Admin\Repositories;
 */
class CargoRepositoryEloquent extends BaseRepository implements CargoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Cargo::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
