<?php


namespace App\Repositories;

use App\Models\ShopProduct as Model;

class ShopSearchRepository extends CoreRepository
{
    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getProductsSearch($query, $perPage = null)
    {
        $products = \DB::table('shop_products')
            ->select('id', 'title', 'alias', 'excerpt', 'price','old_price','img')
            ->where('title', 'LIKE', '%' . $query . '%')
            ->paginate($perPage);

        return $products;
    }

    public function getAjaxSearch($search)
    {
        $result = \DB::table('shop_products')
            ->select('title')
            ->where('title', 'LIKE', '%' . $search . '%')
            ->pluck('title');

        return $result;
    }
}
