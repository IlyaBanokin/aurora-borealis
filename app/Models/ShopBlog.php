<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopBlog extends Model
{
    protected $fillable = // Какие поля формы сохрнанять
        [
            'title',
            'alias',
            'content',
            'description',
            'keywords',
            'img',
        ];
}
