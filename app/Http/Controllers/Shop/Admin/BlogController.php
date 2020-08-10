<?php

namespace App\Http\Controllers\Shop\Admin;

use App\Http\Requests\ShopBlogCreateRequest;
use App\Http\Requests\ShopBlogUpdateRequest;
use App\Models\ShopBlog;
use App\Repositories\ShopBlogRepository;
use Arr;
use Config;
use Illuminate\Http\Request;

/**
 * Class BlogController.
 * Список статей блога | Создание | Редактирование | Удаление
 */
class BlogController extends BaseController
{
    /**
     * @var ShopBlogRepository
     */
    public function __construct()
    {
        parent::__construct();
        $this->blog_rep = app(ShopBlogRepository::class);
        $this->template = env('THEME') . '.shop.admin.blog.index';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $this->title = 'Список статей';
        $paginator = $this->blog_rep->getAllWithPaginate(Config::get('settings.paginateBlogAdmin'));

        $content = view(env('THEME') . '.shop.admin.blog.contentBlog', compact('paginator'));
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
        $item = new ShopBlog();
        $this->title = 'Новая статья';

        $content = view(env('THEME') . '.shop.admin.blog.add', compact('item'));
        $this->vars = Arr::add($this->vars, 'content', $content);
        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ShopBlogCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ShopBlogCreateRequest $request)
    {
        $data = $request->all();

        $item = (new ShopBlog())->create($data);
        $this->blog_rep->getImg($item);
        $save = $item->save();
        if ($save) {
            return redirect()
                ->route('shop.admin.blog.create')
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
        $item = $this->blog_rep->getEdit($id);

        if (empty($item)) {
            abort('404');
        }

        $content = view(env('THEME') . '.shop.admin.blog.edit', compact('item'));
        $this->vars = Arr::add($this->vars, 'content', $content);
        $this->title = "Редактирование статьи '$item->title'";

        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ShopBlogUpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ShopBlogUpdateRequest $request, $id)
    {
        $item = $this->blog_rep->getEdit($id);
        if (empty($item)) {
            return back()/*Редирект на пред. страницу*/
                ->withErrors(['msg' => "Запись id = [{$id}] не найдена"])
                ->withInput();
        }

        $data = $request->all();
        $this->blog_rep->getImg($item);
        $result = $item->update($data);

        if ($result) {
            return redirect()
                ->route('shop.admin.blog.edit', $item->id)// Куда редирект
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
    public function deleteArticle($id)
    {
        if ($id) {
            $db = $this->blog_rep->deleteFromDB($id);

            if ($db) {
                return redirect()
                    ->route('shop.admin.blog.index')// Куда редирект
                    ->with(['success' => 'Статья успешно удалена']);
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
            if ($_POST['name'] == 'singleBlog') {
                $wmax = Config::get('settings.img_blog_width');
                $hmax = Config::get('settings.img_blog_height');
            }
            $name = $_POST['name'];
            $this->blog_rep->uploadImg($name, $wmax, $hmax);
        }
    }
}
