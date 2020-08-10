<?php

namespace App\Repositories;

use App\Models\ShopCategory;
use App\Models\ShopCategory as Model;
use Illuminate\Database\Eloquent\Collection;
use Session;

class ShopCategoryRepository extends CoreRepository
{
    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Получает данные для блока Меню, на главной странице
     *
     * @return string
     */
    public function getCategoryMain()
    {
        $column = ['id', 'title', 'alias', 'img'];

        $result = $this->startConditions()
            ->select($column)
            ->with(['products' => function ($query) {
                return $query;
            }])
            ->get();

        return $result;
    }

    /**
     * Подсчет кол-во категорий.
     */
    public function countCategories()
    {
        $result = $this->startConditions()
            ->count();

        return $result;
    }

    /**
     * Получает данные для страницы меню.
     * @param int/null $perPage
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getCategoriesMenu($perPage = null)
    {
        $column = ['id', 'title', 'alias', 'img', 'excerpt'];

        $result = $this
            ->startConditions()
            ->select($column)
            ->paginate($perPage);

        return $result;
    }

    /**
     * Получает id, title по alias категории.
     * @param string $alias
     */
    public function getCategory($alias)
    {
        $column = ['id', 'title', 'keywords', 'description'];

        $result = $this
            ->startConditions()
            ->select($column)
            ->where('alias', $alias)
            ->first();

        return $result;
    }

    /**
     * Получить категории для вывода пагинатором в админ панели
     * @param int/null $perPage
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */

    public function getAllWithPaginate($perPage = null)
    {
        $column = ['id', 'title'];

        $result = $this
            ->startConditions()
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
     * Получить список категорий для выпадающего списка в админке
     *
     * @return Collection
     */
    public function getForComboBox()
    {
        $columns = implode(', ', [
            'id',
            'CONCAT (id, ". ", title) AS id_title',
        ]);

        $result = $this->startConditions()
            ->selectRaw($columns)
            ->toBase()
            ->get();

        return $result;
    }

    /**
     * Обновление категории.
     * @param array $data
     */
    public function updateCategory($data)
    {
        $result = $this->startConditions()
            ->update($data);
        return $result;
    }

    /**
     * Получение картинки, запись в БД.
     * @param ShopCategory $category
     */
    public function getImg(ShopCategory $category)
    {
        clearstatcache();
        if (Session::has('single')) {
            $name = Session::get('single');
            $category->img = $name;
            Session::forget('single');
            return;
        }
    }

    /**
     * Загрузка изображения.
     */
    public function uploadImg($name, $wmax, $hmax)
    {
        $uploaddir = env('THEME') . '/img/menu/';
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
            Session::put('single', $new_name);
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
     * Delete Image Category.
     * @param $id int
     * @return bool
     */
    public function deleteFromDB($id)
    {
        if (isset($id)) {
            $category = \DB::delete('DELETE FROM shop_categories WHERE id = ?', [$id]);

            if ($category) {
                return true;
            }
        }
    }
}
