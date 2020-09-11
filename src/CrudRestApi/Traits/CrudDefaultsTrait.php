<?php

namespace CrudRestApi\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use CrudRestApi\CrudValidator;
use CrudRestApi\Interfaces\CrudValidatorInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

trait CrudDefaultsTrait
{
    protected string $modelClass;
    private Model $model;
    protected ?Builder $query = null;
    protected Request $request;
    private CrudValidator $validator;
    public ?Collection $requestData = null;
    public ?LengthAwarePaginator $pagination = null;

    abstract public function setModelClass(): string;

    private function initialisation(): self
    {
        $this->modelClass = $this->setModelClass();
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

    protected function getModel(): Model
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

    public function setQuery($query = null)
    {
        $this->query = !$this->query
            ? $this->getModel()->newModelQuery()
            : $query ?? $this->query;

        return $this;
    }

    public function getData()
    {
        return $this->requestData
            ->whereNotNull()
            ->toArray();
    }

}
