<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopProduct extends Model
{
    protected $fillable = // Какие поля формы сохрнанять
        [
            'title',
            'alias',
            'excerpt',
            'content',
            'price',
            'old_price',
            'category_id',
            'description',
            'keywords',
            'img',
        ];

    /**
     * Получаем связь с родительской категории
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(ShopCategory::class);
    }
}
