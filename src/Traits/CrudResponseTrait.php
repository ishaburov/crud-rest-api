<?php


namespace Shaburov\Crud\Traits;


trait CrudResponseTrait
{
    public function getJson($data = [], $errors = null)
    {
        $result = [
            'status' => empty($errors),
            'data' => $data,
        ];

        if (!empty($errors)) {
            $result['errors'] = $errors;
        }

        return $result;
    }

    public function getJsonPaginate($paginate, $errors = null)
    {
        $data = [
            'items' => $paginate->items(),
            'meta' => [
                'page' => (int) $paginate->currentPage(),
                'last_page' => (int) $paginate->lastPage(),
                'per_page' => (int) $paginate->perPage(),
                'total' => (int) $paginate->total(),
            ],
        ];

        return $this->getJson($data, $errors);
    }

}
