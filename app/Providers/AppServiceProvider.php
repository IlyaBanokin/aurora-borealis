<?php

namespace App\Providers;

use App\Models\ShopBlog;
use App\Models\ShopCategory;
use App\Models\ShopMenu;
use App\Models\ShopProduct;
use App\Observers\ShopBlogObserver;
use App\Observers\ShopCategoryObserver;
use App\Observers\ShopMenuObserver;
use App\Observers\ShopProductObserver;
use Illuminate\Support\ServiceProvider;
use Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        ShopCategory::observe(ShopCategoryObserver::class);
        ShopProduct::observe(ShopProductObserver::class);
        ShopMenu::observe(ShopMenuObserver::class);
        ShopBlog::observe(ShopBlogObserver::class);
    }
}
