<?php


namespace Shaburov\Crud\Traits;


use Shaburov\Crud\CrudValidator;

trait CrudListTrait
{
    public function list()
    {
        $this->validate(CrudValidator::VALIDATE_LIST);
        $this->setState();
        $this->beforeList();
        
        $objects = $this->state->get();
        
        $this->afterList($objects);

        return $this->getJson($objects);
    }

    public function beforeList()
    {
    }

    public function afterList()
    {
    }

}
