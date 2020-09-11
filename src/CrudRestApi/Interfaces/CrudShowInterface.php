<?php

namespace CrudRestApi\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

interface CrudShowInterface
{
    function beforeShow();

    function show(Request $request, $id);

    function afterShow(Model $model);
}
