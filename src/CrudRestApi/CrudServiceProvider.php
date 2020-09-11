<?php


namespace CrudRestApi;


use Illuminate\Support\ServiceProvider;

class CrudServiceProvider extends ServiceProvider
{
    public function boot()
    {
        include __DIR__.'/routes.php';

        $this->publishes([
            __DIR__.'/config/crud.php' => config_path('crud.php'),
        ]);
        $this->loadMigrationsFrom(__DIR__.'/migrations');

    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/crud.php', 'crud');
    }
}
