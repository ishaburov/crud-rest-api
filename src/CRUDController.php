<?php

namespace Shaburov\Crud;

use Illuminate\Routing\Controller as BaseController;
use Shaburov\Crud\Traits\CrudDefaultsTrait;
use Shaburov\Crud\Traits\CrudResponseTrait;



abstract class CRUDController extends BaseController
{
    use CrudDefaultsTrait,
        CrudResponseTrait;

    public function __construct()
    {
        $this->initialisation();
    }
  
}
