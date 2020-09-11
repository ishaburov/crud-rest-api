<?php


namespace CrudRestApi\Http\Request;


use Illuminate\Foundation\Http\FormRequest;

class ArticleStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'exists:categories,id',
        ];
    }
}
