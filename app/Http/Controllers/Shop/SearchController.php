<?php

namespace App\Http\Controllers\Shop;

use App\Repositories\ShopSearchRepository;
use Arr;
use Config;
use Illuminate\Http\Request;

/**
 * Class SearchController.
 * Поиск по товарам.
 */
class SearchController extends BaseController
{
    public function __construct()
    {
        parent::__construct();

        $this->searchRepository = app(ShopSearchRepository::class);
        $this->template = env('THEME') . '.shop.search.search';
    }

    /**
     * Показ результата поиска.
     */
    public function index(Request $request)
    {
        $query = !empty(trim($request->search)) ? trim($request->search) : null;

        $products = $this->searchRepository->getProductsSearch($query, Config::get('settings.paginateProducts'));

        $content = view(env('THEME') . '.shop.search.result', compact('query', 'products'));
        $this->vars = Arr::add($this->vars, 'content', $content);

        return $this->renderOutput();
    }

    /**
     * Ajax Search.
     */
    public function search(Request $request)
    {
        $search = $request->get('term');
        $result = $this->searchRepository->getAjaxSearch($search);
        return response()->json($result);
    }
}
