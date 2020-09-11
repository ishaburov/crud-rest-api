<?php


namespace CrudRestApi\Traits;


use Illuminate\Database\Eloquent\Model;

trait CrudSaveTrait
{
    public function saving(): void
    {
    }

    public function saved($model): void
    {
    }
}
