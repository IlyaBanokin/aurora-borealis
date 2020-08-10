<?php

namespace App\Observers;

use App\Models\ShopMenu;
use Str;

class ShopMenuObserver
{
    /**
     * @param  ShopMenu  $shopMenu
     */
    public function creating(ShopMenu $shopMenu)
    {
        $this->setPath($shopMenu);
    }

    /**
     * Если поле путь пустое, то заполняем его конвертацией заголовка.
     * @param  ShopMenu $shopMenu
     */
    protected function setPath(ShopMenu $shopMenu)
    {
        if(empty($shopMenu->path)){
            $shopMenu->path = Str::slug($shopMenu->title);
            $check = ShopMenu::where('path', '=', $shopMenu->path)->exists();

            if($check){
                $shopMenu->path = Str::slug($shopMenu->title) . time();
            }
        }
    }

    /**
     * Handle the shop menu "created" event.
     *
     * @param  \App\Models\ShopMenu  $shopMenu
     * @return void
     */
    public function created(ShopMenu $shopMenu)
    {
        //
    }

    /**
     * @param  ShopMenu $shopMenu
     */
    public function updating(ShopMenu $shopMenu)
    {
        $this->setPath($shopMenu);
    }

    /**
     * Handle the shop menu "updated" event.
     *
     * @param  \App\Models\ShopMenu  $shopMenu
     * @return void
     */
    public function updated(ShopMenu $shopMenu)
    {
        //
    }

    /**
     * Handle the shop menu "deleted" event.
     *
     * @param  \App\Models\ShopMenu  $shopMenu
     * @return void
     */
    public function deleted(ShopMenu $shopMenu)
    {
        //
    }

    /**
     * Handle the shop menu "restored" event.
     *
     * @param  \App\Models\ShopMenu  $shopMenu
     * @return void
     */
    public function restored(ShopMenu $shopMenu)
    {
        //
    }

    /**
     * Handle the shop menu "force deleted" event.
     *
     * @param  \App\Models\ShopMenu  $shopMenu
     * @return void
     */
    public function forceDeleted(ShopMenu $shopMenu)
    {
        //
    }
}
