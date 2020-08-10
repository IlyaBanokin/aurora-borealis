<?php

namespace App\Repositories;

use App\Models\ShopBlog as Model;

/**
 * Class ShopSearchBlogRepository.
 */
class ShopSearchBlogRepository extends CoreRepository
{
    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getBlogSearch($query, $perPage = null)
    {
        $posts = \DB::table('shop_blogs')
            ->select('id', 'title', 'alias', 'img', 'content', 'keywords', 'description', 'published_at')
            ->where('title', 'LIKE', '%' . $query . '%')
            ->paginate($perPage);

        return $posts;
    }

    public function getAjaxSearch($search)
    {
        $result = \DB::table('shop_blogs')
            ->select('title')
            ->where('title', 'LIKE', '%' . $search . '%')
            ->pluck('title');

        return $result;
    }
}
