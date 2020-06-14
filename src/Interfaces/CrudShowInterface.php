<?php

namespace Shaburov\Crud\Interfaces;

use Illuminate\Http\Request;

interface CrudShowInterface
{
    function beforeShow();

    function show(Request $request, $id);

    function afterShow();
}
