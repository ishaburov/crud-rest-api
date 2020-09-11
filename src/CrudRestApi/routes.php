<?php

use Illuminate\Support\Facades\Route;

$prefix = config('crud.prefix', '');
$namespace = config('crud.namespace', '');
$middleware = config('crud.middleware', []);

Route::prefix($prefix)
    ->namespace($namespace)
    ->middleware($middleware)
    ->group(function () {
        $routes = config('crud.routes', []);

        Route::apiResources($routes);
    });

