<?php

namespace admin\Providers;

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
        $this->app->bind('admin\Repositories\UserRepository',
            'admin\Repositories\UserRepositoryEloquent'
        );

        $this->app->bind('admin\Repositories\ServicoRepository',
            'admin\Repositories\ServicoRepositoryEloquent'
        );

        $this->app->bind('admin\Repositories\ClienteRepository',
            'admin\Repositories\ClienteRepositoryEloquent'
        );

        $this->app->bind('admin\Repositories\QuemSomosRepository',
            'admin\Repositories\QuemSomosRepositoryEloquent'
        );

        $this->app->bind('admin\Repositories\InstitucionalRepository',
            'admin\Repositories\InstitucionalRepositoryEloquent'
        );

        $this->app->bind('admin\Repositories\EquipeRepository',
            'admin\Repositories\EquipeRepositoryEloquent'
        );

        $this->app->bind('admin\Repositories\ParceiroRepository',
            'admin\Repositories\ParceiroRepositoryEloquent'
        );
    }
}

