<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopItemProduct extends Model
{
    /**
     * Связь с таблице продуктов.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(ShopProduct::class);
    }
}
