<?php

namespace App\Repositories;

use App\Models\ShopBlog;
use App\Models\ShopBlog as Model;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use Session;

//use Your Model

/**
 * Class ShopBlogRepository.
 */
class ShopBlogRepository extends CoreRepository
{
    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * @return string
     *  Return the model
     */
    public function getPosts($perPage)
    {
        $column = ['title', 'alias', 'content' ,'img', 'published_at'];

        $result =  $this->startConditions()
            ->select($column)
            ->orderBy('id', 'DESC')
            ->paginate($perPage);

        return $result;
    }

    /**
     * @return string
     *  Один продукт.
     */
    public function onePost($alias)
    {
        $column = ['title', 'alias', 'content', 'img', 'keywords', 'description', 'published_at'];

        $result =  $this->startConditions()
            ->select($column)
            ->where('alias', $alias)
            ->first();

        return $result;
    }

    /**
     * @return string
     *  Последние записи блога.
     */
    public function lastPosts()
    {
        $column = ['id', 'title', 'alias', 'content', 'img'];

        $result = $this->startConditions()
            ->select($column)
            ->orderBy('id', 'DESC')
            ->take(5)
            ->get();

        return $result;
    }

    /**
     * Получить статьи блога для вывода пагинатором в админ панели
     * @param int/null $perPage
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllWithPaginate($perPage = null)
    {
        $column = ['id', 'title', 'published_at', 'created_at'];

        $result = $this
            ->startConditions()
            ->orderBy('id', 'DESC')
            ->select($column)
            ->paginate($perPage);

        return $result;
    }

    /**
     * Получить модель для редактирования в админке
     *
     * @param int $id
     *
     * @return Model
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    /**
     * Получение картинки, запись в БД.
     * @param ShopBlog $blog
     */
    public function getImg(ShopBlog $blog)
    {
        clearstatcache();
        if (Session::has('singleBlog')) {
            $name = Session::get('singleBlog');
            $blog->img = $name;
            Session::forget('singleBlog');
            return;
        }
    }

    /**
     * Подсчет кол-во статей блога.
     */
    public function countArticles()
    {
        $result = $this->startConditions()
            ->count();

        return $result;
    }

    /**
     * Загрузка изображения.
     */
    public function uploadImg($name, $wmax, $hmax)
    {
        $uploaddir = env('THEME') . '/img/blog/';
        $ext = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $_FILES[$name]['name'])); // расширение картинки
        $types = array("image/gif", "image/png", "image/jpeg", "image/pjpeg", "image/x-png"); // массив допустимых расширений
        if ($_FILES[$name]['size'] > 5242880) {
            $res = array("error" => "Ошибка! Максимальный вес файла - 5 Мб!");
            exit(json_encode($res));
        }
        if ($_FILES[$name]['error']) {
            $res = array("error" => "Ошибка! Возможно, файл слишком большой.");
            exit(json_encode($res));
        }
        if (!in_array($_FILES[$name]['type'], $types)) {
            $res = array("error" => "Допустимые расширения - .gif, .jpg, .png");
            exit(json_encode($res));
        }
        $new_name = md5(time()) . ".$ext";
        $uploadfile = $uploaddir . $new_name;
        if (@move_uploaded_file($_FILES[$name]['tmp_name'], $uploadfile)) {
            Session::put('singleBlog', $new_name);
            self::resize($uploadfile, $uploadfile, $wmax, $hmax, $ext);
            $res = array("file" => $new_name);
            echo(json_encode($res));
        }
    }

    /**
     * Resize Image.
     */
    public static function resize($target, $dest, $wmax, $hmax, $ext)
    {
        list($w_orig, $h_orig) = getimagesize($target);
        $ratio = $w_orig / $h_orig; // =1 - квадрат, <1 - альбомная, >1 - книжная

        if (($wmax / $hmax) > $ratio) {
            $wmax = $hmax * $ratio;
        } else {
            $hmax = $wmax / $ratio;
        }

        $img = "";
        // imagecreatefromjpeg | imagecreatefromgif | imagecreatefrompng
        switch ($ext) {
            case("gif"):
                $img = imagecreatefromgif($target);
                break;
            case("png"):
                $img = imagecreatefrompng($target);
                break;
            default:
                $img = imagecreatefromjpeg($target);
        }
        $newImg = imagecreatetruecolor($wmax, $hmax); // создаем оболочку для новой картинки

        if ($ext == "png") {
            imagesavealpha($newImg, true); // сохранение альфа канала
            $transPng = imagecolorallocatealpha($newImg, 0, 0, 0, 127); // добавляем прозрачность
            imagefill($newImg, 0, 0, $transPng); // заливка
        }

        imagecopyresampled($newImg, $img, 0, 0, 0, 0, $wmax, $hmax, $w_orig, $h_orig); // копируем и ресайзим изображение
        switch ($ext) {
            case("gif"):
                imagegif($newImg, $dest);
                break;
            case("png"):
                imagepng($newImg, $dest);
                break;
            default:
                imagejpeg($newImg, $dest);
        }
        imagedestroy($newImg);
    }

    /**
     * Delete Image Article.
     * @param $id int
     * @return bool
     */
    public function deleteFromDB($id)
    {
        if (isset($id)) {
            $article = \DB::delete('DELETE FROM shop_blogs WHERE id = ?', [$id]);

            if ($article) {
                return true;
            }
        }
    }
}
