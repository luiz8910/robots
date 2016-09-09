<?php

namespace Admin\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Admin\Repositories\EquipeRepository;
use Admin\Models\Equipe;
use Admin\Validators\EquipeValidator;

/**
 * Class EquipeRepositoryEloquent
 * @package namespace Admin\Repositories;
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
