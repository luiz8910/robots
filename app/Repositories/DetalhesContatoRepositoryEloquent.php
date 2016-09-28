<?php

namespace Admin\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Admin\Repositories\detalhes_contatoRepository;
use Admin\Models\DetalhesContato;
use Admin\Validators\DetalhesContatoValidator;

/**
 * Class DetalhesContatoRepositoryEloquent
 * @package namespace Admin\Repositories;
 */
class DetalhesContatoRepositoryEloquent extends BaseRepository implements DetalhesContatoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return DetalhesContato::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
