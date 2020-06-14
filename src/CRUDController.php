<?php

namespace Shaburov\Crud;

use Shaburov\Crud\Traits\CrudDefaultsTrait;
use Shaburov\Crud\Traits\CrudResponseTrait;

abstract class CRUDController extends Controller
{
    use CrudDefaultsTrait,
        CrudResponseTrait;

    public function __construct()
    {
        $this->initialisation();
    }

}
