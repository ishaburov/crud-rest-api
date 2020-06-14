<?php

namespace Shaburov\Crud\Interfaces;

use Illuminate\Http\Request;

interface CrudStoreInterface
{
    function creating(): void;

    function store(Request $request): array;

    function created(): void;

}
