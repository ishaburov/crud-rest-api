<?php

namespace CrudRestApi\Interfaces;

use Illuminate\Http\Request;

interface CrudRestoreInterface
{
    function beforeRestore();

    function restore(Request $request, $id);

    function afterRestore();
}
