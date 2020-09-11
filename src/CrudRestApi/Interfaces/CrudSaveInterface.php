<?php

namespace CrudRestApi\Interfaces;

interface CrudSaveInterface
{
    function saving(): void;

    function saved($model): void;
}
