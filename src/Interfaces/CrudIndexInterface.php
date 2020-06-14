<?php

namespace Shaburov\Crud\Interfaces;

use Illuminate\Http\Request;

interface CrudIndexInterface
{
    function beforeIndex();

    function index(Request $request);

    function afterIndex();
}
