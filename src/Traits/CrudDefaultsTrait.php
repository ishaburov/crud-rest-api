<?php

namespace Shaburov\Crud\Traits;

use Shaburov\Crud\CrudValidator;
use Shaburov\Crud\Interfaces\CrudValidatorInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

trait CrudDefaultsTrait
{
    protected string $modelClass;
    private Model $model;
    /*** @var Model */
    protected $state;
    protected Request $request;
    private CrudValidator $validator;
    public ?Collection $requestData = null;

    abstract function setModelClass();

    private function initialisation(): self
    {
        $this->setModelClass();
        if (empty($this->modelClass)) {
            throw  new \Exception('empty parameter modelClass');
        }
        $this->model = app($this->modelClass);

        if (method_exists($this, 'setValidations')) {
            $this->setValidations();
            $this->validator = app(CrudValidator::class);
        }

        return $this;
    }

    protected function setRequest(Request $request): self
    {
        $this->request = $request;
        $this->requestData = new Collection($request->all());

        return $this;
    }

    protected function getModel(): model
    {
        return $this->model;
    }

    protected function validate($property): void
    {
        if (!$this instanceof CrudValidatorInterface) {
            return;
        }
        if (!property_exists($this, $property)) {
            return;
        }
        $request = $this->validator
            ->call($this->$property);

        if (!$request) {
            return;
        }
        $this->request = $request;
        $this->requestData = new Collection($this->request->validated());
    }

    public function setState($state = null)
    {
        $this->state = !$this->state
            ? $this->getModel()
            : $state ?? $this->state;

        return $this;
    }

    public function getData()
    {
        return $this->requestData
            ->whereNotNull()
            ->toArray();
    }

}
