<?php

namespace Admin\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Admin\Repositories\ServicoRepository;
use Admin\Models\Servico;
use Admin\Validators\ServicoValidator;

/**
 * Class ServicoRepositoryEloquent
 * @package namespace Admin\Repositories;
 */
class ServicoRepositoryEloquent extends BaseRepository implements ServicoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Servico::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
