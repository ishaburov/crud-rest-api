<?php


namespace CrudRestApi\Http\Request;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use CrudRestApi\Models\Article;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use function PHPUnit\Framework\throwException;

class ArticleShowRequest extends FormRequest
{
    public function rules()
    {
        $articleId = $this->route('article');

        if (!Article::where('id', $articleId)->exists()) {
            throw new NotFoundHttpException();
        }

        return [];
    }

}
