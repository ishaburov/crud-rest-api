<?php


namespace CrudRestApi\Traits;


use CrudRestApi\CrudValidator;
use Illuminate\Http\Request;

trait CrudUpdateTrait
{

    public function update(Request $request, $id): array
    {
        $this->setRequest($request);
        $this->validate(CrudValidator::VALIDATE_UPDATE);
        $this->setQuery();


        if (method_exists($this, 'saving')) {
            $this->saving();
        }

        $this->updating();

        $model = $this->query
            ->find($id);

        if (!$model) {
            return $this->getJson([]);
        }
        $model->update($this->getData());

        if (method_exists($this, 'saved')) {
            $this->saved($model);
        }
        $this->updated($model);

        return $this->getJson($model);
    }

    public function updating(): void
    {
    }

    public function updated($model): void
    {
    }

}
