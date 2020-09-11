<?php


namespace CrudRestApi\Http\Controllers;

use CrudRestApi\Interfaces\CrudDestroyInterface;
use CrudRestApi\Interfaces\CrudIndexInterface;
use CrudRestApi\Interfaces\CrudListInterface;
use CrudRestApi\Interfaces\CrudRestoreInterface;
use CrudRestApi\Interfaces\CrudSaveInterface;
use CrudRestApi\Interfaces\CrudShowInterface;
use CrudRestApi\Interfaces\CrudStoreInterface;
use CrudRestApi\Interfaces\CrudUpdateInterface;
use CrudRestApi\Traits\CrudDestroyTrait;
use CrudRestApi\Traits\CrudIndexTrait;
use CrudRestApi\Traits\CrudListTrait;
use CrudRestApi\Traits\CrudRestoreTrait;
use CrudRestApi\Traits\CrudSaveTrait;
use CrudRestApi\Traits\CrudShowTrait;
use CrudRestApi\Traits\CrudStoreTrait;
use CrudRestApi\Traits\CrudUpdateTrait;

abstract class AdminController extends CrudController implements
    CrudSaveInterface, CrudIndexInterface,
    CrudStoreInterface, CrudListInterface,
    CrudUpdateInterface, CrudDestroyInterface,
    CrudRestoreInterface, CrudShowInterface
{
    use CrudListTrait,
        CrudIndexTrait,
        CrudStoreTrait,
        CrudIndexTrait,
        CrudUpdateTrait,
        CrudRestoreTrait,
        CrudDestroyTrait,
        CrudSaveTrait,
        CrudShowTrait;

    abstract public function setModelClass(): string;


}
