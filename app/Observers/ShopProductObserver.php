<?php

namespace App\Observers;

use App\Models\ShopProduct;
use Str;

class ShopProductObserver
{
    /**
     * @param  ShopProduct  $shopProduct
     */
    public function creating(ShopProduct $shopProduct)
    {
        $this->setAlias($shopProduct);
    }

    /**
     * Если поле алиас пустое, то заполняем его конвертацией заголовка.
     * @param ShopProduct $shopProduct
     */
    protected function setAlias(ShopProduct $shopProduct)
    {
        if(empty($shopProduct->alias)){
            $shopProduct->alias = Str::slug($shopProduct->title);
            $check = ShopProduct::where('alias', '=', $shopProduct->alias)->exists();

            if($check){
                $shopProduct->alias = Str::slug($shopProduct->title) . time();
            }
        }
    }

    /**
     * Handle the shop product "created" event.
     *
     * @param  \App\Models\ShopProduct  $shopProduct
     * @return void
     */
    public function created(ShopProduct $shopProduct)
    {
        //
    }

    /**
     * Handle the shop product "updated" event.
     *
     * @param  \App\Models\ShopProduct  $shopProduct
     * @return void
     */
    public function updated(ShopProduct $shopProduct)
    {
        //
    }

    /**
     * Handle the shop product "deleted" event.
     *
     * @param  \App\Models\ShopProduct  $shopProduct
     * @return void
     */
    public function deleted(ShopProduct $shopProduct)
    {
        //
    }

    /**
     * Handle the shop product "restored" event.
     *
     * @param  \App\Models\ShopProduct  $shopProduct
     * @return void
     */
    public function restored(ShopProduct $shopProduct)
    {
        //
    }

    /**
     * Handle the shop product "force deleted" event.
     *
     * @param  \App\Models\ShopProduct  $shopProduct
     * @return void
     */
    public function forceDeleted(ShopProduct $shopProduct)
    {
        //
    }
}
