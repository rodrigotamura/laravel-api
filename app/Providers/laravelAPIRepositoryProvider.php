<?php

namespace laravelAPI\Providers;

use Illuminate\Support\ServiceProvider;

class laravelAPIRepositoryProvider extends ServiceProvider
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
        $this->app->bind(
            \laravelAPI\Repositories\ClientRepository::class,
            \laravelAPI\Repositories\ClientRepositoryEloquent::class
        );
        $this->app->bind(
            \laravelAPI\Repositories\ProjectRepository::class,
            \laravelAPI\Repositories\ProjectRepositoryEloquent::class
        );
        $this->app->bind(
            \laravelAPI\Repositories\ProjectNoteRepository::class,
            \laravelAPI\Repositories\ProjectNoteRepositoryEloquent::class
        );
    }
}
