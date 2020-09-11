<?php


namespace CrudRestApi\Interfaces;


use Illuminate\Http\Request;

interface CrudDestroyInterface
{
    function deleting($model): void;

    function destroy(Request $request, $id): array;

    function deleted($model): void;
}
