<?php


namespace Shaburov\Crud;


use Illuminate\Http\Request;

class CrudValidator
{
    const VALIDATE_INDEX = 'validateIndex';
    const VALIDATE_LIST = 'validateList';
    const VALIDATE_UPDATE = 'validateUpdate';
    const VALIDATE_STORE = 'validateStore';
    const VALIDATE_DELETE = 'validateDelete';

    public function call(?string $validator): ?Request
    {
        if (!$validator) {
            return null;
        }
        
        $request = app($validator);

        if (!$request instanceof Request) {
            throw new \Exception('please use instanceof Request');
        }

        return $request;
    }
}
