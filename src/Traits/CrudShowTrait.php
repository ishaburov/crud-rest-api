<?php


namespace Shaburov\Crud\Traits;


use Shaburov\Crud\CrudValidator;
use Illuminate\Http\Request;

trait CrudShowTrait
{
    public function show(Request $request, $id)
    {
        $this->setRequest($request);
        $this->validate(CrudValidator::VALIDATE_INDEX);
        $this->setState();

        $this->beforeShow();

        $object = $this->state->find($id);

        $this->afterShow();

        return $this->getJson($object);
    }

    public function beforeShow()
    {
    }

    public function afterShow()
    {
    }
}
