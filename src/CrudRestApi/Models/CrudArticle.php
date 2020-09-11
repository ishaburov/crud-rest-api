<?php

namespace CrudRestApi\Models;

use Illuminate\Database\Eloquent\Model;

class CrudArticle extends Model
{
    protected $fillable = [
        'title',
        'description',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(CrudCategory::class);
    }
}
