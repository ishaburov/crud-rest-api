<?php


namespace CrudRestApi\Http\Request;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use CrudRestApi\Models\CrudArticle;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use function PHPUnit\Framework\throwException;

class ArticleShowRequest extends FormRequest
{
    public function rules()
    {
        $articleId = $this->route('article');

        if (!CrudArticle::where('id', $articleId)->exists()) {
            throw new NotFoundHttpException();
        }

        return [];
    }

}
