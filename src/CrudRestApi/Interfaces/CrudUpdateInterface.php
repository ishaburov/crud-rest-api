<?php

namespace CrudRestApi\Interfaces;

use Illuminate\Http\Request;

interface CrudUpdateInterface
{
    function updating(): void;

    function update(Request $request, $id): array;

    function updated($model): void;

}
