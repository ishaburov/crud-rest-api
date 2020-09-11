<?php

namespace CrudRestApi\Interfaces;

interface CrudListInterface
{
    function beforeList();

    function list();

    function afterList($objects);
}
