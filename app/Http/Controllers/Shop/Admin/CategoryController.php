<?php

namespace App\Http\Controllers\Shop\Admin;

use App\Http\Requests\ShopCategoryCreateRequest;
use App\Http\Requests\ShopCategoryUpdateRequest;
use App\Models\ShopCategory;
use App\Repositories\ShopCategoryRepository;
use Arr;
use Config;
use Illuminate\Http\Request;
use Str;
use Validator;

/**
 * Class CategoryController.
 * Список категории | Создание | Редактирование | Удаление
 */
class CategoryController extends BaseController
{
    /**
     * @var ShopCategoryRepository
     */
    public function __construct()
    {
        parent::__construct();
        $this->category_rep = app(ShopCategoryRepository::class);
        $this->template = env('THEME') . '.shop.admin.categories.index';
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->title = 'Список категорий';
        $paginator = $this->category_rep->getAllWithPaginate(Config::get('settings.paginateCategoryAdmin'));

        $content = view(env('THEME') . '.shop.admin.categories.contentCategory', compact('paginator'));
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
        $item = new ShopCategory();
        $this->title = 'Новая категория';

        $categoryList = $this->category_rep->getForComboBox();
        $content = view(env('THEME') . '.shop.admin.categories.add', compact('categoryList', 'item'));
        $this->vars = Arr::add($this->vars, 'content', $content);
        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ShopCategoryCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ShopCategoryCreateRequest $request)
    {
        $data = $request->all();

        $item = (new ShopCategory())->create($data);
        $this->category_rep->getImg($item);
        $save = $item->save();
        if ($save) {
            return redirect()
                ->route('shop.admin.categories.create')
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
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $item = $this->category_rep->getEdit($id);

        if (empty($item)) {
            abort('404');
        }

        $content = view(env('THEME') . '.shop.admin.categories.edit', compact('item'));
        $this->vars = Arr::add($this->vars, 'content', $content);
        $this->title = "Редактирование $item->title";

        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ShopCategoryUpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ShopCategoryUpdateRequest $request, $id)
    {
        $item = $this->category_rep->getEdit($id);
        if (empty($item)) {
            return back()/*Редирект на пред. страницу*/
            ->withErrors(['msg' => "Запись id = [{$id}] не найдена"])
                ->withInput();
        }

        $data = $request->all();
        $this->category_rep->getImg($item);
        $result = $item->update($data);

        if ($result) {
            return redirect()
                ->route('shop.admin.categories.edit', $item->id)// Куда редирект
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()/*Редирект на пред. страницу*/
            ->withErrors(['msg' => 'Ошибка сохранения'])/*Выкидываем ошибку*/
            ->withInput(); /*Оставляем данные в полях формы*/
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteCategory($id)
    {
        if ($id) {
            $db = $this->category_rep->deleteFromDB($id);

            if ($db) {
                return redirect()
                    ->route('shop.admin.categories.index')// Куда редирект
                    ->with(['success' => 'Категория успешно удалена']);
            } else {
                return back()/*Редирект на пред. страницу*/
                ->withErrors(['msg' => 'Ошибка сохранения'])/*Выкидываем ошибку*/
                ->withInput(); /*Оставляем данные в полях формы*/
            }
        }
    }

    /**
     * Ajax Upload Single Image.
     */
    public function addImage()
    {
        if (isset($_GET['upload'])) {
            if ($_POST['name'] == 'single') {
                $wmax = Config::get('settings.img_width');
                $hmax = Config::get('settings.img_height');
            }
            $name = $_POST['name'];
            $this->category_rep->uploadImg($name, $wmax, $hmax);
        }
    }
}
