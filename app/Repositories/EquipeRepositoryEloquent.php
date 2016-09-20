<?php

namespace admin\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use admin\Repositories\EquipeRepository;
use admin\Models\Equipe;
use admin\Validators\EquipeValidator;

/**
 * Class EquipeRepositoryEloquent
 * @package namespace admin\Repositories;
 */
class EquipeRepositoryEloquent extends BaseRepository implements EquipeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Equipe::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
