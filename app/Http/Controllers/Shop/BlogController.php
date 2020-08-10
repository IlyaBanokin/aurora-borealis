<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Repositories\ShopBlogRepository;
use Arr;
use Config;
use Illuminate\Http\Request;

/**
 * Class BlogController
 * Страница Блога | Информация о статье блога .
 */
class BlogController extends BaseController
{
    /**
     * Конструктор.
     */
    public function __construct()
    {
        parent::__construct();
        $this->template = env('THEME') . '.shop.blog.blog';
    }

    /**
     * Контентная часть.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @var ShopBlogRepository $posts
     */
    public function index()
    {
        $posts = $this->blog_rep->getPosts(Config::get('settings.paginateBlog'));
        $content = view(env('THEME') . '.shop.blog.blogContent', compact('posts'));
        $this->vars = Arr::add($this->vars, 'content', $content);

        $this->title = 'Кафе Северное Сияние | Блог';
        $this->description = 'Интерессные новости о кулинарии';
        $this->keywords = 'Новости, кулинария, что поесть, где поесть';

        return $this->renderOutput();
    }

    /**
     * Инфонрмация об одной статье.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @var ShopBlogRepository $post
     */
    public function show($alias)
    {
        $post = $this->blog_rep->onePost($alias);
        if(!$post) {
            abort(404);
        }

        $content = view(env('THEME') . '.shop.blog.post', compact('post'));
        $this->vars = Arr::add($this->vars, 'content', $content);

        $this->title = 'Блог |' . ' ' . $post->title;
        $this->description = $post->description;
        $this->keywords = $post->keywords;

        return $this->renderOutput();
    }
}
