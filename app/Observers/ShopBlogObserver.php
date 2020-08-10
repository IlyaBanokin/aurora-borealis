<?php

namespace App\Observers;

use App\Models\ShopBlog;
use Carbon\Carbon;
use Str;

class ShopBlogObserver
{
    /**
     * @param ShopBlog $shopBlog
     */
    public function creating(ShopBlog $shopBlog)
    {
        $this->setAlias($shopBlog);
        $this->setPublished($shopBlog);
    }

    /**
     * Если поле алиас пустое, то заполняем его конвертацией заголовка.
     * @param ShopBlog $shopBlog
     */
    protected function setAlias(ShopBlog $shopBlog)
    {
        if(empty($shopBlog->alias)){
            $shopBlog->alias = Str::slug($shopBlog->title);
            $check = ShopBlog::where('alias', '=', $shopBlog->alias)->exists();

            if($check){
                $shopBlog->alias = Str::slug($shopBlog->title) . time();
            }
        }
    }

    /**
     * Если поле published_at пустое, то заполняем его конвертацией заголовка.
     * @param ShopBlog $shopBlog
     */
    protected function setPublished(ShopBlog $shopBlog)
    {
        if(empty($shopBlog->published_at)){
            $shopBlog->published_at = Carbon::now();
        }
    }

    /**
     * Handle the shop blog "created" event.
     *
     * @param  \App\Models\ShopBlog  $shopBlog
     * @return void
     */
    public function created(ShopBlog $shopBlog)
    {
        //
    }

    /**
     * @param ShopBlog $shopBlog
     */
    public function updating(ShopBlog $shopBlog)
    {
        $this->setAlias($shopBlog);
        $this->setPublished($shopBlog);
    }

    /**
     * Handle the shop blog "updated" event.
     *
     * @param  \App\Models\ShopBlog  $shopBlog
     * @return void
     */
    public function updated(ShopBlog $shopBlog)
    {
        //
    }

    /**
     * Handle the shop blog "deleted" event.
     *
     * @param  \App\Models\ShopBlog  $shopBlog
     * @return void
     */
    public function deleted(ShopBlog $shopBlog)
    {
        //
    }

    /**
     * Handle the shop blog "restored" event.
     *
     * @param  \App\Models\ShopBlog  $shopBlog
     * @return void
     */
    public function restored(ShopBlog $shopBlog)
    {
        //
    }

    /**
     * Handle the shop blog "force deleted" event.
     *
     * @param  \App\Models\ShopBlog  $shopBlog
     * @return void
     */
    public function forceDeleted(ShopBlog $shopBlog)
    {
        //
    }
}
