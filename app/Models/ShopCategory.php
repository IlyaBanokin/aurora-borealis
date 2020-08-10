<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopCategory extends Model
{
    protected $fillable = // Какие поля формы сохрнанять
        [
            'title',
            'alias',
            'excerpt',
            'description',
            'keywords',
            'img',
        ];

    /**
     * Получаем связь с продуктами категории.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(ShopProduct::class,'category_id', 'id');
    }
}
