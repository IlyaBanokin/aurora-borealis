<?php

namespace App\Http\Controllers\Shop;

use App\Models\ShopProduct;
use Config;
use Illuminate\Support\Arr;
use MetaTag;

/**
 * Class MainController
 *
 * Контроллер главной страницы.
 */
class MainController extends BaseController
{

    /**
     * Конструктор.
     */
    public function __construct()
    {
        parent::__construct();
        $this->template = env('THEME') . '.shop.main.index';
    }

    /**
     * Главная страница.Меню.Слайдер.Новые Блюда.Меню.
     */
    public function index()
    {
        MetaTag::setTags([
            'title' => 'Главная Страница',
            'description' => 'Описание',
            'keywords' => 'Ключевые слова',
        ]);

        $newDishes = $this->products_rep->getNewDishes();
        $newDishesContentBlock = view(env('THEME') . '.shop.main.newDishesBlock',compact('newDishes'));
        $this->vars = Arr::add($this->vars, 'newDishesContentBlock', $newDishesContentBlock);

        $sliderItems = $this->slider_rep->getSlider();
        $sliders = view(env('THEME') . '.shop.main.slider',compact('sliderItems'));
        $this->vars = Arr::add($this->vars, 'sliders', $sliders);

        $menu = $this->category_rep->getCategoryMain();
        $menuContentBlock = view(env('THEME') . '.shop.main.menuContentBlock',compact('menu'));
        $this->vars = Arr::add($this->vars, 'menuContentBlock', $menuContentBlock);

        return $this->renderOutput();
    }
}
