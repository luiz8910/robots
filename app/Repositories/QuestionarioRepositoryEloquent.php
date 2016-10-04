<?php

namespace Admin\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Admin\Repositories\QuestionarioRepository;
use Admin\Models\Questionario;
use Admin\Validators\QuestionarioValidator;

/**
 * Class QuestionarioRepositoryEloquent
 * @package namespace Admin\Repositories;
 */
class QuestionarioRepositoryEloquent extends BaseRepository implements QuestionarioRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Questionario::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
