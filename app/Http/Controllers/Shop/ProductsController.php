<?php

namespace App\Http\Controllers\Shop;

use App\Repositories\ShopBreadcrumbsRepository;
use App\Repositories\ShopCategoryRepository;
use App\Repositories\ShopProductRepository;
use Arr;
use Config;

/**
 * Class ProductsController.
 * Вывод товаров по Категориям | Информация о товаре.
 */
class ProductsController extends BaseController
{
    /**
     * Конструктор.
     */
    public function __construct()
    {
        parent::__construct();
        $this->template = env('THEME') . '.shop.menu.menu';
    }

    /**
     * Информация о продуктах в конкретной категории.
     * @param string $alias
     * @var ShopProductRepository $getProducts
     * @var ShopCategoryRepository $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($alias)
    {
        if ($alias) {
            $category = $this->category_rep->getCategory($alias);
            $getProducts = $this->products_rep->getProductsCategory($category->id, Config::get('settings.paginateProducts'));
        } else {
            abort(404);
        }

        $content = view(env('THEME') . '.shop.menu.productsContent', compact('category','getProducts'));
        $this->vars = Arr::add($this->vars, 'content', $content);

        $this->title = 'Кафе Северное Сияние | ' . ' ' . $category->title;
        $this->description = $category->description;
        $this->keywords = $category->keywords;

        return $this->renderOutput();
    }

    /**
     * Информация о конкретном продукте.
     * @param string $alias
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @var ShopBreadcrumbsRepository $breadcrumbs
     * @var ShopProductRepository $getProduct
     */
    public function showProduct($alias)
    {
        $getProduct = $this->products_rep->oneProduct($alias);
        if(!$getProduct) {
            abort(404);
        }

        $breadcrumbs = $this->breadcrumbs_rep->getBreadcrumbs($getProduct->category_id, $getProduct->title);
        $content = view(env('THEME') . '.shop.menu.product', compact('breadcrumbs','getProduct'));
        $this->vars = Arr::add($this->vars, 'content', $content);

        $this->title = 'Кафе Северное Сияние | ' . ' ' . $getProduct->title;
        $this->description = $getProduct->description;
        $this->keywords = $getProduct->keywords;

        return $this->renderOutput();
    }
}
