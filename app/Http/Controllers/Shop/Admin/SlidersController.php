<?php

namespace App\Http\Controllers\Shop\Admin;

use App\Http\Requests\ShopSliderCreateRequest;
use App\Http\Requests\ShopSliderUpdateRequest;
use App\Models\ShopMenu;
use App\Models\ShopSlider;
use App\Repositories\ShopSlidersRepository;
use Arr;
use Config;
use Illuminate\Http\Request;

/**
 * Class SlidersController.
 * Все слайдеры | Создание | Редактирование | Удаление
 */
class SlidersController extends BaseController
{
    /**
     * @var ShopSlidersRepository
     */
    public function __construct()
    {
        parent::__construct();
        $this->slider_rep = app(ShopSlidersRepository::class);
        $this->template = env('THEME') . '.shop.admin.sliders.index';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $this->title = 'Все слайдеры';
        $slider = $this->slider_rep->getSlider();

        $content = view(env('THEME') . '.shop.admin.sliders.contentSlider', compact('slider'));
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
        $this->title = 'Новый слайд';

        $content = view(env('THEME') . '.shop.admin.sliders.add', compact( 'item'));
        $this->vars = Arr::add($this->vars, 'content', $content);

        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ShopSliderCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ShopSliderCreateRequest $request)
    {
        $data = $request->all();

        $item = (new ShopSlider())->create($data);
        $this->slider_rep->getImg($item);
        $save = $item->save();
        if ($save) {
            return redirect()
                ->route('shop.admin.sliders.create')
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
        $item = $this->slider_rep->getEdit($id);

        if (empty($item)) {
            abort('404');
        }

        $content = view(env('THEME') . '.shop.admin.sliders.edit', compact('item'));
        $this->vars = Arr::add($this->vars, 'content', $content);
        $this->title = "Редактирование $item->title";

        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ShopSliderUpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ShopSliderUpdateRequest $request, $id)
    {
        $item = $this->slider_rep->getEdit($id);
        if (empty($item)) {
            return back()/*Редирект на пред. страницу*/
                ->withErrors(['msg' => "Запись id = [{$id}] не найдена"])
                ->withInput();
        }

        $data = $request->all();
        $this->slider_rep->getImg($item);
        $result = $item->update($data);

        if ($result) {
            return redirect()
                ->route('shop.admin.sliders.edit', $item->id)// Куда редирект
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
            if ($_POST['name'] == 'singleSlider') {
                $wmax = Config::get('settings.img_slider_width');
                $hmax = Config::get('settings.img_slider_height');
            }
            $name = $_POST['name'];
            $this->slider_rep->uploadImg($name, $wmax, $hmax);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteSlider($id)
    {
        if ($id) {
            $db = $this->slider_rep->deleteFromDB($id);

            if ($db) {
                return redirect()
                    ->route('shop.admin.sliders.index')// Куда редирект
                    ->with(['success' => 'Слайд успешно удален']);
            } else {
                return back()/*Редирект на пред. страницу*/
                    ->withErrors(['msg' => 'Ошибка сохранения'])/*Выкидываем ошибку*/
                    ->withInput(); /*Оставляем данные в полях формы*/
            }
        }
    }
}
