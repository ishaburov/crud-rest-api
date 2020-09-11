<?php


namespace CrudRestApi\Traits;


use Illuminate\Database\Eloquent\Model;
use CrudRestApi\CrudValidator;
use Illuminate\Http\Request;

trait CrudShowTrait
{
    public function show(Request $request, $id)
    {
        $this->setRequest($request);
        $this->validate(CrudValidator::VALIDATE_SHOW);
        $this->setQuery();

        $this->beforeShow();

        $model = $this->query
            ->find($id);

        if (!$model) {
            return $this->getJson([]);
        }

        $this->afterShow($model);

        return $this->getJson($model);
    }

    public function beforeShow()
    {
    }

    public function afterShow(Model $model)
    {
    }
}
