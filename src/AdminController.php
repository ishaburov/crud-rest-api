<?php


namespace Shaburov\Crud;


use Shaburov\Crud\CRUDController;
use Shaburov\Crud\Interfaces\CrudDestroyInterface;
use Shaburov\Crud\Interfaces\CrudIndexInterface;
use Shaburov\Crud\Interfaces\CrudListInterface;
use Shaburov\Crud\Interfaces\CrudRestoreInterface;
use Shaburov\Crud\Interfaces\CrudSaveInterface;
use Shaburov\Crud\Interfaces\CrudShowInterface;
use Shaburov\Crud\Interfaces\CrudStoreInterface;
use Shaburov\Crud\Interfaces\CrudUpdateInterface;
use Shaburov\Crud\Traits\CrudDestroyTrait;
use Shaburov\Crud\Traits\CrudIndexTrait;
use Shaburov\Crud\Traits\CrudListTrait;
use Shaburov\Crud\Traits\CrudRestoreTrait;
use Shaburov\Crud\Traits\CrudSaveTrait;
use Shaburov\Crud\Traits\CrudShowTrait;
use Shaburov\Crud\Traits\CrudStoreTrait;
use Shaburov\Crud\Traits\CrudUpdateTrait;

abstract class AdminController extends CRUDController implements
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

    abstract function setModelClass();


}
