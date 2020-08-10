<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\ShopMenu;
use App\Repositories\ShopBlogRepository;
use App\Repositories\ShopBreadcrumbsRepository;
use App\Repositories\ShopCategoryRepository;
use App\Repositories\ShopMenuRepository;
use App\Repositories\ShopProductRepository;
use App\Repositories\ShopSearchRepository;
use App\Repositories\ShopSlidersRepository;
use Illuminate\Support\Arr;
use Menu;


/**
 * Abstract class BaseController
 * Базовый контроллер.
 */
abstract class BaseController extends Controller
{
    /**
     * Метатеги.
     */
    protected $title;
    protected $keywords;
    protected $description;

    /**
     * Репозиторий.
     *
     * Логика работы с блогом.
     */
    protected $blog_rep;

    /**
     * Репозиторий.
     *
     * Логика работы со слайдером.
     */
    protected $slider_rep;

    /**
     * Репозиторий.
     *
     * Поиск по блогу.
     */
    protected $searchBlogRepository;

    /**
     * Репозиторий.
     *
     * Логика работы с продуктами.
     */
    protected $products_rep;

    /**
     * Репозиторий.
     *
     * Логика работы с главным меню.
     */
    protected $menu_rep;

    /**
     * Репозиторий.
     *
     * Логика работы с категориями.
     */
    protected $category_rep;

    /**
     * Подключаемый шаблон.
     */
    protected $template;

    /**
     * Массив переменных передаваемых в шаблон.
     */
    protected $vars = [];

    /**
     * Сайдбар на страницах.
     */
    protected $sidebar = false;

    /**
     * Левый сайдбар.
     */
    protected $contentRightBar = false;

    /**
     * Правый сайдбар.
     */
    protected $contentLeftBar = false;

    /**
     * Поиск.
     */
    protected $searchRepository = false;

    /**
     * Хлебные крошки.
     */
    protected $breadcrumbs_rep = false;

    /**
     * Конструктор.
     * @var ShopMenuRepository
     * @var ShopCategoryRepository
     * @var ShopSlidersRepository
     * @var ShopBreadcrumbsRepository
     * @var ShopProductRepository
     * @var ShopSearchRepository
     * @var ShopBlogRepository
     */
    public function __construct()
    {
        $this->menu_rep = app(ShopMenuRepository::class);
        $this->category_rep = app(ShopCategoryRepository::class);
        $this->slider_rep = app(ShopSlidersRepository::class);
        $this->breadcrumbs_rep = app(ShopBreadcrumbsRepository::class);
        $this->products_rep = app(ShopProductRepository::class);
        $this->searchRepository = app(ShopSearchRepository::class);
        $this->blog_rep = app(ShopBlogRepository::class);
    }

    /**
     * Рендер шаблона и передача переменных.
     *
     * Menu, Footer
     */
    protected function renderOutput()
    {
        $menu = $this->menu_rep->getMenu();

        $navigation = view(env('THEME') . '.shop.navigation', compact('menu'));
        $this->vars = Arr::add($this->vars, 'navigation', $navigation);

        $this->vars = Arr::add($this->vars,'keywords',$this->keywords);
        $this->vars = Arr::add($this->vars,'description',$this->description);
        $this->vars = Arr::add($this->vars,'title',$this->title);


        $menuFooter = $this->category_rep->getCategoryMain();
        $lastPostsBlog = $this->blog_rep->lastPosts();
        $footer = view(env('THEME').'.shop.footer', compact('menuFooter', 'lastPostsBlog'));
        $this->vars = Arr::add($this->vars,'footer', $footer);

        return view($this->template)->with($this->vars);
    }


    /**
     * Получаем коллекцию.
     *
     * Меню из репозитория.
     * @return \Lavary\Menu\Builder
     *@var ShopMenuRepository $menu
     */
    protected function getMainMenu()
    {
        $menu = $this->menu_rep->getMenu();
        $mBuilder = Menu::make('MyNav', function ($m) use ($menu) {
            foreach ($menu as $item) {
                if($item->parent_id == 0){
                    $m->add($item->title, $item->path)
                        ->id($item->id);
                }else{
                    if($m->find($item->parent_id)){
                        $m->find($item->parent_id)
                            ->add($item->title, $item->path)
                            ->id($item->id);
                    }
                }
            }
        });

        return $mBuilder;
    }
}
