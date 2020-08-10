<?php

namespace App\Http\Controllers\Shop;

use Arr;

/**
 * Class AboutController.
 * Страница О нас.
 */
class AboutController extends BaseController
{
    /**
     * Конструктор.
     */
    public function __construct()
    {
        parent::__construct();

        $this->template = env('THEME') . '.shop.about.about';
    }

    /**
     * Контентная часть.
     */
    public function index()
    {
        $content = view(env('THEME') . '.shop.about.aboutContent');
        $this->vars = Arr::add($this->vars, 'content', $content);

        $this->title = 'Кафе Северное Сияние | О нашем уютном кафе | Доставка';
        $this->description = 'Доставка обедов по Санкт-Петербургу и Ленинградской области кафе Северное Сияние, доставка обедов на предприятия';
        $this->keywords = 'доставка, обеды на предприятия, заказ на дом, кафе Северное Сияние, европейская кухня, морепродукты';

        return $this->renderOutput();
    }
}
