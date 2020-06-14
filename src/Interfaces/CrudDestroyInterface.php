<?php


namespace Shaburov\Crud\Interfaces;


use Illuminate\Http\Request;

interface CrudDestroyInterface
{
    function deleting(): void;

    function destroy(Request $request, $id): array;

    function deleted(): void;
}
