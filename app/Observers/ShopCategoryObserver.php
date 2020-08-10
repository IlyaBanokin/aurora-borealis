<?php

namespace App\Observers;

use App\Models\ShopCategory;
use Str;

class ShopCategoryObserver
{
    /**
     * @param  ShopCategory  $shopCategory
     */
    public function creating(ShopCategory $shopCategory)
    {
        $this->setAlias($shopCategory);
    }

    /**
     * Если поле алиас пустое, то заполняем его конвертацией заголовка.
     * @param  ShopCategory  $model
     */
    protected function setAlias(ShopCategory $shopCategory)
    {
        if(empty($shopCategory->alias)){
            $shopCategory->alias = Str::slug($shopCategory->title);
            $check = ShopCategory::where('alias', '=', $shopCategory->alias)->exists();

            if($check){
                $shopCategory->alias = Str::slug($shopCategory->title) . time();
            }
        }
    }

    /**
     * Handle the shop category "created" event.
     *
     * @param  \App\Models\ShopCategory  $shopCategory
     * @return void
     */
    public function created(ShopCategory $shopCategory)
    {
        //
    }

    /**
     * @param  ShopCategory  $shopCategory
     */
    public function updating(ShopCategory $shopCategory)
    {
        $this->setAlias($shopCategory);
    }

    /**
     * Handle the shop category "updated" event.
     *
     * @param  \App\Models\ShopCategory  $shopCategory
     * @return void
     */
    public function updated(ShopCategory $shopCategory)
    {
        //
    }

    /**
     * Handle the shop category "deleted" event.
     *
     * @param  \App\Models\ShopCategory  $shopCategory
     * @return void
     */
    public function deleted(ShopCategory $shopCategory)
    {
        //
    }

    /**
     * Handle the shop category "restored" event.
     *
     * @param  \App\Models\ShopCategory  $shopCategory
     * @return void
     */
    public function restored(ShopCategory $shopCategory)
    {
        //
    }

    /**
     * Handle the shop category "force deleted" event.
     *
     * @param  \App\Models\ShopCategory  $shopCategory
     * @return void
     */
    public function forceDeleted(ShopCategory $shopCategory)
    {
        //
    }
}
