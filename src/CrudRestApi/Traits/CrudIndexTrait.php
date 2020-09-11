<?php


namespace CrudRestApi\Traits;


use CrudRestApi\CrudValidator;
use Illuminate\Http\Request;

trait CrudIndexTrait
{
    private function getPerPage(): string
    {
        $perPageKey = config('crud.per_page.key', 'per_page');
        $perPageCount = $this->request->get($perPageKey, config('crud.per_page.value', 25));
        $maxPerPage = config('crud.per_page.limit', 100);


        if ($maxPerPage < $perPageCount) {
            $perPageCount = $maxPerPage;
        }

        return $perPageCount;
    }


    public function index(Request $request)
    {
        $this->setRequest($request);
        if ($request->has('list')) {
            return $this->list();
        }
        $this->validate(CrudValidator::VALIDATE_INDEX);

        $perPage = $this->getPerPage();

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
