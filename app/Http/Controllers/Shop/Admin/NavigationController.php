<?php

namespace App\Http\Controllers\Shop\Admin;

use App\Http\Requests\ShopMenuCreateRequest;
use App\Http\Requests\ShopMenuUpdateRequest;
use App\Models\ShopMenu;
use App\Repositories\ShopMenuRepository;
use Arr;
use Config;
use Illuminate\Http\Request;

/**
 * Class NavigationController.
 * Навигация Меню.
 */
class NavigationController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->menu_rep = app(ShopMenuRepository::class);
        $this->template = env('THEME') . '.shop.admin.navigation.index';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $this->title = 'Навигация';

        $menu = $this->menu_rep->getMenu();
        $content = view(env('THEME') . '.shop.admin.navigation.contentNavigation', compact('menu'));
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
        $item = new ShopMenu();
        $this->title = 'Новый пункт меню';

        $content = view(env('THEME') . '.shop.admin.navigation.add', compact('item'));
        $this->vars = Arr::add($this->vars, 'content', $content);
        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ShopMenuCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ShopMenuCreateRequest $request)
    {
        $data = $request->all();

        $item = (new ShopMenu())->create($data);
        //dd($data);
        $this->menu_rep->getImg($item);
        $save = $item->save();
        if ($save) {
            return redirect()
                ->route('shop.admin.navigation.create')
                ->with(['success' => 'Пункт меню добавлен']);
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
        $item = $this->menu_rep->getEdit($id);

        if (empty($item)) {
            abort('404');
        }

        $content = view(env('THEME') . '.shop.admin.navigation.edit', compact('item'));
        $this->vars = Arr::add($this->vars, 'content', $content);
        $this->title = "Редактирование $item->title";

        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ShopMenuUpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ShopMenuUpdateRequest $request, $id)
    {
        $item = $this->menu_rep->getEdit($id);
        if (empty($item)) {
            return back()/*Редирект на пред. страницу*/
                ->withErrors(['msg' => "Запись id = [{$id}] не найдена"])
                ->withInput();
        }

        $data = $request->all();
        $this->menu_rep->getImg($item);
        $result = $item->update($data);

        if ($result) {
            return redirect()
                ->route('shop.admin.navigation.edit', $item->id)// Куда редирект
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()/*Редирект на пред. страницу*/
            ->withErrors(['msg' => 'Ошибка сохранения'])/*Выкидываем ошибку*/
            ->withInput(); /*Оставляем данные в полях формы*/
        }
    }

    /**
     * Удаление пункта меню.
     */
    public function deleteNavigation()
    {
        //
    }

    /**
     * Ajax Upload Single Image.
     */
    public function addImage()
    {
        if (isset($_GET['upload'])) {
            if ($_POST['name'] == 'singleMenu') {
                $wmax = Config::get('settings.img_menu_width');
                $hmax = Config::get('settings.img_menu_height');
            }
            $name = $_POST['name'];
            $this->menu_rep->uploadImg($name, $wmax, $hmax);
        }
    }
}
