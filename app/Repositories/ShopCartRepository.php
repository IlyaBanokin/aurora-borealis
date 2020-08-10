<?php


namespace App\Repositories;

use App\Models\ShopProduct as Model;
use Session;

class ShopCartRepository extends CoreRepository
{
    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Поиск для добавления информации о товаре для корзины.
     * @return string
     */
    public function getProductForCart($id)
    {
        $column = ['id', 'alias', 'title', 'price', 'old_price'];

        $result =  $this->startConditions()
            ->select($column)
            ->where('id', $id)
            ->first();

        return $result;
    }

    /**
     * Добавление в корзину нового товара.
     */
    public function addToCart($product, $qty = 1)
    {
        $ID = $product->id;
        $title = $product->title;
        $alias = $product->alias;
        $price = $product->price;

        if(Session::has("cart.$ID")){
            $old_qty = Session::get("cart.$ID.qty");
            $qty = $old_qty += $qty;
            Session::put("cart.$ID.qty", "$qty");
        }else{
            Session::put("cart.$ID.qty", "$qty");
            Session::put("cart.$ID.title", "$title");
            Session::put("cart.$ID.alias", "$alias");
            Session::put("cart.$ID.price", "$price");
        }

        if(Session::has("cart-qty")){
            $getQty = Session::get("cart-qty");
            $qtyCart = $getQty += $qty;
            Session::put("cart-qty", "$qtyCart");
        }else{
            Session::put("cart-qty", "$qty");
        }

        if(Session::has("cart-sum")){
            $cartSum = Session::get("cart-sum");
            $qtySum =  ($qty * $price) + $cartSum;
            Session::put("cart-sum", "$qtySum");
        }else{
            $qtySumCart = $qty * $price;
            Session::put("cart-sum", "$qtySumCart");
        }
    }

    /**
     * Очистка корзины.
     */
    public function cartClear()
    {
        Session::forget('cart');
        Session::forget('cart-qty');
        Session::forget('cart-sum');
    }

    /**
     * Удаление товара из корзины.
     */
    public function deleteItem($id)
    {
        $getQty = Session::get("cart.$id.qty");
        $getPrice = Session::get("cart.$id.price");
        $cartQty = Session::get("cart-qty");
        $cartSum = Session::get("cart-sum");

        $sum = $getQty * $getPrice;

        $cartQty = $cartQty - $getQty;
        Session::put("cart-qty", "$cartQty");

        $cartSum = $cartSum - $sum;
        Session::put("cart-sum", "$cartSum");

        Session::forget("cart.$id");
    }
}
