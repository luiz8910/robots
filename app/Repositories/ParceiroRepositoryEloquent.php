<?php

namespace Admin\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Admin\Repositories\ParceiroRepository;
use Admin\Models\Parceiro;
use Admin\Validators\ParceiroValidator;

/**
 * Class ParceiroRepositoryEloquent
 * @package namespace Admin\Repositories;
 */
class ParceiroRepositoryEloquent extends BaseRepository implements ParceiroRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Parceiro::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
