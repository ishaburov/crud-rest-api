<?php


namespace Shaburov\Crud\Traits;


use Shaburov\Crud\CrudValidator;
use Illuminate\Http\Request;

trait CrudIndexTrait
{

    public function index(Request $request)
    {
        $this->setRequest($request);
        if ($request->has('all')) {
            return $this->list();
        }
        $this->validate(CrudValidator::VALIDATE_INDEX);

        $perPage = $request->get('itemsPerPage', 25);

        $this->setState();

        $this->beforeIndex();

        $objects = $this->state
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
