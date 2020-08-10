<?php

namespace App\Http\Controllers\Shop\Admin;

use App\Http\Requests\ShopProductCreateRequest;
use App\Http\Requests\ShopProductUpdateRequest;
use App\Models\ShopCategory;
use App\Models\ShopProduct;
use App\Repositories\ShopCategoryRepository;
use App\Repositories\ShopProductRepository;
use Arr;
use Config;
use Illuminate\Http\Request;

/**
 * Class ProductsController.
 * Список продуктов | Создание | Редактирование | Удаление
 */
class ProductsController extends BaseController
{
    /**
     * @var ShopProductRepository
     */
    public function __construct()
    {
        parent::__construct();
        $this->category_rep = app(ShopCategoryRepository::class);
        $this->products_rep = app(ShopProductRepository::class);
        $this->template = env('THEME') . '.shop.admin.products.index';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $this->title = 'Список товаров';
        $paginator = $this->products_rep->getAllWithPaginate(Config::get('settings.paginateProductsAdmin'));

        $content = view(env('THEME') . '.shop.admin.products.contentProducts', compact('paginator'));
        $this->vars = Arr::add($this->vars, 'content', $content);

        return $this->renderOutput();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $item = new ShopProduct();

        $this->title = 'Новый товар';
        $categoryList = $this->category_rep->getForComboBox();

        $content = view(env('THEME') . '.shop.admin.products.add', compact('categoryList', 'item'));
        $this->vars = Arr::add($this->vars, 'content', $content);
        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ShopProductCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ShopProductCreateRequest $request)
    {
        $data = $request->all();

        $item = (new ShopProduct())->create($data);
        //dd($id);
        $this->products_rep->getImg($item);
        $save = $item->save();
        if ($save) {
            return redirect()
                ->route('shop.admin.products.create')
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $item = $this->products_rep->getEdit($id);

        if (empty($item)) {
            abort('404');
        }

        $categoryList = $this->category_rep->getForComboBox();
        $content = view(env('THEME') . '.shop.admin.products.edit', compact('item', 'categoryList'));
        $this->vars = Arr::add($this->vars, 'content', $content);
        $this->title = "Редактирование товара '$item->title'";

        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ShopProductUpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ShopProductUpdateRequest $request, $id)
    {
        $item = $this->products_rep->getEdit($id);
        if (empty($item)) {
            return back()/*Редирект на пред. страницу*/
                ->withErrors(['msg' => "Запись id = [{$id}] не найдена"])
                ->withInput();
        }

        $data = $request->all();
        $this->products_rep->getImg($item);
        $result = $item->update($data);

        if ($result) {
            return redirect()
                ->route('shop.admin.products.edit', $item->id)// Куда редирект
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()/*Редирект на пред. страницу*/
                ->withErrors(['msg' => 'Ошибка сохранения'])/*Выкидываем ошибку*/
                ->withInput(); /*Оставляем данные в полях формы*/
        }
    }

    /**
     * Ajax Upload Single Image.
     */
    public function addImage()
    {
        if (isset($_GET['upload'])) {
            if ($_POST['name'] == 'singleProduct') {
                $wmax = Config::get('settings.img_product_width');
                $hmax = Config::get('settings.img_product_height');
            }
            $name = $_POST['name'];
            $this->products_rep->uploadImg($name, $wmax, $hmax);
        }
    }

    /**
     * Информация о продуктах в конкретной категории.
     * @param string $alias
     * @var ShopProductRepository $getProducts
     * @var ShopCategoryRepository $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list($alias)
    {
        if ($alias) {
            $category = $this->category_rep->getCategory($alias);
            //dd($category);
            $getProducts = $this->products_rep->getProductsCategory($category->id, 15);
        } else {
            abort(404);
        }

        $content = view(env('THEME') . '.shop.admin.products.content_products_for_category', compact('getProducts'));
        $this->vars = Arr::add($this->vars, 'content', $content);

        $this->title = $category->title;
        $this->description = $category->description;
        $this->keywords = $category->keywords;

        return $this->renderOutput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteProduct($id)
    {
        if ($id) {
            $db = $this->products_rep->deleteFromDB($id);

            if ($db) {
                return redirect()
                    ->route('shop.admin.products.index')// Куда редирект
                    ->with(['success' => 'Товар успешно удален']);
            } else {
                return back()/*Редирект на пред. страницу*/
                    ->withErrors(['msg' => 'Ошибка сохранения'])/*Выкидываем ошибку*/
                    ->withInput(); /*Оставляем данные в полях формы*/
            }
        }
    }
}
