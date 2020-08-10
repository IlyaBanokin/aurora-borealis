<?php

namespace App\Repositories;

use App\Models\ShopCategory as Model;

class ShopBreadcrumbsRepository extends CoreRepository
{
    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getBreadcrumbs($category_id, $name = '')
    {
        $cats = $this->getCategoryForBreadcrumbs();
        $breadcrumbs_array = $this->getParts($cats, $category_id);
        $breadcrumbs = "<li><a href='/'>Главная</a></li>";
        if($breadcrumbs_array)
        {
            foreach ($breadcrumbs_array as $alias => $title)
            {
                $breadcrumbs .= "<li><a href='/products/{$alias}'>{$title}</a></li>";
            }
        }
        if($name)
        {
            $breadcrumbs .= "<li class='active'>$name</li>";
        }
        return $breadcrumbs;
    }

    public function getParts($cats, $id)
    {
        $collection = collect($cats->toArray());
        $cats = $collection
            ->values()
            ->keyBy('id');

        if (!$id) return false;
        $breadcrumbs = [];
        foreach ($cats as $k => $v) {
            if (isset($cats[$id])) {
                $breadcrumbs[$cats[$id]['alias']] = $cats[$id]['title'];
            } else break;
        }

        return array_reverse($breadcrumbs, true);
    }

    public function getCategoryForBreadcrumbs()
    {
        //$column = ['id', 'title', 'keywords', 'description'];

        $result = $this
            ->startConditions()
            ->select('*')
            ->get();

        return $result;
    }
}
