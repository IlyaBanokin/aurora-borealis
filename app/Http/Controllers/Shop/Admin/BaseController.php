<?php

namespace App\Http\Controllers\Shop\Admin;

use App\Http\Controllers\Controller;
use Arr;
use Auth;
use Illuminate\Http\Request;
use Menu;

/**
 * Class BaseController.
 *
 * Базовый контроллер Администратора.
 */
abstract class BaseController extends Controller
{
    /**
     * Метатеги.
     */
    protected $title;

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
     * Логика работы со слайдером.
     */
    protected $menu_rep;

    /**
     * Репозиторий.
     *
     * Логика работы с продуктами.
     */
    protected $products_rep;

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
     * Обьект. User
     */
    protected $user;

    /**
     * Область контента.
     */
    protected $content = false;

    public function __construct()
    {
        //
    }

    /**
     * Рендер шаблона.
     */
    public function renderOutput()
    {
        $this->vars = Arr::add($this->vars, 'title', $this->title);

        $navigation = view(env('THEME') . '.shop.admin.navigation');
        $this->vars = Arr::add($this->vars, 'navigation', $navigation);

        if($this->content){
            $this->vars = Arr::add($this->vars, 'content', $this->content);
        }

        $footer = view(env('THEME') . '.shop.admin.footer');
        $this->vars = Arr::add($this->vars, 'footer', $footer);

        return view($this->template)->with($this->vars);
    }
}
