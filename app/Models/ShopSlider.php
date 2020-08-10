<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopSlider extends Model
{
    protected $fillable = // Какие поля формы сохрнанять
        [
            'title',
            'description',
            'img',
        ];
}
