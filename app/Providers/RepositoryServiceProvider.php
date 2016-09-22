<?php

namespace Admin\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Admin\Repositories\UserRepository',
            'Admin\Repositories\UserRepositoryEloquent'
        );

        $this->app->bind('Admin\Repositories\ServicoRepository',
            'Admin\Repositories\ServicoRepositoryEloquent'
        );

        $this->app->bind('Admin\Repositories\ClienteRepository',
            'Admin\Repositories\ClienteRepositoryEloquent'
        );

        $this->app->bind('Admin\Repositories\QuemSomosRepository',
            'Admin\Repositories\QuemSomosRepositoryEloquent'
        );

        $this->app->bind('Admin\Repositories\InstitucionalRepository',
            'Admin\Repositories\InstitucionalRepositoryEloquent'
        );

        $this->app->bind('Admin\Repositories\EquipeRepository',
            'Admin\Repositories\EquipeRepositoryEloquent'
        );

        $this->app->bind('Admin\Repositories\ParceiroRepository',
            'Admin\Repositories\ParceiroRepositoryEloquent'
        );

        $this->app->bind('Admin\Repositories\NewsletterRepository',
            'Admin\Repositories\NewsletterRepositoryEloquent'
        );
    }
}

