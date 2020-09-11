<?php

namespace CrudRestApi\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use CrudRestApi\Traits\CrudDefaultsTrait;
use CrudRestApi\Traits\CrudResponseTrait;


abstract class CrudController extends BaseController
{
    use CrudDefaultsTrait,
        CrudResponseTrait;

    public function __construct()
    {
        $this->initialisation();
    }

}
