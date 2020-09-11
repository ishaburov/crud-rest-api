<?php


namespace CrudRestApi\Traits;


use CrudRestApi\CrudValidator;
use Illuminate\Http\Request;

trait CrudStoreTrait
{

    public function store(Request $request): array
    {

        $this->setRequest($request);
        $this->validate(CrudValidator::VALIDATE_STORE);
        $this->setQuery();

        if (method_exists($this, 'saving')) {
            $this->saving();
        }

        $this->creating();

        $model = $this->query
            ->create($this->getData());

        if (method_exists($this, 'saved')) {
            $this->saved($model);
        }

        $this->created($model);

        return $this->getJson($model);
    }

    public function creating(): void
    {
    }

    public function created($model): void
    {
    }

}
