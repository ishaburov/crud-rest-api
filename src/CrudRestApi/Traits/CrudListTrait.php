<?php


namespace CrudRestApi\Traits;


use CrudRestApi\CrudValidator;

trait CrudListTrait
{
    public function list()
    {
        $this->validate(CrudValidator::VALIDATE_LIST);
        $this->setQuery();
        $this->beforeList();

        $objects = $this->query->get();

        $this->afterList($objects);

        return $this->getJson($objects);
    }

    public function beforeList()
    {
    }

    public function afterList($objects)
    {
    }

}
