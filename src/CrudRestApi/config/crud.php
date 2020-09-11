<?php

return [
    'prefix' => 'api',
    'namespace' => 'CrudRestApi\Http\Controllers',
    'middleware' => [],
    'routes' => [
        'articles' => 'ArticleController',
        'categories' => 'CategoryController',
    ],
];
