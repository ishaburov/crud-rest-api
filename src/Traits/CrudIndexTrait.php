<?php


namespace Shaburov\Crud\Traits;


use Shaburov\Crud\CrudValidator;
use Illuminate\Http\Request;

trait CrudIndexTrait
{

    public function index(Request $request)
    {
        if ($request->has('all')) {
            return $this->list();
        }
        $this->setRequest($request);
        $this->validate(CrudValidator::VALIDATE_INDEX);

        $perPage = $request->get('itemsPerPage', 25);

        $this->setState();

        $this->beforeIndex();

        $objects = $this->state
            ->paginate($perPage);

        $this->afterIndex();

        return $this->getJsonPaginate($objects);
    }

    public function beforeIndex()
    {
    }

    public function afterIndex()
    {
    }
}
