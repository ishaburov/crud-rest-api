<?php

use Illuminate\Support\Facades\Route;


Route::prefix('api')
    ->namespace('CrudRestApi\Http\Controllers')
    ->group(function () {
        Route::apiResources([
            'articles' => 'ArticleController',
            'categories' => 'CategoryController',
        ]);
    });

