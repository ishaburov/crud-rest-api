<?php

namespace Shaburov\Crud\Interfaces;

interface CrudListInterface
{
    function beforeList();

    function list();

    function afterList();
}
