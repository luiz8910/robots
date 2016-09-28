<?php

namespace Admin\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Admin\Repositories\ContatoRepository;
use Admin\Models\Contato;
use Admin\Validators\ContatoValidator;

/**
 * Class ContatoRepositoryEloquent
 * @package namespace Admin\Repositories;
 */
class ContatoRepositoryEloquent extends BaseRepository implements ContatoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Contato::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
