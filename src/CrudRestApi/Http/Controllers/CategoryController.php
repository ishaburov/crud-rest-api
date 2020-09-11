<?php

namespace CrudRestApi\Http\Controllers;

use CrudRestApi\Http\Request\ArticleShowRequest;
use CrudRestApi\Http\Request\ArticleStoreRequest;
use CrudRestApi\Interfaces\CrudValidatorInterface;
use CrudRestApi\Models\CrudArticle;
use CrudRestApi\Models\CrudCategory;
use CrudRestApi\Repositories\ArticleRepository;
use CrudRestApi\Traits\CrudValidatorTrait;

class CategoryController extends CrudBaseController
{
    public function setModelClass(): string
    {
        return CrudCategory::class;
    }
}
