<?php


namespace CrudRestApi;


use CrudRestApi\Console\MigrationCommand;
use CrudRestApi\Console\TestCommand;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;


class CrudServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->publishes([
            Path::configPath()."/crud.php" => config_path('crud.php'),
        ]);

        if (config('crud.load_routes', false) || App::environment('testing')) {
            $this->loadRoutesFrom(__DIR__.'/routes.php');
        }

        if ($this->app->runningInConsole()) {
            $this->commands([
                MigrationCommand::class,
                TestCommand::class
            ]);
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(Path::configPath()."/crud.php", 'crud');
    }
}
