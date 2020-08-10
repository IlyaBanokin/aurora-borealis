<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopMenu extends Model
{
    protected $fillable = // Какие поля формы сохрнанять
        [
            'title',
            'path',
            'img',
        ];
}
