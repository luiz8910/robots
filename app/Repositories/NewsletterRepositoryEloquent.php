<?php

namespace Admin\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Admin\Repositories\NewsletterRepository;
use Admin\Models\Newsletter;
use Admin\Validators\NewsletterValidator;

/**
 * Class NewsletterRepositoryEloquent
 * @package namespace Admin\Repositories;
 */
class NewsletterRepositoryEloquent extends BaseRepository implements NewsletterRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Newsletter::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
