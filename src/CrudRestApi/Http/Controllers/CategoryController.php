<?php

namespace CrudRestApi\Http\Controllers;

use CrudRestApi\Http\Request\ArticleShowRequest;
use CrudRestApi\Http\Request\ArticleStoreRequest;
use CrudRestApi\Interfaces\CrudValidatorInterface;
use CrudRestApi\Models\Article;
use CrudRestApi\Models\Category;
use CrudRestApi\Repositories\ArticleRepository;
use CrudRestApi\Traits\CrudValidatorTrait;

class CategoryController extends AdminController
{
    public function setModelClass(): string
    {
        return Category::class;
    }
}
