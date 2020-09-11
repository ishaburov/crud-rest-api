<?php

namespace CrudRestApi\Interfaces;

use Illuminate\Http\Request;

interface CrudStoreInterface
{
    function creating(): void;

    function store(Request $request): array;

    function created($model): void;

}
