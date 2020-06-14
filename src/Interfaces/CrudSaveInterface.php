<?php

namespace Shaburov\Crud\Interfaces;

interface CrudSaveInterface
{
    function saving(): void;

    function saved(): void;
}
