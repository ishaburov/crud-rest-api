<?php

namespace CrudRestApi\Http\Controllers;

use CrudRestApi\Http\Request\ArticleShowRequest;
use CrudRestApi\Http\Request\ArticleStoreRequest;
use CrudRestApi\Interfaces\CrudValidatorInterface;
use CrudRestApi\Models\Article;
use CrudRestApi\Repositories\ArticleRepository;
use CrudRestApi\Traits\CrudValidatorTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ArticleController extends CrudBaseController implements CrudValidatorInterface
{
    use CrudValidatorTrait;

    protected ArticleRepository $articleRepository;

    public function __construct()
    {
        parent::__construct();
        $this->articleRepository = app(ArticleRepository::class);
    }

    public function setValidations(): void
    {
        $this->validateShow = ArticleShowRequest::class;
        $this->validateStore = ArticleStoreRequest::class;
    }

    public function setModelClass(): string
    {
        return Article::class;
    }

    public function updating(): void
    {
        $this->requestData['title'] = Str::lower($this->requestData['title']);
    }

    public function creating(): void
    {
        $this->requestData['title'] = Str::upper($this->requestData['title']);
    }

    public function saving(): void
    {
        $this->requestData['title'] = Str::lower($this->requestData['title']);
    }

    public function created($model): void
    {
        $model->title = Hash::make($model->title);
        $model->save();
    }

    public function updated($model): void
    {
        $model->title = Hash::make($model->title);
        $model->save();
    }

    public function saved($model): void
    {
        $model->title = Hash::make($model->title);
        $model->save();
    }

    public function beforeIndex()
    {
        $this->articleRepository
            ->index($this->query);
    }

    public function beforeShow()
    {
        $this->articleRepository
            ->show($this->query);
    }

    public function afterIndex()
    {
        $this->articleRepository
            ->transformPaginate($this->pagination);
    }

}
