<?php

namespace App\Http\Controllers\Shop\Admin;

use App\Repositories\ShopBlogRepository;
use App\Repositories\ShopCategoryRepository;
use App\Repositories\ShopProductRepository;
use App\Repositories\ShopSlidersRepository;
use Arr;
use Illuminate\Http\Request;

/**
 * Class IndexController.
 * Главная страница Панели Администратора.
 */
class IndexController extends BaseController
{
    /**
     * @var ShopCategoryRepository
     */
    public function __construct()
    {
        parent::__construct();
        $this->category_rep = app(ShopCategoryRepository::class);
        $this->products_rep = app(ShopProductRepository::class);
        $this->blog_rep = app(ShopBlogRepository::class);
        $this->slider_rep = app(ShopSlidersRepository::class);

        $this->template = env('THEME') . '.shop.admin.index';
    }

    /**
     * Вывод главной страница Админ Панели.
     */
    public function index()
    {
        $this->title = 'Панель Администратора';

        $countCategories = $this->category_rep->countCategories();
        $countProducts = $this->products_rep->countProducts();
        $countArticles = $this->blog_rep->countArticles();
        $getSlider = $this->slider_rep->getSlider();
        $lastArticle = $this->blog_rep->lastPosts();

        $categories = $this->category_rep->getCategoriesMenu();

        $content = view(env('THEME') . '.shop.admin.main_content', compact('countCategories', 'countProducts', 'countArticles', 'getSlider', 'categories', 'lastArticle'));
        $this->vars = Arr::add($this->vars, 'content', $content);

        return $this->renderOutput();
    }
}
