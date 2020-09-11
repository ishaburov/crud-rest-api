<?php


namespace CrudRestApi\Repositories;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use CrudRestApi\Http\Resource\ArticleIndexResource;

class ArticleRepository
{
    public function index(Builder $state): void
    {
        $state->select([
            'id',
            'title',
            'category_id',
        ])->with('category:id,title');
    }

    public function show(Builder $state): void
    {
        $state->select([
            'id',
            'title',
            'description',
            'category_id',
            'created_at',
        ])->with('category:id,title');
    }

    public function transformPaginate(LengthAwarePaginator $pagination): void
    {
        $pagination->getCollection()
            ->transform(function ($item) {
                return new ArticleIndexResource($item);
            });
    }
}
