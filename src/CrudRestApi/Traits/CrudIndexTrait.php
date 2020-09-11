<?php


namespace CrudRestApi\Traits;


use CrudRestApi\CrudValidator;
use Illuminate\Http\Request;

trait CrudIndexTrait
{

    public function index(Request $request)
    {
        $this->setRequest($request);
        if ($request->has('list')) {
            return $this->list();
        }
        $this->validate(CrudValidator::VALIDATE_INDEX);

        $perPage = $request->get('per_page', 25);

        $this->setQuery();

        $this->beforeIndex();

        $objects = $this->query
            ->paginate($perPage);

        $this->pagination = $objects;

        $this->afterIndex();

        return $this->getJsonPaginate($this->pagination);
    }

    public function beforeIndex()
    {
    }

    public function afterIndex()
    {
    }
}
