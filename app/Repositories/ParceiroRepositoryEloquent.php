<?php

namespace admin\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use admin\Repositories\ParceiroRepository;
use admin\Models\Parceiro;
use admin\Validators\ParceiroValidator;

/**
 * Class ParceiroRepositoryEloquent
 * @package namespace admin\Repositories;
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
