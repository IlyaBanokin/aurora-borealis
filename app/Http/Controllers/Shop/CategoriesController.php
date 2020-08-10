<?php

namespace App\Http\Controllers\Shop;

use App\Repositories\ShopCategoryRepository;
use Arr;
use Config;

/**
 * Class CategoriesController
 *
 * Категории.Меню.
 */
class CategoriesController extends BaseController
{
    /**
     * Class CategoriesController
     *
     * Конструктор.
     */
    public function __construct()
    {
        parent::__construct();
        $this->template = env('THEME') . '.shop.menu.menu';
    }

    /**
     * Главная страница меню.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @var ShopCategoryRepository $categories
     */
    public function index()
    {
        $this->title = 'Кафе Северное Сияние | Меню';
        $this->description = 'Доставка обедов по Санкт-Петербургу и Ленинградской области кафе Северное Сияние, доставка обедов на предприятия';
        $this->keywords = 'доставка, обеды на предприятия, заказ на дом, кафе Северное Сияние';

        $categories = $this->category_rep->getCategoriesMenu(Config::get('settings.paginateMenuPage'));
        $content = view(env('THEME') . '.shop.menu.menuContent',compact('categories'));
        $this->vars = Arr::add($this->vars, 'content', $content);

        return $this->renderOutput();
    }
}
