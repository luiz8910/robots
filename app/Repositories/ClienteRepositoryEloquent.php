<?php

namespace Admin\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Admin\Repositories\ClienteRepository;
use Admin\Models\Cliente;
use Admin\Validators\ClienteValidator;

/**
 * Class ClienteRepositoryEloquent
 * @package namespace Admin\Repositories;
 */
class ClienteRepositoryEloquent extends BaseRepository implements ClienteRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Cliente::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
