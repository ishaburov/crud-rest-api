<?php

namespace Shaburov\Crud\Interfaces;

use Illuminate\Http\Request;

interface CrudUpdateInterface
{
    function updating(): void;

    function update(Request $request, $id): array;

    function updated(): void;

}
