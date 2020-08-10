<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Repositories\ShopSearchBlogRepository;
use Arr;
use Config;
use Illuminate\Http\Request;

/**
 * Class SearchBlogController.
 * Поиск по блогу.
 */
class SearchBlogController extends BaseController
{
    public function __construct()
    {
        parent::__construct();

        $this->searchBlogRepository = app(ShopSearchBlogRepository::class);
        $this->template = env('THEME') . '.shop.blog.blog';
    }

    /**
     * Показ результата поиска.
     */
    public function index(Request $request)
    {
        $queryBlog = !empty(trim($request->searchBlog)) ? trim($request->searchBlog) : null;

        $posts = $this->searchBlogRepository->getBlogSearch($queryBlog, Config::get('settings.paginateBlog'));

        $content = view(env('THEME') . '.shop.blog.result', compact('queryBlog', 'posts'));
        $this->vars = Arr::add($this->vars, 'content', $content);

        return $this->renderOutput();
    }

    /**
     * Ajax Search.
     */
    public function search(Request $request)
    {
        $search = $request->get('term');
        $result = $this->searchBlogRepository->getAjaxSearch($search);
        return response()->json($result);
    }
}
